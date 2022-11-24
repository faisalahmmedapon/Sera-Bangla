<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'product_name' => $this->faker->name(),
            'product_name_slug' => $this->faker->name(),
            'product_quantity' => "99",
            'product_sku' => $this->faker->name(),
            'product_selling_price' => '500',
            'product_discount_type' => "500",
            'product_discount' => "500",
            'product_discount_price' => "500",
            'product_brand_id' => "1",
            'product_short_description' => $this->faker->text(),
            'product_description' => $this->faker->text(),
            'product_specification' => $this->faker->text(),
            'product_image' => json_encode([$this->faker->imageUrl(),$this->faker->imageUrl()]),
            'status' => '1',
        ];
    }
}
