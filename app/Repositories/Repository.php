<?php
namespace App\Repositories;

use Illuminate\Support\Facades\App;
use Illuminate\Database\Eloquent\Model;
use App\Contracts\RepositoryInterface;


abstract class Repository implements RepositoryInterface
{
    protected $model;
    private $app;

    abstract public function model();

    public function __construct(App $app)
    {
        $this->app = $app;
        $this->makeModel();
    }

    public function getFillable()
    {
        return $this->model->getFillable();
    }

    public function all()
    {
        return $this->model->orderBy('id', 'desc')->get();
    }

    public function paginate($limit)
    {
        return $this->model->orderBy('id', 'desc')->paginate($limit);
    }

    public function findBy($col, $value, $limit = 10)
    {
        return $this->model->where($col, $value)->paginate($limit);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function update($model, array $data)
    {
        $model->update($data);

        return $model;
    }

    public function delete($model)
    {
        return $model->delete();
    }

    public function exists($id)
    {
        return $this->model
            ->where('id', $id)
            ->limit(1)
            ->select(\DB::raw(1))
            ->exists();
    }

    public function makeModel()
    {
        $model = app($this->model());

        if ($model instanceof Model || $model instanceof \Illuminate\Foundation\Auth\User) {
            return $this->model = $model;
        } else {
            throw new \Exception("Class {$this->model()} must be an instance of Model");
        }
    }

}