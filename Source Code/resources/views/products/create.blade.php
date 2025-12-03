@extends('layouts.default-layout')

@section('title', 'Tambah Produk')

@section('content')
<h2 class="text-2xl font-bold mb-6">Tambah Produk</h2>

<form action="{{ route('products.store') }}" method="POST" class="bg-white p-6 rounded shadow space-y-4">
    @csrf
    
    <div>
        <label class="block font-semibold text-gray-700 mb-2">Pilih Item</label>
        <!-- Updated select styling with gray background and navy focus ring -->
        <select name="item_id" class="w-full bg-gray-100 border border-gray-300 p-3 rounded focus:outline-none focus:ring-2 focus:ring-blue-900" required>
            <option value="">-- Pilih Item --</option>
            @foreach ($items as $item)
                <option value="{{ $item->id }}">{{ $item->name }} (Stok: {{ $item->quantity }})</option>
            @endforeach
        </select>
    </div>

    <div>
        <label class="block font-semibold text-gray-700 mb-2">Pilih Kategori</label>
        <!-- Updated select styling with gray background and navy focus ring -->
        <select name="category_id" class="w-full bg-gray-100 border border-gray-300 p-3 rounded focus:outline-none focus:ring-2 focus:ring-blue-900" required>
            <option value="">-- Pilih Kategori --</option>
            @foreach ($categories as $cat)
                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
            @endforeach
        </select>
    </div>

    <div>
        <label class="block font-semibold text-gray-700 mb-2">Harga Produk</label>
        <!-- Updated input styling with gray background and navy focus ring -->
        <input type="number" name="price" step="0.01" class="w-full bg-gray-100 border border-gray-300 p-3 rounded focus:outline-none focus:ring-2 focus:ring-blue-900" required>
    </div>

    <div class="flex gap-3 pt-4">
        <!-- Changed submit button to navy blue and added back button -->
        <button type="submit" class="bg-blue-900 hover:bg-blue-800 text-white px-6 py-2 rounded transition">
            Simpan Produk
        </button>
        <a href="{{ route('products.index') }}" class="bg-gray-400 hover:bg-gray-500 text-white px-6 py-2 rounded transition">
            Kembali
        </a>
    </div>
</form>
@endsection
