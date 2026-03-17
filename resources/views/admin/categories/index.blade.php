@extends('layouts.admin')

@section('title', 'Categorías')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h4 mb-0">Categorías</h1>
    <a href="{{ route('admin.categories.create') }}" class="btn btn-primary btn-sm">Nueva categoría</a>
</div>

<div class="admin-table-wrap">
    <table class="admin-table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Slug</th>
                <th>Descripción</th>
                <th class="actions-cell">Acciones</th>
            </tr>
        </thead>
        <tbody>
        @forelse($categories as $category)
            <tr>
                <td>{{ $category->name }}</td>
                <td>{{ $category->slug }}</td>
                <td>{{ $category->description }}</td>
                <td class="actions-cell">
                    <div class="actions-group">
                        <a href="{{ route('admin.categories.edit', $category) }}" class="admin-action-btn neutral">Editar</a>
                        <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" class="admin-action-form">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="admin-action-btn danger">Eliminar</button>
                        </form>
                    </div>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4">No hay categorías.</td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>

<div class="mt-3">
    {{ $categories->links() }}
</div>
@endsection
