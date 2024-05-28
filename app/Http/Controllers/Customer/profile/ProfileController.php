<?php

namespace App\Http\Controllers\Customer\profile;

use App\Exceptions\customer\CustomerNotFoundException;
use App\Http\Controllers\Controller;
use App\Http\Requests\profile\ShowProfileRequest;
use App\Http\Requests\profile\StoreProfileRequest;
use App\Http\Resources\Customer\profile\ProfileCollection;
use App\Http\Resources\Customer\profile\ProfileResource;
use App\Models\Customer;
use App\Models\Profile;

class ProfileController extends Controller
{
    public function index()
    {
        //        $profiles = Profile::query()->paginate();
        //
        //        return response()->json([
        //            'success' => true,
        //            'data' => $profiles
        //        ]);
        return new ProfileCollection(Profile::paginate());

    }

    public function store(StoreProfileRequest $request)
    {
        $profile = Profile::create($request->validated());

        return new ProfileResource($profile);

        //        return response()->json(['message' => 'profile created successfully', 'data' => $profile], 201);
    }

    public function update(StoreProfileRequest $request, Profile $profile)
    {
        $profile->update($request->validated());

        return new ProfileResource($profile);
        //        return response()->json(['message' => 'Customer updated successfully', 'data' => $profile]);
    }

    public function me(ShowProfileRequest $request)
    {
        $customer = Customer::query()
            ->with(['profile'])
            ->findOrFail($request->customer_id);

        $profile = $customer->profile;
        throw_if(! $profile, new CustomerNotFoundException());

        return new ProfileResource($profile);

        //        return response()->json(['data' => $profile]);
    }

    //    public function admin()
    //    {
    //
    //}

}
