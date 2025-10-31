<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Payment;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Payment>
 */
class PaymentFactory extends Factory
{
    protected $model = Payment::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'address' => $this->faker->streetAddress,
            'city' => $this->faker->city,
            'state' => $this->faker->state,
            'postal_code' => $this->faker->postcode,
            'country' => $this->faker->country,
            'email' => $this->faker->unique()->safeEmail,
            'name' => $this->faker->name,
            'phone' => $this->faker->phoneNumber,
            'amount' => $this->faker->randomFloat(2, 10, 500),
            'method' => $this->faker->randomElement(['card', 'paypal', 'cash']),
            'status' => 'pending',
        ];
    }
}
