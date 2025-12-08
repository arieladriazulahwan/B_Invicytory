<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $settings->warehouse_name ?? 'Invicytory' }}</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-50 text-gray-800">

    {{-- NAVBAR --}}
    <nav class="bg-white shadow fixed top-0 left-0 w-full z-10">
        <div class="max-w-6xl mx-auto px-6 py-4 flex items-center justify-between">
            <h1 class="text-2xl font-bold text-blue-600">{{ $settings->warehouse_name ?? 'Invicytory' }}</h1>

            <div class="space-x-6 font-semibold">
                <a href="#fitur" class="hover:text-blue-600">Fitur</a>
                <a href="#tentang" class="hover:text-blue-600">Tentang</a>
                <a href="#kontak" class="hover:text-blue-600">Kontak</a>
                <a href="{{ route('login') }}" 
                   class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg ml-4 shadow">
                    Login
                </a>
            </div>
        </div>
    </nav>

    {{-- HERO SECTION --}}
    <section class="pt-32 pb-24 text-center bg-gradient-to-br from-blue-600 to-indigo-700 text-white">
        <h2 class="text-4xl font-bold mb-4">Sistem Manajemen Gudang Modern</h2>
        <p class="text-lg max-w-2xl mx-auto mb-8">
            Kelola stok barang, catat barang masuk dan keluar, pantau pesanan,
            dan buat laporan hanya dengan satu aplikasi.
        </p>
        <a href="/register" class="text-yellow-300 hover:underline"
           class="bg-white text-blue-700 font-semibold px-6 py-3 rounded-lg shadow hover:bg-gray-100">
            Mulai Sekarang
        </a>
    </section>

    {{-- FITUR SECTION --}}
    <section id="fitur" class="py-20 max-w-6xl mx-auto px-6">
        <h3 class="text-3xl font-bold text-center mb-12">Fitur Utama</h3>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            
            <div class="bg-white p-6 shadow rounded-xl text-center">
                <h4 class="text-xl font-bold mb-3">Manajemen Stok</h4>
                <p class="text-gray-600">
                    Pantau stok barang secara real-time dan otomatis menghitung
                    jumlah masuk & keluar.
                </p>
            </div>

            <div class="bg-white p-6 shadow rounded-xl text-center">
                <h4 class="text-xl font-bold mb-3">Pencatatan Pesanan</h4>
                <p class="text-gray-600">
                    Catat pesanan dengan detail produk, jumlah, harga, dan total pesanan.
                </p>
            </div>

            <div class="bg-white p-6 shadow rounded-xl text-center">
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
            <h3 class="text-3xl font-bold text-center mb-8">Tentang {{ $settings->warehouse_name ?? 'Invicytory' }}</h3>
            <p class="text-gray-700 text-lg text-center max-w-3xl mx-auto">
                GudangKu adalah aplikasi manajemen gudang modern untuk usaha kecil
                hingga perusahaan besar. Dirancang cepat, responsif, dan mudah digunakan.
            </p>
        </div>
    </section>

    {{-- KONTAK SECTION --}}
    <section id="kontak" class="py-20 max-w-6xl mx-auto px-6">
        <h3 class="text-3xl font-bold text-center mb-8">Kontak</h3>

        <div class="text-center text-lg text-gray-700">
            <p>Email: <strong>support@gudangku.com</strong></p>
            <p>WhatsApp: <strong>{{ $settings->warehouse_phone ?? '' }} </strong></p>
        </div>
    </section>

    {{-- FOOTER --}}
    <footer class="py-6 text-center bg-white border-t">
        <p class="text-gray-600">© {{ date('Y') }} {{ $settings->warehouse_name ?? 'Invicytory' }} — Semua hak dilindungi.</p>
    </footer>

</body>
</html>
