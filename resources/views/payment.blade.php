@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto px-6 py-20">
    <div class="text-center mb-12" data-aos="zoom-in">
        <h1 class="text-4xl font-bold mb-4">Pembayaran</h1>
        <p class="text-gray-600">Selesaikan pembayaran Anda untuk memproses pesanan.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
        <!-- Order Summary -->
        <div class="frutiger-glass p-8 h-fit" data-aos="fade-right">
            <h2 class="text-2xl font-bold mb-6 border-b border-sky-100 pb-4">Ringkasan Pesanan</h2>
            <div class="space-y-4 mb-8">
                <div class="flex justify-between">
                    <span class="text-gray-500">ID Transaksi</span>
                    <span class="font-bold text-sky-600">{{ $order->transaction_id }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-500">Nama</span>
                    <span class="font-semibold">{{ $order->customer_name }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-500">Layanan</span>
                    <span class="font-semibold">{{ $order->order_type == 'refill' ? 'Isi Ulang' : 'Beli Galon Kosong' }}</span>
                </div>
            </div>
            <div class="bg-sky-50 p-4 rounded-xl flex justify-between items-center">
                <span class="font-bold text-gray-700">Total Tagihan</span>
                <span class="text-2xl font-bold text-sky-600">Rp {{ number_format($order->total_price, 0, ',', '.') }}</span>
            </div>
        </div>

        <!-- Payment Methods -->
        <div class="frutiger-glass p-8" data-aos="fade-left">
            <h2 class="text-2xl font-bold mb-6">Metode Pembayaran</h2>
            
            <!-- Tab Navigation (Dummy) -->
            <div class="flex gap-4 mb-8">
                <button class="bg-sky-500 text-white px-4 py-2 rounded-lg font-bold text-sm">QRIS</button>
                <button class="bg-gray-100 text-gray-500 px-4 py-2 rounded-lg font-bold text-sm">Virtual Account</button>
                <button class="bg-gray-100 text-gray-500 px-4 py-2 rounded-lg font-bold text-sm">Transfer Bank</button>
            </div>

            <!-- QRIS Content -->
            <div class="text-center">
                <p class="text-sm text-gray-500 mb-4">Scan kode QR di bawah menggunakan aplikasi pembayaran favorit Anda.</p>
                <div class="bg-white p-4 rounded-2xl shadow-inner mb-6 inline-block border border-gray-100">
                    <!-- Dummy QRIS Image -->
                    <img src="https://api.qrserver.com/v1/create-qr-code/?size=250x250&data=https://viowater2.com/pay/{{ $order->transaction_id }}" alt="QRIS Dummy" class="w-48 h-48 mx-auto">
                    <div class="mt-4 font-bold text-xl tracking-widest text-sky-900">QRIS <span class="text-rose-500">DUMMY</span></div>
                </div>
                
                <div class="text-xs text-gray-400 mb-8">
                    <p>Pembayaran akan diverifikasi secara otomatis dalam hitungan detik.</p>
                </div>

                <a href="{{ route('order.receipt', $order) }}" class="btn-fresh w-full block text-white font-bold py-4 rounded-xl text-lg text-center">
                    Konfirmasi Pembayaran <i class="fas fa-check-circle ml-2"></i>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
