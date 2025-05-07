<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
    <div class="container mx-auto mt-8">
        <h1 class="text-2xl font-bold mb-4">Tambah Produk</h1>
        <form action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="nama" class="block text-gray-700">Nama Produk</label>
                <input type="text" id="nama" name="nama" class="border border-gray-300 p-2 w-full" required>
            </div>
            <div class="mb-4">
                <label for="deskripsi" class="block text-gray-700">Deskripsi</label>
                <textarea id="deskripsi" name="deskripsi" class="border border-gray-300 p-2 w-full" required></textarea>
            </div>
            <div class="mb-4">
                <label for="harga" class="block text-gray-700">Harga</label>
                <input type="number" id="harga" name="harga" class="border border-gray-300 p-2 w-full" required>
            </div>
            <div class="mb-4">
                <label for="stock" class="block text-gray-700">Stock</label>
                <input type="number" id="stock" name="stock" class="border border-gray-300 p-2 w-full" required>
            </div>
            <div class="mb-4">
                <label for="gambar" class="block text-gray-700">Gambar</label>
                <input type="file" id="gambar" name="gambar" class="border border-gray-300 p-2 w-full">
            </div>
            <div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Simpan</button>
            </div>
        </form>
    </div>
</body>
</html>
