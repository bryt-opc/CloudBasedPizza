<?php

namespace App\Helpers;

use Illuminate\Support\Str;

class IdGenerator
{
    /**
     * Generate a unique custom ID.
     *
     * @param string|null $prefix Optional prefix, default 'ID_'
     * @param int $length Random string length, default 10
     * @param string|null $modelClass Optional Eloquent model to check uniqueness
     * @param string $column Column name to check, default 'id'
     * @return string
     */
    public static function generate(
        string $modelClass,
        int $length = 10,
        string $column = 'id'
    ): string {
        $tempModel = new $modelClass;

        $prefix = method_exists($tempModel, 'getCustomIdPrefix')
            ? $tempModel->getCustomIdPrefix()
            : 'ID_';

        do {
            $id = $prefix . Str::upper(Str::random($length));
            $exists = $modelClass ? $modelClass::where($column, $id)->exists() : false;
        } while ($exists);

        return $id;
    }
}
