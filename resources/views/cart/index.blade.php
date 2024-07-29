<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 dark:bg-gray-900">
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
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold mb-4 text-gray-900 dark:text-white">Shopping Cart</h1>

        @if(session('success'))
            <p class="mb-4 text-green-600">{{ session('success') }}</p>
        @endif

        @if(count($cart) > 0)
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white dark:bg-gray-800">
                    <thead>
                        <tr>
                            <th class="py-2 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">Product</th>
                            <th class="py-2 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">Price</th>
                            <th class="py-2 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">Quantity</th>
                            <th class="py-2 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">Total</th>
                            <th class="py-2 px-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-400">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                        @foreach($cart as $id => $item)
                            <tr>
                                <td class="py-2 px-4 text-gray-900 dark:text-white">{{ $item['name'] }}</td>
                                <td class="py-2 px-4 text-gray-600 dark:text-gray-400">Rp {{ number_format($item['price'], 0, ',', '.') }}</td>
                                <td class="py-2 px-4 text-gray-600 dark:text-gray-400">
                                    <form action="{{ route('cart.update', $id) }}" method="POST" class="flex items-center">
                                        @csrf
                                        @method('PATCH')
                                        <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1" class="w-16 px-2 py-1 border rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                        <button type="submit" class="ml-2 px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900">Update</button>
                                    </form>
                                </td>
                                <td class="py-2 px-4 text-gray-600 dark:text-gray-400">Rp {{ number_format($item['total'], 0, ',', '.') }}</td>
                                <td class="py-2 px-4">
                                    <form action="{{ route('cart.destroy', $id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 focus:ring-4 focus:ring-red-300 dark:focus:ring-red-900">Remove</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <p class="mt-4 text-lg font-semibold text-gray-900 dark:text-white">Total: Rp {{ number_format($totalPrice, 0, ',', '.') }}</p>
            <a href="{{ route('orders.create') }}" class="mt-4 inline-block px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 focus:ring-4 focus:ring-green-300 dark:focus:ring-green-900">Proceed to Checkout</a>
        @else
            <p class="text-gray-700 dark:text-gray-300">Your cart is empty.</p>
        @endif
    </div>
</body>
</html>
