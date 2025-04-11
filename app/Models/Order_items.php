<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_items extends Model
{
    protected $fillable = ['order_id', 'product_id', 'quantity'];

    /** @use HasFactory<\Database\Factories\OrderItemsFactory> */
    use HasFactory;
}
