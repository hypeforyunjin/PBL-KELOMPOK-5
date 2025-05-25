<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;




class ProductController extends Controller
{
    public function index()
    {
        $products = [
            [
                'title' => 'Gorden 1',
                'subtitle' => 'Dark Gray',
                'price' => 2500000,
                'old_price' => 3500000,
                'tag' => '-30%',
                'tag_color' => 'bg-red-400',
                'image' => asset('img/Gorden 1.jpg'),
            ],
            [
                'title' => 'Gorden 2',
                'subtitle' => 'White',
                'price' => 2500000,
                'old_price' => null,
                'tag' => '-30%',
                'tag_color' => 'bg-red-400',
                'image' => asset('img/Gorden 2.jpg'),
            ],
            [
                'title' => 'Gorden 3',
                'subtitle' => 'Light Cream',
                'price' => 7000000,
                'old_price' => 14000000,
                'tag' => '-50%',
                'tag_color' => 'bg-red-400',
                'image' => asset('img/Gorden 3.jpg'),
            ],
            [
                'title' => 'Gorden 4',
                'subtitle' => 'Roller Blind',
                'price' => 500000,
                'old_price' => null,
                'tag' => 'New',
                'tag_color' => 'bg-teal-400',
                'image' => asset('img/Gorden 4.jpg'),
            ],
            [
                'title' => 'Gorden 5',
                'subtitle' => 'Super Dark Grey',
                'price' => 1500000,
                'old_price' => null,
                'tag' => null,
                'tag_color' => null,
                'image' => asset('img/Gorden 5.jpg'),
            ],
            [
                'title' => 'Gorden 6',
                'subtitle' => 'Vertical blind',
                'price' => 150000,
                'old_price' => null,
                'tag' => 'New',
                'tag_color' => 'bg-teal-400',
                'image' => asset('img/Gorden 6.jpg'),
            ],
            [
                'title' => 'Gorden 7',
                'subtitle' => 'Blue',
                'price' => 7000000,
                'old_price' => 14000000,
                'tag' => '-50%',
                'tag_color' => 'bg-red-400',
                'image' => asset('img/Gorden 7.jpg'),
            ],
            [
                'title' => 'Gorden 8',
                'subtitle' => 'Red',
                'price' => 500000,
                'old_price' => null,
                'tag' => 'New',
                'tag_color' => 'bg-teal-400',
                'image' => asset('img/Gorden 8.jpg'),
            ],
        ];

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


