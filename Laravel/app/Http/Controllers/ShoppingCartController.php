<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\ShoppingCartItem;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class ShoppingCartController extends Controller
{
    public function show()
    {
        if (Auth::check())
        {
            # Logged in user
            $cartItems = ShoppingCartItem::with(['product.mainImage'])->where('user_id', Auth::id())->get();
        }
        else
        {
            # Not logged in user
            $cart = session('cart', []);

            $cartItems = collect($cart)->map(function ($item, $productId) {
                $product = Product::with('mainImage')->find($productId);

                return (object) [
                    'quantity' => is_array($item) ? $item['quantity'] : $item,
                    'product' => $product,
                ];
            });
        }

        return view('cart', compact('cartItems'));

    }

    public function add(Request $request, $productId)
    {
        $request->validate(['quantity' => 'required|integer|min:1']);


        $product = Product::findOrFail($productId);

        if (Auth::check())
        {
            # Logged in user

            $cartItem = ShoppingCartItem::where('user_id', Auth::id())->where('product_id', $productId)->first();

            if ($cartItem)
            {
                $cartItem->quantity += $request->quantity;
                $cartItem->save();
            }
            else
            {
                ShoppingCartItem::create([
                    'user_id' => Auth::id(),
                    'product_id' => $productId,
                    'quantity' => $request->quantity,
                ]);
            }
        }
        else
        {
            # Not logged in user

            $cart = session('cart', []);

            if (isset($cart[$productId]))
            {
                $cart[$productId]['quantity'] += $request->quantity;
            }
            else
            {
                $cart[$productId] = [
                    'quantity' => $request->quantity,
                    'product' => [
                        'id' => $product->id,
                        'title' => $product->title,
                        'price' => $product->price,
                        'mainImage' => $product->mainImage ? $product->mainImage->image_path : null
                    ]
                ];
            }

            session(['cart' => $cart]);
        }

        return redirect()->route('shopping_cart.show');
    }


    public function remove($productId)
    {
        if (Auth::check())
        {
            ShoppingCartItem::where('user_id', Auth::id())->where('product_id', $productId)->delete();
        }
        else
        {
            $cart = session('cart', []);
            unset($cart[$productId]);
            session(['cart' => $cart]);
        }


        return redirect()->route('shopping_cart.show');
    }


    public function update(Request $request, $productId)
    {
        $request->validate(['quantity' => 'required|integer|min:1',]);

        if (Auth::check())
        {
            $cartItem = ShoppingCartItem::where('user_id', Auth::id())->where('product_id', $productId)->first();

            if ($cartItem)
            {
                $cartItem->quantity = $request->quantity;
                $cartItem->save();
            }
        }
        else
        {
            $cart = session('cart', []);

            if (isset($cart[$productId]))
            {
                $cart[$productId]['quantity'] = $request->quantity;
                session(['cart' => $cart]);
            }
        }

        return redirect()->route('shopping_cart.show');
    }


    public function order(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|min:3|max:255',
            'email' => 'required|email|max:255',
            'phone_number' => 'required|string|min:6|max:20',
            'state' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'postal_code' => 'required|string|max:20',
            'delivery_method' => 'required|in:to my address,to nearest dealership',
            'payment_method' => 'required|in:card,cash',
        ]);

        if (Auth::check())
        {
            ShoppingCartItem::where('user_id', Auth::id())->delete();
        }
        else
        {
            session()->forget('cart');
        }

        return redirect()->back()->with('success', 'Your order has been placed successfully.');
    }


}
