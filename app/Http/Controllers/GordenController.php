<?php

namespace App\Http\Controllers;

use App\Models\Gorden;
use App\Models\JenisGorden;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GordenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.gorden_index', ['gordens' => Gorden::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.add_gorden_admin", ["JenisGorden" => JenisGorden::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            "nama_gorden" => ["min:3", "required", "string"],
            "deskripsi" => ["nullable", "string"],
            "harga" => ["required", "numeric"],
            "stok" => ["nullable", "numeric"],
            "gambar" => ["nullable", "mimes:jpg,jpeg,webp,png", "max:2048"],
            'jenis_id' => ['required', 'exists:jenis_gordens,id'],
        ]);

        if ($request->hasFile("gambar")) {
            $Gambar = Str::uuid()->toString() . '.' . $request->gambar->extension();
            $request->gambar->storeAs('GambarGorden', $Gambar, 'public');
            $validated['gambar'] = $Gambar;
        }

        $gorden = Gorden::create([
            'nama_gorden' => $validated['nama_gorden'],
            'deskripsi' => $validated['deskripsi'] ?? null,
            'harga' => $validated['harga'],
            'stok' => $validated['stok'] ?? 0,
            'gambar' => $validated['gambar'] ?? null,
            'jenis_id' => $validated['jenis_id'],
        ]);
        if ($gorden) {
            return redirect()->route('admin.indexgorden')->with('success', 'data product sudah ditambahakan.');
        }
        return back()->with('error', 'data gorden gagal ditambahakan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Gorden $gorden)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gorden $gorden)
    {
        return view("admin.edit_gorden_admin", data: ['gorden' => $gorden, "JenisGorden" => JenisGorden::all()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Gorden $gorden)
    {
        $validated = $request->validate([
            "nama_gorden" => ["min:3", "required", "string"],
            "deskripsi" => ["nullable", "string"],
            "harga" => ["required", "numeric"],
            "stok" => ["required", "integer", "min:0"],
            "gambar" => ["nullable", "mimes:jpg,jpeg,webp,png", "max:2048"],
            'jenis_id' => ['required', 'exists:jenis_gordens,id'],
        ]);

        if ($request->hasFile("gambar")) {
            $Gambar = Str::uuid()->toString() . '.' . $request->gambar->extension();
            $request->gambar->storeAs('GambarGorden', $Gambar, 'public');
            $validated['gambar'] = $Gambar;
        } 

        $data = $gorden->update([
            'nama_gorden' => $validated['nama_gorden'] ?? $gorden->nama_gorden,
            'deskripsi' => $validated['deskripsi'] ?? $gorden->deskripsi,
            'harga' => $validated['harga'] ?? $gorden->harga,
            'stok' => $validated['stok'] ?? $gorden->stok,
            'gambar' => $validated['gambar'] ?? $gorden->gambar,
            'jenis_id' => $validated['jenis_id'] ?? $gorden->jenis_id,
        ]);
        if ($data) {
            return redirect()->route('admin.indexgorden')->with('success', 'data product sudah ditambahakan.');
        }
        return back()->with('error', 'data gorden gagal ditambahakan.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gorden $gorden)
    {
        if ($gorden->delete()) {
            return redirect()->route('admin.indexgorden')->with('success', 'data product sudah ditambahakan.');
        }
        return back()->with('error', 'data gorden gagal ditambahakan.');
    }
}
