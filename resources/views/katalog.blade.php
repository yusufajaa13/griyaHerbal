@extends('layouts.master')

@section('konten_utama')
    <h2>Katalog Produk</h2>

    <div style="display: flex; gap: 20px; flex-wrap: wrap;"> <!-- Pembungkus Grid -->

        <!-- BUKA MESIN LOOPING -->
        @forelse($products as $product)
            <!-- AREA DESAIN KOTAK PRODUK KALIAN (Hanya sisakan 1 kotak aja) -->
            <div
                style="background-color: white; border: 1px solid #ccc; width: 250px; padding: 15px; border-radius: 8px; display: flex; flex-direction: column;">

                <!-- SUNTIKAN GAMBAR -->
                @if ($product->image)
                    <img src="{{ asset('assets/images/' . $product->image) }}" width="100%"
                        style="height: 150px; object-fit: cover; border-radius: 4px;">
                @else
                    <div
                        style="background: #eee; height: 150px; text-align: center; line-height: 150px; border-radius: 4px;">
                        Tanpa Gambar
                    </div>
                @endif

                <!-- SUNTIKAN NAMA PRODUK -->
                <h3 style="margin-top: 15px;">{{ $product->name }}</h3>

                <!-- SUNTIKAN HARGA (Dengan Format Rupiah) -->
                <p style="color: red; font-weight: bold;">Rp {{ number_format($product->price, 0, ',', '.') }}</p>

                <a href="/detail/{{ $product->id }}"
                    style="display: block; text-align: center; background-color: #0B5ED7; color: white; padding: 10px; textdecoration: none; border-radius: 5px;">
                    Lihat Detail </a>
            </div>

            <!-- Kalau DATABASE KOSONG (Menampilkan Empty State) -->
        @empty
            <div style="text-align: center; width: 100%; padding: 50px;">
                <h3 style="color: #888;">Mohon maaf, produk belum tersedia di etalase kami.</h3>
            </div>

            <!-- TUTUP Mesin LOOPING -->
        @endforelse

    </div>
@endsection
