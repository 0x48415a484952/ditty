<?php

namespace App\Models;

use App\Traits\Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Post extends Model
{

    const STATUS_PUBLISHED = 3;

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
