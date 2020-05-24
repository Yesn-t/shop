<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create(['name' => 'Jacket']);
        Category::create(['name' => 'Shirt']);
        Category::create(['name' => 'Trousers']);
        Category::create(['name' => 'Footwear']);
    }
}
