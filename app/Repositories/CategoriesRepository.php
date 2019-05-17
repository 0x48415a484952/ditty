<?php
namespace App\Repositories;

use Illuminate\Http\Request;

class CategoriesRepository extends Repository
{
    public function model()
    {
        return \App\Models\Category::class;
    }
}