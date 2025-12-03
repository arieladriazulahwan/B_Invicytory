@extends('layouts.default-layout')

@section('title', 'Edit Barang Masuk')

@section('content')
<h2 class="text-xl font-semibold mb-4">Edit Barang Masuk</h2>

@if ($errors->any())
    <!-- Updated error message styling to match theme -->
    <div class="bg-red-50 border border-red-300 text-red-800 p-3 rounded mb-4">
        <ul class="list-disc list-inside text-sm">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('incoming.update', $incoming->id) }}" method="POST" class="space-y-4">
    @csrf 
    @method('PUT')

    <div>
        <label class="block mb-1 font-medium">Nama Barang</label>
        <!-- Updated input border and focus ring to navy blue theme -->
        <input type="text" 
               name="name" 
               value="{{ old('name', $incoming->item_name ?? $incoming->name) }}" 
               class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-900" 
               required>
    </div>

    <div>
        <label class="block mb-1 font-medium">Jumlah</label>
        <input type="number" 
               name="quantity" 
               value="{{ old('quantity', $incoming->quantity) }}" 
               class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-900" 
               required>
    </div>

    <div>
        <label class="block mb-1 font-medium">Keterangan</label>
        <textarea name="description" 
                  class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-900" 
                  rows="3">{{ old('description', $incoming->description) }}</textarea>
    </div>

    <div class="flex justify-between items-center mt-4">
        <!-- Updated button colors to navy blue and gray theme -->
        <a href="{{ route('incoming.index') }}" class="bg-gray-400 text-white px-4 py-2 rounded hover:bg-gray-500">
            Kembali
        </a>
        <button class="bg-blue-900 text-white px-4 py-2 rounded hover:bg-blue-800">
            Update
        </button>
    </div>
</form>
@endsection
