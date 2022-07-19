<?php

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

Route::get('/', [ProductController::class , 'getStoreProduct'])->name('product.store');

// Logged only access
Route::middleware(['auth'])->group(function () {
	Route::post('/loja', [ProductController::class , 'cartProducts'])->name('product.cart');
});

// Admin only access
Route::middleware(['auth', 'admin'])->group(function () {
	Route::get('/produtos/cadastro', [ProductController::class , 'getNewProductPage'])->name('product.new');
	Route::get('/produtos/detalhes', [ProductController::class , 'details'])->name('product.details');
	Route::get('/produtos/{id}/edit', [ProductController::class , 'edit'])->name('product.edit');

	Route::post('/products', [ProductController::class , 'postCreateNewProduct'])->name('products.create');
	Route::delete('/products/{id}', [ProductController::class , 'delete'])->name('products.delete');
	Route::put('/products/{id}', [ProductController::class , 'update'])->name('products.update');
});
