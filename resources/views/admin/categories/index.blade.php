@extends('layouts.admin')

@section('title', 'Categorías')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h4 mb-0">Categorías</h1>
    <a href="{{ route('admin.categories.create') }}" class="btn btn-primary btn-sm">Nueva categoría</a>
</div>
<table class="table table-bordered bg-white align-middle">
    <thead><tr><th>Nombre</th><th>Slug</th><th>Descripción</th><th class="text-end actions-cell">Acciones</th></tr></thead>
    <tbody>
    @forelse($categories as $category)
        <tr>
            <td>{{ $category->name }}</td>
            <td>{{ $category->slug }}</td>
            <td>{{ $category->description }}</td>
            <td class="text-end actions-cell">
                <div class="actions-group">
                    <a href="{{ route('admin.categories.edit', $category) }}" class="btn btn-sm btn-outline-secondary">Editar</a>
                    <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-outline-danger">Eliminar</button>
                    </form>
                </div>
            </td>
        </tr>
    @empty
        <tr><td colspan="4">No hay categorías.</td></tr>
    @endforelse
    </tbody>
</table>
{{ $categories->links() }}
@endsection
