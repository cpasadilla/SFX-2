<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class priceList extends Model
{
    protected $guarded = [];

    protected $fillable = [
        'category',
        'itemName',
        'unit',
        'price',
        'length',
        'width',
        'height',
        'multiplier'

    ];
    protected $casts = [
        'price' => 'float',
        'multiplier' => 'float',
    ];

    public function category(){
        return $this->belongsTo(category::class);
}
}