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

    <!-- Main Content -->


    <main class="flex-1 p-8 ">
        <input type="text" name="search">
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
