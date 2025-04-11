<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $fillable = ['name', 'price', 'photo', 'description', 'category_id'];

    /** @use HasFactory<\Database\Factories\ProductsFactory> */
    use HasFactory;

    public function cart(){
        return $this->hasMany(Cart::class, 'product_id');
    }

    public function order_items(){
        return $this->hasMany(Order_items::class, 'product_id');
    }
}
