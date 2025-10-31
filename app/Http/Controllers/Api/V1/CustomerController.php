<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Support\Arr;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Traits\JsonResponseTrait;
use App\Traits\ValidatesJsonApiRequest;
use Illuminate\Validation\Rule;
use App\Helpers\IdGenerator;

use App\Models\Customer;

class CustomerController extends Controller
{
    use ValidatesJsonApiRequest, JsonResponseTrait;

    /**
     * List all customers
     *
     * @group Customers
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $customers = Customer::all();

        return $this->resourceCollectionResponse($customers);
    }

    /**
     * @group Customers
     *
     * Create a new customer
     *
     * This endpoint creates a new customer using the JSON:API format.
     *
     * @bodyParam data.type string required The resource type. Example: customers
     * @bodyParam data.attributes.email string required The customer's email. Example: john4@example.com
     * @bodyParam data.attributes.first_name string required The customer's first name. Example: John
     * @bodyParam data.attributes.last_name string required The customer's last name. Example: Doe
     * @bodyParam data.attributes.address string optional The customer's address. Example: 123 Main Street
     * @bodyParam data.attributes.city string optional The customer's city. Example: New York
     * @bodyParam data.attributes.state string optional The customer's state. Example: NY
     *
     * @response 201 {
     *  "data": {
     *      "id": 4
     *      "email": "john4@example.com",
     *      "first_name": "John",
     *      "last_name": "Doe",
     *      "address": "123 Main Street",
     *      "city": "New York",
     *      "state": "NY",
     *      "updated_at": "1761895592",
     *      "created_at": "1761895592",
     *  }
     * }
     */
    public function store(Request $request): JsonResponse
    {
        $validated = $this->validateJsonApi($request, [
            'email' => 'required|email|unique:customers,email',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'address' => 'nullable|string',
            'city' => 'nullable|string|max:100',
            'state' => 'nullable|string|max:100'
        ]);

        $customer = Customer::query()->create(
            array_merge(
                Arr::only($validated, ['email', 'first_name', 'last_name', 'address', 'city', 'state']),
                ['id' => IdGenerator::generate(Customer::class, 10)]
            )
        );

        return $this->resourceResponse($customer, 'Customer created successfully.', 201);
    }

    /**
     * Show a single customer
     *
     * @group Customers
     * @urlParam customer int required The ID of the customer.
     * @return JsonResponse
     */
    public function show(Customer $customer): JsonResponse
    {
        return $this->resourceResponse($customer);
    }

    /**
     * @group Customers
     *
     * Update an existing customer
     *
     * Updates the specified customer using the JSON:API format.
     *
     * @urlParam customer int required The ID of the customer to update. Example: 4
     * @bodyParam data.type string required The resource type. Example: customers
     * @bodyParam data.attributes.email string required The customer's email. Example: john4@example.com
     * @bodyParam data.attributes.first_name string required The customer's first name. Example: John
     * @bodyParam data.attributes.last_name string required The customer's last name. Example: Doe
     * @bodyParam data.attributes.address string optional The customer's address. Example: 123 Main Street
     * @bodyParam data.attributes.city string optional The customer's city. Example: New York
     * @bodyParam data.attributes.state string optional The customer's state. Example: NY
     *
     * @response 200 {
     *  "data": {
     *      "email": "john4@example.com",
     *      "first_name": "John",
     *      "last_name": "Doe",
     *      "address": "123 Main Street",
     *      "city": "New York",
     *      "state": "NY",
     *      "updated_at": "1761895592",
     *      "created_at": "1761895592",
     *      "id": 4
     *  }
     * }
     */
    public function update(Request $request, Customer $customer): JsonResponse
    {
        $validated = $this->validateJsonApi($request, [
            'email' => [
                'required',
                'email',
                Rule::unique('customers', 'email')->ignore($customer->id),
            ],
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'address' => 'string',
            'city' => 'string|max:100',
            'state' => 'string|max:100'
        ]);

        $customer->update(Arr::whereNotNull($validated));

        return $this->resourceResponse($customer, 'Customer updated successfully.', 200);
    }
}
