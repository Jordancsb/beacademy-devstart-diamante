<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AddressController;

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
	Route::get('/usuario/pedidos', [UserController::class , 'getUserOrdersPage'])->name('user.orders');
	Route::get('/usuario/configuracoes', [UserController::class , 'getUserConfigurationsPage'])->name('user.configurations');

	Route::get('/carrinho', [CartController::class , 'getIndexPage'])->name('cart.index');

	Route::post('/cart/{product_id}', [CartController::class , 'postProductToCart'])->name('cart.create');
	Route::delete('/cart/{id}/delete', [CartController::class , 'deleteCartOrder'])->name('carts.delete');
	Route::put('/cart/{id}/quantity/less', [CartController::class , 'putCartQuantityLess'])->name('carts.quantity.update.less');
	Route::put('/cart/{id}/quantity/more', [CartController::class , 'putCartQuantityMore'])->name('carts.quantity.update.more');

	Route::post('/orders/checkout', [CartController::class , 'putCheckoutCart'])->name('orders.checkout');

	Route::get('/usuario/configuracoes/endereco/{id}/editar', [AddressController::class , 'getEditPage'])->name('address.edit');

	Route::post('/addresses', [AddressController::class , 'postNewAddress'])->name('addresses.create');
	Route::put('/addresses/{id}/update', [AddressController::class , 'putUpdateAddressData'])->name('addresses.update');
	Route::delete('/addresses/{id}/delete', [AddressController::class , 'deleteAddress'])->name('addresses.delete');

	Route::put('/users/update/self', [UserController::class , 'putUpdateSelfUserData'])->name('users.update.self');
});

// Admin only access
Route::middleware(['auth', 'admin'])->group(function () {
	Route::get('/produtos/gerenciar', [ProductController::class , 'getAdminListPage'])->name('product.details');
	Route::get('/produtos/cadastro', [ProductController::class , 'getNewProductPage'])->name('product.new');
	Route::get('/produtos/{id}/editar', [ProductController::class , 'getEditPage'])->name('product.edit');

	Route::post('/products', [ProductController::class , 'postNewProduct'])->name('products.create');
	Route::delete('/products/{id}', [ProductController::class , 'deleteProduct'])->name('products.delete');
	Route::put('/products/{id}', [ProductController::class , 'putProduct'])->name('products.update');

	Route::get('/usuarios/gerenciar', [UserController::class , 'getAdminListPage'])->name('user.details');
	Route::get('/usuarios/{id}/editar', [UserController::class , 'getUserEditPage'])->name('user.edit');

	Route::put('/users/{id}', [UserController::class , 'updateUser'])->name('users.update');
	Route::delete('/users/{id}/', [UserController::class , 'deleteUser'])->name('users.delete');

	Route::get('/pedidos/gerenciar', [OrderController::class , 'getAdminListPage'])->name('order.details');
	Route::get('/pedidos/{id}/visualizar', [OrderController::class , 'getViewPage'])->name('order.view');

	Route::delete('/orders/{id}/', [OrderController::class , 'deleteOrder'])->name('orders.delete');
});
