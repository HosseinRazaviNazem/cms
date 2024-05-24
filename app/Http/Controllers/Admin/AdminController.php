<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\RegisterRequest;
use App\Http\Requests\admin\updateAdminRequest;
use App\Http\Resources\admin\AdminCollection;
use App\Http\Resources\admin\AdminResource;
use App\Models\Admin;

class AdminController extends Controller
{
    public function index()
    {
        return new AdminCollection(Admin::paginate());
    }

    public function store(RegisterRequest $request)
    {
        $admin = Admin::create($request->validated());
        return new AdminResource($admin);
    }

    public function show($id)
    {
        $admin = Admin::findOrFail($id);

        return new AdminResource($admin);
    }

    public function update(updateAdminRequest $request, Admin $admin)
    {
        $admin->update($request->validated());
        return new AdminResource($admin);
        //        return response()->json(['message' => 'Customer updated successfully', 'data' => $customer]);
    }
    public function destory($id)
    {
        try {
            $admin = Admin::findOrFail($id);
            $admin->delete();
            return response()->json(['message' => 'admin deleted successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to delete admin.'], 500);
        }
    }
}
