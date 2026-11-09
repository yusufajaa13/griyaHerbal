@extends('layouts.master')
@section('konten_utama')
    <!-- 1. Navigasi Breadcrumb Checkout -->
    <div style="margin-bottom: 25px; font-size: 14px; color: #666;"> <a href="/"
            style="color: #0B5ED7; text-decoration: none;">Katalog Utama</a> <span style="margin: 0 10px;">/</span> <a
            href="/detail/{{ $product->id }}" style="color: #0B5ED7; text-decoration: none;">{{ $product->name }}</a> <span
            style="margin: 0 10px;">/</span> <span style="color: #333; font-weight: bold;">Checkout Pesanan</span> </div>
    <h2 style="margin-bottom: 20px; color: #222;">Formulir Pengiriman & Pembayaran</h2>
    <div style="display: flex; gap: 30px; align-items: flex-start;"> <!-- KOLOM KIRI: FORMULIR INPUT DATA PEMBELI -->
        <div style="width: 60%; background-color: white; padding: 25px; border-radius: 8px; border: 1px solid #ccc;">
            <!-- PENTING: Gunakan method="POST" dan arahkan action ke "/checkout/proses" -->
            <form action="/checkout/proses" method="POST"> <!-- WAJIB ADA: Token pengaman CSRF Laravel --> @csrf
                <!-- INPUT TERSEMBUNYI: Mengirimkan ID Produk yang sedang dibeli ke Controller --> <input type="hidden"
                    name="product_id" value="{{ $product->id }}">
                <div style="margin-bottom: 15px;"> <label
                        style="font-weight: bold; display: block; margin-bottom: 5px;">Nama Lengkap Penerima:</label> <input
                        type="text" name="customer_name" placeholder="Contoh: Budi Santoso"
                        style="width: 96%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;" required> </div>
                <div style="margin-bottom: 15px;"> <label
                        style="font-weight: bold; display: block; margin-bottom: 5px;">Nomor WhatsApp / HP Aktif:</label>
                    <input type="text" name="customer_phone" placeholder="Contoh: 081234567890"
                        style="width: 96%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;" required>
                </div>
                <div style="margin-bottom: 15px;"> <label
                        style="font-weight: bold; display: block; margin-bottom: 5px;">Alamat Lengkap Pengiriman:</label>
                    <textarea name="customer_address" rows="3"
                        placeholder="Tuliskan Nama Jalan, RT/RW, Kecamatan, dan Kota/Kabupaten..."
                        style="width: 96%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;" required></textarea>
                </div>
                <div style="display: flex; gap: 20px; margin-bottom: 20px;">
                    <div style="width: 65%;"> <label style="font-weight: bold; display: block; margin-bottom: 5px;">Pilih
                            Ekspedisi Kurir:</label> <select name="courier"
                            style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; background: white;"
                            required>
                            <option value="JNE Reguler">JNE Reguler (Ongkir Rp 15.000)</option>
                            <option value="J&T Express">J&T Express (Ongkir Rp 20.000)</option>
                            <option value="SiCepat BEST">SiCepat BEST (Ongkir Rp 25.000)</option>
                        </select> </div>
                    <div style="width: 35%;"> <label style="font-weight: bold; display: block; margin-bottom: 5px;">Jumlah
                            Beli (Qty):</label> <input type="number" name="quantity" value="1" min="1"
                            max="99" style="width: 85%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;"
                            required> </div>
                </div> <button type="submit"
                    style="background-color: #FFC107; color: black; padding: 15px; width: 100%; border: none; border-radius: 5px; font-weight: bold; font-size: 16px; cursor: pointer;">
                    Konfirmasi & Buat Pesanan Sekarang </button>
            </form>
        </div> <!-- KOLOM KANAN: RINGKASAN PRODUK YANG DIPILIH DARI P6 -->
        <div style="width: 40%; background-color: white; padding: 25px; border-radius: 8px; border: 1px solid #ccc;">
            <h3 style="margin-top: 0; border-bottom: 1px solid #eee; padding-bottom: 10px;">Ringkasan Pesanan</h3>
            @if ($product->image)
                <img src="{{ asset('assets/images/' . $product->image) }}" width="100%" style="border-radius: 8px;" alt="{{ $product->name }}">
            @endif
            <h3 style="margin: 0 0 5px 0; color: #222;">{{ $product->name }}</h3>
            <p style="color: #666; font-size: 14px; margin-top: 0;">Harga Satuan Produk:</p>
            <h2 style="color: #E63946; margin-top: 0;">Rp {{ number_format($product->price, 0, ',', '.') }}</h2>
            <hr style="margin: 15px 0; border: 0; border-top: 1px dashed #ccc;">
            <p style="font-size: 13px; color: #555; line-height: 1.5;"> *Total tagihan akhir (Harga Produk dikali Jumlah
                Beli ditambah Ongkos Kirim) akan dihitung secara otomatis oleh sistem pada halaman Invoice setelah Anda
                menekan tombol Konfirmasi. </p>
        </div>
    </div>
@endsection
