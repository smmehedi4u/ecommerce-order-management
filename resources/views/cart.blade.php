@extends('layouts.general')

@section('content')
    <h2 style="text-align: center; margin-bottom: 30px;">Your Shopping Cart</h2>

        @if (session('success'))
            <div style="max-width: 700px; margin: 20px auto; padding: 12px 20px; background-color: #dddedee3; color: #000000; border: 1px solid #000000; border-radius: 6px; font-family: Arial, sans-serif; font-size: 14px; text-align: center;">
                {{ session('success') }}
            </div>
        @endif

    <table
        style="width: 100%; max-width: 900px; margin: auto; border-collapse: collapse; background-color: #ffffff; box-shadow: 0 0 10px rgba(0,0,0,0.05);">
        <thead>
            <tr style="background-color: #f3f4f6; text-align: left;">
                <th style="padding: 12px; border: 1px solid #ccc;">Product Name</th>
                <th style="padding: 12px; border: 1px solid #ccc;">Quantity</th>
                <th style="padding: 12px; border: 1px solid #ccc;">Price</th>
                <th style="padding: 12px; border: 1px solid #ccc;">Total Price</th>
                <th style="padding: 12px; border: 1px solid #ccc;">Action</th>
            </tr>
        </thead>
        <tbody>
            <!-- Example Row -->

            @foreach ($carts as $cart)
                <tr>
                    <td style="padding: 12px; border: 1px solid #ccc;">{{ $cart['name'] }}</td>
                    <td style="padding: 12px; border: 1px solid #ccc;">{{ $cart['quantity'] }}</td>
                    <td style="padding: 12px; border: 1px solid #ccc;">{{ $cart['price'] }}</td>
                    <td style="padding: 12px; border: 1px solid #ccc;">{{ $cart['total'] }}</td>
                    <td style="padding: 12px; border: 1px solid #ccc;">
                        <a href="{{ route('cart.remove', $cart['product_id']) }}"
                            style="background-color: #ef4444; color: white; padding: 6px 12px; border: none; border-radius: 4px; cursor: pointer;">
                            X
                        </a>
                    </td>
                </tr>
            @endforeach



        </tbody>
    </table>

    <form action="" method="POST">
        @csrf

        <input type="text" required name="name" placeholder="Enter your name" required
            style="width: 100%; max-width: 400px; padding: 10px; margin: 20px auto; display: block; border: 1px solid #ccc; border-radius: 4px;">
        @error('name')
            <div style="color: red; text-align: center; margin-bottom: 10px;">{{ $message }}</div>
        @enderror
        <input type="email" required name="email" placeholder="Enter your email" required
            style="width: 100%; max-width: 400px; padding: 10px; margin: 20px auto; display: block; border: 1px solid #ccc; border-radius: 4px;">
        @error('email')
            <div style="color: red; text-align: center; margin-bottom: 10px;">{{ $message }}</div>
        @enderror

        <input type="text" required name="address" placeholder="Enter your address" required
            style="width: 100%; max-width: 400px; padding: 10px; margin: 20px auto; display: block; border: 1px solid #ccc; border-radius: 4px;">
        @error('address')
            <div style="color: red; text-align: center; margin-bottom: 10px;">{{ $message }}</div>
        @enderror
        <input type="text" required name="phone" placeholder="Enter your phone number" required
            style="width: 100%; max-width: 400px; padding: 10px; margin: 20px auto; display: block; border: 1px solid #ccc; border-radius: 4px;">

        @error('phone')
            <div style="color: red; text-align: center; margin-bottom: 10px;">{{ $message }}</div>
        @enderror

        <select name="outlet_id" required
            style="width: 100%; max-width: 400px; padding: 10px; height: 42px; margin: 20px auto; display: block; border: 1px solid #ccc; border-radius: 4px;">
            <option value="">-- Select Outlet --</option>
            @foreach ($outlets as $outlet)
                <option value="{{ $outlet->id }}">{{ $outlet->name }}</option>
            @endforeach
        </select>


        @error('outlet_id')
            <div style="color: red; text-align: center; margin-bottom: 10px;">{{ $message }}</div>
        @enderror

        <!-- Order Button -->
        <div style="text-align: center; margin-top: 30px;">
            <button
                style="background-color: #2563eb; color: white; border: none; padding: 12px 30px; font-size: 16px; border-radius: 6px; cursor: pointer;">
                Place Order
            </button>
        </div>
    </form>
@endsection
