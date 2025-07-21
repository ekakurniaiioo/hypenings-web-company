<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'articles';
    protected $fillable = [
        'title',
        'slug',
        'content',
        'category_id',
        'image',
        'published_at'
    ];
    protected $dates = ['published_at'];

    public function category()
    {
        return $this->belongsTo(Category::class);

    }
public function slider()
{
    return $this->hasOne(Slider::class);
}
public function scopeSlider($query)
{
    return $query->where('is_features_slider', true);
}


}
