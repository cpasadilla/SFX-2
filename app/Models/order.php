<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    protected $guarded = [];

    protected $fillable = [
        'shipNum',
        'cID',
        'totalAmount',
        'orderId',
        'origin',
        'destination',
        'cargoNum',
        'orderCreated',
        'consigneeName',
        'consigneeNum',
        'voyageNum', // Add voyageNum
        'containerNum', // Add containerNum
        'value', // Add containerNum
        'cargoID',
    ];

    public function parcel(){
        return $this->hasMany(parcel::class);
    }
}
