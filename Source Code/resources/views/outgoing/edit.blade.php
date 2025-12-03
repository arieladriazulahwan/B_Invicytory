@extends('layouts.default-layout')

@section('title', 'Edit Barang Keluar')

@section('content')
<h2 class="text-xl font-semibold mb-4">Edit Barang Keluar</h2>

@if(session('error'))
    <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
        {{ session('error') }}
    </div>
@endif

<form action="{{ route('outgoing.update', $outgoing->id) }}" method="POST" class="space-y-4 max-w-lg">
    @csrf
    @method('PUT')

    {{-- PILIH BARANG --}}
    <div>
        <label class="block font-semibold text-gray-700 mb-2">Pilih Barang</label>
        <select name="item_id" class="w-full border border-gray-300 p-3 rounded bg-white focus:outline-none focus:ring-2 focus:ring-blue-900" required>
            @foreach($items as $item)
                <option value="{{ $item->id }}" 
                    {{ $outgoing->item_id == $item->id ? 'selected' : '' }}>
                    {{ $item->name }} (Stok: {{ $item->quantity }})
                </option>
            @endforeach
        </select>
    </div>

    {{-- JUMLAH --}}
    <div>
        <label class="block font-semibold text-gray-700 mb-2">Jumlah</label>
        <input type="number" 
               name="quantity" 
               value="{{ $outgoing->quantity }}" 
               class="w-full border border-gray-300 p-3 rounded bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-900" 
               required>
    </div>

    {{-- KETERANGAN --}}
    <div>
        <label class="block font-semibold text-gray-700 mb-2">Keterangan</label>
        <textarea name="description" class="w-full border border-gray-300 p-3 rounded bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-900" rows="4">{{ $outgoing->description }}</textarea>
    </div>

    {{-- BUTTONS --}}
    <div class="flex gap-3 pt-4">
        <button type="submit" class="bg-blue-900 text-white px-6 py-2 rounded hover:bg-blue-800 transition">
            Update
        </button>
        <a href="{{ route('outgoing.index') }}" class="bg-gray-400 text-white px-6 py-2 rounded hover:bg-gray-500 transition">
            Kembali
        </a>
    </div>
</form>

@endsection
