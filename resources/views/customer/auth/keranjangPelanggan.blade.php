<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Gorden Standart TikTok</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
  <div class="flex h-screen">
    <!-- Sidebar -->
    <aside class="w-16 bg-[#0d2b2f] min-h-screen flex flex-col justify-between py-4 items-center">
      <!-- Top Section -->
      <div class="flex flex-col space-y-6 items-center">
        @foreach (['home', 'search'] as $icon)
          <button>@include('components.icons.' . $icon)</button>
        @endforeach
        <a href="{{ route('produk.gorden') }}" aria-label="Ke Produk Gorden">
          <button>@include('components.icons.barang')</button>
        </a>
        @foreach (['keranjang', 'chat', 'user'] as $icon)
          <button>@include('components.icons.' . $icon)</button>
        @endforeach
      </div>

      <!-- Bottom Section -->
      <div class="flex flex-col space-y-6 items-center">
        @include('components.icons.bell')
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <button type="submit">@include('components.icons.logout')</button>
        </form>
      </div>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-6 overflow-y-auto">
      <header class="flex items-center justify-between mb-6">
        <div class="flex items-center space-x-4">
          <input
            type="text"
            placeholder="Cari gorden yang anda inginkan..."
            class="w-96 py-3 px-4 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white shadow-sm"
          />
          <button class="px-4 py-3 bg-white border border-gray-200 rounded-lg text-gray-700 hover:bg-gray-50 shadow-sm">
            Filter
          </button>
          <button class="px-4 py-3 bg-slate-700 text-white rounded-lg hover:bg-slate-800 shadow-sm">
            Cari
          </button>
        </div>
      </header>

      <!-- Product List -->
      <div class="bg-white rounded-lg shadow-md">
        <div class="grid grid-cols-12 gap-4 p-4 border-b border-gray-200 text-sm font-medium text-gray-500">
          <div class="col-span-1 flex items-center">
            <input type="checkbox" class="form-checkbox h-5 w-5 text-blue-600 rounded border-gray-300" />
          </div>
          <div class="col-span-4">Produk</div>
          <div class="col-span-2">Harga Satuan</div>
          <div class="col-span-2">Kuantitas</div>
          <div class="col-span-2">Total Harga</div>
          <div class="col-span-1">Aksi</div>
        </div>

        <div class="divide-y divide-gray-200">
          <!-- Item 1 -->
          <div class="grid grid-cols-12 gap-4 p-4 items-center hover:bg-gray-50">
            <div class="col-span-1">
              <input type="checkbox" class="form-checkbox h-5 w-5 text-blue-600 rounded border-gray-300" />
            </div>
            <div class="col-span-4 flex items-center space-x-3">
              <img src="image.jpg" alt="Produk" class="w-20 h-20 object-cover rounded-md" />
              <div>
                <h3 class="font-semibold text-gray-800">Gorden Standart TikTok</h3>
                <span class="text-xs text-gray-500 bg-gray-100 px-2 py-1 rounded-full">Kategori: 100x100 cm</span>
              </div>
            </div>
            <div class="col-span-2 text-gray-700">Rp.150.000</div>
            <div class="col-span-2 flex items-center">
              <button class="px-2 border border-gray-300 rounded-l-md hover:bg-gray-100">-</button>
              <input type="text" value="100" class="w-12 text-center border-t border-b border-gray-300" />
              <button class="px-2 border border-gray-300 rounded-r-md hover:bg-gray-100">+</button>
            </div>
            <div class="col-span-2 text-green-600 font-semibold">Rp.150.000.000</div>
            <div class="col-span-1">
              <button class="px-3 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600">Hapus</button>
            </div>
          </div>
        </div>
      </div>

      <!-- Checkout Section -->
      <footer class="mt-6 p-4 bg-white rounded-lg shadow-md flex justify-between items-center">
        <div class="text-sm text-gray-700">
          Total (1 Produk): <span class="font-semibold text-green-600">Rp.150.000.000</span>
        </div>
        <button class="px-6 py-3 bg-slate-700 text-white rounded-lg hover:bg-slate-800 shadow-sm">
          Checkout
        </button>
      </footer>
    </main>
  </div>
</body>
</html>
