@extends('layouts.default-layout')

@section('title', 'Edit Kategori')

@section('content')
    <h2 class="text-2xl font-bold mb-6">Edit Kategori</h2>

    <form action="{{ route('categories.update', $category->id) }}" method="POST" class="bg-white p-6 rounded shadow max-w-md">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="name" class="block mb-2 font-semibold text-gray-700">Nama Kategori</label>
            <input type="text" name="name" id="name" value="{{ $category->name }}" 
                   class="w-full border border-gray-300 p-3 rounded bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-900" 
                   required>
            @error('name')
                <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
            @enderror
        </div>

        <div class="flex gap-2">
            <button type="submit" class="bg-blue-900 hover:bg-blue-800 text-white px-4 py-2 rounded transition">
                Update Kategori
            </button>
            <a href="{{ route('categories.index') }}" class="bg-gray-400 hover:bg-gray-500 text-white px-4 py-2 rounded transition">
                Kembali
            </a>
        </div>
    </form>
@endsection
