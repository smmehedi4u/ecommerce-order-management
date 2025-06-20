
<x-app-layout>
    <x-slot name="header">
        <div style="display: flex; justify-content: space-between; align-items: center;">
            <h2 style="font-weight: 600; font-size: 1.25rem; color: #1f2937; line-height: 1.5;">All Outlets</h2>
            <a href="{{ route('outlets.create') }}" style="text-decoration: none; padding: 6px 12px; background-color: #4f46e5; color: white; border-radius: 4px;">
                Create New Outlet
            </a>
        </div>
    </x-slot>

    @if (session('success'))
        <div style="max-width: 700px; margin: 20px auto; padding: 12px 20px; background-color: #dddedee3; color: #000000; border: 1px solid #000000; border-radius: 6px; font-family: Arial, sans-serif; font-size: 14px; text-align: center;">
            {{ session('success') }}
        </div>
    @endif


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <table style="width: 100%; border-collapse: collapse; margin-top: 20px; font-family: Arial, sans-serif; font-size: 14px;">
                    <thead>
                        <tr style="background-color: #f3f4f6; text-align: left;">
                            <th style="padding: 10px; border: 1px solid #ccc;">Name</th>
                            <th style="padding: 10px; border: 1px solid #ccc;">Location</th>
                            <th style="padding: 10px; border: 1px solid #ccc;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($outlets as $outlet)
                            <tr style="border-bottom: 1px solid #ddd;">
                                <td style="padding: 10px; border: 1px solid #ccc;">{{ $outlet->name }}</td>
                                <td style="padding: 10px; border: 1px solid #ccc;">{{ $outlet->location }}</td>
                                <td style="padding: 10px; border: 1px solid #ccc;">
                                    <a href="{{ route('outlets.edit', $outlet) }}" style="margin-right: 10px; background-color: #05bd2d; color: #ffffff; padding: 5px 10px; border-radius: 4px; cursor: pointer; text-decoration: none;">Edit</a>
                                    <form action="{{ route('outlets.destroy', $outlet) }}" method="POST" style="display:inline;">
                                        @csrf @method('DELETE')
                                        <button type="submit" onclick="return confirm('Delete?')" style="background-color: #ef4444; color: white; border: none; padding: 5px 10px; border-radius: 4px; cursor: pointer;">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</x-app-layout>

