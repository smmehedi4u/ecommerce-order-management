<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Models\User;
use App\Models\Outlet;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $users = User::whereIn('role', ['admin', 'outlet_in_charge'])->get();

        if ($request->ajax()) {
            return response()->json([
                'status' => 'success',
                'users' => $users
            ]);
        }

        return view('backend.users.index', compact('users'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $outlets = Outlet::all();

        if ($request->ajax()) {
            return response()->json([
                'status' => 'success',
                'outlets' => $outlets
            ]);
        }

        return view('backend.users.create', compact('outlets'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'role' => ['required', Rule::in(['admin', 'outlet_in_charge'])],
            'outlet_id' => 'nullable|exists:outlets,id',
            'password' => 'required|min:6|confirmed',
        ]);

        if ($validated['role'] === 'outlet_in_charge' && !$request->outlet_id) {
            return back()->withErrors(['outlet_id' => 'Outlet is required for Outlet In-Charge'])->withInput();
        }

        $validated['password'] = Hash::make($validated['password']);

        $user = User::create($validated);

        if ($request->ajax()) {
            return response()->json([
                'status' => 'success',
                'message' => 'User created successfully.',
                'user' => $user
            ]);
        }

        return redirect()->route('users.index')->with('success', 'User created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, User $user)
    {
         $outlets = Outlet::all();

        if ($request->ajax()) {
            return response()->json([
                'status' => 'success',
                'user' => $user,
                'outlets' => $outlets
            ]);
        }

        return view('backend.users.edit', compact('user', 'outlets'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
    $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => ['required', 'email', Rule::unique('users')->ignore($user->id)],
            'role' => ['required', Rule::in(['admin', 'outlet_in_charge'])],
            'password' => 'nullable|min:6|confirmed',
            'outlet_id' => 'nullable|exists:outlets,id',
        ]);

        if ($validated['role'] === 'outlet_in_charge' && !$request->outlet_id) {
            return back()->withErrors(['outlet_id' => 'Outlet is required for Outlet In-Charge'])->withInput();
        }

        if (!empty($validated['password'])) {
            $validated['password'] = Hash::make($validated['password']);
        } else {
            unset($validated['password']);
        }

        $user->update($validated);

            if ($request->ajax()) {
                return response()->json([
                    'status' => 'success',
                    'message' => 'User updated successfully.',
                    'user' => $user
                ]);
            }

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, User $user)
    {
        $user->delete();

        if ($request->ajax()) {
            return response()->json([
                'status' => 'success',
                'message' => 'User deleted successfully.'
            ]);
        }

        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}
