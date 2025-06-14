<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gorden;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Gorden::query();

        if ($request->has('search')) {
            $query->where('nama_gorden', 'like', '%' . $request->search . '%');
        }

        $products = $query->get();

        return view('Produk.produk-gorden', compact('products'));
    }

    public function create()
    {
        return view('Produk.CreateProduk');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_gorden' => 'required|string|max:255',
            'deskripsi'   => 'required|string',
            'harga'       => 'required|numeric',
            'stok'        => 'required|integer|min:0',
            'gambar'      => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'kategori'    => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('gambar')) {
            $validatedData['gambar'] = $request->file('gambar')->store('GambarGorden', 'public');
        }

        Gorden::create($validatedData);

        return redirect()->route('produk.admin')->with('success', 'Produk berhasil ditambahkan!');
    }

    public function show($id)
    {
        $product = Gorden::findOrFail($id);
        return view('Produk.DetailProduk', compact('product'));
    }

    public function tambahKeranjang(Request $request, $id)
    {
        $product = Gorden::findOrFail($id);
        $quantity = (int) $request->input('quantity', 1);

        if ($quantity > $product->stok) {
            return back()->with('error', 'Jumlah melebihi stok tersedia.');
        }

        $keranjang = session()->get('keranjang', []);

        if (isset($keranjang[$id])) {
            $newQuantity = $keranjang[$id]['quantity'] + $quantity;

            if ($newQuantity > $product->stok) {
                return back()->with('error', 'Jumlah total melebihi stok.');
            }

            $keranjang[$id]['quantity'] = $newQuantity;
        } else {
            $keranjang[$id] = [
                'nama'     => $product->nama_gorden,
                'harga'    => $product->harga,
                'quantity' => $quantity,
                'stok'     => $product->stok,
                'gambar'   => $product->gambar,
                'kategori' => $product->kategori ?? '-'
            ];
        }

        session()->put('keranjang', $keranjang);

        return back()->with('success', 'Produk berhasil ditambahkan ke keranjang!');
    }

    public function tampilkanKeranjang()
    {
        $keranjang = session()->get('keranjang', []);
        return view('customer.auth.keranjangPelanggan', compact('keranjang'));
    }

    public function hapusDariKeranjang($id)
    {
        $keranjang = session()->get('keranjang', []);

        if (isset($keranjang[$id])) {
            unset($keranjang[$id]);
            session()->put('keranjang', $keranjang);
        }

        return redirect()->route('keranjang.pelanggan')->with('success', 'Produk dihapus dari keranjang.');
    }

    public function dashboard()
    {
        $gordens = Gorden::all();
        return view('admin.dashboardLTE', compact('gordens'));
    }
}
