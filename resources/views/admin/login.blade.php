@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto px-6 py-20">
    <div class="text-center mb-12" data-aos="zoom-in">
        <div class="w-20 h-20 bg-sky-100 text-sky-500 rounded-full flex items-center justify-center text-4xl mx-auto mb-6 shadow-lg">
            <i class="fas fa-user-shield"></i>
        </div>
        <h1 class="text-3xl font-bold mb-2">Master Login</h1>
        <p class="text-gray-600">Akses khusus untuk manajemen VioWater2.</p>
    </div>

    <div class="frutiger-glass p-8" data-aos="fade-up">
        <form action="{{ route('admin.login.post') }}" method="POST">
            @csrf
            <div class="mb-6">
                <label class="block text-sm font-bold text-gray-700 mb-2">Email Address</label>
                <input type="email" name="email" required value="{{ old('email') }}" class="w-full bg-white/50 border border-sky-100 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-sky-400 @error('email') border-red-400 @enderror" placeholder="master@viowater.com">
                @error('email')
                    <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-8">
                <label class="block text-sm font-bold text-gray-700 mb-2">Password</label>
                <input type="password" name="password" required class="w-full bg-white/50 border border-sky-100 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-sky-400" placeholder="••••••••">
            </div>
            <button type="submit" class="btn-fresh w-full text-white font-bold py-4 rounded-xl text-lg transition-all">
                Sign In <i class="fas fa-sign-in-alt ml-2"></i>
            </button>
        </form>
    </div>
    
    <div class="mt-8 text-center text-sm text-gray-400">
        <p>Login ini hanya untuk akun Master yang terdaftar di database.</p>
    </div>
</div>
@endsection
