@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto px-6 py-20">
    <div class="text-center mb-12" data-aos="zoom-in">
        <div class="w-20 h-20 bg-green-100 text-green-500 rounded-full flex items-center justify-center text-4xl mx-auto mb-6 shadow-lg">
            <i class="fas fa-check"></i>
        </div>
        <h1 class="text-4xl font-bold mb-2">Pembayaran Berhasil!</h1>
        <p class="text-gray-600">Terima kasih, pesanan Anda sedang diproses.</p>
    </div>

    <div class="frutiger-glass p-10 relative overflow-hidden" data-aos="fade-up">
        <!-- Receipt Header -->
        <div class="flex justify-between items-start mb-10 border-b border-sky-100 pb-8">
            <div>
                <div class="text-2xl font-bold text-sky-600">VioWater2</div>
                <div class="text-sm text-gray-400">Order Receipt</div>
            </div>
            <div class="text-right">
                <div class="font-bold">{{ $order->created_at->format('d M Y, H:i') }}</div>
                <div class="text-sm text-sky-500">{{ $order->transaction_id }}</div>
            </div>
        </div>

        <!-- Receipt Details -->
        <div class="grid grid-cols-2 gap-8 mb-10">
            <div>
                <div class="text-xs uppercase tracking-widest text-gray-400 mb-1">Customer</div>
                <div class="font-bold text-gray-700">{{ $order->customer_name }}</div>
            </div>
            <div>
                <div class="text-xs uppercase tracking-widest text-gray-400 mb-1">Service</div>
                <div class="font-bold text-gray-700">{{ $order->order_type == 'refill' ? 'Isi Ulang Air' : 'Beli Galon Kosong' }}</div>
            </div>
            <div class="col-span-2">
                <div class="text-xs uppercase tracking-widest text-gray-400 mb-1">Address</div>
                <div class="font-bold text-gray-700">{{ $order->address }}</div>
            </div>
        </div>

        <!-- QR Code -->
        <div class="flex flex-col items-center justify-center bg-sky-50/50 rounded-2xl p-6 mb-10 border border-sky-100">
            <div class="bg-white p-2 rounded-lg mb-3 shadow-sm">
                {!! SimpleSoftwareIO\QrCode\Facades\QrCode::size(120)->generate($order->transaction_id) !!}
            </div>
            <div class="text-xs font-mono text-sky-600">{{ $order->transaction_id }}</div>
        </div>

        <!-- Total -->
        <div class="flex justify-between items-center bg-sky-600 text-white p-6 rounded-2xl">
            <div class="font-bold">Total Terbayar</div>
            <div class="text-3xl font-bold">Rp {{ number_format($order->total_price, 0, ',', '.') }}</div>
        </div>

        <!-- Action Buttons -->
        <div class="grid grid-cols-2 gap-4 mt-12">
            <a href="{{ route('order.receipt.pdf', $order) }}" class="flex items-center justify-center gap-2 bg-white border border-sky-200 text-sky-600 font-bold py-3 rounded-xl hover:bg-sky-50 transition-all">
                <i class="fas fa-file-pdf"></i> Download PDF
            </a>
            <a href="{{ route('home') }}" class="flex items-center justify-center gap-2 btn-fresh text-white font-bold py-3 rounded-xl">
                <i class="fas fa-house"></i> Kembali ke Beranda
            </a>
        </div>
    </div>
</div>
@endsection
