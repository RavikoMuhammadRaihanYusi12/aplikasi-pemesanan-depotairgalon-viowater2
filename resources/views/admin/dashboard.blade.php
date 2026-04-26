@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-6 py-10">
    <div class="flex justify-between items-center mb-10" data-aos="fade-down">
        <div>
            <h1 class="text-3xl font-bold text-gray-800">Admin Dashboard</h1>
            <p class="text-gray-500 text-sm">Manajemen pemesanan VioWater2</p>
        </div>
        <form action="{{ route('admin.logout') }}" method="POST">
            @csrf
            <button type="submit" class="bg-white border border-red-200 text-red-500 px-6 py-2 rounded-xl font-bold hover:bg-red-50 transition-all flex items-center gap-2">
                <i class="fas fa-sign-out-alt"></i> Logout
            </button>
        </form>
    </div>

    @if(session('success'))
        <div class="mb-6 p-4 bg-green-100 text-green-700 rounded-xl border border-green-200 flex items-center gap-3 animate-bounce">
            <i class="fas fa-check-circle"></i>
            {{ session('success') }}
        </div>
    @endif

    <div class="frutiger-glass overflow-hidden" data-aos="fade-up">
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead class="bg-sky-50/50 border-b border-sky-100">
                    <tr>
                        <th class="px-6 py-4 text-xs font-bold text-sky-600 uppercase tracking-widest">Order ID</th>
                        <th class="px-6 py-4 text-xs font-bold text-sky-600 uppercase tracking-widest">Pelanggan</th>
                        <th class="px-6 py-4 text-xs font-bold text-sky-600 uppercase tracking-widest">Layanan</th>
                        <th class="px-6 py-4 text-xs font-bold text-sky-600 uppercase tracking-widest">Alamat</th>
                        <th class="px-6 py-4 text-xs font-bold text-sky-600 uppercase tracking-widest">Status</th>
                        <th class="px-6 py-4 text-xs font-bold text-sky-600 uppercase tracking-widest text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-sky-50">
                    @forelse($orders as $order)
                        <tr class="hover:bg-sky-50/30 transition-all">
                            <td class="px-6 py-4">
                                <span class="font-mono text-xs font-bold text-sky-700">{{ $order->transaction_id }}</span>
                                <div class="text-[10px] text-gray-400">{{ $order->created_at->diffForHumans() }}</div>
                            </td>
                            <td class="px-6 py-4 font-semibold text-gray-700">{{ $order->customer_name }}</td>
                            <td class="px-6 py-4">
                                <span class="text-xs px-3 py-1 rounded-full font-bold {{ $order->order_type == 'refill' ? 'bg-blue-100 text-blue-600' : 'bg-purple-100 text-purple-600' }}">
                                    {{ $order->order_type == 'refill' ? 'Isi Ulang' : 'Galon Kosong' }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500 max-w-xs truncate">{{ $order->address }}</td>
                            <td class="px-6 py-4">
                                @php
                                    $statusClasses = [
                                        'pending' => 'bg-yellow-100 text-yellow-600',
                                        'on_progress' => 'bg-sky-100 text-sky-600',
                                        'completed' => 'bg-green-100 text-green-600',
                                    ];
                                    $statusLabels = [
                                        'pending' => 'Menunggu',
                                        'on_progress' => 'Diproses',
                                        'completed' => 'Selesai',
                                    ];
                                @endphp
                                <span class="text-xs px-3 py-1 rounded-full font-bold {{ $statusClasses[$order->status] ?? 'bg-gray-100' }}">
                                    {{ $statusLabels[$order->status] ?? $order->status }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <form action="{{ route('admin.order.status', $order) }}" method="POST" class="flex gap-2 justify-center">
                                    @csrf
                                    <select name="status" onchange="this.form.submit()" class="text-xs border border-sky-100 rounded-lg px-2 py-1 bg-white focus:outline-none focus:ring-2 focus:ring-sky-400">
                                        <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="on_progress" {{ $order->status == 'on_progress' ? 'selected' : '' }}>On Progress</option>
                                        <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>Completed</option>
                                    </select>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-10 text-center text-gray-500">Belum ada pemesanan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
