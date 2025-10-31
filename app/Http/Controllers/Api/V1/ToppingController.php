<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Support\Arr;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Traits\JsonResponseTrait;
use App\Traits\ValidatesJsonApiRequest;
use App\Helpers\IdGenerator;

use App\Models\Topping;

class ToppingController extends Controller
{
    use ValidatesJsonApiRequest, JsonResponseTrait;

    /**
     * List all Topping
     *
     * @group Topping
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $topping = Topping::all();

        return $this->resourceCollectionResponse($topping);
    }

    /**
     * Create a new topping.
     *
     * @group Topping
     *
     * @bodyParam data.type string required Resource type. Example: toppings
     * @bodyParam data.attributes.name string required Topping name. Example: Extra Cheese
     * @bodyParam data.attributes.price number required Topping price. Example: 1.5
     *
     * @response 201 {
     *   "data": {
     *     "id": 1,
     *     "name": "Extra Cheese",
     *     "price": 1.5,
     *     "created_at": 1761895592,
     *     "updated_at": 1761895592
     *   }
     * }
     */
    public function store(Request $request)
    {
        $validated = $this->validateJsonApi($request, [
            'name' => 'required|string|max:255|unique:toppings,name',
            'price' => 'required|numeric|min:0',
        ]);

        $topping = Topping::query()->create(
            array_merge(
                Arr::only($validated, ['name', 'description', 'customizable', 'price', 'image']),
                ['id' => IdGenerator::generate(Topping::class, 10)]
            )
        );

        return $this->resourceResponse($topping, 'Topping was created successfully.', 201);
    }

    /**
     * Show a single topping
     *
     * @group Topping
     * @urlParam topping int required The ID of the topping.
     * @return JsonResponse
     */
    public function show(Topping $topping)
    {
        return $this->resourceResponse($topping);
    }
}
