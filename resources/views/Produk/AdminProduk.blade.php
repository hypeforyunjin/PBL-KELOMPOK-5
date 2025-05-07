<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Produk</title>
    <script src ="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="flex">
        <!-- Sidebar -->
        <aside class="w-64 bg-slate-800 text-white h-screen p-4">
            <h2 class="text-xl font-bold mb-6">Gorden Dashboard</h2>
            <nav>
                <ul>
                    <li><a href="#" class="block py-2 px-4 hover:bg-slate-700 rounded">Dashboard</a></li>
                    <li><a href="#" class="block py-2 px-4 bg-slate-700 rounded">Produk</a></li>
                </ul>
            </nav>
        </aside>
        <!-- Main Content -->
        <main class="flex-1 p-6">
            <h1 class="text-2xl font-bold mb-4">Admin Produk</h1>
            <div class="bg-white p-4 rounded shadow">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-xl">Dashboard Gorden</h2>
                    <button class="bg-green-500 text-white px-4 py-2 rounded">Tambah Produk</button>
                </div>
                <table class="w-full border-collapse border border-gray-200">
                    <thead>
                        <tr>
                            <th class="border border-gray-300 p-2">No</th>
                            <th class="border border-gray-300 p-2">Nama Gorden</th>
                            <th class="border border-gray-300 p-2">Deskripsi</th>
                            <th class="border border-gray-300 p-2">Harga</th>
                            <th class="border border-gray-300 p-2">Stock</th>
                            <th class="border border-gray-300 p-2">Gambar</th>
                            <th class="border border-gray-300 p-2">Jenis</th>
                            <th class="border border-gray-300 p-2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($produk as $index => $item)
                            <tr>
                                <td class="border border-gray-300 p-2">{{ $index + 1 }}</td>
                                <td class="border border-gray-300 p-2">{{ $item['nama'] }}</td>
                                <td class="border border-gray-300 p-2">{{ $item['deskripsi'] }}</td>
                                <td class="border border-gray-300 p-2">{{ $item['harga'] }}</td>
                                <td class="border border-gray-300 p-2">{{ $item['stock'] }}</td>
                                <td class="border border-gray-300 p-2">
                                    <img src="{{ asset($item['gambar']) }}" alt="Gambar" class="w-16 h-16 object-cover">
                                </td>
                                <td class="border border-gray-300 p-2">{{ $item['jenis'] }}</td>
                                <td class="border border-gray-300 p-2">
                                    <button class="bg-blue-500 text-white px-2 py-1 rounded">Edit</button>
                                    <button class="bg-red-500 text-white px-2 py-1 rounded">Delete</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</body>
</html>
