<?php

namespace App\Http\Controllers\Web\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\PostsRepository;

class PostsController extends Controller
{
    public function index(PostsRepository $posts, $postId)
    {
        if (is_numeric($postId)) {
            $post = $posts->find($postId);

            if (!empty($post)) {
                return;
            }
        }
    }
}
