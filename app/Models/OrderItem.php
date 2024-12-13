<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model {
    use HasFactory;

    // Define the table name (if different from the pluralized model name)
    protected $table = 'order_items'; 

    // Define the fillable attributes
    protected $fillable = [
        'order_id', 
        'product_name',
        'unit',
        'price',
        'quantity',
        'total',
    ];

    // Define any relationships (if applicable)
    public function order() {
        return $this->belongsTo(Order::class);
    }
}