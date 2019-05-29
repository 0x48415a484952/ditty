<?php

namespace App\Http\Controllers\Api\v1\Dashboard;

use App\Classes\Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Repositories\UsersRepository;
use App\Http\Requests\ProfileUpdateRequest;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        return Response::success('', ['user' => $user]);
    }

    public function update(ProfileUpdateRequest $request, UsersRepository $users)
    {
        $user = Auth::user();
        $user = $users->update($user, $request->only(
            $users->getFillable()
        ));

        if ($request->filled('password')) {
            $user->revokeTokens();
        }


        return Response::success('پروفایل با موفقیت ویرایش شد', [
            'user' => $user,
            'token' => $request->filled('password') ? $user->createToken('General Token')->accessToken : null
        ]);
    }
}
