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
            <!-- Tombol Logout -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit">
                    @include('components.icons.logout')
                </button>
            </form>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-8 ml-16 overflow-y-auto">
        <div class="grid grid-cols-4 gap-6">
            @foreach($products as $product)
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <div class="relative">
                        <img src="{{ $product['image'] }}" alt="{{ $product['title'] }}" class="w-full h-48 object-cover">
                        @if($product['tag'])
                        <div class="absolute top-2 right-2 {{ $product['tag_color'] }} text-white text-xs px-2 py-1 rounded-full">
                            {{ $product['tag'] }}
                        </div>
                        @endif
                    </div>
                    <div class="p-4">
                        <h2 class="font-semibold">{{ $product['title'] }}</h2>
                        <p class="text-gray-400 text-sm">{{ $product['subtitle'] }}</p>
                        <div class="mt-2">
                            <span class="font-bold">Rp {{ number_format($product['price'], 0, ',', '.') }}</span>
                            @if($product['old_price'])
                                <span class="line-through text-gray-400 text-sm">Rp {{ number_format($product['old_price'], 0, ',', '.') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </main>

</body>
</html>
