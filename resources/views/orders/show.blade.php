<!DOCTYPE html>
<html>
<head>
    <title>Order Details</title>
</head>
<body>
    <h1>Order #{{ $order->id }}</h1>
    <p>Status: {{ $order->status }}</p>
    <p>Total Price: {{ $order->total_price }}</p>
    <h2>Items</h2>
    <ul>
        @foreach ($order->orderItems as $item)
            <li>
                Product: {{ $item->product->name }}<br>
                Quantity: {{ $item->quantity }}<br>
                Price: {{ $item->price }}
            </li>
        @endforeach
    </ul>
    <a href="{{ route('orders.index') }}">Back to Orders</a>
</body>
</html>
