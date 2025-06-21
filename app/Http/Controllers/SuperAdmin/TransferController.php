<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Models\Order;
use App\Models\Outlet;
use Illuminate\Http\Request;
use App\Models\OrderTransfer;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TransferController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $transfers = OrderTransfer::with(['order', 'fromOutlet', 'toOutlet', 'transferredBy'])
        ->when(auth()->user()->isOutletInCharge(), function ($query) {
            return $query->where('from_outlet_id', auth()->user()->outlet_id)
                         ->orWhere('to_outlet_id', auth()->user()->outlet_id);
        })
        ->latest()->get();


        if ($request->ajax()) {
            return response()->json([
                'status' => 'success',
                'transfers' => $transfers
            ]);
        }
        return view('backend.transfers.index', compact('transfers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Order $order)
    {
        $outlets = Outlet::where('id', '!=', $order->outlet_id)->get();


        return view('backend.transfers.create', compact('order', 'outlets'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Order $order)
    {



        $request->validate([
            'order_id' => 'required|exists:orders,id',
            'to_outlet_id' => 'required|exists:outlets,id',
            'transfer_reason' => 'required|string|max:255',
        ]);

        $order = Order::findOrFail($request->order_id);

        if(auth()->user()->isOutletInCharge() && auth()->user()->outlet_id !== $order->outlet_id) {
            return abort(403, 'You are not authorized to transfer this order.');
        }

        OrderTransfer::create([
            'order_id' => $order->id,
            'from_outlet_id' => $order->outlet_id,
            'to_outlet_id' => $request->to_outlet_id,
            'transferred_by_user_id' => Auth::id(),
            'transfer_reason' => $request->transfer_reason,
        ]);

        $order->update([
            'outlet_id' => $request->to_outlet_id,
        ]);

        return redirect()->route('transfers.index')->with('success', 'Order transferred successfully.');

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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OrderTransfer $transfer)
    {
        $transfer->delete();

        return redirect()->route('transfers.index')->with('success', 'Transfer deleted successfully.');
    }
}
