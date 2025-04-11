<?php

namespace App\Http\Controllers;
use App\Models\adminModel;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $admins = adminModel::all();
        return view('admin.index', compact('admins'));
    }

    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:admin_table,email',
            'address' => 'nullable|string|max:255',
        ]);
        adminModel::create($validated);
        return redirect()->route('admin.index')->with('success', 'Administrator created successfully.');
    }


    public function show(string $id)
    {
        $admin = AdminModel::findOrFail($id);
        return view('admin.show', compact('admin'));
    }

    public function edit(string $id)
    {
        $admin = adminModel::findOrFail($id);
        return view('admin.edit', compact('admin'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'address' => 'nullable|string|max:255',
        ]);
        $admins = AdminModel::findOrFail($id);
        $admins->update($request->all());
        return redirect()->route('admin.index')->with('success', 'Administrator updated successfully.');
    }


    public function destroy(string $id)
    {
        $admins = AdminModel::findOrFail($id);
        $admins->delete();
        return redirect()->route('admin.index')->with('success', 'Administrator deleted successfully.');
    }
}
