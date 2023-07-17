<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    protected $guarded = [];

    protected $fillable = [
        'name',
    ];

    public function priceList(){
        return $this->hasMany(priceList::class);
    }

}
