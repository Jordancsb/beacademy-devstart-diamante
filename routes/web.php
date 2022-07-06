<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/* |-------------------------------------------------------------------------- | Web Routes |-------------------------------------------------------------------------- | | Here is where you can register web routes for your application. These | routes are loaded by the RouteServiceProvider within a group which | contains the "web" middleware group. Now create something great! | */

/** Login Page Route */
Route::get('/login', [UserController::class , 'login'])->name('login.page');
Route::get('/register', [UserController::class , 'register'])->name('register.page');
Route::get('/checkout', [UserController::class , 'checkout'])->name('checkout.page');
Route::post('/auth', [UserController::class , 'auth'])->name('auth.user');


/** Middleware for redirect admin/users */
Route::middleware(['admin'])->group(function () {

    Route::get('admin', function () { // all routes for the admin is put here
    
            dd("Voce é um administrador");
        }
        );
    });

Route::middleware(['user'])->group(function () {

    Route::get('user', function () { // all routes for the user is put here
    
            dd("Voce é um Usuario padrão");
        }
        );
    });

Route::get('/produto/cadastro', [ProductController::class , 'getNewProductPage'])->name('product.new');
Route::post('/produtos/cadastro', [ProductController::class , 'postCreateNewProduct'])->name('products.create');