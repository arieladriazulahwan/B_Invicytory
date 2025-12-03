@extends('layouts.default-layout')

@section('title', 'Data Pesanan')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h2 class="text-3xl font-bold text-gray-800">Pemesanan</h2>
    <a href="{{ route('orders.create') }}" 
       class="bg-blue-900 hover:bg-blue-950 text-white px-5 py-2 rounded-lg shadow">
        + Tambah Pesanan
    </a>
</div>

<div class="bg-white shadow rounded-lg overflow-hidden border border-gray-200">
    <table class="min-w-full">
        <!-- Updated table header to navy blue with white text -->
        <thead class="bg-blue-900 text-white">
            <tr>
                <th class="border border-gray-300 px-4 py-3 text-left font-semibold">No</th>
                <th class="border border-gray-300 px-4 py-3 text-left font-semibold">Nama Barang</th>
                <th class="border border-gray-300 px-4 py-3 text-center font-semibold">Jumlah</th>
                <th class="border border-gray-300 px-4 py-3 text-right font-semibold">Harga / Item (Rp)</th>
                <th class="border border-gray-300 px-4 py-3 text-right font-semibold">Subtotal (Rp)</th>
                <th class="border border-gray-300 px-4 py-3 text-center font-semibold">Tindakan</th>
                <th class="border border-gray-300 px-4 py-3 text-center font-semibold">Total</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($orders as $order)
                @php $grandTotal = 0; $rowIndex = 1; @endphp

                @foreach ($order->products as $product)
                    @php 
                        $qty = $product->pivot->quantity ?? 1;
                        $totalPrice = $product->pivot->price ?? 0;
                        $pricePerItem = $totalPrice / max($qty, 1);
                        $subtotal = $pricePerItem * $qty;
                        $grandTotal += $subtotal;
                    @endphp

                    <tr class="hover:bg-gray-50 transition border-b border-gray-200">
                        <!-- Added No column and updated rowspan for consistency -->
                        @if ($loop->first)
                            <td class="border border-gray-300 px-4 py-2 font-semibold text-gray-800 text-center" 
                                rowspan="{{ $order->products->count() + 1 }}">
                                {{ $loop->parent->index + 1 }}
                            </td>
                        @endif

                        <td class="border border-gray-300 px-4 py-2 text-gray-800">{{ $product->name }}</td>

                        <td class="border border-gray-300 px-4 py-2 text-center text-gray-800">{{ $qty }}</td>

                        <td class="border border-gray-300 px-4 py-2 text-right text-gray-800">
                            {{ number_format($pricePerItem, 0, ',', '.') }}
                        </td>

                        <td class="border border-gray-300 px-4 py-2 text-right text-gray-800">
                            {{ number_format($subtotal, 0, ',', '.') }}
                        </td>

                        <!-- Updated Edit/Delete buttons to cyan and red text links -->
                        @if ($loop->first)
                            <td class="border border-gray-300 px-4 py-2 text-center" 
                                rowspan="{{ $order->products->count() + 1 }}">
                                <div class="flex justify-center space-x-3">
                                    <a href="{{ route('orders.edit', $order->id) }}"
                                       class="text-cyan-500 hover:text-cyan-700 font-medium">
                                        Edit
                                    </a>
                                    <form action="{{ route('orders.destroy', $order->id) }}" method="POST"
                                          onsubmit="return confirm('Yakin ingin menghapus pesanan ini?')" class="inline">
                                        @csrf @method('DELETE')
                                        <button type="submit" 
                                                class="text-red-600 hover:text-red-800 font-medium cursor-pointer bg-none border-none p-0">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        @endif
                    </tr>
                @endforeach

                <!-- Updated total row styling with navy blue background -->
                <tr class="bg-blue-50 font-semibold border-b border-gray-300">
                    <td colspan="4" class="border border-gray-300 px-4 py-2 text-right text-gray-800">Total Pesanan</td>
                    <td class="border border-gray-300 px-4 py-2 text-right text-gray-800">
                        {{ number_format($grandTotal, 0, ',', '.') }}
                    </td>
                    <td class="border border-gray-300"></td>
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
