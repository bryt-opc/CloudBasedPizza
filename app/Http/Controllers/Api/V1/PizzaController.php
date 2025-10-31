<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Support\Arr;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Traits\JsonResponseTrait;
use App\Traits\ValidatesJsonApiRequest;
use App\Rules\UniqueToppingsPerPizza;
use App\Helpers\IdGenerator;

use App\Models\Pizza;


class PizzaController extends Controller
{
    use ValidatesJsonApiRequest, JsonResponseTrait;

    /**
     * List all pizzas
     *
     * @group Pizza
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $pizzas = Pizza::all();

        return $this->resourceCollectionResponse($pizzas);
    }

    /**
     * Create a new pizza with optional toppings.
     *
     * @group Pizza
     *
     * @bodyParam data.attributes[name] string required The pizza name. Example: Pepperoni Pizza
     * @bodyParam data.attributes[description] string The pizza description. Example: Delicious pepperoni pizza
     * @bodyParam data.attributes[customizable] boolean required Is pizza customizable. Example: true
     * @bodyParam data.attributes[price] number required Pizza price. Example: 10.5
     * @bodyParam data.attributes[toppings] array Array of topping IDs. Example: [1,2,3]
     *
     * @response 201 {
     *   "data": {
     *       "id": 1,
     *       "name": "Pepperoni Pizza",
     *       "description": "Delicious pepperoni pizza",
     *       "customizable": true,
     *       "price": 10.5,
     *       "toppings": [
     *           {"id":1,"name":"Extra Cheese","price":1.5},
     *           {"id":2,"name":"Mushroom","price":1.0}
     *       ],
     *       "created_at": 1761895592,
     *       "updated_at": 1761895592
     *   }
     * }
     */
    public function store(Request $request)
    {
        $validated = $this->validateJsonApi($request, [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'customizable' => 'required|boolean',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'toppings' => ['nullable', 'array', 'max:4', new UniqueToppingsPerPizza],
            'toppings.*.id' => 'required|string|exists:toppings,id'
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('pizzas', 'public');

            $validated['image'] = $path;
        }

        $pizza = Pizza::query()->create(
            array_merge(
                Arr::only($validated, ['name', 'description', 'customizable', 'price', 'image']),
                ['id' => IdGenerator::generate(Pizza::class, 10)]
            )
        );

        if (!empty($validated['toppings'])) {
            $pizza->toppings()->sync(array_column($validated['toppings'], 'id'));
        }

        $pizza->load('toppings');

        return $this->resourceResponse($pizza, 'Pizza was created successfully.', 201);
    }

    /**
     * Show a single pizza
     *
     * @group Pizza
     * @urlParam pizza int required The ID of the pizza.
     * @return JsonResponse
     */
    public function show(Pizza $pizza)
    {
        return $this->resourceResponse($pizza);
    }


}
