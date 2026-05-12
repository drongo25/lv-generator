<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Http\Requests\CreateAdminRequest;
use App\Http\Requests\UpdateAdminRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $admins = Admin::paginate(15);
        return view('admins.index', compact('admins'));
    }

    public function create()
    {
        // FIX: передаём пустую модель — _fields использует $admin->field ?? ''
        $admin = new Admin();
        return view('admins.create', compact('admin'));
    }

    public function store(CreateAdminRequest $request)
    {
        Admin::create($request->validated());
        return redirect()->route('admins.index')
            ->with('success', 'Admin created successfully.');
    }

    public function show($id)
    {
        $admin = Admin::findOrFail($id);
        return view('admins.show', compact('admin'));
    }

    public function edit($id)
    {
        $admin = Admin::findOrFail($id);
        return view('admins.edit', compact('admin'));
    }

    // FIX: исправлен порядок параметров — Request всегда первым
    public function update(UpdateAdminRequest $request, $id)
    {
        $admin = Admin::findOrFail($id);
        $admin->update($request->validated());
        return redirect()->route('admins.index')
            ->with('success', 'Admin updated successfully.');
    }

    public function destroy($id)
    {
        Admin::findOrFail($id)->delete();
        return redirect()->route('admins.index')
            ->with('success', 'Admin deleted successfully.');
    }
}