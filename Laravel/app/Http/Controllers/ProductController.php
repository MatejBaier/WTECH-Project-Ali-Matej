<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Fuel;
use App\Models\Product;
use App\Models\Transmission;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function home()
    {
        $products = Product::with(['brand', 'fuel', 'transmission', 'mainImage'])->paginate(9);
        $brands = Brand::all();
        $fuels = Fuel::all();
        $transmissions = Transmission::all();

        return view('home', compact('products', 'brands', 'fuels', 'transmissions'));
    }

    public function show($id)
    {
        $product = Product::with(['brand', 'fuel', 'transmission', 'images'])->findOrFail($id);

        return view('product', compact('product'));
    }


    public function globalSearch(Request $request)
    {
        $query = Product::query();  // all products

        if ($request->filled('search'))
        {
            // Check if anything was entered
            $this->searchProducts($query, $request->search);
        }

        $products = $query->paginate(9);
        $brands = Brand::all();
        $fuels = Fuel::all();
        $transmissions = Transmission::all();

        return view('home', compact('products', 'brands', 'fuels', 'transmissions'));
    }

    public function filter(Request $request)
    {
        $query = Product::with(['brand', 'fuel', 'transmission', 'mainImage']);

        // Filters on brand, price, power and transmission
        $this->applyFilters($query, $request);

        if ($request->filled('search'))
        {
            // Check if anything was entered into search
            $this->searchProducts($query, $request->search);
        }

        // Sorting
        $this->applySorting($query, $request);

        $products = $query->paginate(9);
        $brands = Brand::all();
        $fuels = Fuel::all();
        $transmissions = Transmission::all();


        return view('home', compact('products','brands', 'fuels', 'transmissions'));
    }

    private function searchProducts($query, $searchTerm)
    {
        $query->where(function ($q) use ($searchTerm)
        {
            $q->where('title', 'ILIKE', '%' . $searchTerm . '%')        // Fulltext search in title
            ->orWhere('description', 'ILIKE', '%' . $searchTerm . '%'); // Fulltext search in description
        });
    }


    private function applyFilters($query, $request)
    {
        if ($request->filled('brand') && strtolower($request->brand) !== 'all')
        {
            $query->whereHas('brand', function ($q) use ($request)
            {
                $q->whereRaw('LOWER(name) = ?', [strtolower($request->brand)]);
            });
        }

        $validated = $request->validate([
            'price_min' => 'integer|min:0 | nullable',
            'price_max' => 'integer|min:0 | nullable |gte:price_min',
            'power_min' => 'integer|min:0 | nullable',
            'power_max' => 'integer|min:0 | nullable |gte:power_min',
        ]);

        if ($request->filled('price_min'))
        {
            $query->where('price', '>=', $request->price_min);
        }

        if ($request->filled('price_max'))
        {
            $query->where('price', '<=', $request->price_max);
        }

        if ($request->filled('power_min'))
        {
            $query->where('engine_power', '>=', $request->power_min);
        }

        if ($request->filled('power_max'))
        {
            $query->where('engine_power', '<=', $request->power_max);
        }

        if ($request->filled('transmission'))
        {
            $query->whereHas('transmission', function ($q) use ($request)
            {

                $q->whereIn('type', (array) $request->transmission);
            });
        }

        if ($request->filled('fuel'))
        {
            $query->whereHas('fuel', function ($q) use ($request)
            {
                $q->whereIn('type', (array) $request->fuel);
            });
        }
    }


    private function applySorting($query, $request)
    {
        switch ($request->sort)
        {
            case 'price_low_high':
            default:
                $query->orderBy('price', 'asc');
                break;
            case 'price_high_low':
                $query->orderBy('price', 'desc');
                break;
            case 'hp_high_low':
                $query->orderBy('engine_power', 'desc');
                break;
            case 'hp_low_high':
                $query->orderBy('engine_power', 'asc');
                break;
        }
    }

}
