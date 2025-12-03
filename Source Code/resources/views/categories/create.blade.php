@extends('layouts.default-layout')
@section('title', 'Tambah Kategori')
@section('content')
    <h2 class="text-2xl font-bold mb-6">Tambah Kategori</h2>

    <form action="{{ route('categories.store') }}" method="POST" class="space-y-4 bg-white p-6 rounded shadow max-w-md">
        @csrf
        
        <div>
            <label class="block font-semibold text-gray-700 mb-2">Nama Kategori</label>
            <input type="text" name="name" class="w-full p-3 border border-gray-300 rounded-lg bg-gray-50 text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-900 focus:border-transparent" placeholder="Masukkan nama kategori" required>
            @error('name')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex gap-3 mt-6">
            <!-- Tombol Simpan berubah dari blue-500 ke navy blue (blue-900) -->
            <button type="submit" class="bg-blue-900 hover:bg-blue-800 text-white px-4 py-2 rounded-lg transition font-semibold">
                Simpan
            </button>
            <!-- Menambahkan tombol Kembali dengan styling gray -->
            <a href="{{ route('categories.index') }}" class="bg-gray-400 hover:bg-gray-500 text-white px-4 py-2 rounded-lg transition font-semibold">
                Kembali
            </a>
        </div>
    </form>
@endsection
