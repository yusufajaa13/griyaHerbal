@extends('layouts.master') 
@section('konten_utama')
    <div
        style="background-color: white; padding: 40px; borderradius: 8px; border: 1px solid #ccc; width: 65%; margin: 0 auto;">
        <div style="text-align: center; border-bottom: 2px dashed #ddd; padding-bottom: 20px; margin-bottom: 25px;">
            <h1 style="font-size: 55px; margin: 0;">🎉</h1>
            <h2 style="color: #28A745; margin: 10px 0 5px 0;">Transaksi Berhasil Tercatat!</h2>
            <p style="color: #666; margin: 0;">Terima kasih <strong>{{ $transaction->customer_name }}</strong>, pesanan Anda
                sedang kami proses.</p>
        </div> <!-- RINCIAN INVOICE DARI TABEL TRANSACTIONS MYSQL -->
        <table style="width: 100%; border-collapse: collapse; marginbottom: 25px; font-size: 15px;">
            <tr>
                <td style="padding: 8px 0; color: #666;">Nomor Resi / Invoice:</td>
                <td style="padding: 8px 0; text-align: right; fontweight: bold; color: #0B5ED7;">
                    {{ $transaction->invoice_code }}</td>
            </tr>
            <tr>
                <td style="padding: 8px 0; color: #666;">Waktu Transaksi:</td>
                <td style="padding: 8px 0; text-align: right;">{{ $transaction->created_at->format('d M Y, H:i') }} WIB</td>
            </tr>
            <tr>
                <td style="padding: 8px 0; color: #666;">Produk yang Dibeli:</td>
                <td style="padding: 8px 0; text-align: right; fontweight: bold;">{{ $transaction->product_name }}
                    ({{ $transaction->quantity }}x)</td>
            </tr>
            <tr>
                <td style="padding: 8px 0; color: #666;">Penerima & No. HP:</td>
                <td style="padding: 8px 0; text-align: right;">{{ $transaction->customer_name }}
                    ({{ $transaction->customer_phone }})</td>
            </tr>
            <tr>
                <td style="padding: 8px 0; color: #666;">Alamat Pengiriman:</td>
                <td style="padding: 8px 0; text-align: right;">{{ $transaction->customer_address }}</td>
            </tr>
            <tr>
                <td style="padding: 8px 0; color: #666;">Ekspedisi & Ongkos Kirim:</td>
                <td style="padding: 8px 0; text-align: right;">{{ $transaction->courier }} (Rp
                    {{ number_format($transaction->shipping_cost, 0, ',', '.') }})</td>
            </tr>
            <tr>
                <td style="padding: 8px 0; color: #666;">Status Pesanan:</td>
                <td style="padding: 8px 0; text-align: right;"> <span
                        style="background-color: #fff3cd; color: #856404; padding: 4px 10px; border-radius: 4px; font-weight: bold; font-size: 13px;">
                        {{ $transaction->status }} </span> </td>
            </tr>
            <tr style="border-top: 2px solid #eee;">
                <td style="padding: 15px 0 0 0; font-size: 18px; font-weight: bold;">TOTAL PEMBAYARAN:</td>
                <td style="padding: 15px 0 0 0; text-align: right; font-size: 22px; font-weight: bold; color: #E63946;"> Rp
                    {{ number_format($transaction->total_amount, 0, ',', '.') }} </td>
            </tr>
        </table>
        <div style="text-align: center; margin-top: 30px;"> <a href="/"
                style="display: inline-block; backgroundcolor: #0B5ED7; color: white; padding: 12px 25px; text-decoration: none; border-radius: 5px; font-weight: bold;">
                &larr; Kembali Belanja ke Beranda </a> </div>
    </div>
@endsection
