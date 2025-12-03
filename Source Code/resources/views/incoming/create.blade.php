@extends('layouts.default-layout')

@section('title', 'Tambah Barang Masuk')

@section('content')
<h2 class="text-xl font-semibold mb-4">Tambah Barang Masuk</h2>
<form action="{{ route('incoming.store') }}" method="POST" class="space-y-4">
    @csrf
    <div>
        <label>Nama Barang</label>
        <input type="text" name="item_name" class="w-full bord@extends('layouts.default-layout')

@section('title', 'Tambah Barang Masuk')

@section('content')
<div class="mb-6">
    <h2 class="text-2xl font-semibold text-gray-800">Tambah Barang Masuk</h2>
</div>

<div class="bg-white rounded-lg shadow-md p-6 max-w-2xl">
    <form action="{{ route('incoming.store') }}" method="POST" class="space-y-4">
        @csrf
        
        <div>
            <label class="block text-gray-700 font-medium mb-2">Nama Barang</label>
            <input type="text" name="item_name" 
                   class="w-full border border-gray-300 p-3 rounded bg-gray-50 text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-900" 
                   placeholder="Masukkan nama barang" required>
            @error('item_name')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block text-gray-700 font-medium mb-2">Jumlah</label>
            <input type="number" name="quantity" 
                   class="w-full border border-gray-300 p-3 rounded bg-gray-50 text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-900" 
                   placeholder="Masukkan jumlah" required>
            @error('quantity')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block text-gray-700 font-medium mb-2">Deskripsi</label>
            <textarea name="description" 
                      class="w-full border border-gray-300 p-3 rounded bg-gray-50 text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-900" 
                      placeholder="Masukkan deskripsi barang" rows="4"></textarea>
            @error('description')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex gap-3 pt-4">
            <!-- Updated button colors to match theme - navy blue for save, gray for back -->
            <button type="submit" class="bg-blue-900 text-white px-6 py-2 rounded hover:bg-blue-800 transition">
                Simpan
            </button>
            <a href="{{ route('incoming.index') }}" class="bg-gray-400 text-white px-6 py-2 rounded hover:bg-gray-500 transition">
                Kembali
            </a>
        </div>
    </form>
</div>

@endsection
er p-2 rounded" required>
    </div>
    <div>
        <label>Jumlah</label>
        <input type="number" name="quantity" class="w-full border p-2 rounded" required>
    </div>
    <div>
        <label>Keterangan</label>
        <textarea name="description" class="w-full border p-2 rounded"></textarea>
    </div>
    <button class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Simpan</button>
</form>
@endsection
