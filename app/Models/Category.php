<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $table = 'post_categories';
    public $timestamps = false;
    protected $fillable = ['title', 'parent_id'];

}
