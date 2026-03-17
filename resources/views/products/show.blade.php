@extends('layouts.store')

@section('title', $product->name)

@section('content')
<div class="row g-4 bg-white p-4 rounded shadow-sm">
    <div class="col-md-6">
        <img src="{{ $product->image ? asset($product->image) : 'https://via.placeholder.com/800x550?text=Producto' }}" class="img-fluid rounded" alt="{{ $product->name }}">
    </div>
    <div class="col-md-6">
        <h1 class="h3">{{ $product->name }}</h1>
        <p class="text-muted">{{ $product->description }}</p>
        <p class="display-6 fw-bold">${{ number_format($product->price, 2) }}</p>

        <form action="{{ route('cart.store', $product) }}" method="POST" class="d-flex gap-2 align-items-center mt-3">
            @csrf
            <input type="number" min="1" value="1" name="quantity" class="form-control" style="max-width: 120px;">
            <button class="btn btn-success">Agregar al carrito</button>
        </form>
    </div>
</div>
@endsection
