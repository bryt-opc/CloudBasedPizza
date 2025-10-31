<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;

use App\Traits\EpochTimestamps;

class OrderItem extends Model
{
    use HasFactory, EpochTimestamps;

    protected $fillable = [
        'id',
        'order_id',
        'orderable_id',
        'orderable_type',
        'parent_order_item_id',
        'quantity',
        'subtotal',
    ];

    public $incrementing = false;
    protected $keyType = 'string';

    public function getCustomIdPrefix(): string
    {
        return 'ORDERITEM_';
    }

    public function orderable(): MorphTo
    {
        return $this->morphTo()->morphWith([Pizza::class, Topping::class]);
    }

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public function parentPizza(): BelongsTo
    {
        return $this->belongsTo(OrderItem::class, 'parent_order_item_id');
    }

    public function toppings(): HasMany
    {
        return $this->hasMany(OrderItem::class, 'parent_order_item_id');
    }
}
