<?php

namespace App\Http\Controllers;

use App\Models\ShoppingCartItem;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function log_in(Request $request)
    {
        $userInput = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if(auth()->attempt(['email' => $userInput['email'], 'password' => $userInput['password']]))
        {
            $request->session()->regenerate();

            $this->mergeCarts(auth()->user());

            return redirect('home');
        }

        return back()->with('error', 'The provided login info is incorrect.');

    }

    public function log_out()
    {
        auth()->logout();

        return redirect()->back();

    }

    public function register(Request $request)
    {
        $userInput = $request->validate([
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'max:255', 'confirmed'],
            'full_name' => ['required', 'string', 'min:3', 'max:255'],
            'phone_number' => ['required', 'string'],
            'state' => ['required', 'string', 'min:2', 'max:255'],
            'city' => ['required', 'string', 'min:2', 'max:255'],
            'address' => ['required', 'string', 'min:2', 'max:255'],
            'postal_code' => ['required', 'string'],
        ]);


        $userInput['password'] = bcrypt($userInput['password']);
        $user = User::create($userInput);
        auth()->login($user);

        $this->mergeCarts($user);

        return redirect('/home');
    }

    private function mergeCarts(User $user)
    {
        $sessionCart = session('cart', []);

        foreach ($sessionCart as $productId => $item)
        {
            #$quantity = is_array($item) ? $item['quantity'] : $item;
            $quantity = $item['quantity'];

            $cartItem = ShoppingCartItem::where('user_id', $user->id)->where('product_id', $productId)->first();

            if ($cartItem)
            {
                $cartItem->quantity += $quantity;
                $cartItem->save();
            }
            else
            {
                ShoppingCartItem::create([
                    'user_id' => $user->id,
                    'product_id' => $productId,
                    'quantity' => $quantity
                ]);
            }
        }

        // Delete session cart
        session()->forget('cart');
    }


}
