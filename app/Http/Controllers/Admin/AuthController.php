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

        $token = Auth::attempt($admin);
        if (! $token) {
            return response()->json([
                'status' => 'error',
                'message' => 'Unauthorized',
            ], 401);
        }

        $user = Auth::user();

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

        $token = Auth::login($admin);

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
        Auth::logout();

        return response()->json([
            'status' => 'success',
            'message' => 'Successfully logged out',
        ]);
    }

    public function refresh()
    {
        //
    }
}
