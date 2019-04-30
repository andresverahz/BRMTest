<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase_Product extends Model
{
    protected $table = 'purchase_product';
    protected $primaryKey = 'id_purchase_product';
    protected $fillable = ['id_product_inventory', 'quantity', 'state'];
}
