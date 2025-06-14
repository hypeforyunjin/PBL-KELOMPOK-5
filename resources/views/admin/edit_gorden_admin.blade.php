<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">

<div class="flex">
    <!-- Sidebar -->
    <aside class="fixed top-0 left-0 w-64 h-screen bg-[#001f3f] text-white p-6">
        <h2 class="text-xl font-bold mb-6">Gorden Dashboard</h2>
        <nav>
            <ul>
                <li><a href="#" class="block py-2 px-4 hover:bg-slate-700 rounded">Dashboard</a></li>
                <li><a href="#" class="block py-2 px-4 bg-slate-700 rounded">Produk</a></li>
            </ul>
        </nav>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-10 ml-64">
        <h1 class="text-2xl font-bold mb-6">Edit Produk</h1>
        <div class="bg-white p-10 rounded-lg shadow-md">
            <form action="{{ route('admin.edit', $gorden->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Nama Produk -->
                <div class="grid grid-cols-3 gap-4 mb-4 items-center">
                    <label for="nama" class="font-bold">Nama Produk</label>
                    <input type="text" id="nama" name="nama_gorden" value="{{ $gorden->nama_gorden }}" class="col-span-2 bg-blue-50 p-2 rounded w-full" required>
                </div>

                <!-- Deskripsi -->
                <div class="grid grid-cols-3 gap-4 mb-4 items-center">
                    <label for="deskripsi" class="font-bold">Deskripsi</label>
                    <textarea id="deskripsi" name="deskripsi" rows="3" class="col-span-2 bg-blue-50 p-2 rounded w-full" required>{{ $gorden->deskripsi }}</textarea>
                </div>

                <!-- Harga -->
                <div class="grid grid-cols-3 gap-4 mb-4 items-center">
                    <label for="harga" class="font-bold">Harga</label>
                    <input type="number" id="harga" name="harga" value="{{ $gorden->harga }}" class="col-span-2 bg-blue-50 p-2 rounded w-full" required>
                </div>

                <!-- Stok -->
                <div class="grid grid-cols-3 gap-4 mb-4 items-center">
                    <label for="stok" class="font-bold">Stok</label>
                    <input type="number" id="stok" name="stok" value="{{ $gorden->stok }}" class="col-span-2 bg-blue-50 p-2 rounded w-full">
                </div>

                <!-- Gambar -->
                <div class="grid grid-cols-3 gap-4 mb-4 items-center">
                    <label for="gambar" class="font-bold">Gambar</label>
                    <input type="file" id="gambar" name="gambar" class="col-span-2 bg-gray-300 p-2 rounded w-full" accept=".jpg,.jpeg,.webp,.png">
                </div>

                <!-- Jenis Gorden -->
                <div class="grid grid-cols-3 gap-4 mb-4 items-center">
                    <label for="jenis_id" class="font-bold">Jenis Gorden</label>
                    <select id="jenis_id" name="jenis_id" class="col-span-2 bg-blue-50 p-2 rounded w-full" required>
                        <option value="">Pilih Jenis</option>
                        @foreach ($JenisGorden as $Jenis)
                            <option value="{{ $Jenis['id'] }}" {{ $gorden->jenis_id == $Jenis['id'] ? 'selected' : '' }}>
                                {{ $Jenis['nama_jenis'] }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Tombol Aksi -->
                <div class="flex gap-4 mt-6">
                    <button type="submit" class="bg-green-500 text-white px-6 py-2 rounded hover:bg-green-600">Simpan</button>
                    <a href="{{ route('admin.indexgorden') }}" class="bg-yellow-500 text-white px-6 py-2 rounded hover:bg-yellow-600">Batal</a>
                </div>
            </form>
        </div>
    </main>
</div>

</body>
</html>
