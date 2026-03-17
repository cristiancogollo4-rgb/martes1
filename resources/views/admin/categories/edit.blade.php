@extends('layouts.admin')

@section('title', 'Editar categoría')

@section('content')
<h1 class="h4 mb-3">Editar categoría</h1>
<form action="{{ route('admin.categories.update', $category) }}" method="POST" class="bg-white p-4 rounded border">
    @csrf @method('PUT')
    <div class="mb-3"><label class="form-label">Nombre</label><input type="text" name="name" value="{{ old('name', $category->name) }}" class="form-control" required></div>
    <div class="mb-3"><label class="form-label">Descripción</label><textarea name="description" class="form-control" rows="3">{{ old('description', $category->description) }}</textarea></div>
    <button class="btn btn-primary">Actualizar</button>
</form>
@endsection
