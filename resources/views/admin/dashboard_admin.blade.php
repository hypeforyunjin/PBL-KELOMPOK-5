<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

<div class="flex">
    <div class="w-64 bg-gray-800 text-white h-screen">
        <h2 class="text-center text-2xl py-4">Dashboard</h2>
        <ul class="mt-5">
            <li class="py-2 text-center hover:bg-gray-700 cursor-pointer">Dashboard</li>
            <li class="py-2 text-center hover:bg-gray-700 cursor-pointer">Produk</li>
        </ul>
    </div>

    <div class="flex-1 p-6">
        <div class="bg-white rounded-lg shadow-md p-4 mb-6">
            <h1 class="text-xl font-semibold">Assalamualaikum wr. wb., At'min</h1>
        </div>

        <div class="grid grid-cols-4 gap-4 mb-6">
        <div class="bg-yellow-400 rounded-lg shadow p-4 text-center">
                <h3 class="text-lg">Total Produk</h3>
                <p class="text-2xl font-bold">30</p>
            </div>
            <div class="bg-white rounded-lg shadow p-4 text-center">
                <h3 class="text-lg">Total Transaksi</h3>
                <p class="text-2xl font-bold">50</p>
            </div>
            <div class="bg-white rounded-lg shadow p-4 text-center">
                <h3 class="text-lg">Average Review</h3>
                <p class="text-2xl font-bold">4.9</p>
            </div>
            <div class="bg-white rounded-lg shadow p-4 text-center">
                <h3 class="text-lg">Total Pelanggan</h3>
                <p class="text-2xl font-bold">1005</p>
            </div>
        </div>

        <div>
            <div class="bg-white rounded-lg shadow p-4 mb-2 flex justify-between items-center">
                <div class="flex items-center">
                    <img src="path/to/image.jpg" alt="Gorden 5" class="w-12 h-12 rounded mr-4">
                    <div>
                        <h4 class="text-lg">Gorden 5</h4>
                        <p class="text-gray-600">Rp 150.000</p>
                    </div>
                </div>
                <label class="inline-flex items-center">
                    <input type="checkbox" class="form-checkbox text-blue-600">
                    <span class="ml-2">Publik</span>
                </label>
            </div>

            <div class="bg-white rounded-lg shadow p-4 mb-2 flex justify-between items-center">
                <div class="flex items-center">
                    <img src="path/to/image.jpg" alt="Gorden 6" class="w-12 h-12 rounded mr-4">
                    <div>
                        <h4 class="text-lg">Gorden 6</h4>
                        <p class="text-gray-600">Rp 260.000</p>
                    </div>
                </div>
                <label class="inline-flex items-center">
                    <input type="checkbox" class="form-checkbox text-blue-600">
                    <span class="ml-2">Privat</span>
                </label>
            </div>
            <!-- Tambahkan produk lainnya di sini -->
        </div>
    </div>
</div>

</body>
</html>