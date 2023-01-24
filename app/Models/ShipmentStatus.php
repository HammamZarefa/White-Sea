<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShipmentStatus extends Model
{
    use HasFactory;

    public function shipment()
    {
        return $this->hasMany(Shipment::class,'status');
    }

    public function items()
    {
        return $this->hasMany(ShipmentItem::class,'status');
    }
}
