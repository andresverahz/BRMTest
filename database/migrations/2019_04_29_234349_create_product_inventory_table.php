<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductInventoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_inventory', function (Blueprint $table) {
            $table->increments('id_product_inventory');
            $table->integer('id_inventory')->unsigned();
            $table->integer('id_product')->unsigned();
            $table->integer('quantity');
            $table->integer('lot_number');
            $table->date('expiration');
            $table->integer('price');
            $table->foreign('id_product')->references('id_product')->on('products');
            $table->foreign('id_inventory')->references('id_inventory')->on('inventories');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $table->dropForeign('product_inventory_id_product_foreign');
        $table->dropForeign('product_inventory_id_inventory_foreign');
        Schema::dropIfExists('product_inventory');
    }
}
