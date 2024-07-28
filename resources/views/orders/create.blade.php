<!DOCTYPE html>
<html>
<head>
    <title>Cart</title>
</head>
<body>
    <h1>Create Order</h1>
    @if(session('error'))
        <p>{{ session('error') }}</p>
    @endif
    <ul>
        @foreach ($cart as $id => $item)
            <li>
                {{ $item['name'] }} - Quantity: {{ $item['quantity'] }} - Price: {{ $item['price'] }}
            </li>
        @endforeach
    </ul>
    <p>Total Price: {{ $totalPrice }}</p>
    <form action="{{ route('orders.store') }}" method="POST">
        @csrf
        <button type="submit">Place Order</button>
    </form>
</body>
</html>
