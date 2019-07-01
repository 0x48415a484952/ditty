<?php
namespace App\Repositories;

use App\Models\Post;
use Illuminate\Http\Request;
// use App\Contracts\PostsRepositoryInterface;

class PostsRepository extends Repository // implements PostsRepositoryInterface
{

    public function model()
    {
        return Post::class;
    }


    public function paginate($limit = 10, int $status = 3)
    {
        return $this->model
            ->necessaryFields()
            ->where('status', '>=', $status)
            ->orderBy('id', 'desc')
            ->paginate($limit);
    }

    public function getByCategoryId($category_id, $limit = 10, int $status = 3)
    {
        return $this->model
            ->necessaryFields()
            ->where('category_id', $category_id)
            ->isPublished()
            ->orderBy('id', 'desc')
            ->where('status', $status)
            ->paginate($limit);
    }

    public function getByUserId($user_id, $limit = 10, $status = 3)
    {
        return $this->model
            ->necessaryFields()
            ->where('status', '>=', $status)
            ->where('user_id', $user_id)
            ->orderBy('id', 'desc')
            ->paginate($limit);
    }

    public function getByTag($tag, $limit = 10, int $status = 3) {
        return $this->model
            ->where('status', '>=', $status)
            ->withAnyTag($tag)
            ->paginate($limit);
    }

    public function find($id, int $status = 3)
    {
        return $this->model
            ->where('id', $id)
            ->where('status', '>=' ,$status)
            ->first();
    }

    public function related($post, $limit = 6, int $status = 3)
    {
        return $this->model->necessaryFields()
            ->where('category_id', $post->category_id)
            ->where('id', '<>', $post->id)
            ->isPublished()
            ->where('status', '>=' ,$status)
            ->orderBy('id', 'desc')
            ->limit($limit)
            ->get();
    }
}