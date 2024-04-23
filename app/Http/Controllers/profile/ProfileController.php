<?php

namespace App\Http\Controllers\profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\customer\CreateCustomerRequest;
use App\Http\Requests\customer\UpdateCustomerRequest;
use App\Http\Requests\profile\CreateProfileRequest;
use App\Http\Requests\profile\ShowProfileRequest;
use App\Models\Customer;
use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show(ShowProfileRequest $request)
    {

        $customer = Customer::query()
            ->with(['profile'])
            ->firstOrFail($request->customer_id);
             $profile=$customer->profile();
                  return response()->json(['data' => $profile]);
    }

    public function store(CreateProfileRequest $request)
    {
        $profile = Profile::create($request->validated());

        return response()->json(['message' => 'profile created successfully', 'data' => $profile], 201);
    }


}
