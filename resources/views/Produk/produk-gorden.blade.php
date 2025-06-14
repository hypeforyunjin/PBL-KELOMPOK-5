<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tampilan Produk Pengguna</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex">

    <!-- Sidebar -->
    <aside class="w-16 bg-[#0d2b2f] h-screen fixed top-0 left-0 flex flex-col justify-between py-4 items-center z-50">
        <!-- Top Section -->
        <div class="flex flex-col space-y-6 items-center">
            @foreach (['home', 'search', 'barang', 'keranjang', 'chat', 'user'] as $icon)
                <button>
                    @include('components.icons.' . $icon)
                </button>
            @endforeach
        </div>

        <!-- Bottom Section -->
        <div class="flex flex-col space-y-6 items-center">
            @include('components.icons.bell')
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit">
                    @include('components.icons.logout')
                </button>
            </form>
        </div>
    </aside>

    <div class="flex flex-col flex-1 ml-16 min-h-screen">
        <!-- Header dengan Form Search -->
        <header class="sticky top-0 bg-white z-40 p-6 shadow-md">
            <form action="{{ url('/produk-gorden') }}" method="GET" class="flex items-center space-x-4 w-full max-w-4xl mx-auto">
                <div class="relative flex-grow">
                    <input
                        type="text"
                        name="search"
                        value="{{ request('search') }}"
                        placeholder="Cari gorden yang anda inginkan..."
                        class="w-full py-3 px-4 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white shadow-sm"
                    />
                </div>
                <button type="submit" class="flex items-center space-x-2 px-4 py-3 bg-slate-700 text-white rounded-lg hover:bg-slate-800 shadow-sm">
                    <span class="material-icons">Cari</span>
                </button>
            </form>
        </header>

        <!-- Main Content -->
        <main class="flex-1 p-8 overflow-y-auto">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                @forelse($products as $product)
                    <a href="{{ route('produk.gorden.detail', $product->id) }}" class="block hover:shadow-xl transition-shadow rounded-lg overflow-hidden">
                        <div class="bg-white rounded-lg shadow-md overflow-hidden">
                            <div class="relative">
                                <!-- ✅ Gambar sekarang menggunakan path dari storage -->
                                <img src="{{ asset('storage/GambarGorden/' . $product->gambar) }}" alt="{{ $product->nama_gorden }}" class="w-full h-48 object-cover">

                                @if($product->tag)
                                    <div class="absolute top-2 right-2 {{ $product->tag_color ?? 'bg-gray-400' }} text-white text-xs px-2 py-1 rounded-full">
                                        {{ $product->tag }}
                                    </div>
                                @endif
                            </div>
                            <div class="p-4">
                                <h2 class="font-semibold">{{ $product->nama_gorden }}</h2>
                                <p class="text-gray-400 text-sm">{{ $product->subtitle }}</p>
                                <div class="mt-2">
                                    <span class="font-bold">Rp {{ number_format($product->harga, 0, ',', '.') }}</span>
                                    @if($product->old_price)
                                        <span class="line-through text-gray-400 text-sm">Rp {{ number_format($product->old_price, 0, ',', '.') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </a>
                @empty
                    <p class="col-span-4 text-center text-gray-500">Tidak ada produk yang ditemukan.</p>
                @endforelse
            </div>
        </main>
    </div>

</body>
</html>
