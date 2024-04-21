<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{

    public function index()
    {
        $customers = Customer::all();
        return response()->json([
            'success' => true,
            'data' => $customers

    ]);

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

    public function show($id)
    {
        $customer = Customer::findOrFail($id);

        return response()->json(['data' => $customer]);
    }

}
