<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    // Show Cart
    public function index()
    {
        $cart = session()->get('cart', []);
        return view('cart.index', compact('cart'));
    }

    // Add Product to Cart
    public function add(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $cart = session()->get('cart', []);

        // If product already in cart, update quantity
        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity']++;
        } else {
            // Add new product to cart
            $cart[$product->id] = [
                'name' => $product->name,
                'description' => $product->description,
                'price' => $product->price,
                'image' => $product->picture,
                'quantity' => 1,
                'subtotal' => $product->price, // Initial subtotal
            ];
        }

        // Calculate subtotal
        $cart[$product->id]['subtotal'] = $cart[$product->id]['quantity'] * $cart[$product->id]['price'];

        session()->put('cart', $cart);
        return redirect()->back()->with('status', 'Product added to cart!');
    }

    // Remove Product from Cart
    public function remove($id)
    {
        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            unset($cart[$id]);
        }

        session()->put('cart', $cart);
        return redirect()->route('cart.index')->with('status', 'Product removed from cart!');
    }

    // Update Product Quantity
    public function update(Request $request, $id)
    {
        $action = $request->input('action');
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            if ($action == 'increase') {
                $cart[$id]['quantity']++;
            } elseif ($action == 'decrease' && $cart[$id]['quantity'] > 1) {
                $cart[$id]['quantity']--;
            }

            // Recalculate subtotal
            $cart[$id]['subtotal'] = $cart[$id]['quantity'] * $cart[$id]['price'];

            session()->put('cart', $cart);
        }

        return redirect()->route('cart.index');
    }

    // Checkout
    public function checkout()
    {
        session()->forget('cart');
        return redirect()->route('cart.index')->with('status', 'Thank you for your purchase!');
    }
}
