<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\HomeController;
use App\Models\Order;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $order = Order::latest()->get();

    return view('welcome', compact('order'));
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::resource('/order', OrderController::class, ['expect' => ['show']]);
