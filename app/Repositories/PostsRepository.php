<?php
namespace App\Repositories;

use Illuminate\Http\Request;
use App\Contracts\PostsRepositoryInterface;

class PostsRepository extends Repository implements PostsRepositoryInterface
{
    public function model()
    {
        return \App\Models\Post::class;
    }
}