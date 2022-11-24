<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Coupon>
 */
class CouponFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'coupon_name' => $this->faker->name(),
            'coupon_name_slug' => $this->faker->name(),
            'coupon_price' => 12,
            'status' => '1',
        ];
    }
}
