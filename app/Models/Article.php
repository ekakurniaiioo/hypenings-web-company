<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'title', 'slug', 'content', 'category_id', 'image', 'published_at'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
