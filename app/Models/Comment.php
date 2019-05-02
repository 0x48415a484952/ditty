<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use SoftDeletes;

    const STATUS_APPROVED  = 3;
    const STATUS_PENDING   = 2;
    const STATUS_REJECTED  = 1;

    protected $fillable = [
        // 'user_id',
        'post_id',
        'reply_to',
        'name',
        'email',
        'text',
        'status'
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function($comment) {
            $comment->status = self::STATUS_PENDING;
        });
    }

    public function setTextAttribute($text)
    {
        $text = preg_replace('/[ \t]+/', ' ', preg_replace("/[\n|\n\r|\r]{3,}/", "\n\n", $text));

        $this->attributes['text'] = clean($text, [
            'HTML.Allowed' => ''
        ]);
    }
}
