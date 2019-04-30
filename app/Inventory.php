<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    protected $primaryKey = 'id_inventory';

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_inventory', 'id_inventory', 'id_product',        
        'id_inventory',  
        'id_product')
            ->withPivot('id_product_inventory')
            ->withPivot('quantity')
            ->withPivot('lot_number')
            ->withPivot('expiration')
            ->withPivot('price');
    }
}
