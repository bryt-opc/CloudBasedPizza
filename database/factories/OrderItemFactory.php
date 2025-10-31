<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\OrderItem;
use App\Models\Pizza;
use App\Models\Topping;
use App\Models\Order;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderItem>
 */
class OrderItemFactory extends Factory
{
    protected $model = OrderItem::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $item = $this->faker->boolean ? Pizza::factory()->create() : Topping::factory()->create();

        $quantity = $this->faker->numberBetween(1, 5);

        return [
            'order_id' => Order::factory(),
            'orderable_id' => $item->id,
            'orderable_type' => get_class($item),
            'quantity' => $quantity,
            'subtotal' => $item->price * $quantity,
        ];
    }
}
