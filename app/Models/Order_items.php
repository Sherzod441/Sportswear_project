<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_items extends Model
{
    use HasFactory;
    protected $fillable = ['order_id', 'product_id', 'quantity', 'price'];

    public function product(){
        return $this->hasMany(Products::class);
    }
    public function order(){
        return $this->hasMany(Orders::class);
    }
}
