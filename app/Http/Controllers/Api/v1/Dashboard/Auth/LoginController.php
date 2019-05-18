<?php

namespace App\Http\Controllers\Api\v1\Dashboard\Auth;

use App\Classes\Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        if (Auth::guard('api')->check()) {
            // return; // Needs refactoring
        }

        $this->validateLogin($request);

        if ($this->attemptLogin($request)) {
            $user = Auth::user();

            return Response ::success('Login successful', [
                'user' => $user,
                'token' => $user->createToken('General Token')->accessToken
            ]);
        }

        return Response::error('Invalid username or password', 401);

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.

        // $this->incrementLoginAttempts($request);

        // return $this->sendFailedLoginResponse($request);
    }

        /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        if (!empty($user = Auth::guard('api')->user())) {
            $user->revokeTokens();
        }
    }
}
