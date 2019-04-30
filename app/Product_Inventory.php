<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_Inventory extends Model
{
    protected $table = 'product_inventory';
    protected $fillable = ['id_product', 'id_inventory', 'quantity', 'lot_number', 'expiration', 'price'];
    protected $primaryKey = 'id_product_inventory';
}
