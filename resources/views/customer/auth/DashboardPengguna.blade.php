<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Pengguna</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white font-sans text-gray-800">

    <div class="flex h-screen">
        <!-- Sidebar -->
        <aside class="w-16 bg-[#0d2b2f] min-h-screen flex flex-col justify-between py-4 items-center">
            <!-- Bagian Atas -->
            <div class="flex flex-col space-y-6 items-center">
                @foreach (['home', 'search'] as $icon)
                    <button>
                        @include('components.icons.' . $icon)
                    </button>
                @endforeach
                <a href="{{ route('produk.gorden') }}" aria-label="Ke Produk Gorden">
                    <button>
                        @include('components.icons.barang') 
                    </button>
                </a>
                @foreach (['keranjang', 'chat', 'user'] as $icon)
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
        <div class="flex-1 flex flex-col items-center justify-center">
            <h1 class="text-5xl font-light text-gray-700 text-center leading-relaxed">
                Seamless <span class="italic font-medium">furniture</span> <br />
                with natural fabrics
            </h1>
            <a href="{{ route('produk.gorden') }}">
                <button class="mt-8 px-6 py-3 bg-teal-900 text-white text-sm rounded-lg hover:bg-teal-700">
                    lihat koleksi kami
                </button>
            </a>
        </div>
    </div>

</body>
</html>
