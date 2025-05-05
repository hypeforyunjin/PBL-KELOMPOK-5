@extends('layouts.produkAdmin')

@section('content')
    <div class="container bg-white p-4 rounded shadow-sm">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Produk</a></li>
                <li class="breadcrumb-item active" aria-current="page">Dashboard Gorden</li>
            </ol>
        </nav>

        <a href="{{ route('produk.create') }}" class="btn btn-success mb-3">Tambah Produk</a>

        <table class="table table-bordered table-striped text-center align-middle">
            <thead class="table-light">
                <tr>
                    <th>No</th>
                    <th>Nama Gorden</th>
                    <th>Deskripsi</th>
                    <th>Harga</th>
                    <th>Stock</th>
                    <th>Gambar</th>
                    <th>Jenis</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($produks as $index => $produk)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $produk->nama }}</td>
                        <td>{{ $produk->deskripsi }}</td>
                        <td><strong>Rp. {{ number_format($produk->harga, 0, ',', '.') }}</strong></td>
                        <td>{{ $produk->stok }}</td>
                        <td>
                            <img src="{{ asset('storage/' . $produk->gambar) }}" alt="gambar" width="70">
                        </td>
                        <td>{{ $produk->jenis }}</td>
                        <td>
                            <a href="{{ route('produk.edit', $produk->id) }}" class="btn btn-primary btn-sm">✏️</a>
                            <form action="{{ route('produk.destroy', $produk->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">🗑️</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8">Belum ada produk.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        {{-- Tambahan daftar nama produk --}}
        <div class="mt-4">
            <h5>Daftar Nama Produk:</h5>
            <ul>
                @foreach ($produks as $produk)
                    <li>{{ $produk->nama }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
