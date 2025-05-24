<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/verfikasi_email.css') }}">
    <title>Lupa Password</title>
</head>

<body>
    <div class="container">
        <div class="form-container">
            <h1>Lupa Password 😟</h1>
            <p>Jangan khawatir! Kami akan mengembalikan akun Anda.</p>

            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <input type="email" name="email" placeholder="Masukkan email Anda" required>
                <button type="submit">Kirim Link Reset Password</button>
            </form>

            <a href="{{ route('login') }}">Kembali ke Sign up</a>
        </div>

        <div class="image-container">
            <img src="{{ asset('img/gorden.jpg') }}" alt="Interior" />
        </div>
    </div>
</body>

</html>
