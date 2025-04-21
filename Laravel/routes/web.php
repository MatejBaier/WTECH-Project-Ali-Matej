<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/home');

});

Route::get('/login', function () {
    return view('login');
});

Route::get('/register', function () {
    return view('register');
});

Route::get('/cart', function () {
    return view('cart');
});

Route::get('/home', function () {
    # DOROBIT ked je admin
    return view('home');
});



Route::post('/perform_log_in', [UserController::class, 'log_in']);
Route::post('/perform_log_out', [UserController::class, 'log_out']);
Route::post('/perform_registration', [UserController::class, 'register']);

