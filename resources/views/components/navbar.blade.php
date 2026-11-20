<header class="bg-white border-b border-slate-200">
    <nav class="max-w-7xl mx-auto px-6 py-5 flex items-center justify-between">

        <a href="{{ url('/') }}" class="text-2xl font-bold text-blue-600">
            TravelConnect
        </a>

        <div class="hidden md:flex items-center gap-8">
            <a href="{{ url('/') }}" class="text-slate-600 hover:text-blue-600">
                Home
            </a>

            <a href="{{ route('plans.index') }}"
               class="text-slate-600 hover:text-blue-600">
                eSIM Plans
            </a>

            <a href="#about" class="text-slate-600 hover:text-blue-600">
                About
            </a>

            <a href="#contact" class="text-slate-600 hover:text-blue-600">
                Contact
            </a>

            <a href="{{ route('cart.index') }}"
               class="text-slate-700 hover:text-blue-600 font-medium">
                Cart
            </a>
        </div>


        <div class="flex items-center gap-4">

            @guest

                <a href="{{ route('login') }}"
                   class="text-slate-700 hover:text-blue-600 font-medium">
                    Login
                </a>

                <a href="{{ route('register') }}"
                   class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2.5 rounded-lg font-semibold">
                    Get Started
                </a>

            @else
                <div class="flex items-center gap-4">

                    <a href="{{ route('profile') }}"
                       class="text-slate-700 hover:text-blue-600 font-medium">
                        My Profile
                    </a>

                    <span class="text-slate-700 font-medium">
            Hello, {{ auth()->user()->name }}
        </span>

                    <form action="{{ route('logout') }}" method="POST">
                        @csrf

                        <button type="submit"
                                class="text-red-600 hover:text-red-700 font-medium">
                            Logout
                        </button>
                    </form>
                </div>

            @endguest

        </div>

    </nav>
</header>
