
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

// 1. Jalur Beranda Katalog (Dari P5)
Route::get('/', [ProductController::class, 'index']);

// 2. Jalur Detail Produk Dinamis (Dari P6)
Route::get('/detail/{id}', [ProductController::class, 'show']);

// 3. Jalur Menampilkan Formulir Checkout sesuai ID Barang (P7)
Route::get('/checkout/{id}', [ProductController::class, 'checkout']);

// 4. Jalur Memproses Pesanan (P7)
Route::post('/checkout/proses', [ProductController::class, 'storeTransaction']);

// 5. Jalur Halaman Berhasil & Invoice (P7)
Route::get('/berhasil/{id}', [ProductController::class, 'success'])
    ->name('success');
