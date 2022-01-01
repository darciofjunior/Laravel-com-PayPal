<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PayPalController;
use App\Http\Controllers\UserController;

Auth::routes();

Route::get('/', [StoreController::class, 'index'])->name('home');
Route::get('/carrinho', [CartController::class, 'index'])->name('cart');
Route::get('/adicionar-carrinho/{id}', [CartController::class, 'add'])->name('add.cart');
Route::get('/remover-carrinho/{id}', [CartController::class, 'remove'])->name('remove.cart');
Route::get('/logout', [UserController::class, 'logout'])->name('user.logout');

Route::group(['middleware' => 'auth'], function() {
    Route::get('/meu-perfil', [UserController::class, 'profile'])->name('user.profile');
    Route::post('/atualizar-perfil', [UserController::class, 'profileUpdate'])->name('update.profile');
    Route::get('/minha-senha', [UserController::class, 'password'])->name('user.password');
    Route::post('/atualizar-senha', [UserController::class, 'passwordUpdate'])->name('update.password');

    Route::get('/meus-pedidos', [StoreController::class, 'orders'])->name('orders');
    Route::get('/detalhes-pedido/{id}', [StoreController::class, 'orderDetail'])->name('order.products');

    Route::get('/paypal', [PayPalController::class, 'paypal'])->name('paypal');
    Route::get('/return-paypal', [PayPalController::class, 'returnPayPal'])->name('return.paypal');
});
