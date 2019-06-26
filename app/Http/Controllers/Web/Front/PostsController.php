<?php

namespace App\Http\Controllers\Web\Front;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\PostsRepository;

class PostsController extends Controller
{
    public function show(PostsRepository $posts, $slug, $post_id)
    {
        if ($posts->find(get_post_id($post_id))) {
            return view('front.main');
        }

        return response()->view('front.main', [
            'httpCode' => 404
        ], 404);
    }
}
