<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Slider>
 */
class SliderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->name(),
            'image' => $this->faker->imageUrl($width = 1920, $height = 500),
//            'image' => "https://smartslider3.com/wp-content/uploads/slider/cache/2eac36426bb7c29a06cdd9f1fc93aea9/fullwidth-product-slider1.jpg",
            'status' => '1',
        ];
    }
}
