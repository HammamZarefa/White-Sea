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

    public function status()
    {
        return $this->belongsTo(ShipmentStatus::class);
    }

//    public function setStatusAttribute($value)
//    {
//        $this->attributes['status'] = ShipmentStatus::where('name',$value)->first()->id;
//    }
//
//    public function getStatusAttribute($value)
//    {
//        return ShipmentStatus::where('id',$value)->first()->name;;
//    }
}
