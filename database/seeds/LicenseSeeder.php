<?php

use App\Models\License;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\User;
use Illuminate\Database\Seeder;

class LicenseSeeder extends Seeder
{
    public function run()
    {
        User::each(function (User $user) {
            Product::query()
                ->where('type', [Product::TYPE_STANDARD])
                ->each(function (Product $product) use ($user) {
                    factory(Purchase::class)->create([
                        'user_id' => $user->id,
                        'product_id' => $product->id,
                    ]);
                    factory(License::class)->create([
                        'user_id' => $user->id,
                        'product_id' => $product->id,
                    ]);
                });
        });
    }
}
