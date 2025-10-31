<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

use App\Traits\EpochTimestamps;

class Topping extends Model
{
    use HasFactory, EpochTimestamps;

    protected $fillable = [
        'id',
        'name',
        'price',
    ];

    public $incrementing = false;
    protected $keyType = 'string';

    public function getCustomIdPrefix(): string
    {
        return 'TOPPING_';
    }

    public function pizzas(): BelongsToMany
    {
        return $this->belongsToMany(Pizza::class, 'pizza_toppings');
    }
}
