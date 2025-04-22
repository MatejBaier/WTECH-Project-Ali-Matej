<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function home()
    {
        $products = Product::with(['brand', 'fuel', 'transmission', 'mainImage'])->get();

        return view('home', compact('products'));
    }

    public function filter(Request $request)
    {
        $query = Product::with(['brand', 'fuel', 'transmission', 'mainImage']);

        if ($request->filled('search'))
        {
            $query->where(function($q) use ($request)
            {
                $q->where('title', 'ILIKE', '%' . $request->search . '%')->orWhere('description', 'ILIKE', '%' . $request->search . '%');
            });
        }

        if ($request->filled('brand') && strtolower($request->brand) !== 'all')
        {
            // by brand
            $query->whereHas('brand', function ($q) use ($request)
            {
                $q->whereRaw('LOWER(name) = ?', [strtolower($request->brand)]);
            });
        }

        if ($request->filled('price_min'))
        {
            // by min price
            $query->where('price', '>=', $request->price_min);
        }

        if ($request->filled('price_max'))
        {
            // by max price
            $query->where('price', '<=', $request->price_max);
        }

        if ($request->filled('power_min'))
        {
            // by min engine power
            $query->where('engine_power', '>=', $request->power_min);
        }

        if ($request->filled('power_max'))
        {
            // by max engine power
            $query->where('engine_power', '<=', $request->power_max);
        }

        if ($request->filled('transmission'))
        {
            // by transmission type
            $query->whereHas('transmission', function ($q) use ($request)
            {
                $q->whereIn('type', (array) $request->transmission);
            });
        }




        if ($request->filled('fuel'))
        {
            // by fuel type
            $query->whereHas('fuel', function ($q) use ($request)
            {
                $q->whereIn('type', (array) $request->fuel);
            });
        }

        //Sorting
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

        $products = $query->get();

        return view('home', compact('products'));
    }

    public function show($id)
    {
        $product = Product::with(['brand', 'fuel', 'transmission', 'images'])->findOrFail($id);

        return view('product', compact('product'));
    }

}
