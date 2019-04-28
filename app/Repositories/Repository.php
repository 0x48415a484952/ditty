<?php
namespace App\Repositories;

use Illuminate\Support\Facades\App;
use Illuminate\Database\Eloquent\Model;
use App\Contracts\RepositoryInterface;


abstract class Repository implements RepositoryInterface
{
    public $model;
    private $app;

    abstract public function model();

    public function __construct(App $app)
    {
        $this->app = $app;
        $this->makeModel();
    }


    public function all()
    {
        return $this->model->all();
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