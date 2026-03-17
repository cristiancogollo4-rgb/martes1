<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Admin Ecommerce')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="d-flex min-vh-100">
    <aside class="bg-dark text-white p-3" style="width:260px;">
        <h5 class="mb-4">Panel Admin</h5>
        <ul class="nav nav-pills flex-column gap-2">
            <li class="nav-item"><a class="nav-link text-white" href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="nav-item"><a class="nav-link text-white" href="{{ route('admin.products.index') }}">Productos</a></li>
            <li class="nav-item"><a class="nav-link text-white" href="{{ route('admin.categories.index') }}">Categorías</a></li>
            <li class="nav-item"><a class="nav-link text-white" href="{{ route('admin.cart.index') }}">Carrito</a></li>
        </ul>
    </aside>
    <div class="flex-grow-1 bg-light">
        <nav class="navbar bg-white border-bottom px-4"><span class="fw-semibold">Administración Ecommerce</span></nav>
        <div class="p-4">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @yield('content')
        </div>
    </div>
</div>
</body>
</html>
