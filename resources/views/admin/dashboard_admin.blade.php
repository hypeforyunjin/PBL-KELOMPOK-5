<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet"/>
</head>
<body class="bg-gray-100">

<div class="flex">
  <!-- Sidebar -->
  <div class="w-64 bg-gray-800 text-white h-screen">
    <h2 class="text-center text-2xl py-4">Dashboard</h2>
    <ul class="mt-5">
      <li class="py-2 text-center hover:bg-gray-700 cursor-pointer">Dashboard</li>
      <li class="py-2 text-center hover:bg-gray-700 cursor-pointer">
        <a href="{{ route('produk.admin') }}">Produk</a>
      </li>
    </ul>
  </div>

  <!-- Main Content -->
  <div class="flex-1 p-6">
    <div class="bg-white rounded-lg shadow-md p-4 mb-6">
      <h1 class="text-xl font-semibold">Assalamualaikum wr. wb., At'min</h1>
      <img src="/img/Animasi Dashboard.gif" alt="Animasi Dashboard" class="w-24 h-auto ml-auto" />
    </div>

    <!-- Card Summary -->
    <div class="grid grid-cols-4 gap-4 mb-6">
      <div class="bg-yellow-400 rounded-lg shadow p-4 text-center">
        <h3 class="text-lg">Total Produk</h3>
        <p class="text-2xl font-bold">30</p>
      </div>
      <div class="bg-indigo-700 text-white rounded-lg shadow p-4 text-center">
        <h3 class="text-lg">Total Transaksi</h3>
        <p class="text-2xl font-bold">50</p>
      </div>
      <div class="bg-pink-500 text-white rounded-lg shadow p-4 text-center">
        <h3 class="text-lg">Average Review</h3>
        <p class="text-2xl font-bold">4.9</p>
      </div>
      <div class="bg-gray-500 text-white rounded-lg shadow p-4 text-center">
        <h3 class="text-lg">Total Pelanggan</h3>
        <p class="text-2xl font-bold">1005</p>
      </div>
    </div>

    <!-- Product List -->
    <div>
      <!-- Produk 1 -->
      <div class="bg-white rounded-lg shadow p-4 mb-4 flex justify-between items-center">
        <div class="flex items-center space-x-4">
          <img src="{{ asset('img/gorden 5.jpg') }}" alt="Gorden 5" class="w-12 h-12 rounded">
          <div>
            <h4 class="text-lg">Gorden 5</h4>
            <p class="text-gray-600">Rp 150.000</p>
          </div>
        </div>

        <div class="flex flex-col items-center space-y-2">
          <div class="flex items-center space-x-2">
            <span id="label-toggle-1" class="font-semibold">Private</span>
            <label class="relative inline-flex items-center cursor-pointer">
              <input type="checkbox" id="toggle-1" class="sr-only" onchange="toggleLabel(1)">
              <div id="track-1" class="w-11 h-6 bg-gray-200 rounded-full relative transition-colors duration-300">
                <div id="dot-1"
                     class="absolute top-0.5 left-0.5 bg-gray-800 h-5 w-5 rounded-full transition-all duration-300 transform">
                </div>
              </div>
            </label>
          </div>
        </div>
      </div>

      <!-- Produk 2 -->
      <div class="bg-white rounded-lg shadow p-4 mb-4 flex justify-between items-center">
        <div class="flex items-center space-x-4">
          <img src="{{ asset('img/gorden 8.jpg') }}" alt="Gorden 6" class="w-12 h-12 rounded">
          <div>
            <h4 class="text-lg">Gorden 6</h4>
            <p class="text-gray-600">Rp 260.000</p>
          </div>
        </div>

        <div class="flex flex-col items-center space-y-2">
          <div class="flex items-center space-x-2">
            <span id="label-toggle-2" class="font-semibold">Private</span>
            <label class="relative inline-flex items-center cursor-pointer">
              <input type="checkbox" id="toggle-2" class="sr-only" onchange="toggleLabel(2)">
              <div id="track-2" class="w-11 h-6 bg-gray-200 rounded-full relative transition-colors duration-300">
                <div id="dot-2"
                     class="absolute top-0.5 left-0.5 bg-gray-800 h-5 w-5 rounded-full transition-all duration-300 transform">
                </div>
              </div>
            </label>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Script toggle -->
<script>
  function toggleLabel(id) {
    const checkbox = document.getElementById('toggle-' + id);
    const label = document.getElementById('label-toggle-' + id);
    const dot = document.getElementById('dot-' + id);
    const track = document.getElementById('track-' + id);

    if (checkbox.checked) {
      label.textContent = 'Publik';
      dot.classList.remove('translate-x-0');
      dot.classList.add('translate-x-full');
      track.classList.remove('bg-gray-200');
      track.classList.add('bg-blue-600');
    } else {
      label.textContent = 'Private';
      dot.classList.remove('translate-x-full');
      dot.classList.add('translate-x-0');
      track.classList.remove('bg-blue-600');
      track.classList.add('bg-gray-200');
    }
  }

  document.addEventListener('DOMContentLoaded', () => {
    const toggles = document.querySelectorAll('input[type="checkbox"][id^="toggle-"]');
    toggles.forEach(input => {
      const id = input.id.split('-')[1];
      toggleLabel(id);
    });
  });
</script>

</body>
</html>
