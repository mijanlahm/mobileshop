<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class shippinginfo extends Model
{
    protected $fillable = [
        'user_id',
        'full_name',
        'Email',
        'phone',
        'address',
        'city',
        'state',
        'postal_code',
        'country',
    ];
}
