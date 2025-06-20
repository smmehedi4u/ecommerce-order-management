<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $orders = Order::with(['items.product', 'outlet'])->get();

        if ($request->ajax()) {
            return response()->json([
                'status' => 'success',
                'orders' => $orders
            ]);
        }

        return view('backend.orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        // if ($request->ajax()) {
        //     return response()->json(['status' => 'success']);
        // }

        // return view('backend.orders.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $validated = $request->validate([
        //     'name'            => 'required|string|max:255',
        //     'email'          => 'required|string|email|max:255',
        //     'phone'           => 'required|string|max:15',
        //     'address'       => 'required|string',
        //     'status'        => 'required|string|in:pending,completed,cancelled',
        //     'total'         => 'required|numeric|min:0',
        //     'outlet_id'      => 'required|exists:outlets,id',
        // ]);

        // $orders = Order::create($validated);

        // if ($request->ajax()) {
        //     return response()->json([
        //         'status' => 'success',
        //         'message' => 'Order created successfully.',
        //         'product' => $orders
        //     ]);
        // }

        // return redirect()->route('orders.index')->with('success', 'Order created successfully.');
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
    public function edit(Request $request, Order $order)
    {
        // if ($request->ajax()) {
        //     return response()->json([
        //         'status' => 'success',
        //         'order' => $order
        //     ]);
        // }

        // return view('backend.orders.edit', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        // $validated = $request->validate([
        //     'name'            => 'required|string|max:255',
        //     'email'          => 'required|string|email|max:255',
        //     'phone'           => 'required|string|max:15',
        //     'address'       => 'required|string',
        //     'status'        => 'required|string|in:pending,completed,cancelled',
        //     'total'         => 'required|numeric|min:0',
        //     'outlet_id'      => 'required|exists:outlets,id',
        // ]);

        // $order->update($validated);

        // if ($request->ajax()) {
        //     return response()->json([
        //         'status' => 'success',
        //         'message' => 'Order updated successfully.',
        //         'order' => $order
        //     ]);
        // }

        // return redirect()->route('orders.index')->with('success', 'Order updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        // $order->delete();
        // if (request()->ajax()) {
        //     return response()->json([
        //         'status' => 'success',
        //         'message' => 'Order deleted successfully.'
        //     ]);
        // }
        // return redirect()->route('orders.index')->with('success', 'Order deleted successfully.');
    }
}
