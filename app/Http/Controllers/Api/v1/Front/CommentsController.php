<?php

namespace App\Http\Controllers\Api\v1\Front;

use App\Models\Post;
use App\Classes\Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CommentsRequest;
use App\Repositories\CommentsRepository;

class CommentsController extends Controller
{
    private $comments;

    public function __construct(CommentsRepository $comments)
    {
        $this->comments = $comments;
    }

    public function index($post_id)
    {
        $post = Post::where('id', $post_id)->select('id')->firstOrFail();
        // if ($post->cnt_comments > 0) {}
        $comments = $post->comments;

        return Response::success('', $comments);
    }

    public function store(CommentsRequest $request, Post $post)
    {
        $comment = $this->comments->create($request->only(
            $this->comments->getFillable()
        ));

        $post->cnt_comments++;
        $post->comments()->save($comment);

        return Response::success(
            'Created Successfully',
            $comment->only(['name', 'email', 'text'])
        );
    }
}
