<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'VioWater2') }} - Fresh & Fast</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Google Fonts: Outfit & Quicksand -->
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700&family=Quicksand:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        :root {
            --primary-blue: #0077be;
            --secondary-blue: #a2d2ff;
            --fresh-green: #bde0fe;
            --glass-bg: rgba(255, 255, 255, 0.7);
        }

        body {
            font-family: 'Outfit', sans-serif;
            background: linear-gradient(135deg, #e0f2fe 0%, #ffffff 50%, #bae6fd 100%);
            min-height: 100vh;
            color: #1e293b;
            overflow-x: hidden;
        }

        .frutiger-glass {
            background: var(--glass-bg);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.4);
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.1);
            border-radius: 24px;
        }

        .bubble-bg {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            pointer-events: none;
        }

        .bubble {
            position: absolute;
            background: rgba(186, 230, 253, 0.4);
            border-radius: 50%;
            animation: float 20s infinite ease-in-out;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0) translateX(0); }
            50% { transform: translateY(-100px) translateX(50px); }
        }

        .nav-link {
            transition: all 0.3s ease;
            position: relative;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -4px;
            left: 0;
            background-color: var(--primary-blue);
            transition: width 0.3s ease;
        }

        .nav-link:hover::after {
            width: 100%;
        }

        .btn-fresh {
            background: linear-gradient(to right, #0ea5e9, #38bdf8);
            box-shadow: 0 4px 14px 0 rgba(14, 165, 233, 0.39);
            transition: all 0.3s ease;
        }

        .btn-fresh:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 20px rgba(14, 165, 233, 0.23);
        }
    </style>
</head>
<body>
    <!-- Bubbles -->
    <div class="bubble-bg">
        <div class="bubble w-20 h-20" style="top: 10%; left: 5%; animation-duration: 25s;"></div>
        <div class="bubble w-32 h-32" style="top: 60%; left: 80%; animation-duration: 30s;"></div>
        <div class="bubble w-16 h-16" style="top: 80%; left: 20%; animation-duration: 18s;"></div>
        <div class="bubble w-24 h-24" style="top: 30%; left: 70%; animation-duration: 22s;"></div>
    </div>

    <nav class="sticky top-0 z-50 px-6 py-4">
        <div class="max-w-7xl mx-auto flex justify-between items-center frutiger-glass px-8 py-3">
            <a href="{{ route('home') }}" class="text-2xl font-bold text-sky-600 flex items-center gap-2">
                <i class="fas fa-droplet text-sky-500"></i>
                VioWater<span class="text-sky-400">2</span>
            </a>
            <div class="hidden md:flex gap-8 font-semibold">
                <a href="{{ route('home') }}#about" class="nav-link">About</a>
                <a href="{{ route('home') }}#order" class="nav-link">Order Now</a>
                <a href="{{ route('home') }}#reviews" class="nav-link">Reviews</a>
                <a href="{{ route('admin.login') }}" class="nav-link text-sky-600 flex items-center gap-1">
                    <i class="fas fa-user-shield"></i> Master
                </a>
            </div>
            <a href="#order" class="btn-fresh text-white px-6 py-2 rounded-full font-bold">
                Order
            </a>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

    <footer class="mt-20 py-12 bg-sky-100/50 backdrop-blur-md">
        <div class="max-w-7xl mx-auto px-6 text-center">
            <div class="text-2xl font-bold text-sky-600 mb-4">VioWater2</div>
            <p class="text-gray-600 mb-6">Penyedia air minum isi ulang & galon berkualitas tinggi dengan layanan cepat.</p>
            <div class="flex justify-center gap-6 text-2xl text-sky-500 mb-8">
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-facebook"></i></a>
                <a href="#"><i class="fab fa-whatsapp"></i></a>
            </div>
            <div class="text-sm text-gray-500">
                &copy; {{ date('Y') }} VioWater2. All rights reserved. | <a href="{{ route('admin.login') }}" class="hover:text-sky-600 transition-all">Admin Master</a>
            </div>
        </div>
    </footer>

    <!-- AOS JS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000,
            once: true,
            easing: 'ease-out-back'
        });
    </script>
    @stack('scripts')
</body>
</html>
