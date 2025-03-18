<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $primaryKey = 'orderId';
    public $incrementing = false;
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
        'voyageNum',
        'containerNum',
        'value',
        'mark',
        'check',
        'cargoID',
        'status',
        'OR',
        'AR',
        'bl_status',
        'cargo_status',
        'createdBy',
        'gates',
        'description',
    ];

    protected $casts = [
        'totalAmount' => 'float',
        'value' => 'float',
    ];

    public function parcels()
    {
        return $this->hasMany(parcel::class, 'orderId', 'orderId');
    }

    public function customer()
    {
        return $this->belongsTo(CustomerID::class, 'cID', 'cID');
    }

    /**
     * Calculate the valuation based on totalAmount and value.
     *
     * @return float
     */
    public function getValuationAttribute()
    {
        return ($this->value + $this->totalAmount) * 0.0075;
    }
}