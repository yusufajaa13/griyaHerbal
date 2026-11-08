<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// =========================================================
// JALUR FRONT-STORE (SISI PEMBELI: P5, P6, P7)
// =========================================================
Route::get('/', [ProductController::class, 'index']);
Route::get('/detail/{id}', [ProductController::class, 'show']);
Route::get('/checkout/{id}', [ProductController::class, 'checkout']);
Route::post('/checkout/proses', [ProductController::class, 'storeTransaction']);
Route::get('/berhasil/{id}', [ProductController::class, 'success']);

// =========================================================
// JALUR BACK-OFFICE / SELLER CENTER (SISI ADMIN: P8 & P9)
// =========================================================

// Materi P8: Manajemen Pesanan Masuk
Route::get('/admin/transactions', [AdminController::class, 'transactions']);
Route::post('/admin/transactions/{id}/status', [AdminController::class, 'updateStatus']);

// Materi P9: Manajemen Katalog Produk & Upload Gambar
Route::get('/admin/products', [AdminController::class, 'products']);
Route::get('/admin/products/create', [AdminController::class, 'createProduct']);
Route::post('/admin/products/store', [AdminController::class, 'storeProduct']);
