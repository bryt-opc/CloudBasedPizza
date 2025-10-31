<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Support\Arr;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Traits\JsonResponseTrait;
use App\Traits\ValidatesJsonApiRequest;
use App\Helpers\IdGenerator;
use Illuminate\Support\Facades\DB;

use App\Rules\UniqueToppingsPerPizza;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Pizza;
use App\Models\Topping;

class OrderController extends Controller
{
    use ValidatesJsonApiRequest, JsonResponseTrait;
    /**
     * List all pizza orders
     *
     * @group Orders
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $orders = Order::with(['items.orderable', 'payment'])->get();

        return $this->resourceCollectionResponse($orders);
    }

    /**
     * Create a new order
     *
     * @group Orders
     *
     * @bodyParam data object required The main payload object
     * @bodyParam data.attributes object required Attributes of the order
     * @bodyParam data.attributes.customer_id string required The ID of the customer. Example: CUSTOMER_001
     * @bodyParam data.attributes.pizzas array required Array of pizzas
     * @bodyParam data.attributes.pizzas.*.pizza_id string required The ID of the pizza. Example: PIZZA_001
     * @bodyParam data.attributes.pizzas.*.quantity integer required Quantity of this pizza. Example: 2
     * @bodyParam data.attributes.pizzas.*.toppings array Optional array of toppings (max 4)
     * @bodyParam data.attributes.pizzas.*.toppings.*.id string required Topping ID. Example: TOPPING_AQDWJ7CHRS
     * @bodyParam data.attributes.pizzas.*.toppings.*.quantity integer required Quantity for this topping (max 1). Example: 1
     *
     * @response 201 {
     *   "data": {
     *     "id": "ORDER_001",
     *     "customer": {
     *       "id": "CUSTOMER_001",
     *       "name": "John Doe",
     *       "email": "john@example.com"
     *     },
     *     "order_items": [
     *       {
     *         "pizza_id": "PIZZA_001",
     *         "name": "Pepperoni",
     *         "quantity": 2,
     *         "subtotal": 700,
     *         "toppings": [
     *           {"id": "TOPPING_AQDWJ7CHRS", "name": "Cheese", "quantity": 1, "subtotal": 50}
     *         ]
     *       }
     *     ],
     *     "payment": {
     *       "method": "Credit Card",
     *       "status": "pending",
     *       "transaction_id": null
     *     },
     *     "status": "pending",
     *     "total_amount": 750,
     *     "created_at": 1761895592,
     *     "updated_at": 1761895592
     *   }
     * }
     */
    public function store(Request $request)
    {
        $validated = $this->validateJsonApi($request, [
            'customer_id' => 'required|exists:customers,id',
            'pizzas' => ['required', 'array', new UniqueToppingsPerPizza],
            'pizzas.*.id' => 'required|exists:pizzas,id',
            'pizzas.*.quantity' => 'required|integer|min:1',
            'pizzas.*.toppings' => 'array|max:4',
            'pizzas.*.toppings.*.id' => 'required|exists:toppings,id',
            'pizzas.*.toppings.*.quantity' => 'required|integer|min:1|max:1',
        ]);

        $pizzasPayload = $validated['pizzas'];

        $totalAmount = 0;

        DB::beginTransaction();

        try {
            // Create the order
            $order = Order::create(
                array_merge(
                    Arr::only($validated, ['customer_id']),
                    [
                        'id' => IdGenerator::generate(Order::class, 10),
                        'status' => 'pending',
                        'total_amount' => 0
                    ]
                )
            );

            foreach ($pizzasPayload as $pizzaData) {
                $pizza = Pizza::with('toppings')->findOrFail($pizzaData['id']);

                $pizzaSubtotal = $pizza->price;

                // Create order item for pizza
                $pizzaOrderItem = OrderItem::create([
                    'id' => IdGenerator::generate(OrderItem::class, 10),
                    'order_id' => $order->id,
                    'orderable_id' => $pizza->id,
                    'orderable_type' => Pizza::class,
                    'parent_order_item_id' => null,
                    'quantity' => $pizzaData['quantity'],
                    'subtotal' => 0, // will calculate after toppings
                ]);

                $toppingsTotal = 0;

                if ($pizza->customizable) {
                    // Use toppings from request payload
                    if (!empty($pizzaData['toppings'])) {
                        foreach ($pizzaData['toppings'] as $toppingData) {
                            $topping = Topping::findOrFail($toppingData['id']);
                            $toppingSubtotal = $topping->price * $toppingData['quantity'];
                            $toppingsTotal += $toppingSubtotal;

                            // Order item for topping
                            OrderItem::create([
                                'id' => IdGenerator::generate(OrderItem::class, 10),
                                'order_id' => $order->id,
                                'orderable_id' => $topping->id,
                                'orderable_type' => Topping::class,
                                'parent_order_item_id' => $pizzaOrderItem->id,
                                'quantity' => $toppingData['quantity'],
                                'subtotal' => $toppingSubtotal,
                            ]);
                        }
                    }
                } else {
                    // Non-customizable pizza: add toppings from pizza_toppings table
                    foreach ($pizza->toppings as $topping) {
                        $toppingSubtotal = $topping->price; // quantity always 1
                        $toppingsTotal += $toppingSubtotal;

                        OrderItem::create([
                            'id' => IdGenerator::generate(OrderItem::class, 10),
                            'order_id' => $order->id,
                            'orderable_id' => $topping->id,
                            'orderable_type' => 'topping',
                            'parent_order_item_id' => null,
                            'quantity' => 1,
                            'subtotal' => $toppingSubtotal,
                        ]);
                    }
                }

                $pizzaSubtotal += $toppingsTotal;
                $pizzaSubtotal *= $pizzaData['quantity'];
                $totalAmount += $pizzaSubtotal;

                // Update pizza order item subtotal
                $pizzaOrderItem->subtotal = $pizzaSubtotal;
                $pizzaOrderItem->save();
            }

            // Update order total
            $order->total_amount = $totalAmount;
            $order->save();

            DB::commit();

            $order->load('items');

            return $this->resourceResponse($order, 'Order processed successfully.', 201);
        } catch (\Exception $e) {
            DB::rollBack();

            var_dump($e->getMessage());

            return $this->errorResponse();
        }
    }

    /**
     * Get a single order
     *
     * @group Orders
     *
     * @urlParam id integer required The ID of the order. Example: 1
     *
     * @response 200 {
     *   "data": {
     *     "id": 1,
     *     "customer": {
     *       "id": "CUSTOMER_001",
     *       "name": "John Doe",
     *       "email": "john@example.com"
     *     },
     *     "order_items": [
     *       {
     *         "pizza_id": "PIZZA_001",
     *         "name": "Pepperoni",
     *         "quantity": 2,
     *         "subtotal": 700,
     *         "toppings": [
     *           {"id": "TOPPING_AQDWJ7CHRS", "name": "Cheese", "quantity": 1, "subtotal": 50}
     *         ]
     *       }
     *     ],
     *     "payment": {
     *       "method": "Credit Card",
     *       "status": "paid",
     *       "transaction_id": "TX123456789"
     *     },
     *     "status": "pending",
     *     "total_amount": 10,
     *     "created_at": 1761895592,
     *     "updated_at": 1761895592
     *   }
     * }
     */
    public function show(Order $order)
    {
        return $this->resourceResponse($order);
    }
}
