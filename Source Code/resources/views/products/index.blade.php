@extends('layouts.default-layout')

@section('title', 'Data Produk')

@section('content')
<div class="flex justify-between items-center mb-4">
    <h2 class="text-2xl font-bold">Produk</h2>
    <a href="{{ route('products.create') }}" class="bg-blue-900 text-white px-4 py-2 rounded hover:bg-blue-800">Tambah Produk</a>
</div>

<table class="min-w-full bg-white border">
    <thead>
        <tr class="bg-blue-900 text-white">
            <th class="border border-gray-300 px-4 py-2">No</th>
            <th class="border border-gray-300 px-4 py-2">Nama Barang</th>
            <th class="border border-gray-300 px-4 py-2">Jumlah</th>
            <th class="border border-gray-300 px-4 py-2">Harga</th>
            <th class="border border-gray-300 px-4 py-2">Kategori</th>
            <th class="border border-gray-300 px-4 py-2">Tindakan</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($products as $key => $product)
        <tr class="hover:bg-gray-50">
            <td class="border border-gray-300 px-4 py-2">{{ $key + 1 }}</td>
            <td class="border border-gray-300 px-4 py-2">{{ $product->name }}</td>
            <td class="border border-gray-300 px-4 py-2">{{ $product->quantity ?? '-' }}</td>
            <td class="border border-gray-300 px-4 py-2">{{ number_format($product->price, 0, ',', '.') }}</td>
            <td class="border border-gray-300 px-4 py-2">{{ $product->category->name ?? '-' }}</td>
            <td class="border border-gray-300 px-4 py-2 flex space-x-2">
                <a href="{{ route('products.edit', $product->id) }}" class="text-cyan-500 hover:underline">Edit</a>
                <form action="{{ route('products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Yakin hapus?')" class="inline">
                    @csrf @method('DELETE')
                    <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="6" class="border px-4 py-2 text-center text-gray-500">Tidak ada data produk</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection
