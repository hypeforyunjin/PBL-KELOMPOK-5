<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Profil Pelanggan</title>

  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Google Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
</head>
<body class="flex bg-slate-100 text-slate-800 font-sans">

  <!-- Sidebar -->
  <aside class="fixed top-0 left-0 h-screen w-16 bg-slate-800 flex flex-col items-center py-6 z-50">
    <span class="material-icons text-slate-400 mb-6 hover:text-slate-200 cursor-pointer active:text-slate-100">home</span>
    <span class="material-icons text-slate-400 mb-6 hover:text-slate-200 cursor-pointer">folder</span>
    <span class="material-icons text-slate-400 mb-6 hover:text-slate-200 cursor-pointer">shopping_cart</span>
    <span class="material-icons text-slate-400 mb-6 hover:text-slate-200 cursor-pointer">person</span>
    <span class="material-icons text-slate-400 mt-auto mb-6 hover:text-slate-200 cursor-pointer">settings</span>
    <span class="material-icons text-slate-400 hover:text-slate-200 cursor-pointer">logout</span>
  </aside>

  <!-- Main Content -->
  <main class="ml-20 p-8 w-full max-w-5xl">
    <div class="mb-6">
      <h1 class="text-2xl font-semibold">Profil Pelanggan</h1>
      <p class="text-sm text-slate-600">Kelola informasi Anda untuk mengontrol, melindungi, dan mengamankan</p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
      <!-- Form Card -->
      <div class="lg:col-span-2 bg-white rounded-xl shadow-md p-6">
        <form>
          <div class="mb-4">
            <label class="block text-sm font-medium mb-1" for="nama_lengkap">Nama Lengkap</label>
            <input id="nama_lengkap" type="text" value="{{ $user->name }}" class="w-full p-3 text-sm border border-slate-300 rounded-md bg-slate-50 placeholder-slate-400" />
          </div>

          <div class="mb-4">
            <label class="block text-sm font-medium mb-1" for="nomor_telepon">Nomor Telepon</label>
            <input id="nomor_telepon" type="tel" value="{{ $user->phone }}" class="w-full p-3 text-sm border border-slate-300 rounded-md bg-slate-50" />
          </div>

          <div class="mb-4">
            <label class="block text-sm font-medium mb-1" for="email">Email</label>
            <input id="email" type="email" value="{{ $user->email }}" class="w-full p-3 text-sm border border-slate-300 rounded-md bg-slate-50" />
          </div>

          <h2 class="text-lg font-medium text-slate-700 mt-6 mb-3">Alamat</h2>

          <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
            <div>
              <label class="block text-sm font-medium mb-1" for="kabupaten_kota">Kabupaten / Kota</label>
              <div class="relative">
                <select id="kabupaten_kota" class="w-full p-3 text-sm border border-slate-300 rounded-md bg-slate-50 appearance-none pr-10">
                  <option disabled selected>Pilih Kabupaten / Kota</option>
                  <option>Banyuwangi</option>
                  <option>Bali</option>
                  <option>Surabaya</option>
                </select>
                <span class="material-icons absolute right-3 top-1/2 -translate-y-1/2 text-gray-500 pointer-events-none">arrow_drop_down</span>
              </div>
            </div>
            <div>
              <label class="block text-sm font-medium mb-1" for="kecamatan">Kecamatan</label>
              <div class="relative">
                <select id="kecamatan" class="w-full p-3 text-sm border border-slate-300 rounded-md bg-slate-50 appearance-none pr-10">
                  <option disabled selected>Pilih Kecamatan</option>
                  <option>Kuta</option>
                  <option>Muncar</option>
                </select>
                <span class="material-icons absolute right-3 top-1/2 -translate-y-1/2 text-gray-500 pointer-events-none">arrow_drop_down</span>
              </div>
            </div>
          </div>

          <div class="mb-4">
            <label class="block text-sm font-medium mb-1" for="kelurahan">Kelurahan</label>
            <div class="relative">
              <select id="kelurahan" class="w-full p-3 text-sm border border-slate-300 rounded-md bg-slate-50 appearance-none pr-10">
                <option disabled selected>Pilih Kelurahan</option> 
                <option>Legian</option>
                <option>Wringinputih</option>
              </select>
              <span class="material-icons absolute right-3 top-1/2 -translate-y-1/2 text-gray-500 pointer-events-none">arrow_drop_down</span>
            </div>
          </div>

          <div class="mb-6">
            <label class="block text-sm font-medium mb-1" for="desa_jalan">Desa & Jalan</label>
            <textarea id="desa_jalan" rows="3" placeholder="Jln..." class="w-full p-3 text-sm border border-slate-300 rounded-md bg-slate-50"></textarea>
          </div>

          <div class="flex justify-end space-x-3">
            <button type="button" class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-emerald-500 rounded-md hover:bg-emerald-600">
              <span class="material-icons mr-2 text-base">save</span> Simpan
            </button>
            <button type="button" class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-indigo-600 rounded-md hover:bg-indigo-700">
              <span class="material-icons mr-2 text-base">edit</span> Edit
            </button>
          </div>
        </form>
      </div>

      <!-- Avatar Card -->
      <div class="bg-white rounded-xl shadow-md p-6 text-center">
        <div class="relative w-40 h-40 mx-auto rounded-full overflow-hidden shadow mb-4">
          <img src="https://lh3.googleusercontent.com/aida-public/AB6AXu..." alt="User avatar" class="w-full h-full object-cover" />
          <div class="absolute bottom-2 right-2 bg-blue-500 text-white rounded-full p-2 cursor-pointer">
            <span class="material-icons text-lg">photo_camera</span>
          </div>
        </div>
        <div class="space-x-2">
          <button class="px-4 py-1 text-sm text-white bg-blue-500 rounded-md hover:bg-blue-600">Upload</button>
          <button class="px-4 py-1 text-sm text-white bg-red-500 rounded-md hover:bg-red-600">Hapus</button>
        </div>
      </div>
    </div>
  </main>
</body>
</html>
