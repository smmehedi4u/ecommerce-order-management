<!-- resources/views/dashboards/super_admin.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Order Transfer</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <form action="{{ route('transfers.store') }}" method="POST" style="max-width: 500px; margin: 20px auto 0 auto; font-family: Arial, sans-serif; font-size: 14px;">
                    @csrf

                    <input type="hidden" name="order_id" value="{{ $order->id }}">

 
                    <div style="margin-bottom: 15px;">
                        <label for="to_outlet_id" style="display: block; margin-bottom: 5px;">Transfer To Outlet</label>
                        <select name="to_outlet_id" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
                            <option value="">-- Select Outlet --</option>
                            @foreach ($outlets as $outlet)
                                <option value="{{ $outlet->id }}">{{ $outlet->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div style="margin-bottom: 20px;">
                        <label for="transfer_reason" style="display: block; margin-bottom: 5px;">Transfer Reason</label>
                        <textarea name="transfer_reason" rows="3" required
                            style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;"></textarea>
                    </div>

                    <button type="submit"
                            style="margin-bottom: 20px; background-color: #2563eb; color: white; border: none; padding: 10px 20px; border-radius: 4px; cursor: pointer;">
                        Submit
                    </button>
                </form>


            </div>
        </div>
    </div>
</x-app-layout>
