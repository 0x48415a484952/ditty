<?php

namespace App\Http\Controllers\Api\v1\Front;

use App\Models\Post;
use App\Classes\Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\PostsRepository;

class PostsController extends Controller
{

    private $posts;

    public function __construct(PostsRepository $posts)
    {
        $this->posts = $posts;
    }

    public function index()
    {
        $posts = $this->posts->paginate();

        return Response::success('', $posts);
    }

    public function show(Post $post)
    {
        return Response::success('', $post);
    }
}
