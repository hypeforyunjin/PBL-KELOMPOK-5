<aside class="w-16 bg-[#0d2b2f] h-screen fixed top-0 left-0 flex flex-col justify-between py-4 items-center z-50">
    <!-- Top Section -->
    <div class="flex flex-col space-y-6 items-center">
        @foreach (['home', 'barang', 'keranjang', 'chat', 'user'] as $icon)
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
