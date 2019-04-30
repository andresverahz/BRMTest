<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Purchase;
use App\Inventory;
use App\Product_Inventory;
use App\Purchase_Product;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $purchases = Purchase::all();
        return view('purchase.index', compact('purchases'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $inventory = Inventory::all()->first();
        if(!$inventory)
            return redirect()->route('purchase.index')->with('error','No se han creado inventarios');

        $products = $inventory->products()->where('quantity','>','0')->get();
        return view('purchase.create', compact('products'));
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
            ]);
            $data = $request->all();

            \DB::beginTransaction();

            //Create purchase
            $purchase = Purchase::create();
            
            foreach ($data['id_product'] as $key => $id_product_inventory) {

                $prod = Product_Inventory::find($id_product_inventory);
                if($prod->quantity < $data['quantity'][$key])
                    throw new Exception('No hay inventario');
                
                $prod->quantity = $prod->quantity - $data['quantity'][$key];
                $prod->save();

                $purchase_product = new Purchase_Product;
                $purchase_product->id_purchase = $purchase->id_purchase;
                $purchase_product->id_product_inventory = $id_product_inventory;
                $purchase_product->quantity = $data['quantity'][$key];
                $purchase_product->save();
                \DB::commit();
            }

            return redirect()->route('purchase.index')->with('success','Compra registrada satisfactoriamente');

        } catch (Exception $exception) {
            \DB::rollback();
            return back()->withError($exception->getMessage())->withInput();
        }
    }

     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $purchase = Purchase::getProductsPurchase($id);
        return view('purchase.show', compact('purchase', 'id'));
    }


    public function destroy($id_purchase){
        try {
            \DB::beginTransaction();
            $purchase = Purchase::find($id_purchase);
            $purchase->state = 0;
            $purchase->save();

            foreach (Purchase::getProductsPurchase($id_purchase) as $key => $product) {
                $prod = Product_Inventory::find($product->id_product_inventory);
                $prod->quantity = $prod->quantity + $product->quantity;
                $prod->save();
            }

            \DB::commit();

            return redirect()->route('purchase.index')->with('success','Compra cancelada satisfactoriamente');
        } catch (Exception $exception) {
            \DB::rollback();
            return back()->withError($exception->getMessage())->withInput();
        }
    }

}
