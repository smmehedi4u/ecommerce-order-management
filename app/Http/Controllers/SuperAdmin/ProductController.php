<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
 public function index(Request $request)
    {
        $products = Product::all();

        if ($request->ajax()) {
            return response()->json([
                'status' => 'success',
                'products' => $products
            ]);
        }

        return view('backend.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new product.
     */
    public function create(Request $request)
    {
        if ($request->ajax()) {
            return response()->json(['status' => 'success']);
        }

        return view('backend.products.create');
    }

    /**
     * Store a newly created product in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'            => 'required|string|max:255',
            'description'     => 'nullable|string',
            'price'           => 'required|numeric|min:0',
            'stock_quantity'  => 'required|integer|min:0',
        ]);

        $product = Product::create($validated);

        if ($request->ajax()) {
            return response()->json([
                'status' => 'success',
                'message' => 'Product created successfully.',
                'product' => $product
            ]);
        }

        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    /**
     * Show the form for editing the specified product.
     */
    public function show(Request $request)
    {
        //
    }

    public function edit(Request $request, Product $product)
    {
        if ($request->ajax()) {
            return response()->json([
                'status' => 'success',
                'product' => $product
            ]);
        }

        return view('backend.products.edit', compact('product'));
    }

    /**
     * Update the specified product in storage.
     */
    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name'            => 'required|string|max:255',
            'description'     => 'nullable|string',
            'price'           => 'required|numeric|min:0',
            'stock_quantity'  => 'required|integer|min:0',
        ]);

        $product->update($validated);

        if ($request->ajax()) {
            return response()->json([
                'status' => 'success',
                'message' => 'Product updated successfully.',
                'product' => $product
            ]);
        }

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified product from storage.
     */
    public function destroy(Request $request, Product $product)
    {
        $product->delete();

        if ($request->ajax()) {
            return response()->json([
                'status' => 'success',
                'message' => 'Product deleted successfully.'
            ]);
        }

        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}
