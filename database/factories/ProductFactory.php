<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'type' => $this->faker->randomElement([
                Product::TYPE_STANDARD,
                Product::TYPE_STANDARD_RENEWAL,
                Product::TYPE_VIDEOS,
            ]),
            'price' => $this->faker->numberBetween(50, 150),
            'paddle_product_id' => $this->faker->word,
        ];
    }
}
