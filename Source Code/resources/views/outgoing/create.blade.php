@extends('layouts.default-layout')

@section('title', 'Tambah Barang Keluar')

@section('content')
<div class="max-w-lg mx-auto bg-white p-6 shadow rounded-2xl">
    <h2 class="text-2xl font-semibold mb-4 text-blue-900">Tambah Barang Keluar</h2>

    {{-- Notifikasi error jika stok tidak cukup --}}
    @if(session('error'))
        <div class="bg-red-100 text-red-700 p-3 mb-4 rounded border border-red-300">
            {{ session('error') }}
        </div>
    @endif

    {{-- Form utama --}}
    <form action="{{ route('outgoing.store') }}" method="POST" class="space-y-4">
        @csrf

        {{-- Pilih Barang --}}
        <div>
            <label class="block font-semibold text-gray-700 mb-2">Pilih Barang</label>
            {{-- updated select styling with gray background and navy blue focus --}}
            <select name="item_id" class="w-full border border-gray-300 bg-gray-50 p-3 rounded focus:outline-none focus:ring-2 focus:ring-blue-900" required>
                <option value="">-- Pilih Barang --</option>
                @foreach($items as $item)
                    <option value="{{ $item->id }}">
                        {{ $item->name }} (Stok: {{ $item->quantity }})
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Jumlah Barang Keluar --}}
        <div>
            <label class="block font-semibold text-gray-700 mb-2">Jumlah Keluar</label>
            {{-- updated input styling with gray background and navy blue focus --}}
            <input type="number" name="quantity" class="w-full border border-gray-300 bg-gray-50 p-3 rounded focus:outline-none focus:ring-2 focus:ring-blue-900" min="1" required>
        </div>

        {{-- Keterangan --}}
        <div>
            <label class="block font-semibold text-gray-700 mb-2">Keterangan</label>
            {{-- updated textarea styling with gray background and navy blue focus --}}
            <textarea name="description" class="w-full border border-gray-300 bg-gray-50 p-3 rounded focus:outline-none focus:ring-2 focus:ring-blue-900 resize-none" rows="4"></textarea>
        </div>

        {{-- Tombol Simpan dan Kembali --}}
        <div class="flex gap-3 pt-4">
            {{-- changed button color from blue-600 to navy blue-900 --}}
            <button type="submit" class="flex-1 bg-blue-900 text-white px-4 py-2 rounded hover:bg-blue-950 transition font-semibold">
                Simpan
            </button>
            <a href="{{ route('outgoing.index') }}" class="flex-1 bg-gray-400 text-white px-4 py-2 rounded hover:bg-gray-500 transition font-semibold text-center">
                Kembali
            </a>
        </div>
    </form>
</div>
@endsection
