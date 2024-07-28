<?php
namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth; // Make sure to include this
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class OrderController extends Controller
{
    public function index()
    {
        $userId = Auth::id(); // Get the currently logged-in user's ID

        $orders = Order::with('orderItems.product')
                       ->where('user_id', $userId) // Filter orders by the logged-in user's ID
                       ->get();

        return view('orders.index', compact('orders'));
    }

    public function indexall()
    {
        $orders = Order::with('orderItems.product')->get();

        return view('orders.all', compact('orders'));
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

    public function updateStatus(Request $request, Order $order)
    {
        try {
            // Log request details for debugging
            Log::info('UpdateStatus Request:', $request->all());

            // Check if the authenticated user is allowed to update the order
            if (Auth::id() !== $order->user_id) {
                return response()->json(['message' => 'Unauthorized access.'], 403);
            }

            $order->status = 'success';
            $order->save();

            Log::info('Order status updated successfully:', ['order_id' => $order->id]);

            return response()->json(['message' => 'Order status updated successfully.']);
        } catch (\Exception $e) {
            Log::error('Error updating order status:', ['error' => $e->getMessage()]);

            return response()->json(['message' => 'Error updating order status.'], 500);
        }
    }
}
