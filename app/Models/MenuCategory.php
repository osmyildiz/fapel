<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MenuCategory extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'name_tr', 'slug_tr', 'name_en', 'slug_en', 'name_ar', 'slug_ar',
    ];
    public $timestamps = true;

    public function menus()
    {
        return $this->hasMany(Menu::class);
    }
}
