
@extends('layouts.app')

@section('title', $plan->name . ' | TravelConnect')

@section('content')

    <section class="max-w-5xl mx-auto px-6 py-20">

        <a href="{{ route('plans.index') }}"
           class="text-blue-600 hover:text-blue-700 font-medium">
            ← Back to Plans
        </a>

        <div class="mt-8 border border-slate-200 rounded-2xl p-8 md:p-12 shadow-sm">

            <div class="flex items-center justify-between flex-wrap gap-4">

                <span class="text-blue-600 bg-blue-50 px-4 py-2 rounded-full font-semibold">
                    {{ $plan->country_code }}
                </span>

                <span class="text-slate-500">
                    {{ $plan->validity_days }} days validity
                </span>

            </div>

            <h1 class="text-4xl font-bold mt-8">
                {{ $plan->name }}
            </h1>

            <p class="text-slate-500 text-lg mt-3">
                Stay connected in {{ $plan->country }}.
            </p>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-12">

                <div class="bg-slate-50 rounded-xl p-6">
                    <p class="text-slate-500">Data allowance</p>

                    <h2 class="text-3xl font-bold mt-2">
                        {{ $plan->data_amount }} GB
                    </h2>
                </div>

                <div class="bg-slate-50 rounded-xl p-6">
                    <p class="text-slate-500">Validity</p>

                    <h2 class="text-3xl font-bold mt-2">
                        {{ $plan->validity_days }} days
                    </h2>
                </div>

            </div>

            <div class="border-t border-slate-200 mt-10 pt-8">

                <p class="text-slate-500">Total price</p>

                <h2 class="text-4xl font-bold mt-2">
                    {{ $plan->price }} {{ $plan->currency }}
                </h2>

                <form action="{{ route('cart.add', $plan) }}"
                      method="POST">

                    @csrf

                    <button type="submit"
                            class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-lg font-semibold transition">

                        Add to Cart

                    </button>

                </form>

                <p class="text-sm text-slate-400 text-center mt-4">
                    Secure checkout coming soon.
                </p>

            </div>

        </div>

    </section>

@endsection
