<x-app-layout>
    <x-slot name="header">
        <div style="display: flex; justify-content: space-between; align-items: center;">
            <h2 style="font-weight: 600; font-size: 1.25rem; color: #1f2937; line-height: 1.5;">All Orders</h2>
            {{-- <a href="{{ route('products.create') }}" style="text-decoration: none; padding: 6px 12px; background-color: #4f46e5; color: white; border-radius: 4px;">
                Create New Products
            </a> --}}
        </div>
    </x-slot>

    @if (session('success'))
        <div
            style="max-width: 700px; margin: 20px auto; padding: 12px 20px; background-color: #dddedee3; color: #000000; border: 1px solid #000000; border-radius: 6px; font-family: Arial, sans-serif; font-size: 14px; text-align: center;">
            {{ session('success') }}
        </div>
    @endif


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg" style="padding: 20px;">

                <table style="width: 100%; border-collapse: collapse; font-family: Arial, sans-serif; font-size: 14px;">
                    <thead>
                        <tr style="background-color: #f3f4f6;">
                            <th style="padding: 10px; border: 1px solid #ccc;">Order ID</th>
                            <th style="padding: 10px; border: 1px solid #ccc;">Name</th>
                            <th style="padding: 10px; border: 1px solid #ccc;">Email</th>
                            <th style="padding: 10px; border: 1px solid #ccc;">Phone</th>
                            <th style="padding: 10px; border: 1px solid #ccc;">Address</th>
                            <th style="padding: 10px; border: 1px solid #ccc;">Status</th>
                            <th style="padding: 10px; border: 1px solid #ccc;">Total</th>
                            <th style="padding: 10px; border: 1px solid #ccc;">Outlet</th>
                            <th style="padding: 10px; border: 1px solid #ccc;">Product</th>
                            <th style="padding: 10px; border: 1px solid #ccc;">Quantity</th>
                            <th style="padding: 10px; border: 1px solid #ccc;">Price</th>
                            <th style="padding: 10px; border: 1px solid #ccc;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            @foreach ($order->items as $item)
                                <tr>
                                    <td style="padding: 10px; border: 1px solid #ccc;">{{ $order->id }}</td>
                                    <td style="padding: 10px; border: 1px solid #ccc;">{{ $order->name }}</td>
                                    <td style="padding: 10px; border: 1px solid #ccc;">{{ $order->email }}</td>
                                    <td style="padding: 10px; border: 1px solid #ccc;">{{ $order->phone }}</td>
                                    <td style="padding: 10px; border: 1px solid #ccc;">{{ $order->address }}</td>
                                    <td style="padding: 10px; border: 1px solid #ccc;">{{ $order->status }}</td>
                                    <td style="padding: 10px; border: 1px solid #ccc;">
                                        ${{ number_format($order->total, 2) }}</td>
                                    <td style="padding: 10px; border: 1px solid #ccc;">{{ $order->outlet->name ?? '-' }}
                                    </td>
                                    <td style="padding: 10px; border: 1px solid #ccc;">
                                        {{ $item->product->name ?? 'N/A' }}</td>
                                    <td style="padding: 10px; border: 1px solid #ccc;">{{ $item->quantity }}</td>
                                    <td style="padding: 10px; border: 1px solid #ccc;">
                                        ${{ number_format($item->price, 2) }}</td>
                                    <td style="padding: 10px; border: 1px solid #ccc;">
                                        <form action="{{ route('transfers.create', ['order' => $order->id]) }}" method="GET">
                                            <button type="submit"
                                                style="background-color: #2563eb; color: white; padding: 6px 12px; border: none; border-radius: 4px; cursor: pointer;">
                                                Transfer
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>

</x-app-layout>
