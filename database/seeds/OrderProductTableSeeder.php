<?php

use Illuminate\Database\Seeder;

class OrderProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(range(1, 20) as $order)
        {
            foreach(range(1, 3) as $index)
            {
                DB::table('order_product')->insert([
                    'order_id' => $order,
                    'product_id' => App\Product::all()->random()->id,
                ]);
            }
        }
    }
}
