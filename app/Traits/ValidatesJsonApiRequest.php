<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;

trait ValidatesJsonApiRequest
{

    public function validateJsonApi(Request $request, array $rules): array
    {
        $payload = $request->all();

        if (
            !isset($payload['data']) ||
            !is_array($payload['data']) ||
            !isset($payload['data']['attributes']) ||
            !is_array($payload['data']['attributes'])
        ) {
            throw new HttpResponseException(
                response()->json([
                    'message' => 'Invalid request format. Expected { data: { attributes: { ... } } }',
                ], 422)
            );
        }

        $attributes = $payload['data']['attributes'];

        $validator = Validator::make($attributes, $rules);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        $request->merge($validator->validated());

        return $validator->validated();
    }
}
