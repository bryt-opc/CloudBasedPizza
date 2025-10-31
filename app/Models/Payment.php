<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use App\Traits\EpochTimestamps;

class Payment extends Model
{
    use HasFactory, EpochTimestamps;

    protected $fillable = [
        'id',
        'address',
        'city',
        'state',
        'postal_code',
        'country',
        'email',
        'name',
        'phone',
        'amount',
        'method',
        'status',
    ];

    public $incrementing = false;
    protected $keyType = 'string';

    public function getCustomIdPrefix(): string
    {
        return 'PAYMENT_';
    }

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }
}
