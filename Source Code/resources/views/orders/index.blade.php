@extends('layouts.default-layout')

@section('title', 'Data Pesanan')

@section('content')
<div class="flex justify-between mb-6">
    <h2 class="text-3xl font-bold">Data Pesanan</h2>
    <a href="{{ route('orders.create') }}" 
       class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-lg shadow">
        + Pesanan Baru
    </a>
</div>

<div class="bg-white shadow rounded-lg overflow-hidden">
    <table class="min-w-full border">
        <thead class="bg-gray-100 text-gray-700">
            <tr>
                <th class="border px-4 py-2 text-left">Tanggal Pesanan</th>
                <th class="border px-4 py-2 text-left">Produk</th>
                <th class="border px-4 py-2 text-center">Jumlah</th>
                <th class="border px-4 py-2 text-right">Harga / Item (Rp)</th>
                <th class="border px-4 py-2 text-right">Subtotal (Rp)</th>
                <th class="border px-4 py-2 text-center">Aksi</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($orders as $order)
                @php $grandTotal = 0; @endphp

                @foreach ($order->products as $product)
                    @php 
                        $qty = $product->pivot->quantity ?? 1;
                        $totalPrice = $product->pivot->price ?? 0;

                        // Harga per item = total harga / jumlah
                        $pricePerItem = $totalPrice / max($qty, 1);

                        // Subtotal
                        $subtotal = $pricePerItem * $qty;
                        $grandTotal += $subtotal;
                    @endphp

                    <tr class="hover:bg-gray-50 transition">
                        {{-- Tanggal hanya ditampilkan sekali --}}
                        @if ($loop->first)
                            <td class="border px-4 py-2 font-semibold text-gray-800" 
                                rowspan="{{ $order->products->count() }}">
                                {{ $order->order_date }}
                            </td>
                        @endif

                        <td class="border px-4 py-2">{{ $product->name }}</td>

                        <td class="border px-4 py-2 text-center">{{ $qty }}</td>

                        <td class="border px-4 py-2 text-right">
                            {{ number_format($pricePerItem, 0, ',', '.') }}
                        </td>

                        <td class="border px-4 py-2 text-right">
                            {{ number_format($subtotal, 0, ',', '.') }}
                        </td>

                        {{-- Tombol Edit & Hapus hanya sekali --}}
                        @if ($loop->first)
                            <td class="border px-4 py-2 text-center" 
                                rowspan="{{ $order->products->count() }}">
                                <div class="flex justify-center space-x-2">

                                    <a href="{{ route('orders.edit', $order->id) }}"
                                       class="bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded shadow">
                                        Edit
                                    </a>

                                    <form action="{{ route('orders.destroy', $order->id) }}" method="POST"
                                          onsubmit="return confirm('Yakin ingin menghapus pesanan ini?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" 
                                                class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded shadow">
                                            Hapus
                                        </button>
                                    </form>

                                </div>
                            </td>
                        @endif
                    </tr>
                @endforeach

                {{-- TOTAL PER ORDER --}}
                <tr class="bg-gray-100 font-semibold">
                    <td colspan="4" class="border px-4 py-2 text-right">Total Pesanan</td>
                    <td class="border px-4 py-2 text-right">
                        {{ number_format($grandTotal, 0, ',', '.') }}
                    </td>
                    <td class="border"></td>
                </tr>

            @empty
                <tr>
                    <td colspan="6" class="text-center py-6 text-gray-500">
                        Belum ada data pesanan.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection
