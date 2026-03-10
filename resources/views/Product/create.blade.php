@extends('layouts.app')

@section('title', 'Nuevo Producto')

@section('content')
<div class="wrapper" style="max-width: 700px; margin: 0 auto;">
    <div class="container" style="background: white; border-radius: 15px; overflow: hidden; box-shadow: 0 10px 25px rgba(0,0,0,0.1);">
        <div class="header" style="background: linear-gradient(135deg, #2563eb 0%, #1e40af 100%); color: white; padding: 30px; text-align: center;">
            <h1 style="margin: 0; font-size: 1.8rem;">➕ Nuevo Producto</h1>
            <p style="margin: 5px 0 0; opacity: 0.8;">Registra mercancía en el inventario</p>
        </div>

        <div class="form-container" style="padding: 30px;">
            {{-- Importante: El action debe ser /product/store --}}
            <form method="POST" action="{{ url('/product') }}">
                @csrf

                <div style="margin-bottom: 20px;">
                    <label style="display: block; font-weight: 600; margin-bottom: 8px;">Nombre del Producto <span style="color:red">*</span></label>
                    <input type="text" name="nombre" style="width: 100%; padding: 12px; border: 1px solid #e2e8f0; border-radius: 8px;" placeholder="Ej: Monitor 4K" required>
                </div>

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 20px;">
                    <div>
                        <label style="display: block; font-weight: 600; margin-bottom: 8px;">Precio <span style="color:red">*</span></label>
                        <input type="number" name="price" step="0.01" style="width: 100%; padding: 12px; border: 1px solid #e2e8f0; border-radius: 8px;" placeholder="0.00" required>
                    </div>
                    <div>
                        <label style="display: block; font-weight: 600; margin-bottom: 8px;">Stock <span style="color:red">*</span></label>
                        <input type="number" name="stock" style="width: 100%; padding: 12px; border: 1px solid #e2e8f0; border-radius: 8px;" placeholder="Cant." required>
                    </div>
                </div>

                <div style="margin-bottom: 20px;">
                    <label style="display: block; font-weight: 600; margin-bottom: 8px;">Descripción <span style="color:red">*</span></label>
                    <textarea name="descripcion" style="width: 100%; padding: 12px; border: 1px solid #e2e8f0; border-radius: 8px; min-height: 100px;" placeholder="Detalles técnicos..." required></textarea>
                </div>

                <button type="submit" style="width: 100%; background: #2563eb; color: white; padding: 15px; border: none; border-radius: 8px; font-weight: bold; cursor: pointer; transition: 0.3s;">
                    💾 Guardar en Inventario
                </button>
            </form>
        </div>
    </div>
</div>
@endsection