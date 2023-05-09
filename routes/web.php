<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProductTypeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/', [HomePageController::class, 'home'])->name('client.home');
Route::resource('products', ProductsController::class);
Route::resource('orders', OrdersController::class);
Route::resource('product_types', ProductTypeController::class);
Route::get('/lang', [HomePageController::class, 'lang'])->name('language');
Route::get('about', function() {
    return view('client.about');
})->name('client.about');
// Route::get('order-item', [HomePageController::class, 'orderItem'])->name('order.item');

Route::post('add-cart', [CartController::class, 'add'])->name('cart.add');
Route::get('cart', [CartController::class, 'index'])->name('cart');
Route::put('card-update', [CartController::class, 'cartUpdate'])->name('cart.update');
Route::delete('remove-item', [CartController::class, 'removeItem'])->name('remove.item');
Route::post('order', [CartController::class, 'order'])->name('cart.order');