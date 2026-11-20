@extends('layouts.app')

@section('title', 'Home | TravelConnect')

@section('content')

    <section class="bg-slate-950 text-white">
        <div class="max-w-7xl mx-auto px-6 py-28 text-center">

            <span class="text-blue-400 font-semibold uppercase tracking-widest text-sm">
                Explore the world
            </span>

            <h1 class="text-4xl md:text-6xl font-bold mt-6 leading-tight">
                Stay Connected <br>
                <span class="text-blue-400">Wherever You Go</span>
            </h1>

            <p class="text-slate-400 text-lg max-w-2xl mx-auto mt-6">
                Discover affordable eSIM plans and enjoy fast,
                reliable internet wherever your travels take you.
            </p>

            <a href="#plans"
               class="inline-block mt-10 bg-blue-600 hover:bg-blue-700
                      text-white px-8 py-4 rounded-xl font-semibold transition">
                Explore eSIM Plans
            </a>

        </div>
    </section>

    <section id="plans" class="max-w-7xl mx-auto px-6 py-20">

        <div class="text-center">

            <h2 class="text-3xl font-bold">
                Explore Our eSIM Plans
            </h2>

            <p class="text-slate-500 mt-4">
                Find the perfect internet plan for your next destination.
            </p>

        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mt-12">

            @forelse($plans as $plan)

                <div class="border border-slate-200 rounded-2xl p-6 shadow-sm hover:shadow-lg transition">

                    <div class="flex items-center justify-between">

                    <span class="text-sm font-semibold text-blue-600 bg-blue-50 px-3 py-1 rounded-full">
                        {{ $plan->country_code }}
                    </span>

                        <span class="text-sm text-slate-500">
                        {{ $plan->validity_days }} days
                    </span>

                    </div>

                    <h3 class="text-xl font-bold mt-6">
                        {{ $plan->name }}
                    </h3>

                    <p class="text-slate-500 mt-2">
                        {{ $plan->country }}
                    </p>

                    <div class="mt-6">

                    <span class="text-3xl font-bold">
                        {{ $plan->data_amount }} GB
                    </span>

                        <p class="text-sm text-slate-500 mt-1">
                            High-speed mobile data
                        </p>

                    </div>

                    <div class="border-t border-slate-200 mt-6 pt-5 flex items-center justify-between">

                        <div>
                        <span class="text-2xl font-bold">
                            {{ $plan->price }}
                        </span>

                            <span class="text-slate-500">
                            {{ $plan->currency }}
                        </span>
                        </div>

                        <a href="{{ route('plans.show', $plan) }}"
                           class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg font-semibold transition">

                            View Plan

                        </a>

                    </div>

                </div>

            @empty

                <div class="col-span-full text-center py-12">
                    <p class="text-slate-500">
                        No eSIM plans are currently available.
                    </p>
                </div>

            @endforelse

        </div>

    </section>

    <section id="about" class="bg-slate-50 py-20">
        <div class="max-w-7xl mx-auto px-6 text-center">

            <h2 class="text-3xl font-bold">
                Travel Without Limits
            </h2>

            <p class="text-slate-500 max-w-2xl mx-auto mt-5">
                TravelConnect makes staying connected abroad
                simple, convenient and affordable.
            </p>

        </div>
    </section>

    <section id="contact" class="max-w-7xl mx-auto px-6 py-20 text-center">

        <h2 class="text-3xl font-bold">
            Need Help?
        </h2>

        <p class="text-slate-500 mt-4">
            We are here to help you stay connected.
        </p>

    </section>

@endsection
