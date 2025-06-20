<!-- resources/views/dashboards/super_admin.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit User</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <form action="{{ route('products.update', $product) }}" method="POST"
                    style="max-width: 500px; margin: 20px auto 0 auto; font-family: Arial, sans-serif; font-size: 14px;">
                    @csrf
                    @method('PUT')

                    <div style="margin-bottom: 15px;">
                        <label for="name" style="display: block; margin-bottom: 5px;">Product Name</label>
                        <input name="name" value="{{ old('name', $product->name) }}" required
                            style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                    </div>

                    <div style="margin-bottom: 15px;">
                        <label for="description" style="display: block; margin-bottom: 5px;">Description</label>
                        <textarea name="description" rows="3" required
                                style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">{{ old('description', $product->description) }}</textarea>
                    </div>

                    <div style="margin-bottom: 15px;">
                        <label for="price" style="display: block; margin-bottom: 5px;">Price</label>
                        <input name="price" type="number" step="0.01" value="{{ old('price', $product->price) }}" required
                            style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                    </div>

                    <div style="margin-bottom: 20px;">
                        <label for="stock_quantity" style="display: block; margin-bottom: 5px;">Stock Quantity</label>
                        <input name="stock_quantity" type="number" value="{{ old('stock_quantity', $product->stock_quantity) }}" required
                            style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                    </div>

                    <button type="submit"
                            style="background-color: #2563eb; color: white; border: none; padding: 10px 20px; border-radius: 4px; cursor: pointer;">
                        Update
                    </button>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
