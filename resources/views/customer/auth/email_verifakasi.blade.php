<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset("css/users/verifikasi_email.css") }}">
    <title>Lupa Password</title>
</head>

<body>
    <div class="container">
        <div class="form-container">
            <h1>Lupa Password 😟</h1>
            <p>Jangan khawatir! Kami akan mengembalikan akun Anda.</p>
            @if (session('status') == 'verification-link-sent')
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                </div>
            @endif
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf
                <input type="email" placeholder="Masukkan email Anda" required>
                <button type="submit">Kirim Link Reset Password</button>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <p><button type="submit">Kembali ke Sign up</button></p>
            </form>

        </div>
        <div class="image-container">
            <img src="gorden.jpg" alt="Interior" />
        </div>
    </div>
</body>

</html>
