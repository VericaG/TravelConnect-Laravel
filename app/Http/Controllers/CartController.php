<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CartController extends Controller
{
    public function index(): View
    {
        $cart = session()->get('cart', []);

        $total = collect($cart)->sum(function ($item) {
            return $item['price'] * $item['quantity'];
        });

        $itemCount = collect($cart)->sum('quantity');

        return view('pages.cart.index', compact(
            'cart',
            'total',
            'itemCount'
        ));
    }

    public function add(Plan $plan)
    {
        abort_unless($plan->is_active, 404);

        $cart = session()->get('cart', []);

        $planId = $plan->id;

        if (isset($cart[$planId])) {
            $cart[$planId]['quantity']++;
        } else {
            $cart[$planId] = [
                'name' => $plan->name,
                'country' => $plan->country,
                'price' => (float) $plan->price,
                'quantity' => 1,
            ];
        }

        session()->put('cart', $cart);

        return redirect()
            ->route('cart.index')
            ->with('success', 'Plan added to cart!');
    }

    public function update(Request $request, int $planId)
    {
        $validated = $request->validate([
            'quantity' => ['required', 'integer', 'min:1', 'max:10'],
        ]);

        $cart = session()->get('cart', []);

        abort_unless(isset($cart[$planId]), 404);

        $cart[$planId]['quantity'] = $validated['quantity'];

        session()->put('cart', $cart);

        return redirect()
            ->route('cart.index')
            ->with('success', 'Cart updated successfully!');
    }

    public function remove(int $planId)
    {
        $cart = session()->get('cart', []);

        unset($cart[$planId]);

        session()->put('cart', $cart);

        return redirect()
            ->route('cart.index')
            ->with('success', 'Plan removed from cart!');
    }

    public function clear()
    {
        session()->forget('cart');

        return redirect()
            ->route('cart.index')
            ->with('success', 'Your cart has been cleared!');
    }
}
