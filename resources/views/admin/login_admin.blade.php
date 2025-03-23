<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <meta charset="UTF-8">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <meta name="viewport" content="widt§h=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <main class="layout">
        <section class="layoutForm">
            <div class="endtext">


                <h1 class="Judultext">Selamat Datang</h1>
                <p class="Deskripsi">Akses Website Admin pemesanan dan penjualan gorden.</p>
                <form method="POST" action="{{ route('admin.loginSubmit') }}">
                    @csrf

                    <!-- Email Address -->
                    <div class="Layoutemail">
                        <label for="">username</label>
                        <input name="username" type="text">
                    </div>
                    <div class="Layoutpassword">
                        <label for="">password</label>
                        <input name="password" type="password">
                    </div>
                    <div class="button"><button type="submit">sign in</button></div>
                </form>
        </section>
        <section class="living"><img class="foto" src="{{ asset('img/download.jpg') }}" alt="">
            <div class="overlay">
                <div class="text">HALO PENGGUNA</div>
            </div>
        </section>
    </main>
</body>

</html>
