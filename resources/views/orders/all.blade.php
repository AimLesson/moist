<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Transaksi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if ($orders->isEmpty())
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        {{ __('You have no order') }}
                    </div>
                </div>
            @else
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Order ID
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Status
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Metode Pembayaran
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Alamat
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Nomor HP
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Harga
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Items
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $order->id }}
                                </th>
                                <td class="px-6 py-4" id="status-{{ $order->id }}">
                                    {{ $order->status }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $order->payment }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $order->alamat }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $order->hp }}
                                </td>
                                <td class="px-6 py-4">
                                    Rp {{ number_format($order->total_price, 0, ',', '.') }}
                                </td>
                                <td class="px-6 py-4">
                                    <ul>
                                        @foreach ($order->orderItems as $item)
                                            <li>{{ $item->product->name }} (x{{ $item->quantity }})</li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td class="px-6 py-4">
                                    @if ($order->status === 'pending')
                                    <button id="button-{{ $order->id }}" class="px-4 py-2 bg-yellow-500 text-white rounded-md hover:bg-yellow-600" onclick="updateStatus({{ $order->id }})">Mark
                                        as Success</button>
                                    @elseif($order->status == 'success')
                                    <button id="button-{{ $order->id }}" class="px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-600" disabled>Success</button>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
    <script>
        function updateStatus(orderId) {
            fetch(`/orders/${orderId}/status`, {
                    method: 'PATCH',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        status: 'success'
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.message) {
                        document.getElementById(`status-${orderId}`).innerText = 'success';
                        const button = document.getElementById(`button-${orderId}`);
                        button.innerText = 'Success';
                        button.classList.remove('bg-yellow-500', 'hover:bg-yellow-600');
                        button.classList.add('bg-green-500', 'hover:bg-green-600');
                        button.disabled = true;
                        alert('Order status updated successfully.');
                    } else {
                        console.error('Unexpected response:', data);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        }
    </script>
</x-app-layout>
