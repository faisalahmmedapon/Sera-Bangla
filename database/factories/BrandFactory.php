<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Brand>
 */
class BrandFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'brand_name' => $this->faker->name(),
            'brand_name_slug' => $this->faker->name(),
            'brand_logo' => $this->faker->imageUrl(),
            'coupon_id' => 1,
            'status' => '1',
        ];
    }
}
