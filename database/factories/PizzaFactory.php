<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pizza>
 */
class PizzaFactory extends Factory
{
    protected $model = \App\Models\Pizza::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'image' => $this->faker->imageUrl(400, 400, 'food'),
            'name' => $this->faker->word . ' Pizza',
            'description' => $this->faker->sentence,
            'customizable' => $this->faker->boolean,
            'price' => $this->faker->randomFloat(2, 5, 20),
        ];
    }
}
