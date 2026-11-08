<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // =========================================================================
    // MATERI PERTEMUAN 8: MANAJEMEN PESANAN MASUK
    // =========================================================================

    /**
     * FUNGSI 1: Menampilkan Halaman Dashboard & Tabel Pesanan Masuk (P8)
     */
    public function transactions()
    {
        $transactions = Transaction::latest()->get();
        $totalProducts = Product::count();
        $totalTransactions = Transaction::count();
        $totalRevenue = Transaction::sum('total_amount');

        return view('admin.transactions', compact(
            'transactions',
            'totalProducts',
            'totalTransactions',
            'totalRevenue'
        ));
    }

    /**
     * FUNGSI 2: Memperbarui Status Pesanan (P8)
     */
    public function updateStatus(Request $request, $id)
    {
        $transaction = Transaction::findOrFail($id);

        $transaction->update([
            'status' => $request->status
        ]);

        return back()->with(
            'success',
            'Status pesanan ' . $transaction->invoice_code . ' atas nama ' . $transaction->customer_name . ' berhasil diubah menjadi: ' . $request->status
        );
    }

    // =========================================================================
    // MATERI PERTEMUAN 9: MANAJEMEN PRODUK & UPLOAD FILE GAMBAR
    // =========================================================================

    /**
     * FUNGSI 3: Menampilkan Daftar Katalog Produk di Seller Center (P9)
     */
    public function products()
    {
        // Mengambil seluruh produk diurutkan dari yang terbaru ditambahkan
        $products = Product::latest()->get();
        return view('admin.products', compact('products'));
    }

    /**
     * FUNGSI 4: Menampilkan Formulir Tambah Produk Baru (P9)
     */
    public function createProduct()
    {
        return view('admin.create_product');
    }

    /**
     * FUNGSI 5: Memvalidasi Input, Mengunggah File Foto, & Menyimpan Produk ke MySQL (P9)
     */
    public function storeProduct(Request $request)
    {
        // A. Validasi ketahanan data dan keamanan file gambar (Maksimal 2MB / 2048 KB)
        $request->validate([
            'name' => 'required|string|max:150',
            'price' => 'required|numeric|min:100',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        // B. Proses penamaan unik dan pemindahan file foto ke folder public/assets/images
        $imageName = null;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            // Membuat nama unik: gabungan detik saat ini + nama asli file (tanpa spasi)
            $imageName = time() . '_' . str_replace(' ', '_', $file->getClientOriginalName());

            // Pindahkan fisik file ke folder public/assets/images
            $file->move(public_path('assets/images'), $imageName);
        }

        // C. Simpan baris data produk baru ke tabel products di MySQL
        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'image' => $imageName,
        ]);

        // D. Arahkan kembali ke halaman Daftar Produk Admin dengan notifikasi sukses
        return redirect('/admin/products')->with(
            'success',
            'Produk "' . $request->name . '" berhasil ditambahkan dan langsung tayang di etalase toko!'
        );
    }
}
