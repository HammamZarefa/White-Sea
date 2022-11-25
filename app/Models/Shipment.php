<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{
    use HasFactory;

    public function shipmentItems()
    {
        return $this->hasMany(ShipmentItem::class);
    }
}
