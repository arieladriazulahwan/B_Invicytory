@extends('layouts.default-layout')

@section('title', 'Edit Pesanan')

@section('content')
<h2 class="text-2xl font-bold mb-6 text-gray-800">Edit Pesanan</h2>

<form action="{{ route('orders.update', $order->id) }}" method="POST" class="space-y-6">
    @csrf
    @method('PUT')

    <div>
        <label class="block font-semibold text-gray-700 mb-2">Nama Pelanggan</label>
        <!-- updated input styling with gray background and navy focus ring -->
        <input type="text" value="{{ $order->customer_name }}" class="w-full p-3 border border-gray-300 rounded bg-gray-100 text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-900" disabled>
    </div>

    <div>
        <label class="block font-semibold text-gray-700 mb-3">Produk dalam Pesanan</label>

        <div class="space-y-3">
            @foreach ($products as $product)
                @php
                    $pivot = $order->products->where('id', $product->id)->first()?->pivot;
                @endphp

                <!-- updated product card styling with navy blue border and better contrast -->
                <div class="flex items-center justify-between border-2 border-blue-900 p-4 rounded bg-white hover:bg-gray-50">
                    <div>
                        <p class="font-semibold text-gray-800">{{ $product->name }}</p>
                        <p class="text-sm text-gray-600">Kategori: {{ $product->category->name ?? '-' }}</p>
                        <p class="text-sm text-gray-600">Harga: Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                        <p class="text-sm text-gray-600">Stok: {{ $product->item->quantity ?? 0 }}</p>
                    </div>
                    <div class="flex items-center space-x-3">
                        <input type="checkbox" name="products[{{ $product->id }}][selected]" value="1"
                            class="w-4 h-4 text-blue-900 rounded focus:ring-2 focus:ring-blue-900"
                            {{ $pivot ? 'checked' : '' }}>
                        <input type="number" name="products[{{ $product->id }}][quantity]"
                            value="{{ $pivot->quantity ?? 0 }}" min="0"
                            class="w-20 border border-gray-300 rounded p-2 text-center bg-white focus:outline-none focus:ring-2 focus:ring-blue-900">
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- updated button styling to navy blue and cancel link to gray -->
    <div class="pt-4 flex gap-2">
        <button type="submit" class="bg-blue-900 text-white px-6 py-3 rounded hover:bg-blue-800 font-semibold transition">
            Simpan Perubahan
        </button>
        <a href="{{ route('orders.index') }}" class="bg-gray-400 text-white px-6 py-3 rounded hover:bg-gray-500 font-semibold transition inline-flex items-center">Batal</a>
    </div>
</form>
@endsection
