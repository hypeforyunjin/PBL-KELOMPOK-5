
<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Checkout</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet" />
  </head>
  <body class="bg-gray-100 p-4 md:p-8 font-sans">
    <div class="max-w-4xl mx-auto bg-white shadow-lg rounded-lg">
      <div class="bg-red-100 text-red-500 p-4 rounded-t-lg flex items-center">
        <span class="material-icons mr-2">warning</span>
        <p class="text-sm">
          Lakukan DP agar kita dapat memproses pemesanan (Tanpa DP kita tidak dapat memproses pemesanan)
        </p>
      </div>

      <div class="p-6">
        <!-- Alamat -->
        <div class="mb-6">
          <div class="flex justify-between items-center mb-2">
            <h2 class="text-lg font-semibold text-gray-700">Alamat Pelanggan (Rumah)</h2>
            <div class="flex space-x-2">
              <button class="bg-gray-700 hover:bg-gray-800 text-white px-3 py-1.5 rounded-md text-sm flex items-center">
                <span class="material-icons text-sm mr-1">edit</span>Edit
              </button>
              <button class="bg-blue-800 hover:bg-blue-900 text-white px-3 py-1.5 rounded-md text-sm flex items-center">
                <span class="material-icons text-sm mr-1">add_location_alt</span>Tambahkan Alamat Lain
              </button>
            </div>
          </div>
          <div class="text-gray-600 text-sm">
            <p class="font-semibold">Nissa Serena Primadani <span class="font-normal text-gray-500">(08560043215)</span></p>
            <p>Jln Terinatu no.8 Kancilan, Lateng, Banyuwangi - Jawa Timur</p>
            <p>[Kode Pos: 68413]</p>
          </div>
        </div>

        <!-- Produk -->
        <div class="mb-6">
          <div class="flex justify-between items-center mb-3 text-gray-500 text-sm font-medium">
            <h2 class="text-lg font-semibold text-gray-700">Produk dipesan</h2>
            <div class="hidden md:flex space-x-16">
              <span>Harga Satuan</span>
              <span>Total Produk</span>
              <span>Subtotal Produk</span>
            </div>
          </div>

          <div class="border rounded-lg divide-y divide-gray-200">
            @php
              $subtotalPesanan = 0;
            @endphp
            @forelse($keranjang as $id => $item)
              @php
                $subtotal = ($item['harga'] ?? 0) * ($item['quantity'] ?? 1);
                $subtotalPesanan += $subtotal;
              @endphp
              <div class="p-4 flex flex-col md:flex-row items-start md:items-center justify-between space-y-3 md:space-y-0">
                <div class="flex items-center space-x-3">
                  <img src="{{ asset('storage/GambarGorden/' . $item['gambar']) }}" alt="{{ $item['nama'] ?? '-' }}" class="w-20 h-20 object-cover rounded-md" />
                  <div>
                    <h3 class="font-semibold text-gray-800">{{ $item['nama'] ?? '-' }}</h3>
                    <span class="text-xs bg-gray-200 text-gray-600 px-2 py-0.5 rounded-full">
                      Kategori : {{ $item['kategori'] ?? '-' }}
                    </span>
                  </div>
                </div>
                <div class="flex w-full md:w-auto justify-between md:space-x-16 items-center">
                  <div class="md:hidden text-gray-500 text-xs">Harga Satuan</div>
                  <p class="text-gray-700">Rp {{ number_format($item['harga'] ?? 0, 0, ',', '.') }}</p>
                </div>
                <div class="flex w-full md:w-auto justify-between md:space-x-16 items-center">
                  <div class="md:hidden text-gray-500 text-xs">Total Produk</div>
                  <p class="text-gray-700">{{ $item['quantity'] ?? 1 }}</p>
                </div>
                <div class="flex w-full md:w-auto justify-between md:space-x-16 items-center">
                  <div class="md:hidden text-gray-500 text-xs">Subtotal Produk</div>
                  <p class="text-green-500 font-semibold">Rp {{ number_format($subtotal, 0, ',', '.') }}</p>
                </div>
              </div>
            @empty
              <div class="p-4 text-center text-gray-500">Tidak ada produk yang dipilih.</div>
            @endforelse
          </div>
        </div>

        <!-- Metode Pembayaran -->
        <div>
          <h2 class="text-lg font-semibold text-gray-700 mb-3">Metode Pembayaran</h2>
          <div class="flex flex-col md:flex-row justify-between items-center">
            <div class="flex space-x-2 mb-4 md:mb-0">
              <button class="bg-blue-800 hover:bg-blue-900 text-white px-4 py-2 rounded-md text-sm flex items-center">
                <span class="material-icons text-sm mr-1">payment</span>Bayar DP Dahulu
              </button>
              <button class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-md text-sm flex items-center">
                <span class="material-icons text-sm mr-1">account_balance_wallet</span>Transfer Lunas
              </button>
            </div>
            <div class="text-right">
              <p class="text-gray-500 text-sm">Subtotal Pesanan</p>
              <p class="text-green-500 text-xl font-bold">Rp {{ number_format($subtotalPesanan, 0, ',', '.') }}</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>