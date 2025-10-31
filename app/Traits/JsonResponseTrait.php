<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;

trait JsonResponseTrait
{
    protected function getResourceClass($data): ?string
    {
        $modelClass = is_iterable($data) ? (count($data) ? get_class($data[0]) : null) : get_class($data);

        if (!$modelClass) return null;

        $resourceClass = str_replace('App\\Models', 'App\\Http\\Resources', $modelClass) . 'Resource';

        return class_exists($resourceClass) ? $resourceClass : null;
    }

    public function resourceResponse($data, ?string $message = null, int $statusCode = 200): JsonResponse
    {
        if ($data === null) {
            return $this->errorResponse('Resource not found', [], [], 404);
        }

        $resourceClass = $this->getResourceClass($data);

        if ($resourceClass) {
            $resource = new $resourceClass($data);

            return response()->json(['data' => $resource], $statusCode);
        }

        return response()->json(['data' => $data], $statusCode);
    }

    public function resourceCollectionResponse($collection, array $meta = [], int $statusCode = 200): JsonResponse
    {
        $resourceClass = $this->getResourceClass($collection);

        if ($resourceClass) {
            $resourceCollection = $resourceClass::collection($collection);

            $response = ['data' => $resourceCollection];
        } else {
            $response = ['data' => $collection];
        }

        if (!empty($meta)) {
            $response['meta'] = $meta;
        }

        return response()->json($response, $statusCode);
    }

    public function errorResponse(string $message = 'Server Error', array $errors = [], array $meta = [], int $statusCode = 500): JsonResponse
    {
        $response = ['message' => $message];

        if (!empty($errors)) $response['errors'] = $errors;
        if (!empty($meta)) $response['meta'] = $meta;

        return response()->json($response, $statusCode);
    }
}
