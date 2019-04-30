<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchaseProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_product', function (Blueprint $table) {
            $table->increments('id_purchase_product');
            $table->integer('id_purchase')->unsigned();
            $table->integer('id_product_inventory')->unsigned();
            $table->integer('quantity');
            $table->foreign('id_product_inventory')->references('id_product_inventory')->on('product_inventory');
            $table->foreign('id_purchase')->references('id_purchase')->on('purchases');
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
        Schema::dropIfExists('purchase_product');
    }
}
