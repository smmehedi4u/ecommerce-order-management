<!-- resources/views/dashboards/super_admin.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Create User</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <form action="{{ route('users.store') }}" method="POST"  style="max-width: 500px; margin: 20px auto 0 auto; font-family: Arial, sans-serif; font-size: 14px;">
                    @csrf

                    <div style="margin-bottom: 15px;">
                        <label for="name" style="display: block; margin-bottom: 5px;">Name</label>
                        <input name="name" placeholder="Name" required
                            style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                    </div>

                    <div style="margin-bottom: 15px;">
                        <label for="email" style="display: block; margin-bottom: 5px;">Email</label>
                        <input name="email" placeholder="Email" type="email" required
                            style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                    </div>

                    <div style="margin-bottom: 15px;">
                        <label for="role" style="display: block; margin-bottom: 5px;">Role</label>
                        <select name="role" required
                                style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                            <option value="">-- Role --</option>
                            <option value="admin">Admin</option>
                            <option value="outlet_in_charge">Outlet In-Charge</option>
                        </select>
                    </div>

                    <div style="margin-bottom: 15px;">
                        <label for="outlet_id" style="display: block; margin-bottom: 5px;">Outlet (Only for Outlet In-Charge)</label>
                        <select name="outlet_id" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                            <option value="">-- Select Outlet --</option>
                            @foreach ($outlets as $outlet)
                                <option value="{{ $outlet->id }}">{{ $outlet->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div style="margin-bottom: 15px;">
                        <label for="password" style="display: block; margin-bottom: 5px;">Password</label>
                        <input name="password" type="password" placeholder="Password" required
                            style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                    </div>

                    <div style="margin-bottom: 20px;">
                        <label for="password_confirmation" style="display: block; margin-bottom: 5px;">Confirm Password</label>
                        <input name="password_confirmation" type="password" placeholder="Confirm Password" required
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
