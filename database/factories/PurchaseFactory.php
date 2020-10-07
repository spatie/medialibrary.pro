<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\User;

class PurchaseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Purchase::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'product_id' => Product::factory(),
            'user_id' => User::factory(),
            'paddle_alert_id' => $this->faker->word,
            'payment_method' => 'visa',
            'receipt_url' => $this->faker->url,
            'paddle_webhook_payload' => '{}',
            'paddle_fee' => '0',
            'payment_tax' => '0',
            'earnings' => '0',
        ];
    }
}
