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

Route::middleware(['auth'])->group(function () {
	Route::get('/produto/cadastro', [ProductController::class , 'getNewProductPage'])->name('product.new');
	Route::post('/produtos/cadastro', [ProductController::class , 'postCreateNewProduct'])->name('products.create');

	Route::get('/produtos/store', [ProductController::class, 'getStoreProduct'])->name('product.store');
  Route::post('/produtos/store', [ProductController::class,'cartProducts'])->name('product.cart');
  Route::get('/produtos/detalhes', [ProductController::class, 'details'])->name('product.details');
  Route::delete('/produtos/{id}', [ProductController::class, 'delete'])->name('product.delete');
  Route::put('/produtos/{id}', [ProductController::class, 'update'])->name('product.update');
  Route::get('/produtos/{id}/edit', [ProductController::class, 'edit'])->name('product.edit');
});
