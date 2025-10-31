<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class UniqueToppingsPerPizza implements ValidationRule
{
    /**
     * Validate that toppings are unique for each pizza.
     *
     * Supports:
     *  - Array of toppings as objects: [{ "id": "TOP_1" }, { "id": "TOP_2" }]
     *  - Array of pizzas, each with its own toppings
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if ($this->isToppingsArray($value)) {
            $toppingIds = $this->extractToppingIds($value);

            if (count($toppingIds) !== count(array_unique($toppingIds))) {
                $fail("The {$attribute} contains duplicate toppings.");
            }

            return;
        }

        if (is_array($value)) {
            foreach ($value as $index => $pizza) {
                if (!isset($pizza['toppings']) || !is_array($pizza['toppings'])) {
                    continue;
                }

                $toppingIds = $this->extractToppingIds($pizza['toppings']);

                if (count($toppingIds) !== count(array_unique($toppingIds))) {
                    $fail("The {$attribute} at index {$index} contains duplicate toppings.");
                }
            }
        }
    }

    /**
     * Check if value is a toppings array.
     * e.g. ['TOP_1', 'TOP_2'] or [{id:'TOP_1'}, {id:'TOP_2'}]
     */
    protected function isToppingsArray(mixed $value): bool
    {
        if (!is_array($value)) {
            return false;
        }

        return array_reduce($value, fn($carry, $item) =>
            $carry && (is_string($item) || is_int($item) || (is_array($item) && array_key_exists('id', $item)))
            , true);
    }

    /**
     * Extract topping IDs from an array of IDs or array of objects.
     */
    protected function extractToppingIds(array $toppings): array
    {

        if (isset($toppings[0]) && is_array($toppings[0]) && array_key_exists('id', $toppings[0])) {
            return array_column($toppings, 'id');
        }

        return $toppings;
    }
}
