@extends('layouts.app2')

@section('title', 'Detail Pesanan')

@section('content')
<div class="max-w-4xl mx-auto mt-10">
    <div class="bg-white shadow-md rounded-lg p-6">
        <h2 class="text-2xl font-bold mb-4 text-gray-800">Detail Transaksi #{{ $transaksi->id }}</h2>
        <div class="grid grid-cols-2 gap-4 text-sm text-gray-600">
            <div><strong>Total Harga:</strong> Rp {{ number_format($transaksi->total_harga) }}</div>
            <div><strong>Status:</strong> <span class="capitalize">{{ $transaksi->status }}</span></div>
            <div><strong>No HP:</strong> {{ $transaksi->no_hp }}</div>
            <div><strong>Alamat Pengiriman:</strong> {{ $transaksi->alamat_pengiriman }}</div>
            <div><strong>Tanggal Transaksi:</strong> {{ $transaksi->tanggal_transaksi }}</div>
            <div><strong>Metode Pembayaran:</strong> {{ ucfirst($transaksi->metode_pembayaran) }}</div>
        </div>
    </div>

    <div class="mt-8">
        <h3 class="text-xl font-semibold text-gray-700 mb-3">Daftar Menu</h3>
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500 border border-gray-200">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th class="px-6 py-3">Menu</th>
                        <th class="px-6 py-3">Jumlah</th>
                        <th class="px-6 py-3">Harga</th>
                        <th class="px-6 py-3">Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transaksi->detailTransaksi as $item)
                        <tr class="bg-white border-b">
                            <td class="px-6 py-4 font-medium text-gray-900">
                                {{ $item->menu->nama ?? 'Menu tidak ditemukan' }}
                            </td>
                            <td class="px-6 py-4">{{ $item->jumlah }}</td>
                            <td class="px-6 py-4">Rp {{ number_format($item->harga) }}</td>
                            <td class="px-6 py-4">Rp {{ number_format($item->subtotal) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-6 text-right">
            <a href="{{ route('pesanan.cetak', $transaksi->id) }}" target="_blank"
               class="inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                🧾 Cetak Struk
            </a>
        </div>
    </div>
</div>
@endsection