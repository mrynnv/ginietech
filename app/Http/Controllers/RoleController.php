<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        // Fetch all roles from the database
        $roles = Role::all();

        // Pass roles data to the view
        return view('roles.index', ['roles' => $roles]);
    }

    public function create()
    {
        // Return view for creating a new role
        return view('roles.create');
    }

    public function store(Request $request)
    {
        // Validate input data
        $request->validate([
            'name' => 'required|string|max:255|unique:roles,name',
            // Add more validation rules as needed
        ]);

        // Create new role
        Role::create([
            'name' => $request->input('name'),
            // Set other fields as needed
        ]);

        // Redirect to index page with success message
        return redirect()->route('roles.index')->with('success', 'Role created successfully.');
    }

    // Define other methods such as show, edit, update, destroy as needed
}
