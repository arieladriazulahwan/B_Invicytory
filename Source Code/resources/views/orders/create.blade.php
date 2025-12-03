@extends('layouts.default-layout')

@section('title', 'Buat Pesanan')

@section('content')
<h2 class="text-2xl font-bold mb-6 text-gray-800">Buat Pesanan</h2>

<form action="{{ route('orders.store') }}" method="POST" class="space-y-6 bg-white p-6 rounded-lg shadow">
    @csrf

    <div>
        <label class="block font-semibold text-gray-700 mb-2">Nama Pelanggan</label>
        <input type="text" name="customer_name" class="w-full p-3 bg-gray-100 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-900" required>
    </div>

    <div>
        <label class="block font-semibold text-gray-700 mb-2">Tanggal Pesanan</label>
        <input type="date" name="order_date" class="w-full p-3 bg-gray-100 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-900" required>
    </div>

    <div>
        <label class="block font-semibold text-gray-700 mb-3">Pilih Produk & Jumlah</label>

        <div id="product-list" class="space-y-3">
            @foreach ($products as $product)
                <div class="flex items-center justify-between border-2 border-blue-900 p-4 rounded">
                    <div>
                        <p class="font-semibold text-gray-800">{{ $product->name }}</p>
                        <p class="text-sm text-gray-600">Harga: Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                        <p class="text-sm text-gray-600">Stok: {{ $product->item->quantity ?? 0 }}</p>
                    </div>
                    <div class="flex items-center space-x-3">
                        <input type="checkbox" name="products[{{ $product->id }}][selected]" value="1" class="w-5 h-5 accent-blue-900 cursor-pointer">
                        <input 
                            type="number" 
                            name="products[{{ $product->id }}][quantity]" 
                            min="0" 
                            class="w-24 bg-gray-100 border border-gray-300 rounded p-2 text-center focus:outline-none focus:ring-2 focus:ring-blue-900" 
                            placeholder="Qty">
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="pt-4 flex gap-3">
        <button type="submit" class="bg-blue-900 text-white px-6 py-2 rounded hover:bg-blue-800 transition font-semibold">
            Simpan Pesanan
        </button>
        <a href="{{ route('orders.index') }}" class="bg-gray-400 text-white px-6 py-2 rounded hover:bg-gray-500 transition font-semibold">Batal</a>
    </div>
</form>
@endsection
