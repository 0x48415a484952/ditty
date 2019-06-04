<?php

namespace App\Models;

use App\Traits\Image;
use Conner\Tagging\Taggable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use Image, SoftDeletes, Taggable;

    const STATUS_PUBLISHED = 3;

    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'category_id',
        'brief_text',
        'text',
        'cover_image',
        'cnt_comments',
        'status'
    ];

    protected $with = ['user', 'category'];
    protected $appends = ['tags'];


    public function necessaryFields()
    {
        $fields = $this->fillable;
        unset($fields[array_search('text', $fields)]);
        $fields = array_values(array_prepend($fields, 'id'));

        return $this->select($fields);
    }

    public function scopeIsPublished($query)
    {
        return $query->where('status', self::STATUS_PUBLISHED);
    }

    public static function boot()
    {
        parent::boot();

        // static::addGlobalScope('status', function (Builder $builder) {
        //     $builder->where('status', self::STATUS_PUBLISHED);
        // });
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable')
            // ->where('status', Comment::STATUS_APPROVED)
            ->select(['id', 'name', 'text']);
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id')->withDefault([
            'title' => 'بدون دسته‌بندی'
        ]);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
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

    public function getTagsAttribute()
    {
        $tags = [];

        foreach ($this->tagged as $tag) {
            $tags[] = $tag->tag_name;
        }

        return $tags;
    }

//     public function getCreatedAtAttribute()
//     {
//         return jdate($this->attributes['created_at'])->format('y/m/d H:i');
//     }


    public function getSlugAttribute()
    {
        return $this->attributes['slug'];
    }
}
