<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statistic extends Model
{
    use HasFactory;
    protected $guarded = [
        'id',
        'updated_at',
        'created_at'
    ];
}
