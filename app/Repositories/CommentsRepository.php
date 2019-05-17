<?php
namespace App\Repositories;

use Illuminate\Http\Request;

class CommentsRepository extends Repository
{
    public function model()
    {
        return \App\Models\Comment::class;
    }
}