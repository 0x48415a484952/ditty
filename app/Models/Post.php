<?php

namespace App\Models;

use App\Traits\Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use Image;

    protected $fillable = [
        'user_id',
        'title',
        'brief_text',
        'text',
        'cover_image',
        'cnt_comments',
        'status'
    ];


    // This function should go to an observer class later.
    public static function boot()
    {
        parent::boot();

        static::creating(function($model) {
            $model->user_id = Auth::id();
        });
    }

    public function setCoverImageAttribute($value)
    {
        $this->attributes['cover_image'] = $this->storeImage($value, 'cover-images', 900);
    }

    public function getCoverImageAttribute()
    {
        if ($this->attributes['cover_image']) {
            return url('/assets/images/cover-images/' . $this->attributes['cover_image']) . '.jpg';
        }
    }
}
