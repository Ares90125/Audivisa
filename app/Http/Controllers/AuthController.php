<?php

namespace App\Http\Controllers;

use App\Exceptions\VerifyEmailException;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use App\Enums\User\Type as UserRole;
use Auth;

class AuthController extends Controller
{
    protected $guardName;
    protected $redirectTo;

    // use AuthenticatesUsers;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except([
            'logout',
            'me'
        ]);
    }

    public function guard()
    {
        return Auth::guard($this->guardName);
    }

    /**
     * Attempt to log the user into the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return bool
     */
    protected function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $credentials['role'] = getRoleByGuard($this->guardName);

        $token = $this->guard()->attempt($credentials);
        if (! $token) {
            return response()->json([
                'status' => 0,
                'message' => 'Failed',
            ]);
        }
        $user = $this->guard()->user();
        if ($user instanceof MustVerifyEmail && ! $user->hasVerifiedEmail()) {
            return response()->json([
                'status' => 0,
                'message' => 'Failed',
            ]);
        }

        $this->guard()->setToken($token);

        return response()->json([
            'status' => 1,
            'message' => 'success',
            'token'=>$token
        ]);
    }

    /**
     * Get authenticated user.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function me(Request $request)
    {
        return response()->json($this->guard()->user());
    }

    /**
     * Send the response after the user was authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    protected function sendLoginResponse(Request $request)
    {
        $this->clearLoginAttempts($request);

        $token = (string) $this->guard()->getToken();
        $expiration = $this->guard()->getPayload()->get('exp');

        return response()->json([
            'token' => $token,
            'token_type' => 'bearer',
            'expires_in' => $expiration - time(),
            'user' => $user = $this->guard()->user(),
        ]);
    }

    /**
     * Get the failed login response instance.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function sendFailedLoginResponse(Request $request)
    {
        $user = $this->guard()->user();
        if ($user instanceof MustVerifyEmail && ! $user->hasVerifiedEmail()) {
            throw VerifyEmailException::forUser($user);
        }

        if ($this->guardName == 'clinic') {
            throw ValidationException::withMessages([
                $this->username() => [trans('auth.failed')],
            ]);
        } else if ($this->guardName == 'doctor') {
            throw ValidationException::withMessages([
                $this->username() => [trans('auth.failed')],
            ]);
        } else {
            return response()->json([
                'status' => 0,
                'message' => trans('auth.failed'),
            ]);
        }
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        $this->guard()->logout();
    }
}
