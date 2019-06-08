<?php
namespace App\Repositories;

use Illuminate\Http\Request;
// use App\Contracts\PostsRepositoryInterface;

class PostsRepository extends Repository // implements PostsRepositoryInterface
{
    public function model()
    {
        return \App\Models\Post::class;
    }

    public function paginate($limit = 10)
    {
        return $this->model
            ->necessaryFields()
            ->isPublished()
            ->orderBy('id', 'desc')
            ->paginate($limit);
    }

    public function getByCategory($category_id, $limit = 10)
    {
        return $this->model
            ->necessaryFields()
            ->where('category_id', $category_id)
            ->isPublished()
            ->orderBy('id', 'desc')
            ->paginate($limit);
    }

    public function getByTag($tag, $limit = 10) {
        return $this->model->withAnyTag($tag)->paginate($limit);
    }
}