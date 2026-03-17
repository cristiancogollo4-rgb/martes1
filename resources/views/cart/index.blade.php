@extends('layouts.store')

@section('title', 'Carrito')

@section('content')
<h1 class="h3 mb-4">Carrito de compras</h1>

@if(empty($cart))
    <div class="alert alert-info">Tu carrito está vacío.</div>
@else
    <div class="table-responsive bg-white rounded shadow-sm p-3">
        <table class="table align-middle">
            <thead><tr><th>Producto</th><th>Precio</th><th>Cantidad</th><th>Subtotal</th><th></th></tr></thead>
            <tbody>
            @foreach($cart as $item)
                <tr>
                    <td>{{ $item['name'] }}</td>
                    <td>${{ number_format($item['price'], 2) }}</td>
                    <td>
                        <form action="{{ route('cart.update', $item['id']) }}" method="POST" class="d-flex gap-2">
                            @csrf @method('PATCH')
                            <input type="number" name="quantity" min="1" value="{{ $item['quantity'] }}" class="form-control" style="max-width:100px;">
                            <button class="btn btn-sm btn-outline-primary">Actualizar</button>
                        </form>
                    </td>
                    <td>${{ number_format($item['price'] * $item['quantity'], 2) }}</td>
                    <td>
                        <form action="{{ route('cart.destroy', $item['id']) }}" method="POST">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="text-end mt-3">
        <h2 class="h5">Total: <span class="fw-bold">${{ number_format($total, 2) }}</span></h2>
    </div>
@endif
@endsection
