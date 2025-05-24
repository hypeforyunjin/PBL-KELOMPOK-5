<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('admin.addgorden.post') }}" method="post" enctype="multipart/form-data">
            @csrf

            <!-- Nama -->
            <label for="nama">Nama Produk:</label>
            <input type="text" id="nama" name="nama_gorden" required minlength="3">
            <br>

            <!-- Deskripsi -->
            <label for="deskripsi">Deskripsi:</label>
            <textarea id="deskripsi" name="deskripsi"></textarea>
            <br>

            <!-- Harga -->
            <label for="harga">Harga:</label>
            <input type="number" id="harga" name="harga" required step="0.01" min="0">
            <br>

            <!-- Stok -->
            <label for="stock">Stok:</label>
            <input type="number" id="stock" name="stok" min="0">
            <br>

            <!-- Gambar -->
            <label for="gambar">Upload Gambar:</label>
            <input type="file" id="gambar" name="gambar" accept=".jpg,.jpeg,.webp,.png">
            <br>

            <!-- Jenis Gorden -->
            <label for="jenis_id">Jenis Gorden:</label>
            <select id="jenis_id" name="jenis_id" required>
                <!-- Ini contoh saja, nanti kamu bisa looping dari controller -->
                <option value="">-- Pilih Jenis --</option>
                @foreach ($JenisGorden as $Jenis )
                <option value="{{ $Jenis["id"] }}">{{$Jenis["nama_jenis"]}}</option>
                @endforeach
            </select>
            <br>

            <button type="submit">Simpan</button>
        </form>

</body>
</html>
