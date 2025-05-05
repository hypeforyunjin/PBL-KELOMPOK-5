<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>Nama Gorden</th>
                <th>Deskripsi</th>
                <th>Harga</th>
                <th>Stock</th>
                <th>Gambar</th>
                <th>Jenis</th>
                <th>Action</th>

            </tr>
        </thead>
        <tbody>
            @foreach($gordens as $gorden)
            <tr>
                <td>{{ $gorden->nama_gorden }}</td>
                <td>{{ $gorden->deskripsi ?? '-' }}</td>
                <td>Rp{{ number_format($gorden->harga, 0, ',', '.') }}</td>
                <td>{{ $gorden->stok }}</td>
                <td>
                    @if ($gorden->gambar)
                        <img src="{{ asset('GambarGorden/' . $gorden->gambar) }}" alt="Gambar" width="100">
                    @else
                        Tidak ada gambar
                    @endif
                </td>
                <td>{{ $gorden->jenis_gorden->nama_jenis ?? '-' }}</td>
                <td><a href="{{ route('admin.editgorden', $gorden->id) }}">edit</a>
                <form method="post" action="{{ route('admin.deletegorden', $gorden->id) }}">
                    @method('DELETE') @csrf
                    <button type="submit"> HAPUS GORDEN</button>
                </form>
                </td>

            </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
