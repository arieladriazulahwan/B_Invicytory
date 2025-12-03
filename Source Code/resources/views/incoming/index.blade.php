@extends('layouts.default-layout')

@section('title', 'Barang Masuk')

@section('content')
<div class="mb-4">
    <!-- Changed button color from green to navy blue -->
    <a href="{{ route('incoming.create') }}" class="bg-blue-900 text-white px-4 py-2 rounded hover:bg-blue-800">+ Tambah Data Barang</a>
</div>

@if(session('success'))
    <!-- Updated success message styling to match new theme -->
    <div class="bg-blue-100 text-blue-900 p-2 rounded mb-4">
        {{ session('success') }}
    </div>
@endif

<!-- Updated table styling with navy blue header and new columns -->
<table class="w-full bg-white shadow rounded">
    <thead class="bg-blue-900 text-white text-left">
        <tr>
            <th class="p-3">No</th>
            <th class="p-3">Nama Barang</th>
            <th class="p-3">Jumlah</th>
            <th class="p-3">Deskripsi</th>
            <th class="p-3">Tanggal</th>
            <th class="p-3">Tindakan</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($items as $key => $item)
        <tr class="border-b hover:bg-gray-50">
            <!-- Added number column -->
            <td class="p-3">{{ $key + 1 }}</td>
            <td class="p-3">{{ $item->item_name }}</td>
            <td class="p-3">{{ $item->quantity }}</td>
            <td class="p-3">{{ $item->description }}</td>
            <!-- Added date column -->
            <td class="p-3">{{ $item->created_at->format('d-m-Y') }}</td>
            <td class="p-3 space-x-2">
                <!-- Updated link colors - Edit is cyan, Hapus is red -->
                <a href="{{ route('incoming.edit', $item->id) }}" class="text-cyan-500 hover:underline">Edit</a>
                <form action="{{ route('incoming.destroy', $item->id) }}" method="POST" class="inline">
                    @csrf @method('DELETE')
                    <button class="text-red-500 hover:underline" onclick="return confirm('Hapus barang ini?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
