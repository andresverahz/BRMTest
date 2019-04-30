<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 3; $i++) { 
            DB::table('products')->insert([
                'name' => "Producto " . Str::random(5 + $i)
            ]);
        }
    }
}
