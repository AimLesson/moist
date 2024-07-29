<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

{{-- Navbar --}}
<nav class="bg-white border-gray-200 dark:bg-gray-900">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="#" class="flex items-center space-x-3 rtl:space-x-reverse">
            <h1 class="text2xl font-extrabold text-gray-900 dark:text-white md:text-2xl lg:text-2xl"><span
                    class="text-transparent bg-clip-text bg-gradient-to-r to-blue-600 from-purple-400">Moist</span>
                Skincare</h1>
        </a>
        <button data-collapse-toggle="navbar-default" type="button"
            class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
            aria-controls="navbar-default" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M1 1h15M1 7h15M1 13h15" />
            </svg>
        </button>
        <div class="hidden w-full md:block md:w-auto" id="navbar-default">
            <ul
                class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                <li>
                    <a href="/"
                        class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 dark:text-white md:dark:text-blue-500"
                        aria-current="page">Home</a>
                </li>
                <li>
                    <a href="/katalog"
                        class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Products</a>
                </li>
                <li>
                    <a href="#"
                        class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">About
                        Us</a>
                </li>
                <li>
                    @auth
                        <a href="/"
                            class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">
                            {{ Auth::user()->name }}
                        </a>
                    @else
                        <a href="{{ route('login') }}"
                            class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">
                            Login
                        </a>
                    @endauth
                </li>
            </ul>
        </div>
    </div>
</nav>

<body class="bg-gray-100 dark:bg-gray-900">
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold mb-4 text-gray-900 dark:text-white">Create Order</h1>

        @if (session('error'))
            <p class="mb-4 text-red-600">{{ session('error') }}</p>
        @endif

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white dark:bg-gray-800">
                <thead>
                    <tr>
                        <th
                            class="py-2 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">
                            Product Name</th>
                        <th
                            class="py-2 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">
                            Quantity</th>
                        <th
                            class="py-2 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">
                            Price</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                    @foreach ($cart as $id => $item)
                        <tr>
                            <td class="py-2 px-4 text-gray-900 dark:text-white">{{ $item['name'] }}</td>
                            <td class="py-2 px-4 text-gray-600 dark:text-gray-400">{{ $item['quantity'] }}</td>
                            <td class="py-2 px-4 text-gray-600 dark:text-gray-400">{{ $item['price'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="2" class="py-2 px-4 text-right text-gray-900 dark:text-white font-bold">Total
                            Price:</td>
                        <td class="py-2 px-4 text-gray-600 dark:text-gray-400">{{ $finalPrice }}</td>
                    </tr>
                </tfoot>
            </table>
        </div>



        <form action="{{ route('orders.store') }}" method="POST" class="mt-4">
            @csrf
            <div class="mb-3">
                <label for="payment" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Metode Pembayaran</label>
                <select id="payment" name="payment"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
=                    <option value="COD">Cash On Delivery</option>
                    <option value="TF">Transfer Bank</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="hp" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor
                    HP</label>
                <input type="text" id="hp" name="hp"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="John" required />
            </div>

            <div class="mb-3">
                <label for="alamat"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                <input type="text" id="alamat" name="alamat"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="John" required />
            </div>
            <button type="submit"
                class="mt-4 px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900">Place
                Order</button>
        </form>
    </div>
</body>

</html>
