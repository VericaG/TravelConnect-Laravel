@extends('layouts.app')

@section('title', 'Shopping Cart | TravelConnect')

@section('content')

    <div class="max-w-5xl mx-auto px-6 py-16">

        <div class="mb-10">
            <h1 class="text-3xl font-bold">Shopping Cart</h1>

            <p class="text-slate-500 mt-2">
                Review your selected eSIM plans.
            </p>
        </div>

        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-4 rounded-lg mb-6">
                {{ session('success') }}
            </div>
        @endif

        @if(empty($cart))

            <div class="text-center border border-slate-200 rounded-2xl p-12">

                <h2 class="text-xl font-semibold mb-3">
                    Your cart is empty
                </h2>

                <p class="text-slate-500 mb-6">
                    You haven't added any eSIM plans yet.
                </p>

                <a href="{{ route('plans.index') }}"
                   class="inline-block bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg font-semibold">
                    Browse eSIM Plans
                </a>

            </div>

        @else

            <div class="border border-slate-200 rounded-2xl overflow-hidden">

                @foreach($cart as $planId => $item)

                    <div class="p-6 border-b border-slate-200 flex flex-col md:flex-row md:items-center md:justify-between gap-6">

                        <div>
                            <h2 class="text-lg font-semibold">
                                {{ $item['name'] }}
                            </h2>

                            <p class="text-slate-500 text-sm mt-1">
                                {{ $item['country'] }}
                            </p>

                            <p class="text-blue-600 font-semibold mt-2">
                                €{{ number_format($item['price'], 2) }}
                            </p>
                        </div>

                        <div class="flex items-center gap-4">

                            <form action="{{ route('cart.update', $planId) }}"
                                  method="POST"
                                  class="flex items-center gap-2">

                                @csrf
                                @method('PATCH')

                                <input type="number"
                                       name="quantity"
                                       value="{{ $item['quantity'] }}"
                                       min="1"
                                       max="10"
                                       class="w-20 border border-slate-300 rounded-lg px-3 py-2">

                                <button type="submit"
                                        class="bg-slate-100 hover:bg-slate-200 px-4 py-2 rounded-lg">
                                    Update
                                </button>

                            </form>

                            <form action="{{ route('cart.remove', $planId) }}"
                                  method="POST">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="text-red-600 hover:text-red-700 font-medium">
                                    Remove
                                </button>

                            </form>

                        </div>

                        <div class="font-bold text-lg">
                            €{{ number_format(
                            $item['price'] * $item['quantity'],
                            2
                        ) }}
                        </div>

                    </div>

                @endforeach

                <div class="p-6 bg-slate-50">

                    <div class="flex justify-between mb-3">
                    <span class="text-slate-500">
                        Total items
                    </span>

                        <span class="font-semibold">
                        {{ $itemCount }}
                    </span>
                    </div>

                    <div class="flex justify-between items-center mb-6">
                    <span class="text-lg font-semibold">
                        Total
                    </span>

                        <span class="text-2xl font-bold text-blue-600">
                        €{{ number_format($total, 2) }}
                    </span>
                    </div>

                    <div class="flex flex-col sm:flex-row justify-between gap-4">

                        <form action="{{ route('cart.clear') }}"
                              method="POST">

                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    class="text-red-600 hover:text-red-700 font-semibold">
                                Clear Cart
                            </button>

                        </form>

                        <a href="{{ route('plans.index') }}"
                           class="bg-blue-600 hover:bg-blue-700 text-white text-center px-6 py-3 rounded-lg font-semibold">
                            Continue Shopping
                        </a>

                        <a href="{{ route('checkout.index') }}"
                           class="bg-green-600 hover:bg-green-700 text-white text-center px-6 py-3 rounded-lg font-semibold">
                            Proceed to Checkout
                        </a>
                    </div>

                </div>

            </div>

        @endif

    </div>

@endsection
