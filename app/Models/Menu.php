<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'menu_category_id', 'name_tr', 'description_tr', 'price',
        'name_en', 'description_en',
        'name_ar', 'description_ar',
    ];
    public $timestamps = true;

    public function menuCategory()
    {
        return $this->belongsTo(MenuCategory::class);
    }
}
