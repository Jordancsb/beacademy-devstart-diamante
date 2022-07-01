<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/** Login Page Route */
Route::get('/',[UserController::class,'login'])->name('login.page');
Route::post('/auth',[UserController::class,'auth'])->name('auth.user');


/** Middleware for redirect admin/users */
Route::middleware(['admin'])->group( function (){

    Route::get('admin',function(){      // all routes for the admin is put here
        
        dd("Voce é um administrador");
    });
});

Route::middleware(['user'])->group( function (){
    
    Route::get('user',function(){           // all routes for the user is put here
        
        dd("Voce é um Usuario padrão");
    });
});