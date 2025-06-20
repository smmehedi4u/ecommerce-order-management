@extends('layouts.general')

@section('content')
    <!-- Hero Banner -->
    <div style="background-color: #f3f4f6; padding: 40px; text-align: center;">
        <h1 style="margin-bottom: 10px;">Welcome to MyShop</h1>
        <p style="margin: 0;">Simple and Clean E-commerce Experience</p>
    </div>

    @if (session('success'))
        <div style="max-width: 700px; margin: 20px auto; padding: 12px 20px; background-color: #dddedee3; color: #000000; border: 1px solid #000000; border-radius: 6px; font-family: Arial, sans-serif; font-size: 14px; text-align: center;">
            {{ session('success') }}
        </div>
    @endif

    <!-- Product List -->
    <div style="display: flex; flex-wrap: wrap; justify-content: center; padding: 20px; gap: 20px;">


        <!-- Product Card -->
        <div style="display: flex; flex-wrap: wrap; gap: 20px; justify-content: center; padding: 20px;">
            @foreach ($products as $product)
                <div style="border: 1px solid #ddd; border-radius: 8px; width: 200px; padding: 16px; text-align: center;">
                    <h3 style="margin: 10px 0; font-size: 18px;">{{ $product->name }}</h3>
                    <p style="color: #666; font-size: 14px; margin-bottom: 10px;">
                        {{ $product->description }}
                    </p>
                    <p style="color: #333; font-weight: bold; margin-bottom: 12px;">
                        ${{ number_format($product->price, 2) }}
                    </p>
                    <a href="{{ route('cart.add', $product->id) }}"  style="background-color: #10b981; color: white; padding: 8px 16px; border: none; border-radius: 4px; cursor: pointer; text-decoration: none;">
                        Add to Cart
                    </a>
                </div>
            @endforeach
        </div>

    </div>

@endsection
