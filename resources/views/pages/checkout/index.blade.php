@extends('layouts.app')

@section('title', 'Checkout | TravelConnect')

@section('content')

    <div class="max-w-5xl mx-auto px-6 py-16">

        <div class="mb-10">
            <h1 class="text-3xl font-bold">Checkout</h1>

            <p class="text-slate-500 mt-2">
                Complete your order and stay connected everywhere.
            </p>
        </div>

        @if($errors->has('cart'))
            <div class="bg-red-100 text-red-700 p-4 rounded-lg mb-6">
                {{ $errors->first('cart') }}
            </div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">

            <div class="lg:col-span-2">

                <div class="border border-slate-200 rounded-2xl p-8">

                    <h2 class="text-xl font-bold mb-6">
                        Customer Information
                    </h2>

                    <form action="{{ route('checkout.store') }}"
                          method="POST">

                        @csrf

                        <div class="mb-5">
                            <label class="block font-semibold mb-2"
                                   for="name">
                                Full Name
                            </label>

                            <input type="text"
                                   id="name"
                                   name="name"
                                   value="{{ old('name', auth()->user()->name) }}"
                                   required
                                   class="w-full border border-slate-300 rounded-lg px-4 py-3">

                            @error('name')
                            <p class="text-red-500 text-sm mt-2">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>

                        <div class="mb-5">
                            <label class="block font-semibold mb-2"
                                   for="email">
                                Email Address
                            </label>

                            <input type="email"
                                   id="email"
                                   name="email"
                                   value="{{ old('email', auth()->user()->email) }}"
                                   required
                                   class="w-full border border-slate-300 rounded-lg px-4 py-3">

                            @error('email')
                            <p class="text-red-500 text-sm mt-2">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label class="block font-semibold mb-2"
                                   for="notes">
                                Order Notes (Optional)
                            </label>

                            <textarea id="notes"
                                      name="notes"
                                      rows="4"
                                      class="w-full border border-slate-300 rounded-lg px-4 py-3"
                                      placeholder="Any additional information...">{{ old('notes') }}</textarea>

                            @error('notes')
                            <p class="text-red-500 text-sm mt-2">
                                {{ $message }}
                            </p>
                            @enderror
                        </div>

                        <button type="submit"
                                class="w-full bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-lg font-semibold transition">
                            Place Order
                        </button>

                    </form>

                </div>

            </div>

            <div>

                <div class="border border-slate-200 rounded-2xl p-6">

                    <h2 class="text-xl font-bold mb-6">
                        Order Summary
                    </h2>

                    @foreach($cart as $item)

                        <div class="flex justify-between gap-4 mb-5">

                            <div>
                                <p class="font-semibold">
                                    {{ $item['name'] }}
                                </p>

                                <p class="text-sm text-slate-500">
                                    Quantity: {{ $item['quantity'] }}
                                </p>
                            </div>

                            <p class="font-semibold">
                                €{{ number_format(
                                $item['price'] * $item['quantity'],
                                2
                            ) }}
                            </p>

                        </div>

                    @endforeach

                    <div class="border-t border-slate-200 pt-5 mt-5">

                        <div class="flex justify-between items-center">
                        <span class="font-semibold">
                            Total
                        </span>

                            <span class="text-2xl font-bold text-blue-600">
                            €{{ number_format($total, 2) }}
                        </span>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

@endsection
