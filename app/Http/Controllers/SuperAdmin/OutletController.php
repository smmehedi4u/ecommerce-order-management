<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Models\Outlet;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OutletController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $outlets = Outlet::all();

        if ($request->ajax()) {
            return response()->json([
                'status' => 'success',
                'outlets' => $outlets
            ]);
        }

        return view('backend.outlets.index', compact('outlets'));
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

        return view('backend.outlets.create', compact('outlets'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
        ]);

        Outlet::create($validated);

        if ($request->ajax()) {
            return response()->json([
                'status' => 'success',
                'message' => 'Outlet created successfully.'
            ]);
        }

        return redirect()->route('outlets.index')->with('success', 'Outlet created successfully.');
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
    public function edit(Request $request, Outlet $outlet)
    {
        if ($request->ajax()) {
            return response()->json([
                'status' => 'success',
                'outlet' => $outlet
            ]);
        }

        return view('backend.outlets.edit', compact('outlet'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Outlet $outlet)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
        ]);

        $outlet->update($validated);

        if ($request->ajax()) {
            return response()->json([
                'status' => 'success',
                'message' => 'Outlet updated successfully.'
            ]);
        }

        return redirect()->route('outlets.index')->with('success', 'Outlet updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Outlet $outlet)
    {
        $outlet->delete();
        return redirect()->route('outlets.index')->with('success', 'Outlet deleted successfully.');
    }
}
