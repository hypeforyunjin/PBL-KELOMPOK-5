<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Data Gorden</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
</head>
<body class="bg-gray-100">
<div class="flex">
    <!-- Sidebar -->
    <aside class="w-64 bg-slate-800 text-white h-screen p-4">
        <h2 class="text-xl font-bold mb-6">Gorden Dashboard</h2>
        <nav>
            <ul>
                <li class="py-2 text-center hover:bg-gray-700 cursor-pointer">
                    <a href="{{ route('admin.dashboardLTE') }}">Dashboard</a>
                </li>
                <li class="py-2 text-center bg-gray-700 rounded">Produk</li>
            </ul>
        </nav>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-6">
        <h1 class="text-2xl font-bold mb-4">Data Produk Gorden</h1>
        <div class="bg-white p-6 rounded-lg shadow">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl">Daftar Gorden</h2>
                <a href="{{ route('admin.addgorden') }}" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Tambah Produk</a>
            </div>
            <table class="w-full border-collapse border border-gray-300 text-sm">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="border p-2">No</th>
                        <th class="border p-2">Nama Gorden</th>
                        <th class="border p-2">Deskripsi</th>
                        <th class="border p-2">Harga</th>
                        <th class="border p-2">Stok</th>
                        <th class="border p-2">Gambar</th>
                        <th class="border p-2">Jenis</th>
                        <th class="border p-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($gordens as $index => $gorden)
                        <tr class="hover:bg-gray-50">
                            <td class="border p-2 text-center">{{ $index + 1 }}</td>
                            <td class="border p-2">{{ $gorden->nama_gorden }}</td>
                            <td class="border p-2">{{ $gorden->deskripsi ?? '-' }}</td>
                            <td class="border p-2">Rp{{ number_format($gorden->harga, 0, ',', '.') }}</td>
                            <td class="border p-2 text-center">{{ $gorden->stok }}</td>
                            <td class="border p-2 text-center">
                                @if ($gorden->gambar)
                                    <img src="{{ asset('storage/GambarGorden/' . $gorden->gambar) }}" alt="Gambar" class="w-16 h-16 object-cover mx-auto" />
                                @else
                                    <span class="text-gray-500">Tidak ada gambar</span>
                                @endif
                            </td>
                            <td class="border p-2 text-center">{{ $gorden->jenis_gorden->nama_jenis ?? '-' }}</td>
                            <td class="border p-2 text-center">
                                <a href="{{ route('admin.editgorden', $gorden->id) }}" class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600 inline-block mb-1">Edit</a>
                                <form method="POST" action="{{ route('admin.deletegorden', $gorden->id) }}" onsubmit="return confirm('Yakin ingin menghapus?')" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="border p-4 text-center text-gray-500">Tidak ada data gorden.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </main>
</div>
</body>
</html>
