@extends('layouts.default-layout')

@section('title', 'Data Barang di Gudang')

@section('content')
    <h2 class="text-2xl font-bold mb-4 text-gray-800">Data Barang</h2>

    @if (session('success'))
        <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif

    @if ($items->isEmpty())
        <p class="text-gray-500">Tidak ada barang di gudang saat ini.</p>
    @else
        <div class="overflow-x-auto shadow-md rounded-lg">
            <table class="min-w-full bg-white border-collapse">
                <!-- Updated table header to navy blue with white text -->
                <thead class="bg-blue-900">
                    <tr>
                        <th class="px-6 py-3 border border-blue-900 text-left text-white font-semibold">No</th>
                        <th class="px-6 py-3 border border-blue-900 text-left text-white font-semibold">Nama Barang</th>
                        <th class="px-6 py-3 border border-blue-900 text-left text-white font-semibold">Jumlah</th>
                        <th class="px-6 py-3 border border-blue-900 text-left text-white font-semibold">Deskripsi</th>
                        <th class="px-6 py-3 border border-blue-900 text-left text-white font-semibold">Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($items as $key => $item)
                        <!-- Added row number and tanggal column, updated styling -->
                        <tr class="hover:bg-gray-50 border-b border-gray-200">
                            <td class="px-6 py-3 border border-gray-200 text-gray-800">{{ $key + 1 }}</td>
                            <td class="px-6 py-3 border border-gray-200 text-gray-800">{{ $item->name }}</td>
                            <td class="px-6 py-3 border border-gray-200 text-gray-800">{{ $item->quantity }}</td>
                            <td class="px-6 py-3 border border-gray-200 text-gray-800">{{ $item->description ?? '-' }}</td>
                            <td class="px-6 py-3 border border-gray-200 text-gray-800">{{ $item->created_at->format('d-m-Y') ?? '-' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
@endsection
