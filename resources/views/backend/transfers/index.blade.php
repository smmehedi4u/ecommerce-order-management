<x-app-layout>
    <x-slot name="header">
        <div style="display: flex; justify-content: space-between; align-items: center;">
            <h2 style="font-weight: 600; font-size: 1.25rem; color: #1f2937; line-height: 1.5;">All Transfers</h2>
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
                        <th style="padding: 10px; border: 1px solid #ccc;">From Outlet</th>
                        <th style="padding: 10px; border: 1px solid #ccc;">To Outlet</th>
                        <th style="padding: 10px; border: 1px solid #ccc;">Transferred By</th>
                        <th style="padding: 10px; border: 1px solid #ccc;">Reason</th>
                        <th style="padding: 10px; border: 1px solid #ccc;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transfers as $transfer)
                        <tr>
                            <td style="padding: 10px; border: 1px solid #ccc;">
                                {{ $transfer->order->id ?? '-' }}
                            </td>
                            <td style="padding: 10px; border: 1px solid #ccc;">
                                {{ $transfer->fromOutlet->name ?? '-' }}
                            </td>
                            <td style="padding: 10px; border: 1px solid #ccc;">
                                {{ $transfer->toOutlet->name ?? '-' }}
                            </td> 
                            <td style="padding: 10px; border: 1px solid #ccc;">
                                {{ $transfer->transferredBy->name ?? '-' }}
                            </td>
                            <td style="padding: 10px; border: 1px solid #ccc;">
                                {{ $transfer->transfer_reason }}
                            </td>
                            <td style="padding: 10px; border: 1px solid #ccc;">
                                <form action="{{ route('transfers.destroy', $transfer->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        style="background-color: #ff5100; color: white; padding: 6px 12px; border: none; border-radius: 4px; cursor: pointer;">
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
