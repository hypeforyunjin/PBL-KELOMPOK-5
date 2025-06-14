<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
  <title>{{ $product->nama_gorden }}</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"/>
</head>
<body class="bg-gray-100 flex" style="font-family: 'Roboto', sans-serif;">
  <main class="flex-1 p-6">
    <header class="flex items-center justify-between mb-6">
      <div class="flex items-center space-x-4">
        <input class="px-4 py-2 border border-gray-300 rounded-lg w-96 focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="Cari gorden yang anda inginkan..." type="text"/>
        <button class="flex items-center px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50">
          <span class="material-icons mr-2">filter_list</span>
          Filter
        </button>
        <button class="flex items-center px-4 py-2 bg-gray-800 text-white rounded-lg hover:bg-gray-700">
          <span class="material-icons mr-2">search</span>
          Cari
        </button>
      </div>
    </header>

    {{-- Tampilkan pesan sukses jika ada --}}
    @if(session('success'))
      <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6" role="alert">
        {{ session('success') }}
      </div>
    @endif

    <div class="bg-white p-6 rounded-lg shadow-lg">
      <a href="{{ route('produk.gorden') }}" class="text-gray-600 mb-4 flex items-center hover:text-gray-800">
        <span class="material-icons">arrow_back</span>
      </a>

      <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <div>
          <img alt="{{ $product->nama_gorden }}" class="w-full h-auto rounded-lg shadow-md" src="{{ asset('storage/GambarGorden/' .$product->gambar ?? 'default.jpg') }}" />
        </div>
        <div>
          <h1 class="text-3xl font-bold text-gray-800 mb-2">{{ $product->nama_gorden }}</h1>
          <div class="flex items-center text-sm text-gray-600 mb-4">
            <span class="material-icons text-yellow-500">star</span>
            <span class="ml-1">4.9</span>
            <span class="mx-2">|</span>
            <span>4,9rb Review</span>
            <span class="mx-2">|</span>
            <span>{{ $product->terjual ?? '0' }} Terjual</span>
          </div>
          <p class="text-3xl font-bold text-green-600 mb-4">Rp. {{ number_format($product->harga, 0, ',', '.') }}</p>
          <p class="text-gray-700 mb-6">
            {{ $product->deskripsi }}
          </p>
          <h2 class="text-xl font-semibold text-gray-800 mb-2">Spesifikasi:</h2>
          <ul class="list-disc list-inside text-gray-700 space-y-1 mb-6">
            <li>Bahan: {{ $product->bahan ?? '-' }}</li>
            <li>Ukuran: {{ $product->ukuran ?? '-' }}</li>
            <li>Warna: {{ $product->warna ?? '-' }}</li>
            <li>Model: {{ $product->model ?? '-' }}</li>
            <li>Fitur: {{ $product->fitur ?? '-' }}</li>
          </ul>

          {{-- Info stok --}}
          <p class="text-sm text-gray-600 mb-2">Stok tersedia: <strong>{{ $product->stok }}</strong></p>

          {{-- Form tambah ke keranjang --}}
          <form action="{{ route('keranjang.tambah', $product->id) }}" method="POST" class="mb-6">
            @csrf

            <label for="kuantitas" class="block text-sm font-medium text-gray-700 mb-1">Kuantitas</label>
            <div class="flex items-center mb-4 max-w-xs">
              <button type="button" id="btnMinus" class="p-2 border border-gray-300 rounded-l-lg hover:bg-gray-100">
                <span class="material-icons text-sm">remove</span>
              </button>
              <input name="quantity" id="kuantitas"
                     class="w-12 text-center border-t border-b border-gray-300 focus:outline-none"
                     type="number" value="1" min="1" max="{{ $product->stok }}"
                     data-max="{{ $product->stok }}" />
              <button type="button" id="btnPlus" class="p-2 border border-gray-300 rounded-r-lg hover:bg-gray-100">
                <span class="material-icons text-sm">add</span>
              </button>
            </div>

            <div class="flex space-x-4">
              <button type="submit" class="flex items-center justify-center px-6 py-3 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50">
                <span class="material-icons mr-2">shopping_cart</span>
                + KERANJANG
              </button>
              <button type="button" class="px-6 py-3 bg-gray-800 text-white rounded-lg hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-opacity-50">
                ORDER NOW
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </main>

  <script>
    const btnMinus = document.getElementById('btnMinus');
    const btnPlus = document.getElementById('btnPlus');
    const qtyInput = document.getElementById('kuantitas');
    const maxQty = parseInt(qtyInput.dataset.max);

    btnMinus.addEventListener('click', () => {
      let currentQty = parseInt(qtyInput.value);
      if (currentQty > 1) {
        qtyInput.value = currentQty - 1;
      }
    });

    btnPlus.addEventListener('click', () => {
      let currentQty = parseInt(qtyInput.value);
      if (currentQty < maxQty) {
        qtyInput.value = currentQty + 1;
      }
    });
  </script>
</body>
</html>
