<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Http\Requests\user\StoreUserRequest;
use App\Http\Requests\user\UpdateUserRequest;
use App\Http\Resources\user\UserResource;
use App\Http\Resources\user\UserCollection;
use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class UserController extends Controller
{

    public function index()
    {
        return new UserCollection(User::paginate());
    }

    public function store(StoreUserRequest $request)
    {
        $user = User::create($request->validated());

        return new UserResource($user);

//        return response()->json(['message' => 'Customer created successfully', 'data' => $customer], 201);
    }

    public function show($id)
    {
        $user = User::findOrFail($id);

        return new UserResource($user);
    }


    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update($request->validated());

        return new UserResource($user);
//        return response()->json(['message' => 'Customer updated successfully', 'data' => $customer]);
    }

    public function destory($id)
    {
        try {
            $customer = Customer::findOrFail($id);
            $customer->delete();

            return response()->json(['message' => 'Customer deleted successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to delete customer.'], 500);
        }

    }


}
