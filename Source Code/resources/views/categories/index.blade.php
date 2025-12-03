@extends('layouts.default-layout')

@section('title', 'Data Kategori')

@section('content')
<div class="flex justify-between items-center mb-4">
    <h2 class="text-2xl font-bold">Data Kategori</h2>
    <!-- button color changed from blue-500 to navy blue -->
    <a href="{{ route('categories.create') }}" class="bg-blue-900 text-white px-4 py-2 rounded hover:bg-blue-800">Tambah Kategori</a>
</div>

<!-- table styling updated with navy blue header -->
<table class="min-w-full bg-white border border-gray-200">
    <thead>
        <tr class="bg-blue-900 text-white">
            <th class="border border-gray-200 px-4 py-2 text-left">No</th>
            <th class="border border-gray-200 px-4 py-2 text-left">Nama Kategori</th>
            <th class="border border-gray-200 px-4 py-2 text-left">Tanggal</th>
            <th class="border border-gray-200 px-4 py-2 text-left">Tindakan</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($categories as $category)
        <!-- added No column and Tanggal column -->
        <tr class="hover:bg-gray-50">
            <td class="border border-gray-200 px-4 py-2">{{ $loop->iteration }}</td>
            <td class="border border-gray-200 px-4 py-2">{{ $category->name }}</td>
            <td class="border border-gray-200 px-4 py-2">{{ $category->created_at->format('d-m-Y') ?? '-' }}</td>
            <td class="border border-gray-200 px-4 py-2 flex space-x-2">
                <!-- changed edit link from yellow to cyan -->
                <a href="{{ route('categories.edit', $category->id) }}" class="text-cyan-500 hover:underline">Edit</a>
                <form action="{{ route('categories.destroy', $category->id) }}" method="POST" onsubmit="return confirm('Yakin hapus?')">
                    @csrf @method('DELETE')
                    <!-- changed delete button from red-500 to red-600 -->
                    <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
