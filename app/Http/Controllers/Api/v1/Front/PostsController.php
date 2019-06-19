<?php

namespace App\Http\Controllers\Api\v1\Front;

use App\Models\Post;
use App\Classes\Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\PostsRepository;
use App\Http\Requests\PostsFetchRequest;
use Cviebrock\EloquentSluggable\Services\SlugService;

class PostsController extends Controller
{

    private $posts;

    public function __construct(PostsRepository $posts)
    {
        $this->posts = $posts;
    }

    public function index(PostsFetchRequest $request)
    {
        if ($request->filled('category_id')) {
            $posts = $this->posts->getByCategoryId($request->category_id);
        } else if ($request->filled('user_id')) {
            $posts = $this->posts->getByUserId($request->user_id);
        } else {
            $posts = $this->posts->paginate();
        }

        return Response::success('', $posts);
    }

    public function show(Post $post)
    {
        return Response::success('', $post);
    }

    public function relatedPosts(Post $post)
    {
        $posts = $this->posts->related($post);

        return Response::success('', $posts);
    }
}
