<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $primaryKey = 'id_purchase';

    public function purchase_products()
    {
        return $this->belongsToMany(Product_Inventory::class, 'purchase_product', 'id_purchase', 'id_product_inventory',        
        'id_purchase',  
        'id_product_inventory')
            ->withPivot('quantity');
    }


    public static function getProductsPurchase($id)
    {
        $products = \DB::table('purchases')
            ->join('purchase_product', 'purchase_product.id_purchase', '=', 'purchases.id_purchase')
            ->join('product_inventory', 'product_inventory.id_product_inventory', '=', 'purchase_product.id_product_inventory')
            ->join('products', 'products.id_product', '=', 'product_inventory.id_product')
            ->where('purchases.id_purchase', '=', $id)
            ->select('products.*', 'purchase_product.quantity', 'product_inventory.price', 'purchase_product.id_product_inventory')
            ->get();

        return $products;
    }
}
