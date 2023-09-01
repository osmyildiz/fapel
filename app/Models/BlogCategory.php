<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogCategory extends Model
{
    public $timestamps = true;
    use SoftDeletes;

    protected $fillable = [
        'name_tr', 'slug_tr', 'name_en', 'slug_en', 'name_ar', 'slug_ar',
    ];

    public function blogPosts()
    {
        return $this->hasMany(BlogPost::class);
    }
}
