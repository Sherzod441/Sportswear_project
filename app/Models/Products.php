<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    protected $fillable = ['product_name','product_type_id','product_price','product_size', 'product_image']; 
    
    public function product_type(){

        return $this->hasMany(Product_types::class);
    }

    public function order_item(){
        return $this->belongsTo(Order_items::class);
    }
}
