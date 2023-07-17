<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cargo extends Model
{
    
    protected $guarded = [];

    protected $fillable = [
        'shipNum',
        'cargoNum',
        'weight',
        'cargoID'
    ];
}
