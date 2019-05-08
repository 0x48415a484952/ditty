<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\Post;
use App\Classes\Response;
use Illuminate\Http\Request;
use App\Repositories\Repository;
use App\Http\Requests\PostsRequest;
use App\Http\Controllers\Controller;
use App\Contracts\PostsRepositoryInterface;

class PostsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Response::success('', $this->repo->paginate(10)->load('tagged'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostsRequest $request)
    {
        $post = $this->repo->create($request->only(
            $this->repo->model->getFillable()
        ));

        return Response::success('پست با موفقیت اضافه شد', $post->load('tagged'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return Response::success('', $post->load('tagged'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(PostsRequest $request, Post $post)
    {
        $post = $this->repo->update($post, $request->only(
            $this->repo->model->getFillable()
        ));

        return Response::success('Edited Successfully', $post->load('tagged'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return Response::success('Deleted Successfully');
    }
}
