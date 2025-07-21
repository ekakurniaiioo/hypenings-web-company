<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $fillable = ['article_id'];

    public function article()
    {
        return $this->belongsTo(Article::class);
    }

    public function media()
    {
        return $this->hasMany(SliderMedia::class);
    }

}
