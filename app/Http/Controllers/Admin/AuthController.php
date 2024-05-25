<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\LoginRequest;
use App\Http\Requests\admin\RegisterRequest;
use App\Models\Admin;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        $admin = $request->validated();
        $token = $this->getGuard()->attempt($admin);

        if (! $token) {
            return response()->json([
                'status' => 'error',
                'message' => 'Unauthorized',
            ], 401);
        }
        $user = Auth::user();
        return response()->json([
            'status' => 'success',
            'customer' => $user,
            'authorisation' => [
                'token' => $token,
                'type' => 'bearer',
            ],
        ]);
    }

    public function register(RegisterRequest $request)
    {
        //
        $admin= Admin::create($request->validated());

        $token =$this->getGuard()->login($admin);

        return response()->json([
            'status' => 'success',
            'message' => 'admin created successfully',
            'admin' => $admin,
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
        return response()->json([
            'status' => 'success',
            'user' => $this->$this->getGuard()->user(),
            'authorisation' => [
                'token' => $this->$this->getGuard()->refresh(),
                'type' => 'bearer',
            ],
        ]);
    }

    private function getGuard()
    {
        return Auth::guard('admins');
    }
}
