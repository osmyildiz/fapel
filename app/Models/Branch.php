<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;
    public $timestamps = true;

    protected $fillable = [
        'name', 'address', 'phone', 'image_url', 'weekday_opening_time', 'weekend_opening_time', 'is_active', 'priority'
    ];
}
