@extends('layouts.default-layout')

@section('title', 'Barang Keluar')

@section('content')
<div class="mb-4">
    <a href="{{ route('outgoing.create') }}" class="bg-blue-900 text-white px-4 py-2 rounded hover:bg-blue-800">+ Tambah Barang Keluar</a>
</div>

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
        @foreach ($outgoings as $key => $outgoing)
        <tr class="border-b">
            <!-- Added No column with index -->
            <td class="p-3">{{ $key + 1 }}</td>
            <td class="p-3">{{ $outgoing->item_name }}</td>
            <td class="p-3">{{ $outgoing->quantity }}</td>
            <td class="p-3">{{ $outgoing->description }}</td>
            <!-- Added Tanggal column with formatted date -->
            <td class="p-3">{{ $outgoing->created_at->format('d-m-Y') }}</td>
            <td class="p-3 space-x-2">
                <!-- Changed Edit link to cyan color -->
                <a href="{{ route('outgoing.edit', $outgoing->id) }}" class="text-cyan-500 hover:underline">Edit</a>
                <form action="{{ route('outgoing.destroy', $outgoing->id) }}" method="POST" class="inline">
                    @csrf @method('DELETE')
                    <!-- Updated Hapus link styling -->
                    <button class="text-red-600 hover:underline" onclick="return confirm('Yakin ingin hapus?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
