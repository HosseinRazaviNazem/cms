<?php

namespace App\Http\Controllers;
use App\Http\Requests\customer\StoreCustomerRequest;
use App\Http\Requests\login\LoginRequest;
use App\Http\Requests\product\StoreProductRequest;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{

    public function __construct()
    {
//        $this->middleware('auth:api', ['except' => ['login','register']]);
    }

    public function login(LoginRequest $request)
    {
        $request = $request->validated();

        $customer = $request->only('email', 'password');

        $token = Auth::attempt($customer);
        if (!$token) {
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
            ]
        ]);

    }

    public function register(StoreCustomerRequest $request){

        $customer = Customer::create($request->validated());

        $token = Auth::login($customer);
        return response()->json([
            'status' => 'success',
            'message' => 'Customer created successfully',
            'customer' => $customer,
            'authorisation' => [
                'token' => $token,
                'type' => 'bearer',
            ]
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
        return response()->json([
            'status' => 'success',
            'user' => Auth::user(),
            'authorisation' => [
                'token' => Auth::refresh(),
                'type' => 'bearer',
            ]
        ]);
    }

}
