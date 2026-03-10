<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sistema de Gestión')</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --sidebar-width: 260px;
            --primary: #1e293b;    /* Azul Medianoche */
            --accent: #6366f1;     /* Índigo */
            --bg-gray: #f1f5f9;
            --white: #ffffff;
        }

        body {
            font-family: 'Inter', sans-serif;
            margin: 0;
            display: flex;
            background-color: var(--bg-gray);
            color: #334155;
        }

        /* Sidebar Navegación */
        .sidebar {
            width: var(--sidebar-width);
            background-color: var(--primary);
            height: 100vh;
            color: var(--white);
            position: fixed;
            padding: 20px;
            box-sizing: border-box;
        }

        .sidebar h2 {
            font-size: 1.2rem;
            border-bottom: 1px solid #334155;
            padding-bottom: 15px;
            margin-bottom: 20px;
        }

        .nav-links {
            list-style: none;
            padding: 0;
        }

        .nav-links li { margin-bottom: 10px; }

        .nav-links a {
            color: #cbd5e1;
            text-decoration: none;
            display: block;
            padding: 10px 15px;
            border-radius: 8px;
            transition: all 0.3s;
        }

        .nav-links a:hover {
            background-color: var(--accent);
            color: white;
        }

        /* Contenido Principal */
        .main-container {
            margin-left: var(--sidebar-width);
            flex: 1;
            padding: 40px;
            min-height: 100vh;
        }

        footer {
            margin-top: 40px;
            text-align: center;
            font-size: 0.8rem;
            color: #64748b;
        }
    </style>
</head>
<body>

    <aside class="sidebar">
        <h2>🛠️ AdminPanel</h2>
        <ul class="nav-links">
            <li><a href="{{ url('/tienda') }}">🏠 Inicio</a></li>
            <li><a href="{{ url('/product/index') }}">📦 Inventario</a></li>
            <li><a href="{{ url('/product/create') }}">➕ Nuevo Producto</a></li>
            <li><a href="{{ url('/contacto') }}">📩 Contacto</a></li>
        </ul>
    </aside>

    <main class="main-container">
        @yield('content')

        <footer>
            © {{ date('Y') }} Mi Sistema de Gestión — Diferente por Diseño.
        </footer>
    </main>

</body>
</html>