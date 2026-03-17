@extends('layouts.admin')

@section('title', 'Productos')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h4 mb-0">Productos</h1>
    <a href="{{ route('admin.products.create') }}" class="btn btn-primary btn-sm">Nuevo producto</a>
</div>

<div class="admin-table-wrap">
    <table class="admin-table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Categoría</th>
                <th>Precio</th>
                <th>Stock</th>
                <th class="actions-cell">Acciones</th>
            </tr>
        </thead>
        <tbody>
        @forelse($products as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>{{ $product->category?->name ?? 'Sin categoría' }}</td>
                <td>${{ number_format($product->price, 2) }}</td>
                <td>{{ $product->stock }}</td>
                <td class="actions-cell">
                    <div class="actions-group">
                        <a href="{{ route('products.show', $product) }}" class="admin-action-btn primary">Ver en tienda</a>
                        <form action="{{ route('admin.products.destroy', $product) }}" method="POST" class="admin-action-form">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="admin-action-btn danger">Eliminar</button>
                        </form>
                    </div>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5">No hay productos.</td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>

<div class="mt-3">
    {{ $products->links() }}
</div>
@endsection
