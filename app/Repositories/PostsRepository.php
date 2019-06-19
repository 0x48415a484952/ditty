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

    public function paginate($limit = 10, int $status = 3)
    {
        return $this->model
            ->necessaryFields()
            ->where('status', '>=', $status)
            ->orderBy('id', 'desc')
            ->paginate($limit);
    }

    public function getByCategoryId($category_id, $limit = 10)
    {
        return $this->model
            ->necessaryFields()
            ->where('category_id', $category_id)
            ->isPublished()
            ->orderBy('id', 'desc')
            ->paginate($limit);
    }

    public function getByUserId($user_id, $limit = 10)
    {
        return $this->model
            ->necessaryFields()
            ->where('user_id', $user_id)
            ->isPublished()
            ->orderBy('id', 'desc')
            ->paginate($limit);
    }

    public function getByTag($tag, $limit = 10) {
        return $this->model->withAnyTag($tag)->paginate($limit);
    }

    public function related($post, $limit = 3)
    {
        return $this->model->necessaryFields()
            ->where('category_id', $post->category_id)
            ->where('id', '<>', $post->id)
            ->isPublished()
            ->orderBy('id', 'desc')
            ->limit($limit)
            ->get();
    }
}