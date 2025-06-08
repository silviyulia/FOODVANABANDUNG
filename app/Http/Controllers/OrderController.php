<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    // Tampilkan form edit
    public function edit($id)
    {
        $order = Order::findOrFail($id);
        return view('order.edit', compact('order'));
    }

  public function update(Request $request, $id)
{
    $order = Order::findOrFail($id);

    $validated = $request->validate([
        'nama' => 'required|string|max:255',
        'alamat' => 'required|string|max:255',
        'waktu' => 'required|in:ASAP,1 jam,2 jam',
        'pembayaran' => 'required|in:Credit Card,Cash',
    ]);

    $order->update($validated);

    return redirect()->route('order.index')->with('success', 'Pesanan berhasil diperbarui!');
}
}