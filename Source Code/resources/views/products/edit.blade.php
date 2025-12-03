@extends('layouts.default-layout')

@section('title', 'Edit Produk')

@section('content')
<h2 class="text-2xl font-bold mb-4">Edit Produk</h2>

<form action="{{ route('products.update', $product->id) }}" method="POST" class="space-y-4 bg-white p-6 rounded shadow">
    @csrf
    @method('PUT')

    <div>
        <label for="item_id" class="block font-semibold mb-2 text-gray-700">Nama Item</label>
        <!-- updated select styling with gray background and navy focus ring -->
        <select name="item_id" id="item_id" class="w-full bg-gray-100 border border-gray-300 rounded p-2 focus:outline-none focus:ring-2 focus:ring-blue-900" required>
            @foreach ($items as $item)
                <option value="{{ $item->id }}" {{ $product->name == $item->name ? 'selected' : '' }}>
                    {{ $item->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div>
        <label for="category_id" class="block font-semibold mb-2 text-gray-700">Kategori</label>
        <!-- updated select styling with gray background and navy focus ring -->
        <select name="category_id" id="category_id" class="w-full bg-gray-100 border border-gray-300 rounded p-2 focus:outline-none focus:ring-2 focus:ring-blue-900" required>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div>
        <label for="price" class="block font-semibold mb-2 text-gray-700">Harga</label>
        <!-- updated input styling with gray background and navy focus ring -->
        <input type="number" step="0.01" name="price" id="price" value="{{ $product->price }}" class="w-full bg-gray-100 border border-gray-300 rounded p-2 focus:outline-none focus:ring-2 focus:ring-blue-900" required>
    </div>

    <div>
        <label for="quantity" class="block font-semibold mb-2 text-gray-700">Jumlah</label>
        <!-- updated input styling with gray background and navy focus ring -->
        <input type="number" name="quantity" id="quantity" value="{{ $product->quantity }}" class="w-full bg-gray-100 border border-gray-300 rounded p-2 focus:outline-none focus:ring-2 focus:ring-blue-900" required>
    </div>

    <!-- changed button to navy blue and styled cancel button as gray -->
    <div class="flex gap-2">
        <button type="submit" class="bg-blue-900 hover:bg-blue-950 text-white px-4 py-2 rounded">
            Simpan Perubahan
        </button>
        <a href="{{ route('products.index') }}" class="bg-gray-400 hover:bg-gray-500 text-white px-4 py-2 rounded">Batal</a>
    </div>
</form>
@endsection
