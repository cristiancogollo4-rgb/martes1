@extends('layouts.admin')

@section('title', 'Productos')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h4 mb-0">Productos</h1>
    <a href="{{ route('admin.products.create') }}" class="btn btn-primary btn-sm">Nuevo producto</a>
</div>
<table class="table table-striped bg-white align-middle">
    <thead><tr><th>Nombre</th><th>Categoría</th><th>Precio</th><th>Stock</th><th class="text-end actions-cell">Acciones</th></tr></thead>
    <tbody>
    @forelse($products as $product)
        <tr>
            <td>{{ $product->name }}</td>
            <td>{{ $product->category?->name ?? 'Sin categoría' }}</td>
            <td>${{ number_format($product->price, 2) }}</td>
            <td>{{ $product->stock }}</td>
            <td class="text-end actions-cell">
                <div class="actions-group">
                    <a href="{{ route('products.show', $product) }}" class="btn btn-sm btn-outline-primary">Ver en tienda</a>
                    <form action="{{ route('admin.products.destroy', $product) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-outline-danger">Eliminar</button>
                    </form>
                </div>
            </td>
        </tr>
    @empty
        <tr><td colspan="5">No hay productos.</td></tr>
    @endforelse
    </tbody>
</table>
{{ $products->links() }}
@endsection
