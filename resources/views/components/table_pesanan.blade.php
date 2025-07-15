<div class="container mt-6">
    @if(session('success'))
        <div class="mb-4 text-green-700 bg-green-100 border border-green-200 text-sm px-4 py-2 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-700"> 
        <caption class="p-5 text-lg font-semibold text-left rtl:text-right text-gray-900 bg-white">Daftar Pesanan Masuk
        </caption>
                <thead class="text-xs uppercase bg-gray-200 text-gray-700">
                    <tr class="text-center">
                        <th class="px-4 py-3">ID</th>
                        <th class="px-4 py-3">User ID</th>
                        <th class="px-4 py-3">Total Harga</th>
                        <th class="px-4 py-3">Alamat</th>
                        <th class="px-4 py-3">No HP</th>
                        <th class="px-4 py-3">Pembayaran</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3">Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($transaksis as $transaksi)
                        <tr class="bg-white border-b hover:bg-gray-100 text-center">
                            <td class="px-4 py-2 font-medium">{{ $transaksi->id }}</td>
                            <td class="px-4 py-2">{{ $transaksi->id_user }}</td>
                            <td class="px-4 py-2">Rp {{ number_format($transaksi->total_harga, 0, ',', '.') }}</td>
                            <td class="px-4 py-2">{{ $transaksi->alamat_pengiriman }}</td>
                            <td class="px-4 py-2">{{ $transaksi->no_hp }}</td>
                            <td class="px-4 py-2">{{ ucfirst(str_replace('_', ' ', $transaksi->metode_pembayaran)) }}</td>
                            <td class="px-4 py-2">
                                <form action="{{ route('admin.pesanan.updateStatus', $transaksi->id) }}" method="POST">
                                    @csrf
                                    <select name="status" onchange="this.form.submit()"
                                            class="block w-full py-1.5 px-2 border border-gray-300 rounded-md text-sm text-gray-700 bg-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                                        <option value="pending" {{ $transaksi->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="diproses" {{ $transaksi->status == 'diproses' ? 'selected' : '' }}>Diproses</option>
                                        <option value="selesai" {{ $transaksi->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                                    </select>
                                </form>
                            </td>
                            <td class="px-4 py-2">{{ \Carbon\Carbon::parse($transaksi->tanggal_transaksi)->translatedFormat('d F Y, H:i') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="px-4 py-3 text-center text-gray-500">Belum ada pesanan masuk.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>