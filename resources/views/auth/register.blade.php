
@extends('layouts.app')

@section('title', 'Create Account | TravelConnect')

@section('content')

    <div class="min-h-[80vh] flex items-center justify-center px-6 py-16">

        <div class="w-full max-w-md">

            <div class="text-center mb-8">

                <h1 class="text-3xl font-bold">
                    Create your account
                </h1>

                <p class="text-slate-500 mt-2">
                    Join TravelConnect and stay connected everywhere.
                </p>

            </div>

            <form action="{{ route('register.store') }}"
                  method="POST"
                  class="border border-slate-200 rounded-2xl p-8 shadow-sm">

                @csrf

                <div class="mb-5">

                    <label for="name"
                           class="block text-sm font-semibold mb-2">
                        Full Name
                    </label>

                    <input
                        type="text"
                        id="name"
                        name="name"
                        value="{{ old('name') }}"
                        required
                        class="w-full border border-slate-300 rounded-lg px-4 py-3"
                        placeholder="Enter your name"
                    >

                    @error('name')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror

                </div>

                <div class="mb-5">

                    <label for="email"
                           class="block text-sm font-semibold mb-2">
                        Email Address
                    </label>

                    <input
                        type="email"
                        id="email"
                        name="email"
                        value="{{ old('email') }}"
                        required
                        class="w-full border border-slate-300 rounded-lg px-4 py-3"
                        placeholder="Enter your email"
                    >

                    @error('email')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror

                </div>

                <div class="mb-5">

                    <label for="password"
                           class="block text-sm font-semibold mb-2">
                        Password
                    </label>

                    <input
                        type="password"
                        id="password"
                        name="password"
                        required
                        class="w-full border border-slate-300 rounded-lg px-4 py-3"
                        placeholder="Create a password"
                    >

                    @error('password')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror

                </div>

                <div class="mb-6">

                    <label for="password_confirmation"
                           class="block text-sm font-semibold mb-2">
                        Confirm Password
                    </label>

                    <input
                        type="password"
                        id="password_confirmation"
                        name="password_confirmation"
                        required
                        class="w-full border border-slate-300 rounded-lg px-4 py-3"
                        placeholder="Confirm your password"
                    >

                </div>

                <button
                    type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-lg font-semibold transition">
                    Create Account
                </button>

                <p class="text-center text-sm text-slate-500 mt-6">
                    Already have an account?

                    <a href="#"
                       class="text-blue-600 font-semibold">
                        Log in
                    </a>
                </p>

            </form>

        </div>

    </div>

@endsection
