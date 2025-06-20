<!-- resources/views/dashboards/super_admin.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Create Products</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <form action="{{ route('products.store') }}" method="POST" style="max-width: 500px; margin: 20px auto 0 auto; font-family: Arial, sans-serif; font-size: 14px;">
                    @csrf

                    <div style="margin-bottom: 15px;">
                        <label for="name" style="display: block; margin-bottom: 5px;">Product Name</label>
                        <input name="name" placeholder="Product Name" required
                            style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                    </div>

                    <div style="margin-bottom: 15px;">
                        <label for="description" style="display: block; margin-bottom: 5px;">Description</label>
                        <textarea name="description" placeholder="Description" rows="3"
                                style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;"></textarea>
                    </div>

                    <div style="margin-bottom: 15px;">
                        <label for="price" style="display: block; margin-bottom: 5px;">Price</label>
                        <input name="price" placeholder="Price" type="number" step="0.01" required
                            style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                    </div>

                    <div style="margin-bottom: 15px;">
                        <label for="stock_quantity" style="display: block; margin-bottom: 5px;">Stock Quantity</label>
                        <input name="stock_quantity" placeholder="Stock Quantity" type="number" required
                            style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                    </div>

                    <button type="submit"
                            style="margin-bottom: 20px; background-color: #2563eb; color: white; border: none; padding: 10px 20px; border-radius: 4px; cursor: pointer;">
                        Create
                    </button>
                </form>


            </div>
        </div>
    </div>
</x-app-layout>
