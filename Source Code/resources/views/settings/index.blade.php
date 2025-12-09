@extends('layouts.default-layout')

@section('title', 'Pengaturan')

@section('content')

{{-- Notification --}}
@if (session('success'))
<div class="mb-4 p-3 bg-green-500 text-white rounded shadow">
    {{ session('success') }}
</div>
@endif

@if ($errors->any())
<div class="mb-4 p-3 bg-red-500 text-white rounded shadow">
    <ul class="list-disc pl-4">
        @foreach ($errors->all() as $err)
            <li>{{ $err }}</li>
        @endforeach
    </ul>
</div>
@endif

<h2 class="text-3xl font-bold mb-6 flex items-center justify-between text-blue-900">
    Pengaturan Aplikasi
</h2>

<div class="grid md:grid-cols-2 gap-6">

    {{-- ===========================
        1. UPDATE PROFILE
    ============================ --}}
    <div class="bg-blue-900 p-6 shadow rounded text-white">
        <h3 class="text-xl font-semibold mb-4">Profil Pengguna</h3>

        <form action="{{ route('settings.updateProfile') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf

            <div>
                <label class="font-medium block mb-1">Nama</label>
                <input type="text" name="name" value="{{ auth()->user()->name }}"
                    class="w-full border border-gray-300 p-2 rounded text-blue-900" required>
            </div>

            <div>
                <label class="font-medium block mb-1">Email</label>
                <input type="email" name="email" value="{{ auth()->user()->email }}"
                    class="w-full border border-gray-300 p-2 rounded text-blue-900" required>
            </div>

            <div>
                <label class="font-medium block mb-1">Foto Profil</label>
                <input type="file" name="profile_photo" class="w-full border border-gray-300 p-2 rounded text-black-900" accept="image/*">

                {{-- Preview --}}
                @if (auth()->user()->profile_photo)
                    <img src="{{ asset('storage/profile/' . auth()->user()->profile_photo) }}"
                        class="w-20 h-20 rounded-full mt-2 object-cover border">
                @endif
            </div>

            {{-- Updated button color from blue-600 to cyan --}}
            <button class="bg-cyan-500 text-white px-4 py-2 rounded hover:bg-cyan-600">
                Update Profil
            </button>
        </form>
    </div>

    {{-- ===========================
        2. UPDATE PASSWORD
    ============================ --}}
    <div class="bg-blue-900 p-6 shadow rounded text-white">
        <h3 class="text-xl font-semibold mb-4">Ganti Password</h3>

        <form action="{{ route('settings.updatePassword') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label class="font-medium block mb-1">Password Baru</label>
                <input type="password" name="new_password" class="w-full border border-gray-300 p-2 rounded text-blue-900" required>
            </div>

            <div>
                <label class="font-medium block mb-1">Konfirmasi Password Baru</label>
                <input type="password" name="new_password_confirmation" class="w-full border border-gray-300 p-2 rounded text-blue-900"
                    required>
            </div>

            {{-- Updated button color from yellow-600 to cyan --}}
            <button class="bg-cyan-500 text-white px-4 py-2 rounded hover:bg-cyan-600">
                Update Password
            </button>
        </form>
    </div>

    {{-- ===========================
        3. INFO SETTING GUDANG
    ============================ --}}
    <div class="bg-blue-900 p-6 shadow rounded md:col-span-2 text-white">
        <h3 class="text-xl font-semibold mb-4">Informasi Gudang</h3>

        @php
            $setting = \App\Models\Setting::first();
        @endphp

        <form action="{{ route('settings.updateWarehouse') }}" method="POST" enctype="multipart/form-data"
            class="grid md:grid-cols-3 gap-4">
            @csrf

            <div>
                <label class="font-medium block mb-1">Nama Gudang</label>
                <input type="text" name="warehouse_name"
                    value="{{ $setting->warehouse_name ?? '' }}"
                    class="w-full border border-gray-300 p-2 rounded text-blue-900">
            </div>

            <div>
                <label class="font-medium block mb-1">Alamat Gudang</label>
                <input type="text" name="warehouse_address"
                    value="{{ $setting->warehouse_address ?? '' }}"
                    class="w-full border border-gray-300 p-2 rounded text-blue-900">
            </div>

            <div>
                <label class="font-medium block mb-1">Telepon Gudang</label>
                <input type="text" name="warehouse_phone"
                    value="{{ $setting->warehouse_phone ?? '' }}"
                    class="w-full border border-gray-300 p-2 rounded text-blue-900">
            </div>

            <div class="col-span-3">
                <label class="font-medium block mb-1">Logo Gudang</label>
                <input type="file" name="warehouse_logo" accept="image/*"
                    class="w-full border border-gray-300 p-2 rounded text-black-900">

                @if ($setting && $setting->warehouse_logo)
                    <img src="{{ asset('storage/logo/' . $setting->warehouse_logo) }}"
                        class="w-28 h-28 mt-2 border rounded object-cover">
                @endif
            </div>

            <div class="col-span-3">
                {{-- Updated button color from green-600 to cyan --}}
                <button class="bg-cyan-500 text-white px-6 py-2 rounded hover:bg-cyan-600 w-full">
                    Simpan Pengaturan Gudang
                </button>
            </div>
        </form>
    </div>

</div>

@endsection
