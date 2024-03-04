<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShipmentItem extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function shipments()
    {
        return $this->belongsTo(Shipment::class,'shipment','id');
    }
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('is_active', function (Builder $builder) {
            $builder->where('is_active', 1);
        });
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
