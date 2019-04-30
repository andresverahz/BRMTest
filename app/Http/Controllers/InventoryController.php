<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inventory;
use App\Product_Inventory;
use App\Product;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inventories = Inventory::all()->first();
    	return view('inventory.index', compact('inventories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();
        if($products->count() <= 0)
            return redirect()->route('inventory.index')->with('error','No se han creado productos');
        
        return view('inventory.create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $this->validate($request, [
                "id_product"    => "required|array|min:1",
                "id_product.*"  => "required",

                "quantity"    => "required|array|min:1",
                "quantity.*"  => "required",

                "lot_number"    => "required|array|min:1",
                "lot_number.*"  => "required",

                "expiration"    => "required|array|min:1",
                "expiration.*"  => "required",

                "price"    => "required|array|min:1",
                "price.*"  => "required",
            ]);

            $data = $request->all();
            \DB::beginTransaction();
        
            //Create inventory
            $inventory = Inventory::create();
            
            foreach ($data['id_product'] as $key => $id_product) {
                //Asing prodcut to inventory
                $product_inventory = new Product_Inventory;
                $product_inventory->id_product = $id_product;
                $product_inventory->id_inventory = $inventory->id_inventory;
                $product_inventory->quantity = $data['quantity'][$key];
                $product_inventory->lot_number = $data['lot_number'][$key];
                $product_inventory->expiration = $data['expiration'][$key];
                $product_inventory->price = $data['price'][$key];
                $product_inventory->save();
                \DB::commit();
            }
            return redirect()->route('inventory.index')->with('success','Inventario registrado satisfactoriamente');
        } catch (Exception $exception) {
            \DB::rollback();
            return back()->withError($exception->getMessage())->withInput();
        }
    }
}
