<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Catálogo de Productos</title>
    <style>
        :root {
            --primary: #2563eb;
            --primary-dark: #1e40af;
            --primary-light: #3b82f6;
            --success: #10b981;
            --danger: #ef4444;
            --muted: #6b7280;
            --light-bg: #f9fafb;
            --border: #e5e7eb;
            --card-bg: #ffffff;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
            color: #1f2937;
        }

        .page { max-width: 1400px; margin: 0 auto; padding: 30px 20px; }

        header {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            color: #ffffff;
            padding: 40px 30px;
            border-radius: 16px;
            margin-bottom: 40px;
            box-shadow: 0 10px 30px rgba(37, 99, 235, 0.2);
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 20px;
        }

        .btn-admin {
            padding: 12px 24px;
            background: rgba(255, 255, 255, 0.2);
            color: white;
            border: 1px solid white;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s;
        }

        .btn-admin:hover { background: white; color: var(--primary); }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 28px;
        }

        .card {
            background: var(--card-bg);
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            overflow: hidden;
            display: flex;
            flex-direction: column;
            transition: all 0.3s ease;
            border: 1px solid var(--border);
        }

        .card:hover { transform: translateY(-6px); border-color: var(--primary-light); }

        .card .media {
            height: 200px;
            background-color: #f3f6fb;
            background-size: cover;
            background-position: center;
        }

        .card .body { padding: 20px; flex: 1; display: flex; flex-direction: column; }

        .title { font-weight: 700; font-size: 1.1rem; color: #1f2937; margin-bottom: 8px; }

        .desc { color: var(--muted); font-size: 0.85rem; margin-bottom: 16px; line-height: 1.4; }

        .price-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: auto;
            padding-top: 12px;
            border-top: 1px solid var(--border);
        }

        .price { font-weight: 700; color: var(--primary); font-size: 1.3rem; }

        .btn-buy {
            background: var(--primary);
            color: white;
            padding: 8px 16px;
            border-radius: 6px;
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 600;
        }

        footer { text-align: center; padding: 40px; color: var(--muted); }
    </style>
</head>
<body>

<div class="page">
    <header>
        <div>
            <h1>🖥️ Nuestra Tienda</h1>
            <p>Los mejores componentes a un clic</p>
        </div>
        <div class="header-controls">
            <a href="{{ route('product.index') }}" class="btn-admin">⚙️ Administración</a>
        </div>
    </header>

    <section class="grid">
        @forelse($productList as $prod)
            <article class="card">
                {{-- Imagen del producto --}}
                <div class="media" style="background-image:url('{{ $prod->image ? asset($prod->image) : 'https://via.placeholder.com/400x300?text=Sin+Imagen' }}')"></div>
                
                <div class="body">
                    <h2 class="title">{{ $prod->name }}</h2>
                    <p class="desc">{{ Str::limit($prod->description, 80) }}</p>
                    
                    <div class="price-row">
                        <div class="price">${{ number_format($prod->price, 2) }}</div>
                        <a href="{{ url('/product/'.$prod->id) }}" class="btn-buy">Ver más</a>
                    </div>
                </div>
            </article>
        @empty
            <div style="grid-column: 1/-1; text-align: center; padding: 50px;">
                <h2>No hay productos disponibles por ahora.</h2>
            </div>
        @endforelse
    </section>

    <footer>
        &copy; {{ date('Y') }} - Desarrollado en Laravel
    </footer>
</div>

</body>
</html>