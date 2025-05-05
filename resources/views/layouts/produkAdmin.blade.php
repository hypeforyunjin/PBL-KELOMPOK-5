<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Gorden Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            height: 100vh;
            overflow: hidden;
        }
        .sidebar {
            width: 220px;
            background-color: #0f2537;
            color: white;
            padding: 1rem;
        }
        .sidebar a {
            color: white;
            display: block;
            margin: 1rem 0;
            text-decoration: none;
        }
        .sidebar a:hover {
            text-decoration: underline;
        }
        .content {
            flex-grow: 1;
            background-color: #f8f6fc;
            padding: 2rem;
            overflow-y: auto;
        }
    </style>
</head>
<body>

    <div class="sidebar">
        <h5>Gorden Dashboard</h5>
        <a href="#">Dashboard</a>
        <a href="#">Produk</a>
    </div>

    <div class="content">
        @yield('content')
    </div>

</body>
</html>
