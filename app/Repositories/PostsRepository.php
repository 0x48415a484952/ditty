<?php
namespace App\Repositories;

use Illuminate\Http\Request;

class PostsRepository extends Repository
{
    public function model()
    {
        return \App\Models\Post::class;
    }
}