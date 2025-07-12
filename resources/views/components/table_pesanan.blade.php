
<div class="container mt-5">
   

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-700">
            <thead class="text-xs text-gray-800 uppercase bg-gray-200">
                <tr class="text-center">
                    <th scope="col" class="px-4 py-3">ID</th>
                    <th scope="col" class="px-4 py-3">id User</th>
                    <th scope="col" class="px-4 py-3">Total Harga</th>
                    <th scope="col" class="px-4 py-3">Alamat</th>
                    <th scope="col" class="px-4 py-3">No HP</th>
                    <th scope="col" class="px-4 py-3">Pembayaran</th>
                    <th scope="col" class="px-4 py-3">Status</th>
                    <th scope="col" class="px-4 py-3">Tanggal</th>
                    <!-- <th scope="col" class="px-4 py-3">Aksi</th> -->
                </tr>
            </thead>


            <tbody>
                @forelse ($transaksis as $transaksi)
                 <tr class="bg-white border-b hover:bg-gray-50 text-center">
                    <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap">{{ $transaksi->id }}</td>
                    <td class="px-4 py-2">{{ $transaksi->id_user }}</td>                    
                    <td class="px-4 py-2">Rp {{ number_format($transaksi->total_harga, 0, ',', '.') }}</td>
                    <td class="px-4 py-2">{{ $transaksi->alamat_pengiriman }}</td>
                    <td class="px-4 py-2">{{ $transaksi->no_hp }}</td>
                    <td class="px-4 py-2">{{ ucfirst(str_replace('_', ' ', $transaksi->metode_pembayaran)) }}</td>
                    <td class="px-4 py-2">
                        <form action="{{ route('admin.pesanan.updateStatus', $transaksi->id) }}" method="POST">
                            @csrf


                            <select name="status" class="form-select form-select-sm" onchange="this.form.submit()">
                                <option value="pending" {{ $transaksi->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="diproses"{{ $transaksi->status == 'diproses' ? 'selected' : '' }}>Diproses</option>
                                <option value="selesai" {{ $transaksi->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                            </select>
                        </form>
                    </td>

                    <td class="px-4 py-2">{{ \Carbon\Carbon::parse($transaksi->tanggal_transaksi)->translatedFormat('d F Y, H:i') }}</td>

                    <!-- <td>
                        <a href="{{ route('admin.show', $transaksi->id) }}" class="btn btn-sm btn-outline-primary">Detail</a>
                    </td> -->
                </tr>
                @empty
                <tr>
                    <td colspan="9">Belum ada pesanan.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
