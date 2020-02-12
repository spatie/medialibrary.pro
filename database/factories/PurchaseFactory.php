<?php

use App\Models\Product;
use App\Models\Purchase;
use App\Models\User;
use Faker\Generator as Faker;

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Purchase::class, function (Faker $faker) {
    return [
        'product_id' => factory(Product::class),
        'user_id' => factory(User::class),
        'paddle_alert_id' => $faker->word,
        'payment_method' => 'visa',
        'receipt_url' => $faker->url,
        'paddle_webhook_payload' => '{}',
        'paddle_fee' => '0',
        'payment_tax' => '0',
        'earnings' => '0',
    ];
});
