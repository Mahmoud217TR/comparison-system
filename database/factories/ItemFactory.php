<?php

namespace Database\Factories;

use App\Models\Comparison;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(),
            'comparison_id' => null,
        ];
    }

    public function withComparison()
    {
        return $this->state(function (array $attributes) {
            return [
                'comparison_id' => Comparison::factory(),
            ];
        });
    }
}
