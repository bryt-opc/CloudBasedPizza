<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Traits\JsonResponseTrait;
use App\Traits\ValidatesJsonApiRequest;
use Illuminate\Support\Arr;
use App\Helpers\IdGenerator;

use App\Models\Payment;

class PaymentController extends Controller
{
    use ValidatesJsonApiRequest, JsonResponseTrait;

    /**
     * Store a new payment record
     *
     * @group Payments
     *
     * @bodyParam data object required The main payload object
     * @bodyParam data.attributes object required Payment attributes
     * @bodyParam data.attributes.order_id string required The ID of the order. Example: ORDER_001
     * @bodyParam data.attributes.address string required Billing address. Example: 123 Main St
     * @bodyParam data.attributes.city string required City. Example: Manila
     * @bodyParam data.attributes.state string required State/Province. Example: Metro Manila
     * @bodyParam data.attributes.postal_code string required Postal code. Example: 1000
     * @bodyParam data.attributes.country string required Country. Example: Philippines
     * @bodyParam data.attributes.email string required Customer email. Example: john@example.com
     * @bodyParam data.attributes.name string required Customer name. Example: John Doe
     * @bodyParam data.attributes.phone string required Customer phone. Example: +639171234567
     * @bodyParam data.attributes.amount number required Payment amount. Example: 750
     * @bodyParam data.attributes.method string required Payment method. Example: Credit Card
     *
     * @response 201 {
     *   "data": {
     *     "id": "PAYMENT_ABC123",
     *     "order_id": "ORDER_001",
     *     "address": "123 Main St",
     *     "city": "Manila",
     *     "state": "Metro Manila",
     *     "postal_code": "1000",
     *     "country": "Philippines",
     *     "email": "john@example.com",
     *     "name": "John Doe",
     *     "phone": "+639171234567",
     *     "amount": 750,
     *     "method": "Credit Card",
     *     "status": "pending",
     *     "created_at": 1761895592
     *   }
     * }
     */
    public function store(Request $request)
    {
        $validated = $this->validateJsonApi($request, [
            'order_id' => 'required|exists:orders,id',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:100',
            'state' => 'required|string|max:100',
            'postal_code' => 'required|string|max:20',
            'country' => 'required|string|max:100',
            'email' => 'required|email|max:150',
            'name' => 'required|string|max:100',
            'phone' => 'required|string|max:20',
            'amount' => 'required|numeric|min:1',
            'method' => 'required|string|max:50',
        ]);

        $payment = Payment::query()->create(
            array_merge(
                Arr::only(
                    $validated,
                    [
                        'order_id',
                        'address',
                        'city',
                        'state',
                        'postal_code',
                        'country',
                        'email',
                        'name',
                        'phone',
                        'amount',
                        'method'
                    ]
                ),
                [
                    'id' => IdGenerator::generate(Payment::class, 10),
                    'status' => 'pending',
                ]
            )
        );

        return $this->resourceResponse($payment, 'Payment created successfully.', 201);
    }

    /**
     * Show a single payment
     *
     * @group Payments
     * @urlParam payment int required The ID of the payment.
     * @return JsonResponse
     */
    public function show(Payment $payment)
    {
        return $this->resourceResponse($payment);
    }

    /**
     * Mark a payment as successful
     *
     * @group Payments
     *
     * @urlParam payment_id string required The ID of the payment. Example: PAYMENT_ABC123
     *
     * @response 200 {
     *   "data": {
     *     "id": "PAYMENT_ABC123",
     *     "status": "paid"
     *   }
     * }
     */
    public function pay($payment_id)
    {
        $payment = Payment::findOrFail($payment_id);
        $payment->status = 'paid';
        $payment->save();

        $order = $payment->order;
        $order->status = 'paid';
        $order->save();

        return $this->resourceResponse($payment);
    }

    /**
     * Mark a payment as failed
     *
     * @group Payments
     *
     * @urlParam payment_id string required The ID of the payment. Example: PAYMENT_ABC123
     *
     * @response 200 {
     *   "data": {
     *     "id": "PAYMENT_ABC123",
     *     "status": "failed"
     *   }
     * }
     */
    public function fail($payment_id)
    {
        $payment = Payment::findOrFail($payment_id);
        $payment->status = 'failed';
        $payment->save();

        $order = $payment->order;
        $order->status = 'failed';
        $order->save();

        return $this->resourceResponse($payment);
    }
}
