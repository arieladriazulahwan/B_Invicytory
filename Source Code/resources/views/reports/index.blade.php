@extends('layouts.default-layout')

@section('title', 'Laporan Gudang')

@section('content')
    <div class="p-8 bg-gray-50 min-h-screen">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold text-blue-900">📊 Laporan Gudang</h1>

            <div class="relative inline-block text-left mb-6">
                <button id="dropdownButton"
                    class="bg-blue-900 hover:bg-blue-800 text-white font-semibold px-4 py-2 rounded-lg shadow">
                    📄 Cetak PDF
                </button>

                <div id="dropdownMenu"
                    class="hidden absolute mt-2 w-56 bg-white border border-gray-200 rounded-lg shadow-lg z-10">
                    <a href="{{ route('reports.pdf', 'all') }}" class="block px-4 py-2 hover:bg-gray-100">🗂️ Semua Laporan</a>
                    <a href="{{ route('reports.pdf', 'incomings') }}" class="block px-4 py-2 hover:bg-gray-100">📥 Barang Masuk</a>
                    <a href="{{ route('reports.pdf', 'outgoings') }}" class="block px-4 py-2 hover:bg-gray-100">📤 Barang Keluar</a>
                    <a href="{{ route('reports.pdf', 'items') }}" class="block px-4 py-2 hover:bg-gray-100">📦 Stok Barang</a>
                    <a href="{{ route('reports.pdf', 'products') }}" class="block px-4 py-2 hover:bg-gray-100">🛒 Produk & Kategori</a>
                    <a href="{{ route('reports.pdf', 'orders') }}" class="block px-4 py-2 hover:bg-gray-100">📃 Pesanan</a>
                </div>
            </div>

            <script>
                const dropdownButton = document.getElementById('dropdownButton');
                const dropdownMenu = document.getElementById('dropdownMenu');

                dropdownButton.addEventListener('click', () => {
                    dropdownMenu.classList.toggle('hidden');
                });

                window.addEventListener('click', (e) => {
                    if (!dropdownButton.contains(e.target) && !dropdownMenu.contains(e.target)) {
                        dropdownMenu.classList.add('hidden');
                    }
                });
            </script>
        </div>

        {{-- Barang Masuk --}}
        <div class="mb-10 bg-white shadow-lg rounded-2xl p-6">
            <h2 class="text-2xl font-semibold text-blue-900 mb-4 border-b pb-2">Barang Masuk</h2>
            <table class="w-full border border-gray-300 rounded-lg">
                <thead class="bg-blue-900 text-white">
                    <tr>
                        <th class="px-4 py-2 border">No</th>
                        <th class="px-4 py-2 border">Nama Barang</th>
                        <th class="px-4 py-2 border">Jumlah</th>
                        <th class="px-4 py-2 border">Keterangan</th>
                        <th class="px-4 py-2 border">Tanggal Masuk</th>
                    </tr>
                </thead>
                <tbody> 
                    @foreach ($incomings as $key => $incoming) 
                    <tr class="hover:bg-gray-50"> 
                        <td class="px-4 py-2 border">{{ $key + 1 }}</td>
                        <td class="px-4 py-2 border">{{ $incoming->item_name }}</td> 
                        <td class="px-4 py-2 border">{{ $incoming->quantity }}</td> 
                        <td class="px-4 py-2 border">{{ $incoming->description ?? '-' }}</td> 
                        <td class="px-4 py-2 border">{{ $incoming->created_at->format('d-m-Y') }}</td> 
                    </tr> 
                    @endforeach 
                </tbody>
            </table>
        </div>

        {{-- Barang Keluar --}}
        <div class="mb-10 bg-white shadow-lg rounded-2xl p-6">
            <h2 class="text-2xl font-semibold text-blue-900 mb-4 border-b pb-2">Barang Keluar</h2>
            <table class="w-full border border-gray-300 rounded-lg">
                <thead class="bg-blue-900 text-white">
                    <tr>
                        <th class="px-4 py-2 border">No</th>
                        <th class="px-4 py-2 border">Nama Barang</th>
                        <th class="px-4 py-2 border">Jumlah</th>
                        <th class="px-4 py-2 border">Keterangan</th>
                        <th class="px-4 py-2 border">Tanggal Keluar</th>
                    </tr>
                </thead>
                <tbody>
                   @foreach ($outgoings as $key => $outgoing) 
                   <tr class="hover:bg-gray-50"> 
                    <td class="px-4 py-2 border">{{ $key + 1 }}</td>
                    <td class="px-4 py-2 border">{{ $outgoing->item_name }}</td> 
                    <td class="px-4 py-2 border">{{ $outgoing->quantity }}</td> 
                    <td class="px-4 py-2 border">{{ $outgoing->description ?? '-' }}</td> 
                    <td class="px-4 py-2 border">{{ $outgoing->created_at->format('d-m-Y') }}</td> 
                </tr> 
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- Stok Barang --}}
        <div class="mb-10 bg-white shadow-lg rounded-2xl p-6">
            <h2 class="text-2xl font-semibold text-blue-900 mb-4 border-b pb-2">Stok Barang Sekarang</h2>
            <table class="w-full border border-gray-300 rounded-lg">
                <thead class="bg-blue-900 text-white">
                    <tr>
                        <th class="px-4 py-2 border">No</th>
                        <th class="px-4 py-2 border">Nama Barang</th>
                        <th class="px-4 py-2 border">Jumlah</th>
                        <th class="px-4 py-2 border">Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                  @forelse ($items as $key => $item)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-4 py-2 border">{{ $key + 1 }}</td>
                        <td class="px-4 py-2 border">{{ $item->name }}</td>
                        <td class="px-4 py-2 border">{{ $item->quantity }}</td>
                        <td class="px-4 py-2 border">{{ $item->description ?? '-' }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center py-2 text-gray-500">Belum ada data item di gudang</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>

        {{-- Kategori & Produk --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="bg-white shadow-lg rounded-2xl p-6">
                <h2 class="text-2xl font-semibold text-blue-900 mb-4 border-b pb-2">Data Kategori</h2>
                <table class="min-w-full bg-white border border-gray-300 mb-6"> 
                    <thead class="bg-blue-900 text-white"> 
                        <tr> 
                            <th class="px-4 py-2 border">No</th> 
                            <th class="px-4 py-2 border">Nama Kategori</th> 
                        </tr> 
                    </thead> 
                    <tbody> 
                        @foreach ($categories as $key => $category) 
                        <tr class="hover:bg-gray-50"> 
                            <td class="px-4 py-2 border">{{ $key + 1 }}</td> 
                            <td class="px-4 py-2 border">{{ $category->name }}</td> 
                        </tr> 
                        @endforeach 
                    </tbody> 
                </table>
            </div>

            <div class="bg-white shadow-lg rounded-2xl p-6">
                <h2 class="text-2xl font-semibold text-blue-900 mb-4 border-b pb-2">Produk</h2>
                <table class="w-full border border-gray-300 rounded-lg">
                    <thead class="bg-blue-900 text-white">
                        <tr>
                            <th class="px-4 py-2 border">No</th> 
                            <th class="px-4 py-2 border">Nama Produk</th> 
                            <th class="px-4 py-2 border">Kategori</th> 
                            <th class="px-4 py-2 border">Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                       @foreach ($products as $key => $product) 
                       <tr class="hover:bg-gray-50"> 
                            <td class="px-4 py-2 border">{{ $key + 1 }}</td> 
                            <td class="px-4 py-2 border">{{ $product->name }}</td> 
                            <td class="px-4 py-2 border">{{ $product->category->name ?? '-' }}</td> 
                            <td class="px-4 py-2 border">Rp {{ number_format($product->price, 0, ',', '.') }}</td> 
                        </tr>
                         @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Pesanan --}}
        <div class="mt-10 bg-white shadow-lg rounded-2xl p-6">
            <h2 class="text-2xl font-semibold text-blue-900 mb-4 border-b pb-2">Pesanan & Detail Produk</h2>
            <table class="w-full border border-gray-300 rounded-lg">
                <thead class="bg-blue-900 text-white">
                    <tr>
                        <th class="px-4 py-2 border">No</th>
                        <th class="px-4 py-2 border">ID Pesanan</th>
                        <th class="px-4 py-2 border">Tanggal</th>
                        <th class="px-4 py-2 border">Total Produk</th>
                    </tr>
                </thead>
                <tbody>
                   @foreach ($orders as $key => $order) 
                   <tr class="hover:bg-gray-50"> 
                    <td class="px-4 py-2 border">{{ $key + 1 }}</td> 
                    <td class="px-4 py-2 border">{{ $order->id }}</td> 
                    <td class="px-4 py-2 border">{{ $order->created_at->format('d-m-Y') }}</td> 
                    <td class="px-4 py-2 border">{{ $order->products->count() }}</td> 
                </tr> 
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
