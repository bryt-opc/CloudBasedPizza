<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\EpochTimestamps;

class Customer extends Model
{
    use HasFactory, EpochTimestamps;

    protected $fillable = [
        'id',
        'email',
        'first_name',
        'last_name',
        'address',
        'city',
        'state',
    ];

    public $incrementing = false;
    protected $keyType = 'string';

    public function getCustomIdPrefix(): string
    {
        return 'CUSTOMER_';
    }
}
