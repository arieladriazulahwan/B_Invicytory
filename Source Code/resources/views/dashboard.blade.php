@extends('layouts.default-layout')

@section('title', 'Dashboard Gudang')

@section('content')

    <h2 class="text-2xl font-bold text-gray-800">
        Dashboard Gudang
    </h2>

    {{-- CARD STATISTIK --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-6">

        {{-- Total Barang - Navy Card --}}
        <div class="bg-blue-900 shadow rounded-xl p-5 border border-blue-800">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-gray-300 text-sm">Total Barang</h3>
                    <p class="text-4xl font-bold text-white mt-2">
                        {{ \App\Models\Item::count() }}
                    </p>
                </div>
                <div class="text-blue-400 opacity-30">
                    <svg class="w-12 h-12" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4V5h12v10z"/>
                    </svg>
                </div>
            </div>
        </div>

        {{-- Barang Masuk - White Card --}}
        <div class="bg-white shadow rounded-xl p-5 border border-gray-200">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-gray-600 text-sm">Barang Masuk</h3>
                    <p class="text-4xl font-bold text-blue-900 mt-2">
                        {{ \App\Models\Incoming::count() }}
                    </p>
                </div>
                <div class="text-blue-500 opacity-20">
                    <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M9 19l3 3m0 0l3-3m-3 3V10"/>
                    </svg>
                </div>
            </div>
        </div>

        {{-- Barang Keluar - Navy Card --}}
        <div class="bg-blue-900 shadow rounded-xl p-5 border border-blue-800">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-gray-300 text-sm">Barang Keluar</h3>
                    <p class="text-4xl font-bold text-white mt-2">
                        {{ \App\Models\Outgoing::count() }}
                    </p>
                </div>
                <div class="text-blue-400 opacity-30">
                    <svg class="w-12 h-12" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4V5h12v10z"/>
                    </svg>
                </div>
            </div>
        </div>

        {{-- Kategori - White Card --}}
        <div class="bg-white shadow rounded-xl p-5 border border-gray-200">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-gray-600 text-sm">Kategori</h3>
                    <p class="text-4xl font-bold text-blue-900 mt-2">
                        {{ \App\Models\Category::count() }}
                    </p>
                </div>
                <div class="text-blue-500 opacity-20">
                    <svg class="w-12 h-12" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h1a1 1 0 001-1v-6a1 1 0 00-1-1h-1z"/>
                    </svg>
                </div>
            </div>
        </div>

        {{-- Produk - Navy Card --}}
        <div class="bg-blue-900 shadow rounded-xl p-5 border border-blue-800">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-gray-300 text-sm">Produk</h3>
                    <p class="text-4xl font-bold text-white mt-2">
                        {{ \App\Models\Product::count() }}
                    </p>
                </div>
                <div class="text-blue-400 opacity-30">
                    <svg class="w-12 h-12" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 6H6.28l-.31-1.243A1 1 0 005 4H3z"/>
                    </svg>
                </div>
            </div>
        </div>

        {{-- Pesanan - White Card --}}
        <div class="bg-white shadow rounded-xl p-5 border border-gray-200">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-gray-600 text-sm">Pesanan</h3>
                    <p class="text-4xl font-bold text-blue-900 mt-2">
                        {{ \App\Models\Order::count() }}
                    </p>
                </div>
                <div class="text-blue-500 opacity-20">
                    <svg class="w-12 h-12" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M2 5a2 2 0 012-2h12a2 2 0 012 2v10a2 2 0 01-2 2H4a2 2 0 01-2-2V5z"/>
                    </svg>
                </div>
            </div>
        </div>

    </div>

    {{-- DESKRIPSI --}}
    <div class="mt-8">
        <p class="text-gray-700 text-lg">
            Silakan kelola data barang, barang masuk, barang keluar, kategori, produk, dan pesanan melalui menu di samping.
        </p>
    </div>

@endsection
