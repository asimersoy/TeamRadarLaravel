<header class="border-b border-white/10 bg-bg-800/60 backdrop-blur sticky top-0 z-20">
    <div class="max-w-6xl mx-auto px-4 py-4 flex items-center justify-between">

        <!-- Left: Logo -->
        <div class="flex items-center gap-3">
            <div class="w-8 h-8 rounded bg-brand-600/20 border border-brand-600/40"></div>
            <a href="{{ route('home') }}" class="text-lg font-semibold tracking-wide">QueueGuard</a>
        </div>

        <!-- Middle: Nav -->
        @guest
            <nav class="hidden md:flex items-center gap-6 text-sm text-ink-300">
                @if(Route::is('home'))
                    <a href="#features" class="hover:text-ink-100">Features</a>
                    <a href="#how" class="hover:text-ink-100">How It Works</a>
                    <a href="#ratings" class="hover:text-ink-100">Ratings</a>
                    <a href="#faq" class="hover:text-ink-100">FAQ</a>
                @else
                    <a href="{{ route('home') }}#features" class="hover:text-ink-100">Features</a>
                    <a href="{{ route('home') }}#how" class="hover:text-ink-100">How It Works</a>
                @endif
            </nav>
        @endguest

        @auth
            <nav class="hidden md:flex items-center gap-6 text-sm text-ink-300">
                <a href="{{ route('dashboard') }}" class="hover:text-ink-100 {{ request()->routeIs('dashboard') ? 'text-ink-100' : '' }}">Dashboard</a>
                <a href="/matchmaking" class="hover:text-ink-100 {{ request()->is('matchmaking') ? 'text-ink-100' : '' }}">Matchmaking</a>
                <a href="" class="hover:text-ink-100">Matches</a>
                <a href="" class="hover:text-ink-100">Profile</a>
            </nav>
        @endauth

        <!-- Right: Actions -->
        @guest
            <div class="flex items-center gap-3">
                <a href="{{ route('login') }}" class="px-4 py-2 rounded border border-white/15 hover:bg-white/5 transition text-sm">Sign in</a>
                <a href="{{ route('register') }}" class="px-4 py-2 rounded bg-brand-500 text-bg-900 font-medium hover:bg-brand-600 transition text-sm">Get Started</a>
            </div>
        @endguest

        @auth
            <div class="flex items-center gap-3">
                <a href="" class="px-4 py-2 rounded border border-white/15 hover:bg-white/5 transition text-sm">Settings</a>
                <form action="{{ route('logout') }}" method="POST" class="m-0">
                    @csrf
                    <button type="submit" class="px-4 py-2 rounded bg-brand-500 text-bg-900 font-medium hover:bg-brand-600 transition text-sm">
                        Logout
                    </button>
                </form>
            </div>
        @endauth

    </div>
</header>
