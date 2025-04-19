<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_items extends Model
{
    protected $fillable = ['order_id', 'product_id', 'quantity'];

    /** @use HasFactory<\Database\Factories\OrderItemsFactory> */
    use HasFactory;

    // Отношение к заказу
    public function order()
    {
        return $this->belongsTo(Orders::class);
    }

    // Отношение к товару
    public function product()
    {
        return $this->belongsTo(Products::class);
    }
}
