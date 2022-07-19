<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/* |-------------------------------------------------------------------------- | Web Routes |-------------------------------------------------------------------------- | | Here is where you can register web routes for your application. These | routes are loaded by the RouteServiceProvider within a group which | contains the "web" middleware group. Now create something great! | */

/** Login Page Route */
Route::get('/login', [UserController::class , 'login'])->name('login.page');
Route::get('/register', [UserController::class , 'register'])->name('register.page');
Route::get('/checkout', [UserController::class , 'checkout'])->name('checkout.page');
Route::post('/auth', [UserController::class , 'postLoginAuth'])->name('auth.login');


/** Middleware for redirect admin/users */
Route::middleware(['admin'])->group(function () {

    Route::get('admin', function () { // all routes for the admin is put here

            dd("Voce é um administrador");
        }
        );
    });

Route::middleware(['user'])->group(function () {

    Route::get('user', function () { // all routes for the user is put here

            dd("Voce é um Usuário padrão");
        }
        );
    });

Route::get('/produto/cadastro', [ProductController::class , 'getNewProductPage'])->name('product.new');
Route::post('/produtos/cadastro', [ProductController::class , 'postCreateNewProduct'])->name('products.create');

// Route store
Route::get('/loja', [ProductController::class, 'getStoreProduct'])->name('product.store');
Route::post('/loja', [ProductController::class,'cartProducts'])->name('product.cart');
Route::get('/produtos/detalhes', [ProductController::class, 'details'])->name('product.details');
Route::delete('/produtos/{id}', [ProductController::class, 'delete'])->name('product.delete');
Route::put('/produtos/{id}', [ProductController::class, 'update'])->name('product.update');
Route::get('/produtos/{id}/edit', [ProductController::class, 'edit'])->name('product.edit');
