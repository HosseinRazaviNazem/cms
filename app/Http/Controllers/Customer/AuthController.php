<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\Customer\LoginRequest;
use App\Http\Requests\Customer\RegisterRequest;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        $customer = $request->validated();

        $token = Auth::attempt($customer);
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
        $customer = Customer::create($request->validated());

        $token = Auth::login($customer);

        return response()->json([
            'status' => 'success',
            'message' => 'Customer created successfully',
            'customer' => $customer,
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

//    public function refresh()
//    {
//        return response()->json([
//            'status' => 'success',
//            'user' => Auth::user(),
//            'authorisation' => [
//                'token' => Auth::refresh(),
//                'type' => 'bearer',
//            ],
//        ]);
//    }
}
