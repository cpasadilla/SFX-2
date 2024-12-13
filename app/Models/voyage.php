<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class voyage extends Model {
    protected $fillable = [
        'ship',
        'trip_num',
        'date',
        'dock',
        'orderId',
    ];
}