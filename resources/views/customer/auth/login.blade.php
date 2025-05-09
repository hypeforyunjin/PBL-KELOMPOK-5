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
                <p class="Deskripsi">Akses produk, kelola pesanan, dan nikmati pengalaman belanja yang lebih mudah.</p>
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Email Address -->
                    <div class="Layoutemail">
                        <label for="">email</label>
                        <input name="email" type="text">
                    </div>
                    <div class="Layoutpassword">
                        <label for="">password</label>
                        <input name="password" type="password">
                    </div>
                    <div class="Layoutlupa"> <a href="{{ route('password.request') }}">forgot password</a>
                    </div>
                    <div class="button"><button type="submit">sign in</button></div>
                    {{-- <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div> --}}

                    <!-- Password -->
                    {{-- <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" />

                    <x-text-input id="password" class="block mt-1 w-full"
                                    type="password"
                                    name="password"
                                    required autocomplete="current-password" />

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div> --}}

                    <!-- Remember Me -->
                    {{-- <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                        <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                    </label>
                </div> --}}

                    {{-- <div class="flex items-center justify-end mt-4">
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif

                    <x-primary-button class="ms-3">
                        {{ __('Log in') }}
                    </x-primary-button>
                </div> --}}
                </form>
                <div class="atau">
                    <hr>
                    <p>or</p>
                    <hr>
                </div>
                <div class="Google">
                    <p>sign in with google</p>
                </div>
                <div class="gaadaakun">
                    <p>belum punya akun?</p>
                    <a href="{{route("register")}}">sign up</a>
                </div>
            </div>
        </section>
        <section class="living"><img class="foto" src="{{ asset('img/download.jpg') }}" alt="">
            <div class="overlay">
                <div class="text">HALO PENGGUNA</div>
            </div>
        </section>
    </main>
</body>

</html>