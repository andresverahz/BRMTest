@extends('layout.main')

@section('content')

<p>
	<h1 class="text-center">Crea inventario</h1>
</p>
<div class="row">
	<div class="col-md-12">
        <form id="inventoryForm" method="POST" action="{{ route('inventory.store') }}" role="form">
        {{ csrf_field() }}
            <div id="productZone">
            
                <div id="initialForm" class="row">
                    <div class="form-group col-md-3">
                        <label for="nombre">Producto</label>
                        <select class="form-control id_product" name="id_product[0]">
                            <option value="">Seleccione una opcion</option>
                            @foreach ($products as $key => $product)
                                <option value="{{ $product->id_product }}">{{ $product->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-md-3">
                        <label for="nombre">Cantidad</label>
                        <input type="number" min="1" class="form-control quantity" name="quantity[0]" placeholder="Ingrese la cantidad">
                    </div>

                    <div class="form-group col-md-3">
                        <label for="nombre">Lote</label>
                        <input type="number" class="form-control lot_number" name="lot_number[0]" placeholder="Ingrese el lote">
                    </div>

                    <div class="form-group col-md-3">
                        <label for="nombre">Fecha de expiracion</label>
                        <input type="date" class="form-control expiration" name="expiration[0]" placeholder="Ingrese la fecha de expracion">
                    </div>

                    <div class="form-group col-md-3">
                        <label for="nombre">Precio</label>
                        <input type="number" min="0" class="form-control price" name="price[0]" placeholder="Ingrese el precio">
                    </div>
                    <div class="form-group col-md-3">
                        <button style="margin-top:30px;" type="button" class="btn btn-success addButton"><i class="fa fa-plus"></i></button>
                    </div>
                </div>
            </div>
            <center>
                <button type="submit" class="btn btn-primary" id="saveInventory">Guardar</button>
            </center>
        </form>
    </div>
</div>

@endsection