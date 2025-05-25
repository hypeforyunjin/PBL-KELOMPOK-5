<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tampilan Produk Pengguna</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex ">

    <!-- Sidebar -->

    @include('layouts.sidebar-admin')

    <div class="flex flex-col flex-1 ml-16 min-h-screen">
    <header class="sticky top-0 bg-white z-40 p-6 flex items-center justify-between shadow-md">
      <div class="flex items-center space-x-4 w-full max-w-4xl mx-auto">
        <div class="relative flex-grow">
          <input
            type="text"
            placeholder="Cari gorden yang anda inginkan..."
            class="w-full py-3 px-4 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white shadow-sm"
          />
        </div>
        <button class="flex items-center space-x-2 px-4 py-3 bg-white border border-gray-200 rounded-lg text-gray-700 hover:bg-gray-50 shadow-sm">
            <span class="material-icons text-gray-500">filter_list</span>
        </button>
        <button class="flex items-center space-x-2 px-4 py-3 bg-slate-700 text-white rounded-lg hover:bg-slate-800 shadow-sm">
          <span class="material-icons">Cari</span>
        </button>
      </div>
    </header>

    <!-- Main Content -->


    <main class="flex-1 p-8 ">
        <form action="" method="get"> <input type="text" name="search"> <button type="submit"> cari produk
            </button></form>
        <div class="grid grid-cols-4 gap-6">
            @forelse ($products as $product)
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <div class="relative">
                        <img src="{{ asset('img/' . $product->image_path) }}" alt="{{ $product->name }}"
                            class="w-full h-48 object-cover">
                        @if ($product['tag'])
                            <div
                                class="absolute top-2 right-2 {{ $product['tag_color'] }} text-white text-xs px-2 py-1 rounded-full">
                                {{ $product['tag'] }}
                            </div>
                        @endif
                    </div>
                    <div class="p-4">
                        <h2 class="font-semibold">{{ $product->name }}</h2>
                        <p class="text-gray-400 text-sm">{{ $product->description }}</p>
                        <div class="mt-2">
                            <span class="font-bold">Rp {{ number_format($product['price'], 0, ',', '.') }}</span>
                            @if ($product['old_price'])
                                <span class="line-through text-gray-400 text-sm">Rp
                                    {{ number_format($product['old_price'], 0, ',', '.') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <p>Produk tidak di temukan</p>
            @endforelse
        </div>
    </main>

</body>

</html>
