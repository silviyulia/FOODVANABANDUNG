<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Struk Transaksi #{{ $transaksi->id }}</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #000; padding: 6px; text-align: left; }
        h2 { margin-bottom: 0; }
    </style>
</head>
<body>
    <h2 style="text-align: center;">Foodvana</h2>
    <hr>

    <p><strong>ID Transaksi:</strong> {{ $transaksi->id }}</p>
    <p><strong>Nomor Struk:</strong> STRK-{{ str_pad($transaksi->id, 6, '0', STR_PAD_LEFT) }}</p>
    <p><strong>Tanggal:</strong> {{ $transaksi->tanggal_transaksi }}</p>
    <p><strong>No HP:</strong> {{ $transaksi->no_hp }}</p>
    <p><strong>Alamat:</strong> {{ $transaksi->alamat_pengiriman }}</p>

    <table>
        <thead>
            <tr>
                <th>Menu</th>
                <th>Jumlah</th>
                <th>Harga</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transaksi->detailTransaksi as $item)
                <tr>
                    <td>{{ $item->menu->nama ?? '-' }}</td>
                    <td>{{ $item->jumlah }}</td>
                    <td>Rp {{ number_format($item->harga_satuan, 0, ',', '.') }}</td>
                    <td>Rp {{ number_format($item->subtotal, 0, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <p style="text-align: right; margin-top: 10px;">
        <strong>Total:</strong> Rp {{ number_format($transaksi->total_harga) }}
    </p>

    <hr>
    <p style="text-align: center; font-size: 10px;">Terima kasih telah berbelanja di Foodvana </p>
</body>
</html>