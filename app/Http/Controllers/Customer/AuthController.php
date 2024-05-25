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

        $token = $this->getGuard()->attempt($customer);
        if (! $token) {
            return response()->json([
                'status' => 'error',
                'message' => 'Unauthorized',
            ], 401);
        }

        $user = $this->getGuard()->user();

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

        $token = $this->getGuard()->login($customer);

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


    /**
     * @return \Illuminate\Contracts\Auth\Guard|\Illuminate\Contracts\Auth\StatefulGuard
     */
    private function getGuard()
    {
        return Auth::guard('customers');
    }
}
