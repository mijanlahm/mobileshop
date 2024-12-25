<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
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
        'product_name',
        'qantity',
        'total_price',
        'status',
    ];
}
