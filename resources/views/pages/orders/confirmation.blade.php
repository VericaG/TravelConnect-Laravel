@extends('layouts.app')

@section('title', 'Order Confirmation | TravelConnect')

@section('content')

    <div class="max-w-3xl mx-auto px-6 py-16">

        <div class="text-center mb-10">

            <div class="w-20 h-20 bg-green-100 text-green-600 rounded-full flex items-center justify-center mx-auto mb-6 text-4xl">
                ✓
            </div>

            <h1 class="text-3xl font-bold">
                Thank You for Your Order!
            </h1>

            <p class="text-slate-500 mt-3">
                Your order has been successfully placed.
            </p>

            <p class="text-slate-500 mt-2">
                Order Number: #{{ $order->id }}
            </p>

        </div>

        <div class="border border-slate-200 rounded-2xl p-8">

            <h2 class="text-xl font-bold mb-6">
                Order Details
            </h2>

            <div class="mb-6">
                <p class="text-sm text-slate-500">
                    Customer
                </p>

                <p class="font-semibold">
                    {{ $order->customer_name }}
                </p>

                <p class="text-slate-500">
                    {{ $order->customer_email }}
                </p>
            </div>

            <div class="mb-6">
                <p class="text-sm text-slate-500">
                    Order Status
                </p>

                <span class="inline-block mt-2 bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-sm font-semibold">
                {{ ucfirst($order->status) }}
            </span>
            </div>

            <div class="border-t border-slate-200 pt-6">

                <h3 class="font-bold mb-5">
                    Purchased eSIM Plans
                </h3>

                @foreach($order->items as $item)

                    <div class="flex justify-between gap-4 mb-5">

                        <div>
                            <p class="font-semibold">
                                {{ $item->plan_name }}
                            </p>

                            <p class="text-sm text-slate-500">
                                Quantity: {{ $item->quantity }}
                            </p>
                        </div>

                        <p class="font-semibold">
                            €{{ number_format(
                            (float) $item->price * $item->quantity,
                            2
                        ) }}
                        </p>

                    </div>

                @endforeach

            </div>

            <div class="border-t border-slate-200 pt-6 flex justify-between items-center">

            <span class="text-lg font-semibold">
                Total Paid
            </span>

                <span class="text-2xl font-bold text-blue-600">
                €{{ number_format((float) $order->total, 2) }}
            </span>

            </div>

            @if($order->notes)

                <div class="border-t border-slate-200 mt-6 pt-6">

                    <p class="text-sm text-slate-500">
                        Order Notes
                    </p>

                    <p class="mt-2">
                        {{ $order->notes }}
                    </p>

                </div>

            @endif

        </div>

        <div class="text-center mt-8">

            <a href="{{ route('plans.index') }}"
               class="inline-block bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-lg font-semibold">
                Continue Shopping
            </a>

        </div>

    </div>

@endsection
