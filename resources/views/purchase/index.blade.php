@extends('layout.main')

@section('content')

<p>
	<h1 class="text-center">Compras</h1>
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

        <center>
            <a href="{{ route('purchase.create') }}" class="btn btn-info">Crear compra</a>
        </center>
        <br>
        <br>
        @if(count($purchases))
            <div class="col-md-12">
                    <table class="table table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Codigo</th>
                                <th scope="col">Fecha</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($purchases as $purchase)
                                <tr>
                                    <td>{{$purchase->id_purchase}}</td>
                                    <td>{{$purchase->created_at}}</td>
                                    <td>{{($purchase->state) ? "Activa" : "Cancelada"}}</td>
                                    <td>
                                        <a href="{{action('PurchaseController@show', $purchase->id_purchase)}}" class="btn btn-info"><i class="fa fa-eye"></i></a>
                                        @if($purchase->state)
                                        <form style="float:left" action="{{action('PurchaseController@destroy', $purchase->id_purchase)}}" method="post">
                                            {{csrf_field()}}
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                                        </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
				</table>
			</div>
        @endif



    </div>
</div>

@endsection