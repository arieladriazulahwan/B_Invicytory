<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $settings->warehouse_name ?? 'Invicytory' }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 font-sans antialiased">
    <div class="flex min-h-screen">

        <!-- SIDEBAR -->
        <!-- Changed sidebar from white to navy blue with white text -->
        <aside class="w-64 bg-blue-900 shadow-md">
            <div class="p-6 text-2xl font-bold text-white">
                {{ $settings->warehouse_name ?? 'Invicytory' }}
            </div>

            <nav class="mt-4 space-y-2">
                <a href="/dashboard" class="block px-6 py-2 text-blue-100 hover:bg-blue-800 transition">Dashboard</a>
                <a href="/items" class="block px-6 py-2 text-blue-100 hover:bg-blue-800 transition">Data Barang</a>
                <a href="/incoming" class="block px-6 py-2 text-blue-100 hover:bg-blue-800 transition">Barang Masuk</a>
                <a href="/outgoing" class="block px-6 py-2 text-blue-100 hover:bg-blue-800 transition">Barang Keluar</a>
                <a href="/categories" class="block px-6 py-2 text-blue-100 hover:bg-blue-800 transition">Kategori</a>
                <a href="/products" class="block px-6 py-2 text-blue-100 hover:bg-blue-800 transition">Produk</a>
                <a href="/orders" class="block px-6 py-2 text-blue-100 hover:bg-blue-800 transition">Pesanan</a>
                <a href="/reports" class="block px-6 py-2 text-blue-100 hover:bg-blue-800 transition">Laporan</a>
                <a href="/settings" class="block px-6 py-2 text-blue-100 hover:bg-blue-800 transition">Pengaturan</a>
            </nav>
        </aside>


        <!-- KONTEN UTAMA -->
        <div class="flex-1 flex flex-col">

            <!-- HEADER -->
            <!-- Updated header styling with light gray background -->
            <header class="bg-gray-200 shadow p-4 flex justify-between items-center">
                
                <h1 class="text-xl font-semibold text-gray-800">
                    @yield('title', 'Dashboard Gudang')
                </h1>

                <div class="flex items-center gap-4">

                    <!-- FOTO PROFIL -->
                    <img 
                        src="{{ auth()->user()->profile_photo 
                            ? asset('storage/' . auth()->user()->profile_photo) 
                            : 'https://ui-avatars.com/api/?name=' . urlencode(auth()->user()->name) }}"
                        class="w-10 h-10 rounded-full object-cover shadow"
                        alt="Foto Profil">

                    <!-- USERNAME -->
                    <span class="font-semibold text-gray-700">
                        {{ auth()->user()->name }}
                    </span>

                    <!-- LOGOUT -->
                    <!-- Changed logout button to navy blue theme -->
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button 
                            class="bg-blue-900 hover:bg-blue-800 text-white px-4 py-2 rounded-lg shadow transition">
                            Logout
                        </button>
                    </form>

                </div>
            </header>


            <!-- MAIN CONTENT -->
            <main class="flex-1 p-6">
                @yield('content')
            </main>

        </div>
    </div>
</body>
</html>
