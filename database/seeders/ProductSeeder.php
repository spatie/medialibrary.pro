<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run()
    {
        Product::factory()->create([
            'type' => Product::TYPE_STANDARD,
            'name' => 'Medialibrary Pro',
            'paddle_product_id' => '578345',
            'price' => 99,
        ]);
    }
}
