<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width,initial-scale=1"/>
  <title>{{ $title ?? 'QueueGuard' }}</title>
      {{-- Include any CSS/JS --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

  <style>
    .panel { background: linear-gradient(180deg, rgba(255,255,255,0.04), rgba(255,255,255,0.02)), rgba(18,24,49,0.9); backdrop-filter: blur(8px); }
    .rank-pill { border-image: linear-gradient(90deg,#ffd166,#72d6f5) 1; border-width:1px; border-style:solid; }
    .glow { box-shadow: 0 0 0 2px rgba(76,201,240,.15), 0 8px 30px rgba(76,201,240,.15); }
    .grid-lines {
      background:
        linear-gradient(transparent 23px, rgba(255, 255, 255, 0.04) 24px),
        linear-gradient(90deg, transparent 23px, rgba(255, 255, 255, 0.04) 24px);
      background-size: 24px 24px;
    }
  </style>
</head>
<body class="bg-bg-900 text-ink-100 font-sans min-h-screen grid-lines flex flex-col">

  <!-- HEADER -->
  <header class="border-b border-white/10 bg-bg-800/60 backdrop-blur sticky top-0 z-20">
    <div class="max-w-6xl mx-auto px-4 py-4 flex items-center justify-between">

        <!-- Left: Logo -->
        <div class="flex items-center gap-3">
            <div class="w-8 h-8 rounded bg-brand-600/20 border border-brand-600/40"></div>
            <a href="{{ route('home') }}" class="text-lg font-semibold tracking-wide">QueueGuard</a>
        </div>

        <!-- Middle: Nav -->
        <nav class="hidden md:flex items-center gap-6 text-sm text-ink-300">
            <a href="{{ route('dashboard') }}" class="hover:text-ink-100 {{ request()->routeIs('dashboard') ? 'text-ink-100' : '' }}">Dashboard</a>
            <a href="/matchmaking" class="hover:text-ink-100 {{ request()->is('matchmaking') ? 'text-ink-100' : '' }}">Matchmaking</a>
            <a href="" class="hover:text-ink-100">Matches</a>
            <a href="" class="hover:text-ink-100">Profile</a>
        </nav>

        <!-- Right: Actions -->
        <div class="flex items-center gap-3">
            <a href="" class="px-4 py-2 rounded border border-white/15 hover:bg-white/5 transition text-sm">Settings</a>
            <form action="{{ route('logout') }}" method="POST" class="m-0">
                @csrf
                <button type="submit" class="px-4 py-2 rounded bg-brand-500 text-bg-900 font-medium hover:bg-brand-600 transition text-sm">
                    Logout
                </button>
            </form>
        </div>

    </div>
  </header>

  <main class="flex-grow">
    @yield('content')
  </main>

  <!-- Footer -->
  <footer class="border-t border-white/10 bg-bg-800/60">
    <div class="max-w-6xl mx-auto px-4 py-10 text-center text-xs text-ink-500">
      © 2025 QueueGuard • Be excellent to each other.
    </div>
  </footer>
</body>
</html>
