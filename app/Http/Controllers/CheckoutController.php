<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\OrderItem;

class CheckoutController extends Controller
{
    // Tampilkan halaman checkout
    public function index()
    {
        $keranjang = session()->get('keranjang', []);
        $total = 0;
        foreach ($keranjang as $item) {
            $total += ($item['harga'] ?? 0) * ($item['quantity'] ?? 1);
        }
        return view('customer.auth.Checkout', compact('keranjang', 'total'));
    }

    // Proses checkout (simpan order)
    public function store(Request $request)
    {
        $keranjang = session()->get('keranjang', []);
        if (empty($keranjang)) {
            return redirect()->back()->with('error', 'Keranjang belanja kosong.');
        }

        // Simpan order utama
        $order = Order::create([
            'user_id' => Auth::id(),
            'alamat' => $request->input('alamat'),
            'total' => array_sum(array_map(function($item) {
                return ($item['harga'] ?? 0) * ($item['quantity'] ?? 1);
            }, $keranjang)),
            'status' => 'pending',
        ]);

        // Simpan detail order
        foreach ($keranjang as $produk_id => $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'produk_id' => $produk_id,
                'nama_produk' => $item['nama'] ?? '',
                'harga' => $item['harga'] ?? 0,
                'quantity' => $item['quantity'] ?? 1,
            ]);
        }

        // Kosongkan keranjang
        session()->forget('keranjang');

        return redirect()->route('dashboard')->with('success', 'Pesanan berhasil dibuat!');
    }
}