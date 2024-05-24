<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LoginRequest;
use App\Http\Requests\Admin\RegisterRequest;
use App\Models\Admin;

use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login( LoginRequest $request)
    {
        $admin = $request->validated();

        $token = $this->getGuard()->attempt($admin);

        if (! $token) {
            return response()->json([
                'status' => 'error',
                'message' => 'Unauthorized',
            ], 401);
        }

        $user = $this->getGuard()->user();

        return response()->json([
            'status' => 'success',
            'admin' => $user,

            'authorisation' => [
                'token' => $token,
                'type' => 'bearer',
            ],
        ]);
    }

    public function register(RegisterRequest $request)
    {
        $admin= Admin::create($request->validated());

        $token = $this->getGuard()->login($admin);
      
        return response()->json([
            'status' => 'success',
            'message' => 'Customer created successfully',
            'customer' => $admin,
            'authorisation' => [
                'token' => $token,
                'type' => 'bearer',
            ],
        ]);
    }
    public function logout()
    {
        $this->getGuard()->logout();
        return response()->json([
            'status' => 'success',
            'message' => 'Successfully logged out',
        ]);
    }

    public function refresh()
    {
        //
        return response()->json([
            'status' => 'success',
            'user' => Auth::user(),
            'authorisation' => [
                'token' => Auth::refresh(),
                'type' => 'bearer',
            ],
        ]);
    }

    /**
     * @return \Illuminate\Contracts\Auth\Guard|\Illuminate\Contracts\Auth\StatefulGuard
     */
    private function getGuard()
    {
        return Auth::guard('admins');
    }
}
