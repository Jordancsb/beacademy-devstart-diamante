<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/* |-------------------------------------------------------------------------- | Web Routes |-------------------------------------------------------------------------- | | Here is where you can register web routes for your application. These | routes are loaded by the RouteServiceProvider within a group which | contains the "web" middleware group. Now create something great! | */

/** Login Page Route */
Route::get('/login', [UserController::class , 'getLoginPage'])->name('login');
Route::get('/register', [UserController::class , 'getRegisterPage'])->name('register.page');
Route::get('/checkout', [UserController::class , 'checkout'])->name('checkout.page');
Route::post('/auth', [UserController::class , 'postLoginAuth'])->name('auth.login');
Route::get('/logout', [UserController::class , 'getLogout'])->name('logout');

Route::post('/users/create', [UserController::class , 'postNewUser'])->name('users.create');

Route::get('/', [ProductController::class , 'getStorePage'])->name('product.store');

// Logged only access
Route::middleware(['auth'])->group(function () {
	Route::post('/loja', [ProductController::class , 'postProductToCart'])->name('product.cart');
	Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/add/{id}', [CartController::class, 'add'])->name('cart.add');
    Route::delete('/cart-remove/{id}', [CartController::class, 'destroy'])->name('cart.destroy');
    Route::put('/add-quantity/{id}', [CartController::class, 'addQuantity'])->name('cart.addQuantity');
    Route::put('/remove-quantity/{id}', [CartController::class, 'removeQuantity'])->name('cart.removeQuantity');
	
});

// Admin only access
Route::middleware(['auth', 'admin'])->group(function () {
	Route::get('/produtos/gerenciar', [ProductController::class , 'getListPage'])->name('product.details');
	Route::get('/produtos/cadastro', [ProductController::class , 'getNewProductPage'])->name('product.new');
	Route::get('/produtos/{id}/edit', [ProductController::class , 'getEditPage'])->name('product.edit');

	Route::post('/products', [ProductController::class , 'postNewProduct'])->name('products.create');
	Route::delete('/products/{id}', [ProductController::class , 'deleteProduct'])->name('products.delete');
	Route::put('/products/{id}', [ProductController::class , 'putProduct'])->name('products.update');
});
