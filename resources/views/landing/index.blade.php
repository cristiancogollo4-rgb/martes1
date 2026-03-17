@extends('layouts.store')

@section('title', 'Inicio Ecommerce')

@section('content')
<section class="p-5 mb-4 bg-white rounded-3 shadow-sm">
    <div class="container-fluid py-4">
        <h1 class="display-5 fw-bold">Compra tecnología al mejor precio</h1>
        <p class="col-md-8 fs-5">Descubre productos destacados y agrega tus favoritos al carrito en segundos.</p>
        <a href="#productos" class="btn btn-primary btn-lg">Ver productos</a>
    </div>
</section>

<section id="productos" class="mb-5">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="h4 mb-0">Productos destacados</h2>
    </div>
    <div class="row g-4">
        @forelse($featuredProducts as $product)
            <div class="col-md-3">
                <div class="card h-100 shadow-sm">
                    <img src="{{ $product->image ? asset($product->image) : 'https://via.placeholder.com/600x350?text=Producto' }}" class="card-img-top" alt="{{ $product->name }}" style="height: 170px; object-fit: cover;">
                    <div class="card-body d-flex flex-column">
                        <h3 class="h6">{{ $product->name }}</h3>
                        <p class="text-muted small">{{ \Illuminate\Support\Str::limit($product->description, 80) }}</p>
                        <p class="fw-bold mt-auto mb-2">${{ number_format($product->price, 2) }}</p>
                        <a href="{{ route('products.show', $product) }}" class="btn btn-outline-primary btn-sm">Ver detalle</a>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-muted">Aún no hay productos cargados.</p>
        @endforelse
    </div>
</section>

<section id="categorias" class="mb-3">
    <h2 class="h4 mb-3">Categorías</h2>
    <div class="row g-3">
        @forelse($categories as $category)
            <div class="col-md-4">
                <div class="bg-white p-3 rounded border h-100">
                    <h3 class="h6 mb-1">{{ $category->name }}</h3>
                    <p class="text-muted small mb-0">{{ $category->products_count }} productos disponibles.</p>
                </div>
            </div>
        @empty
            <p class="text-muted">No hay categorías registradas.</p>
        @endforelse
    </div>
</section>
@endsection
