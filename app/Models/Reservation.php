<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = [
        'first_name', 'last_name', 'date', 'time', 'guest_count', 'branch_id', 'phone', 'email'
    ];
    public $timestamps = true;

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }
}
