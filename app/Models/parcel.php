<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class parcel extends Model {
    protected $guarded = [];

    protected $fillable = [
        'quantity',
        'itemName',
        'unit',
        'price',
        'orderId',
        'total'
    ];

    public function order() {
        return $this->belongsTo(Order::class, 'orderId', 'orderId');
    }
}