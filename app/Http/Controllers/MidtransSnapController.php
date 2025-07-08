<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Midtrans\Config;
use Midtrans\Snap;
use App\Models\Transaksi;
use App\Models\CartItem;
use App\Models\DetailTransaksi;

class MidtransSnapController extends Controller
{
    public function __construct()
    {
        Config::$serverKey = config('services.midtrans.server_key');
        Config::$isProduction = config('services.midtrans.is_production');
        Config::$isSanitized = true;
        Config::$is3ds = true;
    }

    public function index()
    {
        return view('checkout');

    }

public function createTransaction(Request $request)
{
    // Konfigurasi Midtrans
    Config::$serverKey = config('services.midtrans.server_key');
    Config::$isProduction = false;
    Config::$isSanitized = true;
    Config::$is3ds = true;

    // Ambil user dari session
    $sessionUser = session('user');
    if (!$sessionUser || !isset($sessionUser['id'])) {
        return redirect()->route('checkout')->with('error', 'User tidak ditemukan dalam sesi.');
    }
    //validasi metode pembayaran
    $request->validate([
        'payment_method' => 'required|in:dana,gopay,ovo,transfer_bni,transfer_bri,transfer_mandiri,transfer_bca,cash',
    ]);


    $userId = $sessionUser['id'];
    $user = \App\Models\User::find($userId);
    if (!$user) {
        return redirect()->route('checkout')->with('error', 'User tidak ditemukan di database.');
    }

    $user->update(['midtrans_status' => 'pending']);

    // Validasi total harga
    $grossAmount = $request->input('total');
    if (!is_numeric($grossAmount) || $grossAmount <= 0) {
        return redirect()->route('checkout')->with('error', 'Total pembayaran tidak valid.');
    }

    // Ambil data checkout dari session
    $checkoutUser = session('checkout_user') ?? [];

    $firstName = $checkoutUser['username'] ?? $user->username;
    $email     = $checkoutUser['email'] ?? $user->email;
    $phone     = $checkoutUser['no_hp'] ?? $user->no_hp;
    $address   = $checkoutUser['alamat'] ?? $user->alamat;

    // Simpan transaksi utama
    $transaksi = Transaksi::create([
        'id_user' => $userId,
        'total_harga' => $grossAmount,
        'alamat_pengiriman' => $address,
        'no_hp' => $phone,
        'metode_pembayaran' => $request->input('payment_method') ?? 'midtrans',
        'status' => 'success',
        'tanggal_transaksi' => now(),
    ]);


    $cartItems = CartItem::where('id_user', $userId)->get();

    foreach ($cartItems as $item) {
        $hargaSatuan = $item->menu->harga;
        $jumlah = $item->jumlah;
        $subtotal = $hargaSatuan * $jumlah;
        DetailTransaksi ::create([
            'id_transaksi' => $transaksi->id,
            'id_menu' => $item->id_menu,
            'jumlah' => $jumlah,
            'harga_satuan' => $hargaSatuan,
            'subtotal' => $subtotal,
        ]);
    }

    // Hapus cart setelah berhasil simpan transaksi
    CartItem::where('id_user', $userId)->delete();

    // Buat parameter untuk Midtrans Snap
    $orderId = 'ORDER-' . $transaksi->id;
    $params = [
        'transaction_details' => [
            'order_id' => $orderId,
            'gross_amount' => $grossAmount,
        ],
        'customer_details' => [
            'first_name' => $firstName,
            'email' => $email,
            'phone' => $phone,
            'address' => $address,
        ],
    ];

    // Generate Snap token
    try {
        $snapToken = Snap::getSnapToken($params);
        return view('payment.confirmation', compact('snapToken','transaksi', 'cartItems'));
    } catch (\Exception $e) {
        return redirect()->route('checkout')->with('error', 'Gagal membuat transaksi: ' . $e->getMessage());
    }
}


    public function handleNotification(Request $request)
{
    $notif = new Notification();

    $transactionStatus = $notif->transaction_status;
    $orderId = $notif->order_id;
    $paymentType = $notif->payment_type;
    $fraudStatus = $notif->fraud_status;

    // Proses sesuai status
    if ($transactionStatus == 'capture') {
        if ($paymentType == 'credit_card') {
            if ($fraudStatus == 'challenge') {
                // Bayar challenge
            } else {
                // Bayar sukses
            }
        }

    } elseif ($transactionStatus == 'settlement') {
        // Pembayaran selesai
    } elseif ($transactionStatus == 'pending') {
        // Pembayaran pending
    } elseif ($transactionStatus == 'deny' || $transactionStatus == 'expire' || $transactionStatus == 'cancel') {
        // Pembayaran gagal
    }

    return response()->json(['message' => 'Notification handled']);
    }



    public function menu()
    {
    return $this->belongsTo(Menu::class, 'id_menu');
    }
}

//     public function paymentFinish(Request $request)
// {
//     // Ambil order_id dari query string Midtrans
//     $orderId = $request->get('order_id'); // e.g. ORDER-123

//     // Ambil ID transaksi dari order_id
//     $transaksiId = str_replace('ORDER-', '', $orderId);

//     // Cari transaksi
//     $transaksi = Transaksi::with('detailTransaksi.menu')->findOrFail($transaksiId);

//     // Tampilkan halaman sukses
//     return view('payment.success', compact('transaksi'));
// }
