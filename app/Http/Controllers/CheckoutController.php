<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class CheckoutController extends Controller
{
    public function index(): View
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()
                ->route('cart.index')
                ->with('error', 'Your cart is empty.');
        }

        $total = collect($cart)->sum(function ($item) {
            return $item['price'] * $item['quantity'];
        });

        return view('pages.checkout.index', compact(
            'cart',
            'total'
        ));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'notes' => ['nullable', 'string', 'max:2000'],
        ]);

        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()
                ->route('cart.index')
                ->with('error', 'Your cart is empty.');
        }

        $order = DB::transaction(function () use ($cart, $validated) {

            $planIds = array_keys($cart);

            $plans = Plan::whereIn('id', $planIds)
                ->where('is_active', true)
                ->get()
                ->keyBy('id');

            if ($plans->count() !== count($cart)) {
                throw ValidationException::withMessages([
                    'cart' => 'One or more selected plans are no longer available.',
                ]);
            }

            $totalInCents = 0;

            foreach ($cart as $planId => $item) {
                $quantity = filter_var(
                    $item['quantity'] ?? null,
                    FILTER_VALIDATE_INT
                );

                if ($quantity === false || $quantity < 1 || $quantity > 10) {
                    throw ValidationException::withMessages([
                        'cart' => 'The cart contains an invalid quantity.',
                    ]);
                }

                $plan = $plans->get($planId);

                $priceInCents = (int) round(
                    (float) $plan->price * 100
                );

                $totalInCents += $priceInCents * $quantity;
            }

            $order = Order::create([
                'user_id' => auth()->id(),
                'total' => number_format($totalInCents / 100, 2, '.', ''),
                'status' => 'pending',
                'customer_name' => $validated['name'],
                'customer_email' => $validated['email'],
                'notes' => $validated['notes'] ?? null,
            ]);

            foreach ($cart as $planId => $item) {
                $plan = $plans->get($planId);

                $order->items()->create([
                    'plan_id' => $plan->id,
                    'plan_name' => $plan->name,
                    'price' => $plan->price,
                    'quantity' => (int) $item['quantity'],
                ]);
            }

            return $order;
        });

        session()->forget('cart');

        return redirect()
            ->route('orders.confirmation', $order)
            ->with('success', 'Your order has been placed successfully!');
    }

    public function confirmation(Order $order): View
    {
        abort_unless($order->user_id === auth()->id(), 404);

        $order->load('items');

        return view('pages.orders.confirmation', compact('order'));
    }
}
