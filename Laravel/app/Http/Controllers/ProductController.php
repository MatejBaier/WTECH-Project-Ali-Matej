<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Fuel;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Transmission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;




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



    public function create()
    {
        $brands        = Brand::all();
        $fuels         = Fuel::all();
        $transmissions = Transmission::all();

        // loads resources all info for selection
        return view('productNewAdmin', compact('brands','fuels','transmissions'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'           => 'required|string|max:255|unique:product,title',
            'price'           => 'required|numeric|min:0',
            'engine_power'    => 'required|integer|min:0',
            'transmission_id' => 'required|exists:transmission,id',
            'fuel_id'         => 'required|exists:fuel,id',
            'brand_id'        => 'required|exists:brands,id',
            'description'     => 'nullable|string',
        ]);

        $product = Product::create($validated);

        // after creating, send them to the edit page so they can add images
        return redirect()
            ->route('products.edit', $product->id)->with('success','Product created. You can now upload images.');
    }

    public function uploadImage(Request $request, $productId)
    {
        $product = Product::findOrFail($productId);

        $request->validate([
            'image' => 'required|image|max:5120',   // max 5MB
        ]);

        // get uploaded image
        $file = $request->file('image');


        $name = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $extension = $file->getClientOriginalExtension();

        $destinationPath = public_path('images/Listings');

        $filename = $name.'.'.$extension;   // create original file name

        // While file with this name exists, keep appending random string to image name
        while (File::exists($destinationPath.'/'.$filename))
        {
            $filename = $name.'_'.Str::random(6).'.'.$extension;
        }

        $file->move($destinationPath, $filename);

        $product->images()->create(['image_path' => '/images/Listings/'.$filename,]);

        return redirect()->back()->with('success', 'Image was successfully uploaded.');
    }

    public function deleteImage($id)
    {
        $image = ProductImage::findOrFail($id);

        if (Storage::exists($image->image_path))
        {
            Storage::delete($image->image_path);
        }

        $image->delete();

        return back()->with('success', 'Image deleted successfully.');
    }


    public function edit(Product $product)
    {
        if (!Auth::user()->is_admin)
        {
            abort(403, 'Unauthorized action.');
        }

        $brands = Brand::all();
        $fuels = Fuel::all();
        $transmissions = Transmission::all();

        return view('productUpdateAdmin', compact('product', 'brands', 'fuels', 'transmissions'));
    }


    public function destroy(Product $product)
    {
        // Check if user is admin
        if (!Auth::user()->is_admin)
        {
            abort(403, 'Unauthorized action.');
        }

        // Delete all images
        foreach ($product->images as $image)
        {
            $relativePath = str_replace('storage/', '', $image->image_path);
            if (Storage::disk('public')->exists($relativePath))
            {
                Storage::disk('public')->delete($relativePath);
            }
            $image->delete();
        }

        // Delete product
        $product->delete();

        return redirect('/home')->with('success', 'Product was successfully deleted.');
    }

    public function update(Request $request, Product $product)
    {
        // Check if user is admin
        if (!Auth::user()->is_admin)
        {
            abort(403, 'Unauthorized action.');
        }

        // Input validation
        $table = $product->getTable();
        $validated = $request->validate([
            'title'        => "required|string|max:255|unique:product,title",
            'price'        => 'required|numeric|min:0',
            'engine_power' => 'required|integer|min:0',
            'transmission_id'=> 'required|exists:transmission,id',
            'fuel_id'      => 'required|exists:fuel,id',
            'brand_id'     => 'required|exists:brands,id',
            'description'  => 'nullable|string',
        ]);


        // Update model
        $product->update($validated);

        return redirect()->route('products.show', $product->id)->with('success', 'Product was successfully updated.');
    }



}
