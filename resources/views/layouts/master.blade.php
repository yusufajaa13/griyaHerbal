<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Commerce Kelas XII</title>
    
    <!-- Memanggil Font Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body style="font-family: 'Plus Jakarta Sans', sans-serif; margin: 0; background-color: #f8fafc; color: #0f172a; -webkit-font-smoothing: antialiased;">

    <!-- 1. HEADER UTAMA TOKO -->
    <header style="background-color: #0f172a; color: white; padding: 18px 48px; display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid #1e293b; position: sticky; top: 0; z-index: 100;">
        <h2 style="margin: 0; font-size: 18px; font-weight: 700; letter-spacing: 0.5px;">🛒 TOKO KELOMPOK KALIAN</h2>
        <nav style="display: flex; align-items: center; gap: 24px;">
            <a href="/" style="color: #cbd5e1; text-decoration: none; font-weight: 600; font-size: 14px; transition: color 0.15s ease;">Katalog Produk</a>
            <!-- TAMBAHAN P8: Pintu menuju Dashboard Admin / Seller Center -->
            <a href="/admin/transactions" style="color: #38bdf8; text-decoration: none; font-weight: 600; font-size: 14px; background-color: #1e293b; padding: 8px 14px; border-radius: 6px; border: 1px solid #334155;">⚙️ Panel Admin</a>
        </nav>
    </header>

    <!-- 2. AREA KONTEN UTAMA -->
    <main style="padding: 40px 48px; min-height: calc(100vh - 160px);">
        @yield('konten_utama')
    </main>

    <!-- 3. FOOTER -->
    <footer style="background-color: #ffffff; border-top: 1px solid #e2e8f0; padding: 24px; text-align: center; color: #64748b; font-size: 13px;">
        <p style="margin: 0;">&copy; 2026 Hak Cipta Dilindungi &bull; Kompetensi Keahlian Rekayasa Perangkat Lunak - SMK Plus Pelita Nusantara</p>
    </footer>

</body>
</html>