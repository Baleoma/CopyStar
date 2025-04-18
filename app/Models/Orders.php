<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $fillable = ['user_id', 'status', 'cancel_reason'];

    /** @use HasFactory<\Database\Factories\OrdersFactory> */
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->hasMany(Order_items::class, 'order_id');
    }
}
