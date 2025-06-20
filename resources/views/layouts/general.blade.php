<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Simple E-Commerce</title>
</head>
<body style="margin: 0; font-family: Arial, sans-serif;">

    <!-- Header -->
    <div style="background-color: #2563eb; padding: 20px; color: white; display: flex; justify-content: space-between; align-items: center;">
        <h2 style="margin: 0;">
            <a href="{{ route('home') }}" style="color: white; text-decoration: none;">MyShop</a>
        </h2>
        <a href="{{ route('cart.index') }}" style="color: white; text-decoration: none; font-size: 16px;">
            🛒 Cart (<span id="cart-count">{{count(session()->get('carts')) }}</span>)
        </a>
    </div>

    @yield('content')

        <!-- Footer -->
    <div style="background-color: #1f2937; color: white; text-align: center; padding: 20px; position: fixed; bottom: 0; left: 0; width: 100%;">
        &copy; 2025 MyShop. All rights reserved.
    </div>

</body>
</html>
