@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-6">
    <!-- Hero Section -->
    <section class="py-20 flex flex-col md:flex-row items-center gap-12">
        <div class="md:w-1/2" data-aos="fade-right">
            <h1 class="text-5xl md:text-7xl font-bold leading-tight mb-6">
                Segarnya <span class="text-sky-500">Air Alami</span> Langsung ke Pintu Anda.
            </h1>
            <p class="text-xl text-gray-600 mb-10 leading-relaxed">
                VioWater2 hadir memberikan solusi air minum berkualitas tinggi, bersih, dan higienis. Pesan sekarang, antar sekarang!
            </p>
            <div class="flex gap-4">
                <a href="#order" class="btn-fresh text-white px-8 py-4 rounded-2xl font-bold text-lg">
                    Mulai Pesan <i class="fas fa-arrow-right ml-2"></i>
                </a>
                <a href="#about" class="bg-white/50 backdrop-blur-md border border-sky-200 px-8 py-4 rounded-2xl font-bold text-lg hover:bg-sky-50 transition-all">
                    Pelajari Lebih Lanjut
                </a>
            </div>
        </div>
        <div class="md:w-1/2 relative" data-aos="fade-left">
            <div class="absolute -top-10 -left-10 w-40 h-40 bg-sky-200/50 rounded-full blur-3xl animate-pulse"></div>
            <div class="frutiger-glass p-4 relative z-10">
                <img src="https://images.unsplash.com/photo-1548839140-29a749e1cf4d?q=80&w=1000&auto=format&fit=crop" alt="Water Splash" class="rounded-2xl shadow-lg">
            </div>
        </div>
    </section>

    <!-- Partner Marquee -->
    <section class="py-10 mb-20 overflow-hidden">
        <div class="text-center mb-8 font-semibold text-sky-600 tracking-widest uppercase text-sm">Our Trusted Partners</div>
        <div class="flex marquee-container gap-12 items-center">
            <div class="marquee-content flex gap-12 items-center">
                <div class="text-3xl font-bold text-gray-300 flex items-center gap-2"><i class="fas fa-circle-check"></i> AQUA DUMMY</div>
                <div class="text-3xl font-bold text-gray-300 flex items-center gap-2"><i class="fas fa-circle-check"></i> VIT DUMMY</div>
                <div class="text-3xl font-bold text-gray-300 flex items-center gap-2"><i class="fas fa-circle-check"></i> LE DUMMY</div>
                <div class="text-3xl font-bold text-gray-300 flex items-center gap-2"><i class="fas fa-circle-check"></i> NESTLE DUMMY</div>
                <div class="text-3xl font-bold text-gray-300 flex items-center gap-2"><i class="fas fa-circle-check"></i> ADES DUMMY</div>
            </div>
            <!-- Duplicate for infinite effect -->
            <div class="marquee-content flex gap-12 items-center">
                <div class="text-3xl font-bold text-gray-300 flex items-center gap-2"><i class="fas fa-circle-check"></i> AQUA DUMMY</div>
                <div class="text-3xl font-bold text-gray-300 flex items-center gap-2"><i class="fas fa-circle-check"></i> VIT DUMMY</div>
                <div class="text-3xl font-bold text-gray-300 flex items-center gap-2"><i class="fas fa-circle-check"></i> LE DUMMY</div>
                <div class="text-3xl font-bold text-gray-300 flex items-center gap-2"><i class="fas fa-circle-check"></i> NESTLE DUMMY</div>
                <div class="text-3xl font-bold text-gray-300 flex items-center gap-2"><i class="fas fa-circle-check"></i> ADES DUMMY</div>
            </div>
        </div>
    </section>

    <!-- Order Section -->
    <section id="order" class="py-20">
        <div class="text-center mb-16" data-aos="fade-up">
            <h2 class="text-4xl font-bold mb-4">Pesan Galon Sekarang</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">Hanya beberapa langkah mudah untuk mendapatkan kesegaran air VioWater2.</p>
        </div>

        <div class="flex flex-col md:flex-row gap-12">
            <!-- Order Form -->
            <div class="md:w-2/3 frutiger-glass p-10" data-aos="fade-up">
                <form action="{{ route('order.store') }}" method="POST">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">Nama Lengkap</label>
                            <input type="text" name="customer_name" required class="w-full bg-white/50 border border-sky-100 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-sky-400 transition-all" placeholder="Contoh: John Doe">
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">Pilih Layanan</label>
                            <select name="order_type" required class="w-full bg-white/50 border border-sky-100 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-sky-400 transition-all">
                                <option value="refill">Isi Ulang (Rp 5.000)</option>
                                <option value="empty_gallon">Beli Galon Kosong (Rp 50.000)</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-8">
                        <label class="block text-sm font-bold text-gray-700 mb-2">Alamat Detail Pengiriman</label>
                        <textarea name="address" required rows="4" class="w-full bg-white/50 border border-sky-100 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-sky-400 transition-all" placeholder="Jl. Air Segar No. 123, Kota Air..."></textarea>
                    </div>
                    <button type="submit" class="btn-fresh w-full text-white font-bold py-4 rounded-xl text-xl">
                        Lanjut ke Pembayaran <i class="fas fa-credit-card ml-2"></i>
                    </button>
                </form>
            </div>

            <!-- Info Sidebar -->
            <div class="md:w-1/3 flex flex-col gap-6" data-aos="fade-up" data-aos-delay="200">
                <div class="frutiger-glass p-6 bg-blue-50/50">
                    <h3 class="text-xl font-bold mb-4 flex items-center gap-2">
                        <i class="fas fa-shield-halved text-sky-500"></i> Kualitas Terjamin
                    </h3>
                    <p class="text-gray-600 text-sm">
                        Proses filtrasi menggunakan teknologi terbaru untuk memastikan kejernihan dan kesegaran air.
                    </p>
                </div>
                <div class="frutiger-glass p-6 bg-blue-50/50">
                    <h3 class="text-xl font-bold mb-4 flex items-center gap-2">
                        <i class="fas fa-bolt text-sky-500"></i> Pengiriman Cepat
                    </h3>
                    <p class="text-gray-600 text-sm">
                        Tim kami siap mengantarkan pesanan Anda dalam waktu singkat setelah pembayaran dikonfirmasi.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Reviews Section -->
    <section id="reviews" class="py-20">
        <div class="text-center mb-16" data-aos="fade-up">
            <h2 class="text-4xl font-bold mb-4">Apa Kata Mereka?</h2>
            <p class="text-gray-600">Ulasan real-time dari pelanggan setia kami.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-16">
            @forelse($reviews as $review)
                <div class="frutiger-glass p-8 hover:-translate-y-2 transition-all" data-aos="zoom-in">
                    <div class="flex gap-1 text-yellow-400 mb-4">
                        @for($i=0; $i<$review->rating; $i++)
                            <i class="fas fa-star"></i>
                        @endfor
                    </div>
                    <p class="text-gray-600 italic mb-6">"{{ $review->review_text }}"</p>
                    <div class="flex items-center gap-4">
                        <div class="w-10 h-10 bg-sky-200 rounded-full flex items-center justify-center text-sky-600 font-bold uppercase">
                            {{ substr($review->customer_name, 0, 1) }}
                        </div>
                        <div class="font-bold">{{ $review->customer_name }}</div>
                    </div>
                </div>
            @empty
                <div class="col-span-3 text-center text-gray-500">Belum ada ulasan. Jadilah yang pertama!</div>
            @endforelse
        </div>

        <!-- Review Form -->
        <div class="max-w-2xl mx-auto frutiger-glass p-10" data-aos="fade-up">
            <h3 class="text-2xl font-bold mb-8 text-center">Berikan Ulasan Anda</h3>
            <form action="{{ route('review.store') }}" method="POST">
                @csrf
                <div class="mb-6">
                    <label class="block text-sm font-bold text-gray-700 mb-2">Nama Anda</label>
                    <input type="text" name="customer_name" required class="w-full bg-white/50 border border-sky-100 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-sky-400" placeholder="John Doe">
                </div>
                <div class="mb-6">
                    <label class="block text-sm font-bold text-gray-700 mb-2">Rating</label>
                    <div class="flex gap-4 items-center">
                        <select name="rating" required class="bg-white/50 border border-sky-100 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-sky-400">
                            <option value="5">⭐⭐⭐⭐⭐ (5 Stars)</option>
                            <option value="4">⭐⭐⭐⭐ (4 Stars)</option>
                            <option value="3">⭐⭐⭐ (3 Stars)</option>
                            <option value="2">⭐⭐ (2 Stars)</option>
                            <option value="1">⭐ (1 Star)</option>
                        </select>
                    </div>
                </div>
                <div class="mb-8">
                    <label class="block text-sm font-bold text-gray-700 mb-2">Ulasan</label>
                    <textarea name="review_text" required rows="3" class="w-full bg-white/50 border border-sky-100 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-sky-400" placeholder="Ceritakan pengalaman Anda..."></textarea>
                </div>
                <button type="submit" class="btn-fresh w-full text-white font-bold py-3 rounded-xl transition-all">
                    Kirim Ulasan <i class="fas fa-paper-plane ml-2"></i>
                </button>
            </form>
        </div>
    </section>
</div>

<style>
    .marquee-container {
        display: flex;
        width: 100%;
        overflow: hidden;
        mask-image: linear-gradient(to right, transparent, black 10%, black 90%, transparent);
    }
    .marquee-content {
        animation: marquee 30s linear infinite;
        white-space: nowrap;
    }
    @keyframes marquee {
        0% { transform: translateX(0); }
        100% { transform: translateX(-100%); }
    }
</style>
@endsection
