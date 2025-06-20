<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Outlet;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        if(!session()->has('carts')) {
            session()->put('carts', []);
        }

        $products = Product::all();
        return view('welcome', compact('products'));
    }

    public function addToCart($product_id)
    {
        //get previous cart items
        $carts = session()->get('carts', []);


        //add product to cart if not exists

        if (!in_array($product_id, array_column($carts, 'product_id'))) {
            $carts[] = [
                'product_id' => $product_id,
                'quantity' => 1, // default quantity
            ];
        } else {
            //if product already exists in cart, increment quantity
            foreach ($carts as &$cart) {
                if ($cart['product_id'] == $product_id) {
                    $cart['quantity']++;
                    break;
                }
            }
        }

        //update cart in session
        session()->put('carts', $carts);


        return redirect()->back()->with('success', 'Product added to cart successfully.');
    }

    public function removeFromCart($product_id)
    {
        $carts = session()->get('carts', []);

        foreach ($carts as $key => $cart) {
            if ($cart['product_id'] == $product_id) {
                unset($carts[$key]);
                break;
            }
        }

        session()->put('carts', $carts);

        return redirect()->back()->with('success', 'Product removed from cart successfully.');
    }

    public function cart()
    {
        $carts = session()->get('carts', []);

        $products = Product::whereIn('id', array_column($carts, 'product_id'))->get();


        foreach ($carts as &$cart) {
            $product = $products->firstWhere('id', $cart['product_id']);
            if ($product) {
                $cart['name'] = $product->name;
                $cart['price'] = $product->price;
                $cart['total'] = $product->price * $cart['quantity'];
            }
        }


        $outlets = Outlet::all();

        return view('cart', compact('carts', 'outlets'));
    }

    public function checkout(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required',
            'outlet_id' => 'required',
        ]);

        $carts = session()->get('carts', []);

        $products = Product::whereIn('id', array_column($carts, 'product_id'))->get();


        foreach ($carts as &$cart) {
            $product = $products->firstWhere('id', $cart['product_id']);
            if ($product) {
                $cart['price'] = $product->price;
            }
        }

        try {
            DB::beginTransaction();
            $order = Order::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'status' => 'pending',
                'total' => array_sum(array_map(function ($cart) {
                    return $cart['price'] * $cart['quantity'];
                }, $carts)),
                'outlet_id' => $request->outlet_id,
            ]);

            foreach ($carts as $cart) {
                $order->items()->create(
                    [
                        'order_id' => $order->id,
                        'product_id' => $cart['product_id'],
                        'quantity' => $cart['quantity'],
                        'price' => $cart['price'],
                    ]
                );
            }
            DB::commit();
            session()->put('carts',[]); // Clear the cart after successful checkout

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Checkout failed. Please try again.');
        }

        return redirect()->route('home')->with('success', 'Checkout successful. Your order has been placed.');
    }
}
