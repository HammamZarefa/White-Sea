<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShipmentItem extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function shipment()
    {
        return $this->belongsTo(Shipment::class)->withDefault();
    }

    public function status()
    {
        return $this->belongsTo(ShipmentStatus::class);
    }

//    public function setStatusAttribute($value)
//    {
//        $this->attributes['status'] = ShipmentStatus::where('name',$value)->first()->id;
//    }



}
