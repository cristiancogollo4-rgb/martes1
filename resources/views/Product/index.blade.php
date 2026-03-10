@extends('layouts.app') @section('title', 'Inventario de Productos')

@section('content')
    <header style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">
        <div>
            <h1 style="margin: 0; color: #1e293b;">Gestión de Inventario</h1>
            <p style="color: #64748b; margin: 5px 0 0 0;">Listado oficial de existencias en bodega</p>
        </div>
        <a href="{{ url('/product/create') }}" style="background: #6366f1; color: white; padding: 12px 20px; border-radius: 10px; text-decoration: none; font-weight: 600; transition: 0.3s;">
            + Añadir Producto
        </a>
    </header>

    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(180px, 1fr)); gap: 20px; margin-bottom: 30px;">
        <div style="background: white; padding: 20px; border-radius: 12px; box-shadow: 0 1px 3px rgba(0,0,0,0.1); border-left: 4px solid #6366f1;">
            <small style="color: #64748b; font-weight: 600;">TOTAL ITEMS</small>
            <div style="font-size: 1.5rem; font-weight: bold; color: #1e293b;">{{ count($productList ?? []) }}</div>
        </div>
        <div style="background: white; padding: 20px; border-radius: 12px; box-shadow: 0 1px 3px rgba(0,0,0,0.1); border-left: 4px solid #10b981;">
            <small style="color: #64748b; font-weight: 600;">ESTADO</small>
            <div style="font-size: 1.2rem; font-weight: bold; color: #10b981;">Sincronizado</div>
        </div>
    </div>

    <div style="background: white; border-radius: 12px; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1); overflow: hidden;">
        <table style="width: 100%; border-collapse: collapse; text-align: left;">
            <thead style="background-color: #f8fafc; border-bottom: 2px solid #e2e8f0;">
                <tr>
                    <th style="padding: 15px 20px; font-size: 0.75rem; color: #64748b;">ID</th>
                    <th style="padding: 15px 20px; font-size: 0.75rem; color: #64748b;">PRODUCTO</th>
                    <th style="padding: 15px 20px; font-size: 0.75rem; color: #64748b;">MARCA</th>
                    <th style="padding: 15px 20px; font-size: 0.75rem; color: #64748b;">PRECIO</th>
                    <th style="padding: 15px 20px; font-size: 0.75rem; color: #64748b;">ESTADO</th>
                    <th style="padding: 15px 20px; font-size: 0.75rem; color: #64748b;">ACCIONES</th>
                </tr>
            </thead>
            <tbody>
                @forelse($productList ?? [] as $prod)
                <tr style="transition: background 0.2s;" onmouseover="this.style.backgroundColor='#f8fafc'" onmouseout="this.style.backgroundColor='transparent'">
                    <td style="padding: 15px 20px; color: #94a3b8;">#{{ $prod->id }}</td>
                    <td style="padding: 15px 20px;"><strong>{{ $prod->nombre ?? $prod->name }}</strong></td>
                    <td style="padding: 15px 20px;">{{ $prod->marca ?? 'Genérico' }}</td>
                    <td style="padding: 15px 20px; font-weight: 600; color: #1e293b;">${{ number_format($prod->price, 2) }}</td>
                    <td style="padding: 15px 20px;">
                        <span style="background: #e0e7ff; color: #4338ca; padding: 4px 10px; border-radius: 20px; font-size: 0.7rem; font-weight: bold; text-transform: uppercase;">
                            {{ $prod->estado ?? 'nuevo' }}
                        </span>
                    </td>
                    <td style="padding: 15px 20px;">
                        <a href="{{ url('/product/'.$prod->id) }}" style="color: #6366f1; text-decoration: none; font-weight: 600; font-size: 0.9rem;">
                            Ver Detalle
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" style="padding: 60px; text-align: center; color: #64748b;">
                        <div style="font-size: 3rem; margin-bottom: 10px;">📦</div>
                        <p>No se encontraron productos en el inventario.</p>
                        <a href="{{ url('/product/create') }}" style="color: #6366f1; font-weight: bold;">Crea el primero aquí</a>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection