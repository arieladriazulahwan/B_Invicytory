<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $settings->warehouse_name ?? 'Invicytory' }}</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    {{-- Added custom animations CSS --}}
    <style>
        @keyframes slideInDown {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        @keyframes scaleIn {
            from {
                opacity: 0;
                transform: scale(0.95);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        .animate-slide-in-down {
            animation: slideInDown 0.6s ease-out;
        }

        .animate-slide-in-up {
            animation: slideInUp 0.6s ease-out;
        }

        .animate-fade-in {
            animation: fadeIn 0.8s ease-out;
        }

        .animate-scale-in {
            animation: scaleIn 0.6s ease-out;
        }

        .animate-delay-100 { animation-delay: 0.1s; }
        .animate-delay-200 { animation-delay: 0.2s; }
        .animate-delay-300 { animation-delay: 0.3s; }
        .animate-delay-400 { animation-delay: 0.4s; }

        .feature-card {
            transition: all 0.3s ease;
        }

        .feature-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body class="bg-gray-50 text-gray-800">

    {{-- NAVBAR --}}
    <nav class="bg-white shadow fixed top-0 left-0 w-full z-10 animate-slide-in-down">
        <div class="max-w-6xl mx-auto px-6 py-4 flex items-center justify-between">
            <h1 class="text-2xl font-bold text-blue-900">{{ $settings->warehouse_name ?? 'Invicytory' }}</h1>

            <div class="space-x-6 font-semibold">
                <a href="#fitur" class="hover:text-blue-900 transition-colors">Fitur</a>
                <a href="#tentang" class="hover:text-blue-900 transition-colors">Tentang</a>
                <a href="#kontak" class="hover:text-blue-900 transition-colors">Kontak</a>
                <a href="{{ route('login') }}" 
                   class="bg-blue-900 hover:bg-blue-800 text-white px-4 py-2 rounded-lg ml-4 shadow transition-colors">
                    Login
                </a>
            </div>
        </div>
    </nav>

    {{-- HERO SECTION --}}
    <section class="pt-32 pb-24 text-center bg-blue-900 text-white">
        {{-- Added animations to hero text elements --}}
        <h2 class="text-4xl font-bold mb-4 animate-slide-in-up">Sistem Manajemen Gudang Modern</h2>
        <p class="text-lg max-w-2xl mx-auto mb-8 animate-slide-in-up animate-delay-100">
            Kelola stok barang, catat barang masuk dan keluar, pantau pesanan,
            dan buat laporan hanya dengan satu aplikasi.
        </p>
        <a href="/register" class="inline-block bg-white text-blue-900 font-semibold px-6 py-3 rounded-lg shadow hover:bg-gray-100 transition-all hover:scale-105 animate-slide-in-up animate-delay-200">
            Mulai Sekarang
        </a>
    </section>

    {{-- FITUR SECTION --}}
    <section id="fitur" class="py-20 max-w-6xl mx-auto px-6">
        <h3 class="text-3xl font-bold text-center mb-12 animate-fade-in">Fitur Utama</h3>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            
            {{-- Added scale-in animation with staggered delays to feature cards --}}
            <div class="bg-white p-6 shadow rounded-xl text-center feature-card animate-scale-in">
                <h4 class="text-xl font-bold mb-3">Manajemen Stok</h4>
                <p class="text-gray-600">
                    Pantau stok barang secara real-time dan otomatis menghitung
                    jumlah masuk & keluar.
                </p>
            </div>

            <div class="bg-white p-6 shadow rounded-xl text-center feature-card animate-scale-in animate-delay-100">
                <h4 class="text-xl font-bold mb-3">Pencatatan Pesanan</h4>
                <p class="text-gray-600">
                    Catat pesanan dengan detail produk, jumlah, harga, dan total pesanan.
                </p>
            </div>

            <div class="bg-white p-6 shadow rounded-xl text-center feature-card animate-scale-in animate-delay-200">
                <h4 class="text-xl font-bold mb-3">Laporan Lengkap</h4>
                <p class="text-gray-600">
                    Unduh laporan stok, pesanan, barang masuk, dan barang keluar.
                </p>
            </div>

        </div>
    </section>

    {{-- TENTANG SECTION --}}
    <section id="tentang" class="py-20 bg-gray-100">
        <div class="max-w-6xl mx-auto px-6">
            {{-- Added fade-in animation to about section --}}
            <h3 class="text-3xl font-bold text-center mb-8 animate-fade-in">Tentang {{ $settings->warehouse_name ?? 'Invicytory' }}</h3>
            <p class="text-gray-700 text-lg text-center max-w-3xl mx-auto animate-slide-in-up">
                GudangKu adalah aplikasi manajemen gudang modern untuk usaha kecil
                hingga perusahaan besar. Dirancang cepat, responsif, dan mudah digunakan.
            </p>
        </div>
    </section>

    {{-- KONTAK SECTION --}}
    <section id="kontak" class="py-20 max-w-6xl mx-auto px-6">
        {{-- Added fade-in animation to contact section --}}
        <h3 class="text-3xl font-bold text-center mb-8 animate-fade-in">Kontak</h3>

        <div class="text-center text-lg text-gray-700 animate-slide-in-up">
            <p>Email: <strong>fikramikram3009@gmail.com</strong></p>
            <p>WhatsApp: <strong>{{ $settings->warehouse_phone ?? '' }} </strong></p>
        </div>
    </section>

    {{-- FOOTER --}}
    <footer class="py-6 text-center bg-white border-t">
        <p class="text-gray-600">© {{ date('Y') }} {{ $settings->warehouse_name ?? 'Invicytory' }} — Semua hak dilindungi.</p>
    </footer>

</body>
</html>
