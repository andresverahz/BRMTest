@extends('layout.main')

@section('content')

<p>
	<h1 class="text-center">Inventarios</h1>
</p>
<div class="row">
	<div class="col-md-12">

        @if(Session::has('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{Session::get('error')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        @if(Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{Session::get('success')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        @if(!$inventories)
            <center>
                <a href="{{ route('inventory.create') }}" class="btn btn-info">Crear inventario</a>
            </center>
        @endif

        @if($inventories)
            <div class="col-md-12">
                    <table class="table table-bordered">
                        <thead class="thead-dark">
                            <tr>
                            <th scope="col">Producto</th>
                            <th scope="col">Cantidad</th>
                            <th scope="col"># Lote</th>
                            <th scope="col">Fecha de expiracion</th>
                            <th scope="col">Precio</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($inventories->products as $product)
                                <tr>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->pivot->quantity }}</td>
                                    <td>{{ $product->pivot->lot_number }}</td>
                                    <td>{{ $product->pivot->expiration }}</td>
                                    <td>{{ $product->pivot->price }}</td>
                                </tr>    
                            @endforeach
                        </tbody>
				</table>
			</div>
        @endif

    </div>
</div>

@endsection