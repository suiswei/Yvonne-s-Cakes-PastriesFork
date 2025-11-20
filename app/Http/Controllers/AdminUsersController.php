<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminUsersController extends Controller
{
    // Show user management page
    public function index()
    {
        $users = User::all(); // all registered customers/admins
        return view('admin.users', compact('users'));
    }

    // Show user details (if modal is loaded dynamically)
    public function show($id)
    {
        $user = User::findOrFail($id);
        return response()->json($user);
    }

    // Handle creation of a new admin
    public function storeAdmin(Request $request)
    {
        $request->validate([
            'last_name'     => 'required|string|max:255',
            'first_name'    => 'required|string|max:255',
            'middle_name'   => 'nullable|string|max:255',
            'username'      => 'required|string|max:255|unique:users,username',
            'email'         => 'required|email|unique:users,email',
            'password'      => 'required|min:6|confirmed',
            'role'          => 'required|string',
        ]);

        // Create Admin
        User::create([
            'lastname'      => $request->last_name,
            'firstname'     => $request->first_name,
            'middlename'    => $request->middle_name,
            'username'      => $request->username,
            'email'         => $request->email,
            'password'      => Hash::make($request->password),
            'role'          => $request->role,  // "Admin", "Super Admin"
        ]);

        return redirect()->back()->with('success', 'Admin account created successfully.');
    }
}
