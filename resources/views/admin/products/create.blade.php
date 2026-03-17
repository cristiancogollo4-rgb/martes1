@extends('layouts.admin')

@section('title', 'Crear producto')

@section('content')
<h1 class="h4 mb-3">Crear producto</h1>
<form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-4 rounded border">
    @csrf
    <div class="row g-3">
        <div class="col-md-6"><label class="form-label">Nombre</label><input name="name" value="{{ old('name') }}" class="form-control" required></div>
        <div class="col-md-6"><label class="form-label">Categoría</label><select name="category_id" class="form-select" required>@foreach($categories as $category)<option value="{{ $category->id }}">{{ $category->name }}</option>@endforeach</select></div>
        <div class="col-md-4"><label class="form-label">Precio</label><input type="number" step="0.01" name="price" class="form-control" required></div>
        <div class="col-md-4"><label class="form-label">Stock</label><input type="number" name="stock" class="form-control" required></div>
        <div class="col-md-4"><label class="form-label">Imagen</label><input type="file" name="image" class="form-control"></div>
        <div class="col-12"><label class="form-label">Descripción</label><textarea name="description" class="form-control" rows="3" required>{{ old('description') }}</textarea></div>
    </div>
    <button class="btn btn-primary mt-3">Guardar</button>
</form>
@endsection
