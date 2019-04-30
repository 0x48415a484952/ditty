<?php
namespace App\Repositories;

use Illuminate\Http\Request;

class UsersRepository extends Repository
{
    public function model()
    {
        return \App\Models\User::class;
    }
}