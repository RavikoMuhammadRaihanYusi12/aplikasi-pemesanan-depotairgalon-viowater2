<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ReviewController;

use App\Http\Controllers\AdminController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/order', [OrderController::class, 'store'])->name('order.store');
Route::get('/payment/{order}', [OrderController::class, 'payment'])->name('order.payment');
Route::get('/receipt/{order}', [OrderController::class, 'receipt'])->name('order.receipt');
Route::get('/receipt/{order}/pdf', [OrderController::class, 'downloadPdf'])->name('order.receipt.pdf');
Route::post('/review', [ReviewController::class, 'store'])->name('review.store');

// Admin Routes
Route::get('/admin/login', [AdminController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login.post');
Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

Route::middleware('auth')->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::post('/admin/order/{order}/status', [AdminController::class, 'updateStatus'])->name('admin.order.status');
});
