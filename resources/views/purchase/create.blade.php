@extends('layout.main')

@section('content')

<p>
	<h1 class="text-center">Crea compra</h1>
</p>
<div class="row">
	<div class="col-md-12">
        <form id="purchaseForm" method="POST" action="{{ route('purchase.store') }}" role="form">
            {{ csrf_field() }}
            <div id="productZone">
            
                <div id="initialForm" class="row">
                    <div class="form-group col-md-3">
                        <label for="nombre">Producto</label>
                        <select class="form-control id_product" name="id_product[0]">
                            <option value="">Seleccione una opcion</option>
                            @foreach ($products as $key => $product)
                                <option value="{{ $product->pivot->id_product_inventory }}" 
                                    data-quantity="{{$product->pivot->quantity}}"
                                    data-lot="{{$product->pivot->lot_number}}"
                                    data-expiration="{{$product->pivot->expiration}}"
                                    data-price="{{$product->pivot->price}}"
                                >{{ $product->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-md-3">
                        <label for="nombre">Cantidad</label>
                        <input type="number" class="form-control quantity" name="quantity[0]" placeholder="Ingrese la cantidad">
                    </div>

                    <div class="form-group col-md-3">
                        <label for="nombre">Lote</label>
                        <input type="text" readonly class="form-control lot_number" name="lot_number[0]" >
                    </div>

                    <div class="form-group col-md-3">
                        <label for="nombre">Fecha de expiracion</label>
                        <input type="text" disabled class="form-control expiration" name="expiration[0]" >
                    </div>

                    <div class="form-group col-md-3">
                        <label for="nombre">Precio</label>
                        <input type="number" disabled min="0" class="form-control price" name="price[0]">
                    </div>

                    <div class="form-group col-md-3">
                        <button style="margin-top:30px;" type="button" class="btn btn-success addButton"><i class="fa fa-plus"></i></button>
                    </div>
                </div>
            </div>
            <center>
                <div class="form-group col-md-3">
                    <label for="nombre"><b>Total<b></label>
                    <input type="text" disabled min="0" class="form-control" id="totalInput">
                </div>
                <button type="submit" class="btn btn-primary" id="saveInventory">Guardar</button>
            </center>
        </form>
    </div>
</div>

@endsection