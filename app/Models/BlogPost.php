<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogPost extends Model
{
    public $timestamps = true;
    use SoftDeletes;
    protected $fillable = [
        'blog_category_id', 'title_tr', 'slug_tr', 'content_tr',
        'title_en', 'slug_en', 'content_en',
        'title_ar', 'slug_ar', 'content_ar',
    ];

    public function blogCategory()
    {
        return $this->belongsTo(BlogCategory::class);
    }
}
