<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShoppingCartController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/home');
});
Route::get('/home', function () {
    return redirect('/filter');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/register', function () {
    return view('register');
});




Route::get('/filter', [ProductController::class, 'filter'])->name('products.filter');
Route::get('/global-search', [ProductController::class, 'globalSearch'])->name('products.global_search');


Route::post('/perform_log_in', [UserController::class, 'log_in']);
Route::post('/perform_log_out', [UserController::class, 'log_out']);
Route::post('/perform_registration', [UserController::class, 'register']);

Route::get('/product/{id}', [ProductController::class, 'show'])->name('products.show');



Route::get('/cart', [ShoppingCartController::class, 'show'])->name('shopping_cart.show');
Route::post('/cart/add/{productId}', [ShoppingCartController::class, 'add'])->name('shopping_cart.add');
Route::delete('/cart/remove/{productId}', [ShoppingCartController::class, 'remove'])->name('shopping_cart.remove');
Route::put('/cart/update/{productId}', [ShoppingCartController::class, 'update'])->name('shopping_cart.update');
Route::post('/cart/order', [ShoppingCartController::class, 'order'])->name('shopping_cart.order');

Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');
Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
Route::post('/products/{product}/images', [ProductController::class, 'uploadImage'])->name('products.images.store');
Route::delete('/products/images/{id}', [ProductController::class, 'deleteImage'])->name('products.images.destroy');
Route::get('/products/{product}/manage', [ProductController::class, 'edit'])->name('products.manage');
Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');

