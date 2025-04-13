<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset("css/resetpassword.css") }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <title>Document</title>
</head>

<body>
    <div class="kotak">
        <h2>Masukan Password Baru ?</h2>
        <p>Masukan Password aru dibawah agar merubah password anda </p>
        <form method="POST" action="{{ route('password.store') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <input type="email" placeholder="Email" name="email" value="{{ old('email', $request->email) }}">
            <input type="password" name="password" placeholder="Password">
            <input type="password" name="password_confirmation" placeholder="Confirm Password">
            <button type="submit" class="pasbaru">Reset Password</button>
            <a href="{{ route('login') }}" class="link">Kembali ke Sign up</a>
        </form>
    </div>
</body>

</html>
