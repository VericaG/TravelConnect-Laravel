<footer class="bg-slate-950 text-white mt-20">
    <div class="max-w-7xl mx-auto px-6 py-12">

        <div class="grid grid-cols-1 md:grid-cols-3 gap-10">

            <div>
                <h2 class="text-2xl font-bold text-blue-400">
                    TravelConnect
                </h2>

                <p class="text-slate-400 mt-4 leading-relaxed">
                    Stay connected wherever your journey takes you.
                    Discover affordable eSIM plans around the world.
                </p>
            </div>

            <div>
                <h3 class="font-semibold text-lg mb-4">Quick Links</h3>

                <ul class="space-y-3 text-slate-400">
                    <li><a href="{{ url('/') }}" class="hover:text-white">Home</a></li>
                    <li><a href="{{ url('/plans') }}" class="hover:text-white">eSIM Plans</a></li>
                    <li><a href="#about" class="hover:text-white">About Us</a></li>
                    <li><a href="#contact" class="hover:text-white">Contact</a></li>
                </ul>
            </div>

            <div>
                <h3 class="font-semibold text-lg mb-4">Stay Connected</h3>

                <p class="text-slate-400">
                    Travel smarter. Stay connected.
                </p>
            </div>

        </div>

        <div class="border-t border-slate-800 mt-10 pt-6 text-center text-slate-500 text-sm">
            &copy; {{ date('Y') }} TravelConnect. All rights reserved.
        </div>

    </div>
</footer>
