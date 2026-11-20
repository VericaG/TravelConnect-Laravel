@extends('layouts.app')

@section('title', 'My Profile | TravelConnect')

@section('content')

    <div class="max-w-4xl mx-auto px-6 py-16">

        <div class="mb-10">
            <h1 class="text-3xl font-bold">
                My Profile
            </h1>

            <p class="text-slate-500 mt-2">
                Manage your TravelConnect account.
            </p>
        </div>

        <div class="bg-white border border-slate-200 rounded-2xl p-8 shadow-sm">

            <div class="mb-6">
                <p class="text-sm text-slate-500">
                    Full Name
                </p>

                <p class="text-lg font-semibold">
                    {{ auth()->user()->name }}
                </p>
            </div>

            <div class="mb-6">
                <p class="text-sm text-slate-500">
                    Email Address
                </p>

                <p class="text-lg font-semibold">
                    {{ auth()->user()->email }}
                </p>
            </div>

            <div class="mb-6">
                <p class="text-sm text-slate-500">
                    Account Created
                </p>

                <p class="text-lg font-semibold">
                    {{ auth()->user()->created_at->format('d M Y') }}
                </p>
            </div>

            <form action="{{ route('logout') }}" method="POST">
                @csrf

                <button type="submit"
                        class="bg-red-600 hover:bg-red-700 text-white px-6 py-3 rounded-lg font-semibold">
                    Logout
                </button>
            </form>

        </div>

    </div>

@endsection
