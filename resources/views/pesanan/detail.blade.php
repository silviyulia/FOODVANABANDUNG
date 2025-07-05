@extends('layouts.app2')

@section('title', 'Detail Pesanan')

@section('content')

    
    <div class="text-right">
        <a href="{{ url('/Foodvana/home') }}" class="inline-flex items-center px-2 py-2 text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 rounded-lg transition">
           <button type="button" class="btn btn-warning btn-lg px-2">
            <i class="fas fa-arrow-left mr-2"></i> back to home</button>
        </a>
    </div>
    <div class="max-w-5xl mx-auto px-4 py-8">
    @foreach ($transaksis as $transaksi)
            <div class="bg-white border border-gray-300 shadow-sm rounded-md p-3 mb-4 max-w-3xl mx-auto text-sm">            <h4 class="text-2xl font-semibold text-gray-800 mb-4">
                <i class="fas fa-receipt text-blue-600 mr-2"></i> Detail Transaksi #{{ $transaksi->id }}
            </h4>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-gray-700 text-sm">
                <div>
                    <p><span class="font-semibold">Total Harga:</span> Rp {{ number_format($transaksi->total_harga, 0, ',', '.') }}</p>
                    <p><span class="font-semibold">Status:</span> 
                        <span class="inline-block px-2 py-1 text-xs font-medium rounded bg-green-100 text-green-800 capitalize">
                            {{ $transaksi->status }}
                        </span>
                    </p>
                    <p><span class="font-semibold">No HP:</span> {{ $transaksi->no_hp }}</p>
                </div>
                <div>
                    <p><span class="font-semibold">Alamat Pengiriman:</span> {{ $transaksi->alamat_pengiriman }}</p>
                    <p><span class="font-semibold">Tanggal Transaksi:</span> {{ $transaksi->tanggal_transaksi }}</p>
                    <p><span class="font-semibold">Metode Pembayaran:</span> {{ ucfirst(str_replace('_', ' ', $transaksi->metode_pembayaran)) }}</p>
                </div>
            </div>

            <div class="mt-6">
                <h3 class="text-lg font-medium text-gray-700 mb-3">🧾 Daftar Menu</h3>
                <div class="overflow-x-auto">
                    <table class="w-full text-xs text-left text-gray-600 border border-gray-200 rounded-md shadow-sm">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-100">
                            <tr>
                                <th class="px-4 py-2">Menu</th>
                                <th class="px-4 py-2">Jumlah</th>
                                <th class="px-4 py-2">Harga</th>
                                <th class="px-4 py-2">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transaksi->detailTransaksi as $item)
                                <tr class="bg-white border-b hover:bg-gray-50">
                                    <td class="px-4 py-2 font-medium text-gray-900">
                                        {{ $item->menu->nama ?? 'Menu tidak ditemukan' }}
                                    </td>
                                    <td class="px-4 py-2">{{ $item->jumlah }}</td>
                                    <td class="px-4 py-2">Rp {{ number_format($item->harga_satuan, 0, ',', '.') }}</td>
                                    <td class="px-4 py-2">Rp {{ number_format($item->subtotal, 0, ',', '.') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endforeach

    
</div>
@endsection
