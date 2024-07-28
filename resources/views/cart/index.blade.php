<!DOCTYPE html>
<html>
<head>
    <title>Cart</title>
</head>
    <h1>Shopping Cart</h1>
    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif
    @if(count($cart) > 0)
        <table>
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cart as $id => $item)
                    <tr>
                        <td>{{ $item['name'] }}</td>
                        <td>{{ $item['price'] }}</td>
                        <td>
                            <form action="{{ route('cart.update', $id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1">
                                <button type="submit">Update</button>
                            </form>
                        </td>
                        <td>{{ $item['total'] }}</td>
                        <td>
                            <form action="{{ route('cart.destroy', $id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Remove</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <p>Total: {{ $totalPrice }}</p>
        <a href="{{ route('orders.create') }}">Proceed to Checkout</a>
    @else
        <p>Your cart is empty.</p>
    @endif
</body>
</html>
