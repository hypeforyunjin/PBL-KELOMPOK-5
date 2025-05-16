<!doctype html>
<html lang="en">

<head>
    <!-- Meta Tags -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="title" content="AdminLTE v4 | Dashboard" />
    <meta name="author" content="ColorlibHQ" />
    <meta name="description"
        content="AdminLTE is a Free Bootstrap 5 Admin Dashboard, 30 example pages using Vanilla JS." />
    <meta name="keywords" content="bootstrap 5, bootstrap, admin dashboard, charts, tables, datatable, colorlibhq" />

    <!-- Title -->
    <title>AdminGorden</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="{{ asset('https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css') }}"
        integrity="sha256-tXJfXfp6Ewt1ilPzLDtQnJV4hclT9XuaZUKyUvmyr+Q=" crossorigin="anonymous" />

    <!-- Third Party Plugins -->
    <link rel="stylesheet"
        href="{{ asset('https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/styles/overlayscrollbars.min.css') }}"
        integrity="sha256-tZHrRjVqNSRyWg2wbppGnT833E/Ys0DHWGwT04GiqQg=" crossorigin="anonymous" />
    <link rel="stylesheet"
        href="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css') }}"
        integrity="sha256-9kPW/n5nn53j4WMRYAxe9c1rCY96Oogo/MKSVdKzPmI=" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{ asset('https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.css') }}"
        integrity="sha256-4MX+61mt9NVvvuPjUWdUdyfZfxSB1/Rf9WtqRHgG5S0=" crossorigin="anonymous" />

    <!-- AdminLTE -->
    <link rel="stylesheet" href="{{ asset('../../AdminLTE/dist/css/adminlte.css') }}" />

    <!-- JS Vector Map -->
    <link rel="stylesheet"
        href="{{ asset('https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/css/jsvectormap.min.css') }}"
        integrity="sha256-+uGLJmmTKOqBr+2E6KDYs/NRsHxSkONXFHUL0fy2O/4=" crossorigin="anonymous" />
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet" />
</head>

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <!-- Wrapper -->
    <div class="app-wrapper">
        <!-- Header -->
        <nav class="app-header navbar navbar-expand bg-body">
            <div class="container-fluid">
                <!-- Navbar Left -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
                            <i class="bi bi-list"></i>
                        </a>
                    </li>
                    <li class="nav-item d-none d-md-block"><a href="#" class="nav-link">Home</a></li>
                </ul>

                <!-- Navbar Right -->
                <ul class="navbar-nav ms-auto">
                    <!-- Search -->
                    <li class="nav-item">
                        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                            <i class="bi bi-search"></i>
                        </a>
                    </li>

                    <!-- Messages -->
                    <li class="nav-item dropdown">
                        <a class="nav-link" data-bs-toggle="dropdown" href="#">
                            <i class="bi bi-chat-text"></i>
                            <span class="navbar-badge badge text-bg-danger">3</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                            <!-- Message Items -->
                            <a href="#" class="dropdown-item">
                                <div class="d-flex">
                                    <div class="flex-shrink-0">
                                        <img src="{{ asset('../../AdminLTE/dist/assets/img/user1-128x128.jpg') }}"
                                            alt="User Avatar" class="img-size-50 rounded-circle me-3" />
                                    </div>
                                    <div class="flex-grow-1">
                                        <h3 class="dropdown-item-title">
                                            Brad Diesel
                                            <span class="float-end fs-7 text-danger"><i
                                                    class="bi bi-star-fill"></i></span>
                                        </h3>
                                        <p class="fs-7">Call me whenever you can...</p>
                                        <p class="fs-7 text-secondary">
                                            <i class="bi bi-clock-fill me-1"></i> 4 Hours Ago
                                        </p>
                                    </div>
                                </div>
                            </a>
                            <div class="dropdown-divider"></div>
                            <!-- More Messages -->
                            <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                        </div>
                    </li>

                    <!-- Notifications -->
                    <li class="nav-item dropdown">
                        <a class="nav-link" data-bs-toggle="dropdown" href="#">
                            <i class="bi bi-bell-fill"></i>
                            <span class="navbar-badge badge text-bg-warning">15</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                            <span class="dropdown-item dropdown-header">15 Notifications</span>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">
                                <i class="bi bi-envelope me-2"></i> 4 new messages
                                <span class="float-end text-secondary fs-7">3 mins</span>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item dropdown-footer"> See All Notifications </a>
                        </div>
                    </li>

                    <!-- Fullscreen -->
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-lte-toggle="fullscreen">
                            <i data-lte-icon="maximize" class="bi bi-arrows-fullscreen"></i>
                            <i data-lte-icon="minimize" class="bi bi-fullscreen-exit" style="display: none"></i>
                        </a>
                    </li>

                    <!-- User Menu -->
                    <li class="nav-item dropdown user-menu">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img src="{{ asset('../../AdminLTE/dist/assets/img/user2-160x160.jpg') }}"
                                class="user-image rounded-circle shadow" alt="User Image" />
                            <span class="d-none d-md-inline">Alexander Pierce</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                            <li class="user-header text-bg-primary">
                                <img src="{{ asset('../../AdminLTE/dist/assets/img/user2-160x160.jpg') }}"
                                    class="rounded-circle shadow" alt="User Image" />
                                <p>
                                    Alexander Pierce - Web Developer
                                    <small>Member since Nov. 2023</small>
                                </p>
                            </li>
                            <li class="user-footer">
                                <a href="#" class="btn btn-default btn-flat">Profile</a>
                                <a href="#" class="btn btn-default btn-flat float-end">Sign out</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- Sidebar -->
        <aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
            <div class="sidebar-brand">
                <a href="./index.html" class="brand-link">
                    <span class="brand-text fw-light">Dashboard Gorden</span>
                </a>
            </div>
            <div class="sidebar-wrapper">
                <nav class="mt-2">
                    <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item menu-open">
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="./index.html" class="nav-link active">
                                        <i class="nav-icon bi bi-circle"></i>
                                        <p>Dashboard</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="app-main">
            <div class="app-content-header">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <h3 class="mb-0">Dashboard</h3>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-end">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Tempatkan halaman/page baru di bawah ini -->
            <div class="app-content">
                <div class="flex">
                    {{-- <!-- Sidebar -->
                    <div class="w-64 bg-gray-800 text-white h-screen">
                        <h2 class="text-center text-2xl py-4">Dashboard</h2>
                        <ul class="mt-5">
                            <li class="py-2 text-center hover:bg-gray-700 cursor-pointer">Dashboard</li>
                            <li class="py-2 text-center hover:bg-gray-700 cursor-pointer">
                                <a href="{{ route('produk.admin') }}">Produk</a>
                            </li>
                        </ul>
                    </div> --}}

                    <!-- Main Content -->
                    <div class="flex-1 p-6">
                        <div class="bg-white rounded-lg shadow-md p-4 mb-6">
                            <h1 class="text-xl font-semibold">Assalamualaikum wr. wb., At'min</h1>
                            <img src="/img/Animasi Dashboard.gif" alt="Animasi Dashboard" class="w-24 h-auto ml-auto" />
                        </div>

                        <!-- Card Summary -->
                        <div class="grid grid-cols-4 gap-4 mb-6">
                            <div class="bg-yellow-400 rounded-lg shadow p-4 text-center">
                                <h3 class="text-lg">Total Produk</h3>
                                <p class="text-2xl font-bold">30</p>
                            </div>
                            <div class="bg-indigo-700 text-white rounded-lg shadow p-4 text-center">
                                <h3 class="text-lg">Total Transaksi</h3>
                                <p class="text-2xl font-bold">50</p>
                            </div>
                            <div class="bg-pink-500 text-white rounded-lg shadow p-4 text-center">
                                <h3 class="text-lg">Average Review</h3>
                                <p class="text-2xl font-bold">4.9</p>
                            </div>
                            <div class="bg-gray-500 text-white rounded-lg shadow p-4 text-center">
                                <h3 class="text-lg">Total Pelanggan</h3>
                                <p class="text-2xl font-bold">1005</p>
                            </div>
                        </div>

                        <!-- Product List -->
                        <div>
                            <!-- Produk 1 -->
                            <div class="bg-white rounded-lg shadow p-4 mb-4 flex justify-between items-center">
                                <div class="flex items-center space-x-4">
                                    <img src="{{ asset('img/gorden 5.jpg') }}" alt="Gorden 5" class="w-12 h-12 rounded">
                                    <div>
                                        <h4 class="text-lg">Gorden 5</h4>
                                        <p class="text-gray-600">Rp 150.000</p>
                                    </div>
                                </div>

                                <div class="flex flex-col items-center space-y-2">
                                    <div class="flex items-center space-x-2">
                                        <span id="label-toggle-1" class="font-semibold">Private</span>
                                        <label class="relative inline-flex items-center cursor-pointer">
                                            <input type="checkbox" id="toggle-1" class="sr-only"
                                                onchange="toggleLabel(1)">
                                            <div id="track-1"
                                                class="w-11 h-6 bg-gray-200 rounded-full relative transition-colors duration-300">
                                                <div id="dot-1"
                                                    class="absolute top-0.5 left-0.5 bg-gray-800 h-5 w-5 rounded-full transition-all duration-300 transform">
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <!-- Produk 2 -->
                            <div class="bg-white rounded-lg shadow p-4 mb-4 flex justify-between items-center">
                                <div class="flex items-center space-x-4">
                                    <img src="{{ asset('img/gorden 8.jpg') }}" alt="Gorden 6" class="w-12 h-12 rounded">
                                    <div>
                                        <h4 class="text-lg">Gorden 6</h4>
                                        <p class="text-gray-600">Rp 260.000</p>
                                    </div>
                                </div>

                                <div class="flex flex-col items-center space-y-2">
                                    <div class="flex items-center space-x-2">
                                        <span id="label-toggle-2" class="font-semibold">Private</span>
                                        <label class="relative inline-flex items-center cursor-pointer">
                                            <input type="checkbox" id="toggle-2" class="sr-only"
                                                onchange="toggleLabel(2)">
                                            <div id="track-2"
                                                class="w-11 h-6 bg-gray-200 rounded-full relative transition-colors duration-300">
                                                <div id="dot-2"
                                                    class="absolute top-0.5 left-0.5 bg-gray-800 h-5 w-5 rounded-full transition-all duration-300 transform">
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @yield('content')
            </div>
        </main>

        <!-- Footer -->
        <footer class="app-footer">
            <div class="float-end d-none d-sm-inline">Anything you want</div>
            <strong>
                Copyright &copy; 2014-2024&nbsp;
                <a href="https://adminlte.io" class="text-decoration-none">AdminLTE.io</a>.
            </strong>
            All rights reserved.
        </footer>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('../../AdminLTE/dist/js/adminlte.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.min.js"
        integrity="sha256-+vh8GkaU7C9/wbSLIcwq82tQ2wTf44aOHA8HlBMwRI8=" crossorigin="anonymous"></script>

    <script>
        function toggleLabel(id) {
            const checkbox = document.getElementById('toggle-' + id);
            const label = document.getElementById('label-toggle-' + id);
            const dot = document.getElementById('dot-' + id);
            const track = document.getElementById('track-' + id);

            if (checkbox.checked) {
                label.textContent = 'Publik';
                dot.classList.remove('translate-x-0');
                dot.classList.add('translate-x-full');
                track.classList.remove('bg-gray-200');
                track.classList.add('bg-blue-600');
            } else {
                label.textContent = 'Private';
                dot.classList.remove('translate-x-full');
                dot.classList.add('translate-x-0');
                track.classList.remove('bg-blue-600');
                track.classList.add('bg-gray-200');
            }
        }

        document.addEventListener('DOMContentLoaded', () => {
            const toggles = document.querySelectorAll('input[type="checkbox"][id^="toggle-"]');
            toggles.forEach(input => {
                const id = input.id.split('-')[1];
                toggleLabel(id);
            });
        });
    </script>
</body>

</html>