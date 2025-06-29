<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Midtrans\Config;
use Midtrans\Snap;
use App\Models\Transaksi;
use App\Models\CartItem;

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
        Config::$isProduction = false; // Ubah jadi true jika sudah live
        Config::$isSanitized = true;
        Config::$is3ds = true;

        $userId = session('user')['id'];
        $user = \App\Models\User::find($userId);
        $user-> update([ 'midtrans_status' => 'pending' ]);
        $user-> save();

    
         // Ambil total harga dari request
        $grossAmount = $request->input('total');

        if (!is_numeric($grossAmount) || $grossAmount <= 0) {
            return redirect()->route('checkout')->with('error', 'Total pembayaran tidak valid. Mohon periksa kembali pesanan Anda.');
        }


        // $customUser = session('checkout_user');

        // $firstName = $customUser['username'] ?? $request->user()['username'];
        // $email     = $customUser['email'] ?? $request->user()['email'];
        // $phone     = $checkoutUser['no_hp'] ?? $user['no_hp']
        // $alamat = $checkoutUser['alamat'] ?? $user['alamat']

        $transaksis = Transaksi::create([
                'id_user' => $userId,
                'total_harga' => $grossAmount,
                'alamat_pengiriman' => $user->alamat,
                'no_hp' => $user-> no_hp,
                'metode_pembayaran' => 'midtrans','Gopay','dana','bni', 'Qris',
                'status' => 'success',
                'tanggal_transaksi' => now(),
            ]);
        // Bentuk parameter untuk Snap
        $orderId = 'ORDER-' . $transaksis->id;
        $params = [
            'transaction_details' => [
                'order_id' => $orderId,
                'gross_amount' => $grossAmount,
            ],
            'customer_details' => [
                'first_name' => $user->username,
                'email' => $user-> email,
                'phone' => $user-> no_hp,
                'Address' => $user->alamat,
            ],
            // 'product_details' => [
            //     'Product ID' => 
            //     'Product name' =>{{ $item->menu->nama }}
            //     'Quantity' => $
            //     'Price'=>
            //     'Subtotal' =>




            // ],

        ];

        // Membuat Snap Token
    $snapToken = \Midtrans\Snap::getSnapToken($params);
        return view('payment.confirmation', compact('snapToken', 'orderId'));
    }
    // return redirect()-> route('payment.success');

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

public function storeTransaction(Request $request)
{
    Transaksi::create([
        'id_user' => $userId,
        'total_harga' => $request->gross_amount,
        'alamat_pengiriman' => $request->alamat_pengiriman,
        'no_hp' => $request->no_hp,
        'metode_pembayaran' => 'midtrans',
        'status' => 'Sukses',
        'tanggal_transaksi' => now(),
    ]);

    return redirect()->route('home')->with('success', 'Transaksi berhasil disimpan!');
}
}

