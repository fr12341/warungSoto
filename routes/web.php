<?php

use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserProductController;
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

Route::get('/', function () {
    return view('detail_products');
});


//create data for admin
Route::get('/admin/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/admin/products', [ProductController::class, 'store'])->name('products.store');

//read data for admin
Route::get('/admin/products', [ProductController::class, 'index'])->name('products.index');

//update data for admin
Route::get('/admin/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::post('/admin/products/{id}/update', [ProductController::class, 'update'])->name('products.update');

//delete data for admin
Route::post('/admin/products/{id}/delete', [ProductController::class, 'destroy'])->name('products.destroy');

Route::get('/home', [UserProductController::class, 'showProductsToUser'])->name('products.showProductsToUser');
Route::get('/products/{slug}', [UserProductController::class, 'show'])->name('products.show');

Route::post('/checkout', [CheckoutController::class, 'process'])->name("checkout-process");
Route::get('/checkout/{transaction}', [CheckoutController::class, 'checkout'])->name('checkout');
Route::get('/checkout/success/{transaction}', [CheckoutController::class, 'success'])->name('checkout-success');





Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
