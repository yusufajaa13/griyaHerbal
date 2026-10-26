<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product; // [PENTING] Memanggil Kepala Gudang

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        // Menggunakan fitur Eloquent Create agar kolom created_at (timestamps) terisi otomatis
        Product::create([
            'name' => 'Kebaya Kutubaru Klasik ',
            'description' => 'Kebaya tradisional berpotongan klasik dengan bahan katun prima halus.',
            'price' => 320000,
            'image' => 'batik.png',
        ]);

        Product::create([
            'name' => 'Batik Tulis Sogan Solo',
            'description' => 'Kain batik tulis tradisional motif Sogan khas Surakarta berkelas.',
            'price' => 450000,
            'image' => 'batiktulis.png',
        ]);

        Product::create([
            'name' => 'Jamu Kunyit Alam lestari',
            'description' => 'Minuman herbal tradisional kunyit asam segar berkhasiat tinggi.',
            'price' => 25000,
            'image' => 'jamu.png',
        ]);
        Product::create([
            'name' => 'Parfum Kembang Melati Nusantara',
            'description' => 'Wewangian aromatik ekstrak bunga melati asli Yogyakarta yang magis.',
            'price' => 25000,
            'image' => 'parfum.png',
        ]);
        Product::create([
            'name' => 'Minyak Telon Wangi Bayi',
            'description' => 'Minyak telon tradisional untuk kehangatan bayi sepanjang hari.',
            'price' => 35000,
            'image' => 'minyak.png',
        ]);
        Product::create([
            'name' => 'Parfum Kayu Cendana',
            'description' => 'Parfum mewah berbasis minyak esensial kayu cendana murni NTT.',
            'price' => 210000,
            'image' => 'parfumkayu.png',
        ]);
    }
}
