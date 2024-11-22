<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    protected $guarded = [];

    // Define the primary key if it's not `id`
    protected $primaryKey = 'orderId';

    // If the primary key is not an incrementing integer, set this to false
    public $incrementing = false;

    // Specify the primary key type (if it's not an integer)
    protected $keyType = 'string';
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
