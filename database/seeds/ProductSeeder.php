<?php

use App\Models\Product;
use App\Models\Subsidiary;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Product::class, 300)->create();
    }
}
