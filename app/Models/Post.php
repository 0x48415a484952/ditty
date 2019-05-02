<?php

namespace App\Models;

use App\Traits\Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use Image, SoftDeletes;

    const STATUS_PUBLISHED = 3;

    protected $fillable = [
        'user_id',
        'title',
        'category_id',
        'brief_text',
        'text',
        'cover_image',
        'cnt_comments',
        'status'
    ];

    public static function boot()
    {
        parent::boot();

        static::addGlobalScope('status', function (Builder $builder) {
            $builder->where('status', self::STATUS_PUBLISHED);
        });
    }


    public function setCoverImageAttribute($value)
    {
        $this->attributes['cover_image'] = $this->storeImage($value, 'cover-images', 900);
    }

    public function getCoverImageAttribute()
    {
        if ($this->attributes['cover_image']) {
            return '/assets/images/cover-images/' . $this->attributes['cover_image'] . '.jpg';
        }
    }
}
