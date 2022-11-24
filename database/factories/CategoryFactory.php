<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'category_name' => $this->faker->name(),
            'category_name_slug' => $this->faker->name(),
            'category_logo' => $this->faker->imageUrl(),
            'status' => '1',
        ];
    }
}
