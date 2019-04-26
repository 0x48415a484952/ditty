<?php
namespace App\Repositories;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersRepository extends Repository
{
    public function model()
    {
        return \App\Models\User::class;
    }
}