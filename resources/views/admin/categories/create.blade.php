@extends('layouts.admin')

@section('title', 'Nueva categoría')

@section('content')
<h1 class="h4 mb-3">Crear categoría</h1>
<form action="{{ route('admin.categories.store') }}" method="POST" class="bg-white p-4 rounded border">
    @csrf
    <div class="mb-3"><label class="form-label">Nombre</label><input type="text" name="name" value="{{ old('name') }}" class="form-control" required></div>
    <div class="mb-3"><label class="form-label">Descripción</label><textarea name="description" class="form-control" rows="3">{{ old('description') }}</textarea></div>
    <button class="btn btn-primary">Guardar</button>
</form>
@endsection
