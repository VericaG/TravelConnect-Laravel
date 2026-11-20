
@extends('layouts.app')

@section('title', 'eSIM Plans | TravelConnect')

@section('content')

    <section class="max-w-7xl mx-auto px-6 py-16">

        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold">
                Explore eSIM Plans
            </h1>

            <p class="text-slate-500 mt-3">
                Find the perfect eSIM plan for your next trip.
            </p>
        </div>

        <form action="{{ route('plans.index') }}"
              method="GET"
              class="bg-slate-50 border border-slate-200 rounded-2xl p-6 mb-12">

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                <div>
                    <label for="country"
                           class="block text-sm font-semibold mb-2">
                        Country
                    </label>

                    <input
                        type="text"
                        id="country"
                        name="country"
                        value="{{ request('country') }}"
                        placeholder="e.g. Japan, Germany"
                        class="w-full border border-slate-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    >
                </div>

                <div>
                    <label for="min_data"
                           class="block text-sm font-semibold mb-2">
                        Minimum Data (GB)
                    </label>

                    <input
                        type="number"
                        id="min_data"
                        name="min_data"
                        value="{{ request('min_data') }}"
                        min="1"
                        placeholder="e.g. 5"
                        class="w-full border border-slate-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    >
                </div>

                <div>
                    <label for="max_price"
                           class="block text-sm font-semibold mb-2">
                        Maximum Price (€)
                    </label>

                    <input
                        type="number"
                        id="max_price"
                        name="max_price"
                        value="{{ request('max_price') }}"
                        min="0"
                        step="0.01"
                        placeholder="e.g. 20"
                        class="w-full border border-slate-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    >
                </div>

            </div>

            <div class="flex flex-wrap gap-4 mt-6">

                <button
                    type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-lg font-semibold transition">
                    Search Plans
                </button>

                <a
                    href="{{ route('plans.index') }}"
                    class="border border-slate-300 hover:bg-white px-8 py-3 rounded-lg font-semibold transition">
                    Reset Filters
                </a>

            </div>

        </form>

        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold">
                Available Plans
            </h2>

            <p class="text-slate-500 text-sm">
                {{ $plans->total() }} plans found
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

            @forelse($plans as $plan)

                <div class="border border-slate-200 rounded-2xl p-6 hover:shadow-lg transition">

                    <div class="flex justify-between items-center">

                    <span class="bg-blue-50 text-blue-600 px-3 py-1 rounded-full text-sm font-semibold">
                        {{ $plan->country_code }}
                    </span>

                        <span class="text-slate-500 text-sm">
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

                        <span class="text-slate-500">
                        data
                    </span>
                    </div>

                    <div class="flex justify-between items-center mt-6 pt-6 border-t">

                    <span class="text-2xl font-bold">
                        {{ $plan->price }} {{ $plan->currency }}
                    </span>

                        <a
                            href="{{ route('plans.show', $plan) }}"
                            class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm font-semibold">
                            View Details
                        </a>

                    </div>

                </div>

            @empty

                <div class="col-span-full text-center py-16">
                    <h3 class="text-xl font-semibold">
                        No plans found
                    </h3>

                    <p class="text-slate-500 mt-2">
                        Try changing your search filters.
                    </p>

                    <a href="{{ route('plans.index') }}"
                       class="inline-block mt-5 text-blue-600 font-semibold">
                        View all plans
                    </a>
                </div>

            @endforelse

        </div>

        <div class="mt-10">
            {{ $plans->links() }}
        </div>

    </section>

@endsection
