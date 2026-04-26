<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'transaction_id',
        'customer_name',
        'address',
        'order_type',
        'total_price',
        'payment_status',
        'status',
    ];
}
