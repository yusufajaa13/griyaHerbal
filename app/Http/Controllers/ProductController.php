<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction; // <-- [WAJIB] Panggil Model Transaction untuk menyimpan pesanan
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // FUNGSI 1: Menampilkan seluruh produk di Katalog (P5)
    public function index()
    {
        $products = Product::all();
        return view('katalog', compact('products'));
    }

    // FUNGSI 2: Menampilkan 1 produk spesifik di halaman Detail (P6)
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('detail', compact('product'));
    }

    // FUNGSI 3: Menampilkan halaman Form Checkout dengan membawa data barang yang dipilih (P7)
    public function checkout($id)
    {
        $product = Product::findOrFail($id);
        return view('checkout', compact('product'));
    }

    // FUNGSI 4: Menangkap kiriman Form (POST), menghitung total, dan menyimpan ke MySQL (P7)
    public function storeTransaction(Request $request)
    {
        // A. Cari data produk asli di database berdasarkan product_id yang dikirim form
        $product = Product::findOrFail($request->product_id);

        // B. Tentukan tarif ongkos kirim otomatis berdasarkan pilihan kurir
        $shipping_cost = 15000; // Tarif dasar JNE Reguler
        if ($request->courier == 'J&T Express') {
            $shipping_cost = 20000;
        } elseif ($request->courier == 'SiCepat BEST') {
            $shipping_cost = 25000;
        }

        // C. Hitung Total Bayar: (Harga Produk x Jumlah Beli) + Ongkos Kirim
        $subtotal = $product->price * $request->quantity;
        $total_amount = $subtotal + $shipping_cost;

        // D. Buat kode Invoice unik otomatis (Contoh: INV-2026-4829)
        $invoice_code = 'INV-2026-' . rand(1000, 9999);

        // E. Simpan (INSERT) seluruh data transaksi ke dalam tabel MySQL
        $transaction = Transaction::create([
            'invoice_code'     => $invoice_code,
            'product_id'       => $product->id,
            'product_name'     => $product->name,
            'customer_name'    => $request->customer_name,
            'customer_phone'   => $request->customer_phone,
            'customer_address' => $request->customer_address,
            'courier'          => $request->courier,
            'quantity'         => $request->quantity,
            'shipping_cost'    => $shipping_cost,
            'total_amount'     => $total_amount,
            'status'           => 'Pending',
        ]);

        // F. Arahkan pembeli menuju halaman Berhasil sambil membawa ID transaksi barunya
        return redirect('/berhasil/' . $transaction->id);
    }

    // FUNGSI 5: Menampilkan halaman Invoice Berhasil berdasarkan ID Transaksi (P7)
    public function success($id)
    {
        $transaction = Transaction::findOrFail($id);
        return view('berhasil', compact('transaction'));
    }
}
