<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Admin Ecommerce')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .admin-table-wrap {
            background: #fff;
            border-radius: 12px;
            border: 1px solid #e5e7eb;
            overflow: hidden;
        }

        .admin-table {
            width: 100%;
            border-collapse: collapse;
        }

        .admin-table th,
        .admin-table td {
            padding: .8rem .9rem;
            border-bottom: 1px solid #eef2f7;
            vertical-align: middle;
        }

        .admin-table thead th {
            background: #f8fafc;
            font-size: .85rem;
            color: #475569;
        }

        .actions-cell {
            text-align: right;
            width: 1%;
            white-space: nowrap;
        }

        .actions-group {
            display: inline-flex;
            align-items: center;
            gap: .4rem;
            flex-wrap: nowrap;
        }

        .admin-action-btn {
            display: inline-block;
            border: 1px solid transparent;
            border-radius: 6px;
            font-size: .75rem;
            line-height: 1;
            padding: .38rem .55rem;
            text-decoration: none;
            background: #fff;
            cursor: pointer;
        }

        .admin-action-btn:hover {
            opacity: .9;
        }

        .admin-action-btn.primary {
            color: #1d4ed8;
            border-color: #bfdbfe;
            background: #eff6ff;
        }

        .admin-action-btn.neutral {
            color: #334155;
            border-color: #cbd5e1;
            background: #f8fafc;
        }

        .admin-action-btn.danger {
            color: #b91c1c;
            border-color: #fecaca;
            background: #fff1f2;
        }

        .admin-action-form {
            display: inline;
            margin: 0;
        }
    </style>
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
