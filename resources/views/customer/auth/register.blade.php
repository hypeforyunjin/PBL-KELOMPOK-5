<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Register</title>
    <link rel="stylesheet" href="{{asset("css/register.css")}}">
</head>
<body>
    <div class="container">
        <div class="register-box">
            <h2>Selamat Datang 👋</h2>
            <p>Buat akun untuk menikmati pengalaman belanja yang lebih mudah.</p>
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <label for="name">Nama Lengkap</label>
                <input type="text" name="name" id="name" placeholder="Nama Lengkap" required>

                <label for="email">Email</label>
                <input type="email" name="email" id="email" placeholder="Example@email.com" required>

                <label for="phone">Nomor Telepon</label>
                <input type="tel" name="phone" id="phone" placeholder="Nomor Telepon" required>

                <label for="password">Password</label>
                <input type="password" name="password" id="password" placeholder="At least 8 characters" required>

                <label for="password">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" id="password" placeholder="At least 8 characters" required>


                <button type="submit">Sign up</button>
            </form>
            <p class="login-link">Sudah punya akun? <a href="/">Sign in</a></p>
        </div>
        <div class="image-box">
            <img src="{{asset("img/gambar.jpg")}}" alt="">
        </div>
    </div>
</body>
</html>