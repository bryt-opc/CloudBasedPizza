<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

use App\Traits\EpochTimestamps;

class Pizza extends Model
{
    use HasFactory, EpochTimestamps;

    protected $fillable = [
        'id',
        'image',
        'name',
        'description',
        'customizable',
        'price',
    ];

    public $incrementing = false;
    protected $keyType = 'string';

    public function getCustomIdPrefix(): string
    {
        return 'PIZZA_';
    }

    public function toppings(): BelongsToMany
    {
        return $this->belongsToMany(Topping::class, 'pizza_toppings');
    }
}
