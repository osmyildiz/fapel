<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gallery extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'gallery_category_id', 'title_tr', 'image_url',
        'title_en', 'title_ar',
    ];
    public $timestamps = true;

    public function galleryCategory()
    {
        return $this->belongsTo(GalleryCategory::class);
    }
}
