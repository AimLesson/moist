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

    public function laporan()
    {
        $orders = Order::with('orderItems.product')->get();

        return view('orders.laporan', compact('orders'));
    }

    public function create()
    {
        $cart = session('cart', []);

        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
        }
        $totalPrice = array_sum(array_column($cart, 'total'));

        $totalItems = array_sum(array_column($cart, 'quantity')); //mengambil data items
        $discountPercentage = min(floor($totalItems / 5) * 5, 20); //menghitung total qty items yang masuk ke keranjang , tiap kelipatan 5 qty menambah 5% diskon dengan maksimal diskon 20%
        $discountAmount = ($totalPrice * $discountPercentage) / 100;
        $finalPrice = $totalPrice - $discountAmount;

        return view('orders.create', compact('cart', 'finalPrice'));
    }

    public function store(Request $request)
    {
        $cart = session('cart', []);

        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
        }

        // Validate the request
        $validated = $request->validate([
            'alamat' => 'required|string|max:255',
            'hp' => 'required|string|max:15',
            'payment' => 'required|string|max:50',
        ]);

        $order = new Order();
        $order->user_id = Auth::id(); // Set the authenticated user's ID
        $order->status = 'pending';
        $order->alamat = $validated['alamat'];
        $order->hp = $validated['hp'];
        $order->payment = $validated['payment'];
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
            Log::info('UpdateStatus Request:', ['request_data' => $request->all(), 'order_id' => $order->id]);

            // Check if the authenticated user is allowed to update the order
            if (Auth::id() !== $order->user_id) {
                Log::warning('Unauthorized access attempt', ['user_id' => Auth::id(), 'order_id' => $order->id]);
                return response()->json(['message' => 'Unauthorized access.'], 403);
            }

            // Log current order status before update
            Log::info('Current order status:', ['order_id' => $order->id, 'current_status' => $order->status]);

            // Update the order status
            $order->status = 'success';
            $order->save();

            // Verify the status was updated
            if ($order->wasChanged('status')) {
                Log::info('Order status updated successfully:', ['order_id' => $order->id, 'new_status' => $order->status]);
                return response()->json(['message' => 'Order status updated successfully.']);
            } else {
                Log::error('Order status update failed:', ['order_id' => $order->id]);
                return response()->json(['message' => 'Order status update failed.'], 500);
            }
        } catch (\Exception $e) {
            Log::error('Error updating order status:', ['error' => $e->getMessage(), 'order_id' => $order->id]);

            return response()->json(['message' => 'Error updating order status.'], 500);
        }
    }

}
