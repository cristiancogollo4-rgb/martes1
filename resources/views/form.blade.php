<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto - Sistema de Gestión</title>
    <style>
        :root {
            --primary: #1e293b;    /* Azul medianoche (Sidebar) */
            --accent: #6366f1;     /* Índigo (Botones/Foco) */
            --bg-gray: #f1f5f9;    /* Gris claro de fondo */
            --text-main: #334155;  /* Gris oscuro para texto */
        }

        body { 
            font-family: 'Inter', system-ui, -apple-system, sans-serif; 
            background-color: var(--bg-gray); 
            display: flex; 
            justify-content: center; 
            align-items: center;
            min-height: 100vh;
            margin: 0; 
            color: var(--text-main);
        }

        .card { 
            background: white; 
            padding: 40px; 
            border-radius: 16px; 
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1); 
            width: 100%; 
            max-width: 450px; 
        }

        h2 { 
            color: var(--primary); 
            margin-top: 0;
            margin-bottom: 8px; 
            font-size: 1.5rem;
            font-weight: 700;
        }

        p {
            color: #64748b;
            font-size: 0.9rem;
            margin-bottom: 25px;
        }

        .form-group { margin-bottom: 20px; }

        label { 
            display: block; 
            margin-bottom: 8px; 
            font-weight: 600;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 0.025em;
            color: #475569; 
        }

        input[type="email"], textarea { 
            width: 100%; 
            padding: 12px 16px; 
            border: 2px solid #e2e8f0; 
            border-radius: 10px; 
            box-sizing: border-box; 
            font-family: inherit;
            font-size: 0.95rem;
            transition: all 0.3s ease;
        }

        input:focus, textarea:focus {
            outline: none;
            border-color: var(--accent);
            box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.1);
        }

        textarea { height: 120px; resize: none; }

        button { 
            background-color: var(--primary); 
            color: white; 
            border: none; 
            padding: 14px; 
            border-radius: 10px; 
            cursor: pointer; 
            width: 100%; 
            font-size: 1rem; 
            font-weight: 600;
            transition: all 0.2s ease;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 8px;
        }

        button:hover { 
            background-color: var(--accent); 
            transform: translateY(-1px);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }

        button:active { transform: translateY(0); }
    </style>
</head>
<body>

<div class="card">
    <h2>Contáctanos</h2>
    <p>Envíanos tus dudas sobre el inventario y te responderemos pronto.</p>
    
    <form action="/contacto" method="GET">
        <div class="form-group">
            <label for="email">Correo Electrónico</label>
            <input type="email" id="email" name="email" placeholder="nombre@empresa.com" required>
        </div>

        <div class="form-group">
            <label for="mensaje">Tu Mensaje</label>
            <textarea id="mensaje" name="mensaje" placeholder="¿En qué podemos ayudarte?" required></textarea>
        </div>

        <button type="submit">
            <span>Enviar Mensaje</span>
        </button>
    </form>
</div>

</body>
</html>