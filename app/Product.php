<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $primaryKey = 'id_product';
    public function inventories()
    {
        return $this->belongsToMany(Inventory::class, 'product_inventory');
    }
}
