<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Profil Pelanggan</title>

  <!-- Tailwind CSS -->
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@latest/dist/tailwind.min.css" rel="stylesheet" />
   <script src="https://cdn.tailwindcss.com"></script>

  <!-- Google Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />

  <!-- Google Font Inter -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&amp;display=swap" rel="stylesheet" />
</head>
<body class="flex h-screen bg-gray-100">

  <!-- Sidebar -->

  @include('layouts.sidebar-admin')

  <!-- Main Content -->
  <main class="flex-1 pl-20 pt-6">
    <div class="max-w-4xl mx-auto">
      <!-- Header -->
      <div class="flex justify-between items-center mb-6">
        <div>
          <h1 class="text-2xl font-semibold text-gray-800">Profil Pelanggan</h1>
          <p class="text-gray-600">
            Kelola informasi Anda untuk mengontrol, melindungi, dan mengamankan
          </p>
        </div>
        <button class="bg-indigo-700 hover:bg-indigo-800 text-white font-medium py-2 px-4 rounded-lg flex items-center space-x-2">
          <span class="material-icons text-sm">edit</span>
          <span>Edit</span>
        </button>
      </div>

      <!-- Form -->
      <div class="bg-white shadow-md rounded-xl p-8">
        <form>
          <!-- Nama Lengkap -->
          <div class="mb-6">
            <label for="nama_lengkap" class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
            <input
              type="text"
              id="nama_lengkap"
              name="nama_lengkap"
              value="Nissa Serena Primadani"

              class="w-full border border-gray-300 rounded-lg py-2 px-3 text-gray-700 bg-gray-50" readonly
            />
          </div>

          <!-- Nomor Telepon -->
          <div class="mb-6">
            <label for="nomor_telepon" class="block text-sm font-medium text-gray-700 mb-1">Nomor Telepon</label>
            <input
              type="tel"
              id="nomor_telepon"
              name="nomor_telepon"
              value="+62 856023310293"

              class="w-full border border-gray-300 rounded-lg py-2 px-3 text-gray-700 bg-gray-50" readonly
            />
          </div>

          <!-- Email -->
          <div class="mb-6">
            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
            <input
              type="email"
              id="email"
              name="email"
              value="serenasey@gmail.com"

              class="w-full border border-gray-300 rounded-lg py-2 px-3 text-gray-700 bg-gray-50" readonly
            />
          </div>

          <!-- Alamat -->
          <div class="mb-6">
            <label class="block text-sm font-medium text-gray-700 mb-1">Alamat</label>
            <div class="space-y-4">
              <div>
                <label for="kabupaten_kota_1" class="block text-xs font-medium text-gray-500 mb-1">Kabupaten / Kota</label>
                <select
                  id="kabupaten_kota_1"
                  name="kabupaten_kota_1"
                  class="w-full border border-gray-300 rounded-lg py-2 px-3 text-gray-700 bg-gray-50"
                >
                  <option value="">Pilih Kota</option>
                  <option value="bali">Bali</option>
                  <option value="banyuwangi" >Banyuwangi</option>
                </select>
              </div>

              <div>
                <label for="kabupaten_kota_2" class="block text-xs font-medium text-gray-500 mb-1">Kecamatan</label>
                <select
                  id="kabupaten_kota_2"
                  name="kabupaten_kota_2"
                  class="w-full border border-gray-300 rounded-lg py-2 px-3 text-gray-700 bg-gray-50" readonly
                >
                    <option value="">Pilih Kota</option>
                  <option value="denpasar">Denpasar</option>
                  <option value="denpasar selatan">Denpasar Selatan</option>
                </select>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </main>
</body>
</html>
