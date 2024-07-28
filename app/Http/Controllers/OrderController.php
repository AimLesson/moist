<?php
namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Make sure to include this

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('orderItems.product')->get();

        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        $cart = session('cart', []);

        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
        }

        $totalPrice = array_sum(array_column($cart, 'total'));

        return view('orders.create', compact('cart', 'totalPrice'));
    }

    public function store(Request $request)
    {
        $cart = session('cart', []);

        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
        }

        $order = new Order();
        $order->user_id = Auth::id(); // Set the authenticated user's ID
        $order->status = 'pending';
        $order->total_price = array_sum(array_column($cart, 'total'));
        $order->save();

        foreach ($cart as $id => $item) {
            $order->orderItems()->create([
                'product_id' => $id,
                'quantity' => $item['quantity'],
                'price' => $item['total']
            ]);
        }

        session()->forget('cart');

        return redirect()->route('orders.index')->with('success', 'Order placed successfully.');
    }
}
