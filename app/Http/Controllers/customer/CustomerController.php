<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\Customer\RegisterRequest;
use App\Http\Requests\customer\UpdateCustomerRequest;
use App\Http\Resources\customer\CustomerCollection;
use App\Http\Resources\customer\CustomerResource;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function index()
    {
        return new CustomerCollection(Customer::paginate());
    }

    public function store(RegisterRequest $request)
    {
        $customer = Customer::create($request->validated());

        return new CustomerResource($customer);

        //        return response()->json(['message' => 'Customer created successfully', 'data' => $customer], 201);
    }

    public function show($id)
    {
        $customer = Customer::findOrFail($id);

        return new CustomerResource($customer);
    }

    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        $customer->update($request->validated());

        return new CustomerResource($customer);
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
