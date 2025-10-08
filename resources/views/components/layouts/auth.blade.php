<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

        {{-- Include any CSS/JS --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script>
        tailwind.config = {
        theme: {
            extend: {
            colors: {
                bg: { 900: '#0b1020', 800: '#121831', 700: '#1a2342' },
                ink: { 100: '#d5ddf7', 300: '#98a2c9', 500: '#7e89b6' },
                brand: { 500: '#4cc9f0', 400: '#72d6f5', 600: '#36a9ce' },
                accent: { 500: '#ffd166' },
                success: { 500: '#34d399' },
                danger: { 500: '#ef4444' }
            },
            boxShadow: {
                card: '0 8px 30px rgba(0,0,0,.35), inset 0 1px 0 rgba(255,255,255,.02)'
            },
            borderRadius: { xl: '14px' }
            }
        }
        }
    </script>
  <style>
    .panel { background: linear-gradient(180deg, rgba(255,255,255,0.04), rgba(255,255,255,0.02)), rgba(18,24,49,0.9); backdrop-filter: blur(8px); }
    .rank-pill { border-image: linear-gradient(90deg,#ffd166,#72d6f5) 1; border-width:1px; border-style:solid; }
    .glow { box-shadow: 0 0 0 2px rgba(76,201,240,.15), 0 8px 30px rgba(76,201,240,.15); }
    .grid-lines {
      background:
        linear-gradient(transparent 23px, rgba(255,255,255,.04) 24px),
        linear-gradient(90deg, transparent 23px, rgba(255,255,255,.04) 24px);
      background-size: 24px 24px;
    }
  </style>

    <title>{{ $title ?? config('app.name', 'Laravel') }}</title>
</head>
<body class="min-h-screen bg-bg-900 text-ink-100 font-sans antialiased grid-lines flex flex-col">

    {{-- Header (shared across pages) --}}
    <header class="border-b border-white/10 bg-bg-800/60 backdrop-blur sticky top-0 z-20">
        <div class="h-16 max-w-6xl mx-auto px-4 flex items-center justify-between">
            <!-- Left: logo block -->
            <div class="flex items-center gap-3">
                <div class="w-8 h-8 rounded bg-brand-600/20 border border-brand-600/40"></div>
                <a href="/" class="text-lg font-semibold tracking-wide">QueueGuard</a>
            </div>

            <!-- Right: auth links -->
            <div class="flex items-center gap-3 whitespace-nowrap">
                @auth
                    <img src="https://i.pravatar.cc/40?img=1" alt="Your avatar"
                        class="w-9 h-9 rounded-lg border border-white/15">
                    <form id="logout" action="{{ route('logout') }}" method="post" class="contents">
                        @csrf
                        <button type="submit"
                                class="inline-flex items-center justify-center h-9 px-4 rounded bg-brand-500 text-bg-900 font-medium hover:bg-brand-600 transition text-sm leading-none">
                            Logout
                        </button>
                    </form>
                @endauth

                @guest
                    <a href="{{ route('login') }}"
                    class="inline-flex items-center justify-center h-9 px-4 rounded border border-white/15 hover:bg-white/5 transition text-sm leading-none">
                        Sign in
                    </a>
                    <a href="{{ route('register') }}"
                    class="inline-flex items-center justify-center h-9 px-4 rounded bg-brand-500 text-bg-900 font-medium hover:bg-brand-600 transition text-sm leading-none">
                        Register
                    </a>
                @endguest
            </div>
        </div>
    </header>

    {{-- Main content slot --}}
    <main class="flex-grow">
        {{ $slot }}
    </main>

    {{-- Footer --}}
    <footer class="border-t border-white/10 bg-bg-800/60">
        <div class="max-w-6xl mx-auto px-4 py-10 text-center text-xs text-ink-500">
            © {{ date('Y') }} QueueGuard • Be excellent to each other.
        </div>
    </footer>
</body>
</html>

