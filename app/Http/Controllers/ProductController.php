<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;




class ProductController extends Controller
{
    public function index(Request $request)
    {

        $query = Product::query();
        if ($request->has('search')) {
            $query -> where('name' , 'like' , '%' . $request->search.'%');
        }
        $products = $query->get();
        return view('Produk.produk-gorden', compact('products'));


    }

    public function AdminProduk()
    {
        $produk = [
            ['nama' => 'Arla Kentut', 'deskripsi' => 'Cocok', 'harga' => 'Rp. 1.000.000', 'stock' => 10, 'gambar' => 'path/to/image1.jpg', 'jenis' => 'Gorden 1'],
            ['nama' => 'Arla Kentut 1', 'deskripsi' => 'Acc', 'harga' => 'Rp. 1.000.000', 'stock' => 23, 'gambar' => 'path/to/image2.jpg', 'jenis' => 'Gorden 2'],
        ];

        return view('produk.AdminProduk', compact('produk'));

    }

    public function create()
    {
        // Menampilkan form tambah produk
        return view('produk.CreateProduk');
    }

    public function store(Request $request)
    {
        // Validasi data
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'harga' => 'required|numeric',
            'stock' => 'required|integer',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Simpan gambar jika ada
        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('public/produk');
            $validatedData['gambar'] = $path;
        }

        // Simpan data ke database (sesuaikan dengan model dan tabel Anda)
        DB::table('produk')->insert($validatedData);

        // Redirect ke halaman admin produk
        return redirect()->route('produk.admin')->with('success', 'Produk berhasil ditambahkan!');
        // return view('Produk.produk-gorden', compact('products'));
    }
}


