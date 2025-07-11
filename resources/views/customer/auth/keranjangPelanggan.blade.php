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
            @include('layouts.sidebar-admin')
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
                    <input type="text" placeholder="Cari gorden yang anda inginkan..."
                        class="w-96 py-3 px-4 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white shadow-sm" />
                    <button
                        class="px-4 py-3 bg-white border border-gray-200 rounded-lg text-gray-700 hover:bg-gray-50 shadow-sm">
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
                    <div class="col-span-1"></div>
                    <div class="col-span-4">Produk</div>
                    <div class="col-span-2">Harga Satuan</div>
                    <div class="col-span-2">Kuantitas</div>
                    <div class="col-span-2">Total Harga</div>
                    <div class="col-span-1">Aksi</div>
                </div>

                <div class="divide-y divide-gray-200">
                    @php
                        $totalHarga = 0;
                        $totalProduk = 0;
                    @endphp

                    @forelse ($keranjang as $id => $item)
                        @php
                            $subtotal = $item['harga'] * $item['quantity'];
                            $totalHarga += $subtotal;
                            $totalProduk += $item['quantity'];
                        @endphp

                        <div class="grid grid-cols-12 gap-4 p-4 items-center hover:bg-gray-50 item-row"
                             data-id="{{ $id }}"
                             data-harga="{{ $item['harga'] }}"
                             data-stok="{{ $item['stok'] ?? 0 }}">
                            <div class="col-span-1">
                                <input type="checkbox" class="form-checkbox h-5 w-5 text-blue-600 rounded border-gray-300" />
                            </div>
                            <div class="col-span-4 flex items-center space-x-3">
                                <img src="{{ asset('storage/GambarGorden/' . $item['gambar']) }}" alt="{{ $item['nama'] }}"
                                     class="w-20 h-20 object-cover rounded-md" />
                                <div>
                                    <h3 class="font-semibold text-gray-800">{{ $item['nama'] }}</h3>
                                    <span class="text-xs text-gray-500 bg-gray-100 px-2 py-1 rounded-full">
                                        Kategori: {{ $item['kategori'] ?? '-' }}
                                    </span>
                                    <!-- Tampilkan stok produk sesuai data admin -->
                                    <div class="text-xs text-red-500 mt-1">
                                        Stok tersedia: {{ $item['stok'] ?? 0 }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-2 text-gray-700">
                                Rp {{ number_format($item['harga'], 0, ',', '.') }}
                            </div>
                            <div class="col-span-2 flex items-center">
                                <button type="button" class="btn-minus px-2 border border-gray-300 rounded-l-md hover:bg-gray-100">-</button>
                                <input type="text" class="kuantitas w-12 text-center border-t border-b border-gray-300" value="{{ $item['quantity'] }}" min="1" readonly />
                                <button type="button" class="btn-plus px-2 border border-gray-300 rounded-r-md hover:bg-gray-100">+</button>
                            </div>
                            <div class="col-span-2 text-green-600 font-semibold subtotal">
                                Rp {{ number_format($subtotal, 0, ',', '.') }}
                            </div>
                            <div class="col-span-1">
                                <form method="POST" action="{{ route('keranjang.hapus', $id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-3 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600">Hapus</button>
                                </form>
                            </div>
                        </div>
                    @empty
                        <p class="p-4 col-span-12 text-center text-gray-500">Keranjang Anda masih kosong.</p>
                    @endforelse
                </div>
            </div>

            <!-- Checkout Section -->
            <footer class="mt-6 p-4 bg-white rounded-lg shadow-md flex justify-between items-center">
                <div class="text-sm text-gray-700">
                    Total (<span class="total-produk">{{ $totalProduk }} Produk</span>): 
                    <span class="font-semibold text-green-600 total-harga">
                        Rp {{ number_format($totalHarga, 0, ',', '.') }}
                    </span>
                </div>
                <form action="{{ route('checkout') }}" method="GET">
                <button class="px-6 py-3 bg-slate-700 text-white rounded-lg hover:bg-slate-800 shadow-sm">
                    Checkout
                </button>
                </form>
            </footer>
        </main>
    </div>

    <!-- Script -->
    <script>
        document.querySelectorAll('.item-row').forEach(row => {
            const btnMinus = row.querySelector('.btn-minus');
            const btnPlus = row.querySelector('.btn-plus');
            const qtyInput = row.querySelector('.kuantitas');
            const subtotalEl = row.querySelector('.subtotal');
            const harga = parseInt(row.dataset.harga, 10);
            const stok = parseInt(row.dataset.stok, 10) || 0;

            // Fungsi update subtotal dan total keseluruhan
            const updateSubtotal = () => {
                const quantity = parseInt(qtyInput.value, 10);
                const subtotal = quantity * harga;
                subtotalEl.textContent = 'Rp ' + subtotal.toLocaleString('id-ID');
                updateTotal();
            };

            btnMinus.addEventListener('click', () => {
                let qty = parseInt(qtyInput.value, 10);
                if (qty > 1) {
                    qtyInput.value = qty - 1;
                    updateSubtotal();
                }
            });

            btnPlus.addEventListener('click', () => {
                let qty = parseInt(qtyInput.value, 10);
                // Cek stok sebelum tambah
                if (qty < stok) {
                    qtyInput.value = qty + 1;
                    updateSubtotal();
                } else {
                    alert('Jumlah kuantitas tidak boleh melebihi stok yang tersedia!');
                }
            });
        });

        function updateTotal() {
            let totalProduk = 0;
            let totalHarga = 0;
            document.querySelectorAll('.item-row').forEach(row => {
                const qty = parseInt(row.querySelector('.kuantitas').value, 10);
                const harga = parseInt(row.dataset.harga, 10);
                totalProduk += qty;
                totalHarga += qty * harga;
            });

            document.querySelector('.total-produk').textContent = totalProduk + ' Produk';
            document.querySelector('.total-harga').textContent = 'Rp ' + totalHarga.toLocaleString('id-ID');
        }
    </script>
</body>
</html>
