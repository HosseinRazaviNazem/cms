<?php

namespace App\Http\Controllers\profile;

use App\Exceptions\customer\CustomerNotFoundException;
use App\Exceptions\UserNotFound;
use App\Http\Controllers\Controller;
use App\Http\Requests\profile\CreateProfileRequest;
use App\Http\Requests\profile\ShowProfileRequest;
use App\Models\Customer;
use App\Models\Profile;
use Illuminate\Http\Request;
use mysql_xdevapi\Exception;

class ProfileController extends Controller
{

    public function index()
    {
        $profiles = Profile::query()->paginate();

        return response()->json([
            'success' => true,
            'data' => $profiles
        ]);
    }

    public function store(CreateProfileRequest $request)
    {
        $profile = Profile::create($request->validated());

        return response()->json(['message' => 'profile created successfully', 'data' => $profile], 201);
    }

    public function update(CreateProfileRequest $request, Profile $profile)
    {
        $profile->update($request->validated());

        return response()->json(['message' => 'Customer updated successfully', 'data' => $profile]);
    }

    public function me(ShowProfileRequest $request)
    {
        $customer = Customer::query()
            ->with(['profile'])
            ->findOrFail($request->customer_id);

        $profile = $customer->profile;
            throw_if(! $profile, new CustomerNotFoundException());


        return response()->json(['data' => $profile]);
    }

//    public function admin()
//    {
//
//}



}
