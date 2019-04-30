@extends('layout.main')

@section('content')

<p>
	<h1 class="text-center">Factura Compra # {{$id}}</h1>
</p>
<div class="row">
	<div class="col-md-12">
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Producto</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Total</th>
                </tr>
            </thead>
            @php($total = 0)
            <tbody>
                @foreach ($purchase as $key => $product)
                    <tr>
                        <td>{{$product->name}}</td>
                        <td>{{$product->quantity}}</td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->price * $product->quantity}}</td>
                    </tr>
                    @php($total +=$product->price * $product->quantity)
                @endforeach
                <tr>
                    <td colspan="4" align="right"><b>Total:</b>   {{$total}}</td>
                </tr>
            </tbody>
        </table>
        <center>
            <a href="{{ route('purchase.index') }}" class="btn btn-danger">Volver</a>
        </center>
    </div>
</div>

@endsection