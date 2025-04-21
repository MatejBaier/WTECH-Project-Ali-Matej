<?php

namespace App\Http\Controllers;

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
            return redirect('home');
        }

        return redirect('login');
    }

    public function log_out()
    {
        auth()->logout();

        return redirect()->back();

    }

    public function register(Request $request)
    {
        $userInput = $request->validate([
            'email' => ['required', 'email', 'max:255'],
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

        return redirect('/home');
    }
}
