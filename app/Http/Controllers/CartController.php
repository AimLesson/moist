<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = session('cart', []);
        $totalPrice = array_sum(array_column($cart, 'total'));

        return view('cart.index', compact('cart', 'totalPrice'));
    }

    public function store(Request $request)
    {
        $product = Product::find($request->product_id);

        // Ensure the product exists
        if (!$product) {
            return redirect()->back()->with('error', 'Product not found.');
        }

        $cart = session('cart', []);

        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity']++;
            $cart[$product->id]['total'] = $cart[$product->id]['quantity'] * $product->price;
        } else {
            $cart[$product->id] = [
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => 1,
                'total' => $product->price,
            ];
        }

        session(['cart' => $cart]);
        return redirect()->route('cart.index')->with('success', 'Product added to cart.');
    }

    public function update(Request $request, Product $product)
    {
        $cart = session('cart', []);

        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity'] = $request->quantity;
            $cart[$product->id]['total'] = $cart[$product->id]['quantity'] * $product->price;
        }

        session(['cart' => $cart]);
        return redirect()->route('cart.index')->with('success', 'Cart updated.');
    }

    public function destroy(Product $product)
    {
        $cart = session('cart', []);

        if (isset($cart[$product->id])) {
            unset($cart[$product->id]);
            session(['cart' => $cart]);
        }

        return redirect()->route('cart.index')->with('success', 'Product removed from cart.');
    }
}
