<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width,initial-scale=1"/>
  <title>QueueGuard — Find Teammates, Not Toxicity</title>
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
      /*background-color: rgb(11 16 32 / var(--tw-bg-opacity, 1));*/
    }
  </style>
</head>
<body class="bg-bg-900 text-ink-100 font-sans min-h-screen grid-lines flex flex-col">

  <!-- HEADER: fixed height + normalized buttons -->
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
                <a href="#features" class="hover:text-ink-100">Features</a>
                <a href="#how" class="hover:text-ink-100">How It Works</a>
                <a href="#ratings" class="hover:text-ink-100">Ratings</a>
                <a href="#faq" class="hover:text-ink-100">FAQ</a>
            </nav>
        @endguest

        @auth
            <nav class="hidden md:flex items-center gap-6 text-sm text-ink-300">
                <a href="{{ route('dashboard') }}" class="hover:text-ink-100">Dashboard</a>
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

  <main class="flex-grow">
    <!-- Hero -->
    <section class="relative">
      <div class="absolute inset-0 -z-10 opacity-20"
           style="background: radial-gradient(800px 300px at 50% -20%, rgba(76,201,240,.35), transparent 60%);"></div>
      <div class="max-w-6xl mx-auto px-4 py-16 md:py-24">
        <div class="grid md:grid-cols-2 gap-10 items-center">
          <div>
            <h1 class="text-4xl md:text-5xl font-semibold leading-tight">
              Match with teammates.<br/><span class="text-brand-400">Mute the toxicity.</span>
            </h1>
            <p class="mt-4 text-ink-300">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere, lorem in volutpat lacinia,
              urna erat placerat ipsum, eu fermentum augue arcu non risus.
            </p>
            <div class="mt-6 flex items-center gap-3">
              <a href="/matchmaking" class="px-6 py-3 rounded bg-brand-500 text-bg-900 font-medium hover:bg-brand-600 transition">Find a Match</a>
              <a href="#features" class="px-6 py-3 rounded border border-white/15 hover:bg-white/5 transition">Learn More</a>
            </div>
            <div class="mt-6 flex items-center gap-4 text-xs text-ink-300">
              <div class="inline-flex items-center gap-2">
                <span class="h-2.5 w-2.5 rounded-full bg-success-500"></span> Live matchmaking online
              </div>
              <div>Rated lobbies • Anti-tilt filters • Cross-game profiles</div>
            </div>
          </div>

          <!-- Preview panel -->
          <div class="panel rounded-xl shadow-card p-4">
            <div class="rounded-lg border border-white/10 bg-bg-700/50 p-4">
              <div class="text-sm text-ink-300 mb-3">Preview</div>
              <div class="flex gap-3 overflow-x-auto">
                <!-- five placeholder cards -->
                <div class="w-40 flex-shrink-0 rounded-lg border border-white/10 bg-bg-700/60 p-3">
                  <div class="w-16 h-16 rounded bg-bg-800 mb-2"></div>
                  <div class="font-semibold">Lorem</div>
                  <div class="text-xs text-ink-300">Level 57</div>
                  <div class="mt-2 rank-pill px-2 py-1 rounded-full text-xs inline-flex items-center gap-2">
                    <span class="w-4 h-4 rounded bg-accent-500/70"></span> Gold II
                  </div>
                </div>
                <div class="w-40 flex-shrink-0 rounded-lg border border-white/10 bg-bg-700/60 p-3">
                  <div class="w-16 h-16 rounded bg-bg-800 mb-2"></div>
                  <div class="font-semibold">Ipsum</div>
                  <div class="text-xs text-ink-300">Level 89</div>
                  <div class="mt-2 rank-pill px-2 py-1 rounded-full text-xs inline-flex items-center gap-2">
                    <span class="w-4 h-4 rounded bg-accent-500/70"></span> Plat IV
                  </div>
                </div>
                <div class="w-40 flex-shrink-0 rounded-lg border border-white/10 bg-bg-700/60 p-3">
                  <div class="w-16 h-16 rounded bg-bg-800 mb-2"></div>
                  <div class="font-semibold">Dolor</div>
                  <div class="text-xs text-ink-300">Level 33</div>
                  <div class="mt-2 rank-pill px-2 py-1 rounded-full text-xs inline-flex items-center gap-2">
                    <span class="w-4 h-4 rounded bg-accent-500/70"></span> Gold IV
                  </div>
                </div>
                <div class="w-40 flex-shrink-0 rounded-lg border border-white/10 bg-bg-700/60 p-3">
                  <div class="w-16 h-16 rounded bg-bg-800 mb-2"></div>
                  <div class="font-semibold">Sit</div>
                  <div class="text-xs text-ink-300">Level 71</div>
                  <div class="mt-2 rank-pill px-2 py-1 rounded-full text-xs inline-flex items-center gap-2">
                    <span class="w-4 h-4 rounded bg-accent-500/70"></span> Gold III
                  </div>
                </div>
                <div class="w-40 flex-shrink-0 rounded-lg border border-white/10 bg-bg-700/60 p-3">
                  <div class="w-16 h-16 rounded bg-bg-800 mb-2"></div>
                  <div class="font-semibold">Amet</div>
                  <div class="text-xs text-ink-300">Level 45</div>
                  <div class="mt-2 rank-pill px-2 py-1 rounded-full text-xs inline-flex items-center gap-2">
                    <span class="w-4 h-4 rounded bg-accent-500/70"></span> Gold II
                  </div>
                </div>
              </div>
              <div class="mt-4 flex items-center justify-center gap-3">
                <button class="px-4 py-2 rounded bg-brand-500 text-bg-900 text-sm hover:bg-brand-600 transition">Ready Up</button>
                <button class="px-4 py-2 rounded border border-white/15 text-sm hover:bg-white/5 transition">Invite</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Features -->
    <section id="features" class="max-w-6xl mx-auto px-4 py-16">
      <div class="grid md:grid-cols-3 gap-6">
        <div class="panel rounded-xl shadow-card p-6">
          <div class="w-10 h-10 rounded bg-brand-500/20 border border-brand-500/40 mb-3"></div>
          <h3 class="text-lg font-semibold mb-2">Post-Match Ratings</h3>
          <p class="text-ink-300">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean bibendum turpis non dui consequat, nec varius neque dictum.</p>
        </div>
        <div class="panel rounded-xl shadow-card p-6">
          <div class="w-10 h-10 rounded bg-accent-500/20 border border-accent-500/40 mb-3"></div>
          <h3 class="text-lg font-semibold mb-2">Anti-Toxicity Filters</h3>
          <p class="text-ink-300">Suspendisse potenti. Integer et lorem ac magna porttitor commodo. Vestibulum ante ipsum primis in faucibus orci luctus.</p>
        </div>
        <div class="panel rounded-xl shadow-card p-6">
          <div class="w-10 h-10 rounded bg-success-500/20 border border-success-500/40 mb-3"></div>
          <h3 class="text-lg font-semibold mb-2">Cross-Game Identity</h3>
          <p class="text-ink-300">Donec eget massa sed eros tincidunt accumsan. Mauris ultrices, mauris et sagittis tempus, lorem nibh congue quam.</p>
        </div>
      </div>
    </section>

    <!-- How it works -->
    <section id="how" class="max-w-6xl mx-auto px-4 py-16">
      <div class="panel rounded-xl shadow-card p-8">
        <div class="grid md:grid-cols-3 gap-8">
          <div>
            <div class="text-ink-300 text-sm mb-2">Step 1</div>
            <h4 class="font-semibold mb-2">Queue Up</h4>
            <p class="text-ink-300">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur facilisis placerat velit.</p>
          </div>
          <div>
            <div class="text-ink-300 text-sm mb-2">Step 2</div>
            <h4 class="font-semibold mb-2">Play Your Match</h4>
            <p class="text-ink-300">Etiam id luctus sem. Duis sit amet leo eu arcu pulvinar ultricies. Integer rhoncus pharetra.</p>
          </div>
          <div>
            <div class="text-ink-300 text-sm mb-2">Step 3</div>
            <h4 class="font-semibold mb-2">Rate & Improve</h4>
            <p class="text-ink-300">Quisque dictum, ipsum ac malesuada rhoncus, augue nunc feugiat nulla, at viverra dui arcu eget justo.</p>
          </div>
        </div>
      </div>
    </section>

    <!-- Ratings -->
    <section id="ratings" class="max-w-6xl mx-auto px-4 py-16">
      <div class="grid md:grid-cols-2 gap-6">
        <div class="panel rounded-xl shadow-card p-6">
          <h3 class="text-lg font-semibold mb-4">Reputation System</h3>
          <p class="text-ink-300">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus pulvinar, nibh a lacinia elementum, felis magna molestie mauris, sit amet dictum felis urna a lectus.</p>
          <ul class="mt-4 space-y-2 text-ink-300 text-sm">
            <li>• Lorem ipsum dolor sit amet</li>
            <li>• Consectetur adipiscing elit</li>
            <li>• Sed do eiusmod tempor incididunt</li>
          </ul>
        </div>
        <div class="panel rounded-xl shadow-card p-6">
          <h3 class="text-lg font-semibold mb-4">What Players Say</h3>
          <div class="space-y-4">
            <blockquote class="rounded-lg border border-white/10 bg-bg-700/50 p-4">
              <p class="text-ink-100">“Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer in facilisis arcu.”</p>
              <footer class="mt-2 text-xs text-ink-300">— Lorem Ipsum, Diamond II</footer>
            </blockquote>
            <blockquote class="rounded-lg border border-white/10 bg-bg-700/50 p-4">
              <p class="text-ink-100">“Suspendisse potenti. Nunc vitae sapien tincidunt, luctus mi sit amet, posuere justo.”</p>
              <footer class="mt-2 text-xs text-ink-300">— Dolor Sit, Plat IV</footer>
            </blockquote>
          </div>
        </div>
      </div>
    </section>

    <!-- CTA -->
    <section class="max-w-6xl mx-auto px-4 py-16">
      <div class="panel rounded-xl shadow-card p-8 text-center">
        <h3 class="text-2xl font-semibold">Ready to queue without the tilt?</h3>
        <p class="mt-2 text-ink-300">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ut perspiciatis unde omnis iste natus error sit voluptatem.</p>
        <div class="mt-6 flex items-center justify-center gap-3">
          <a href="/auth#register" class="px-6 py-3 rounded bg-brand-500 text-bg-900 font-medium hover:bg-brand-600 transition">Create Account</a>
          <a href="/matchmaking" class="px-6 py-3 rounded border border-white/15 hover:bg-white/5 transition">See Demo</a>
        </div>
      </div>
    </section>

    <!-- FAQ -->
    <section id="faq" class="max-w-6xl mx-auto px-4 py-16">
      <div class="grid md:grid-cols-2 gap-6">
        <div class="panel rounded-xl shadow-card p-6">
          <h4 class="font-semibold mb-2">Lorem ipsum dolor sit amet?</h4>
          <p class="text-ink-300">Consectetur adipiscing elit. Etiam magna lacus, faucibus in augue a, hendrerit scelerisque justo.</p>
        </div>
        <div class="panel rounded-xl shadow-card p-6">
          <h4 class="font-semibold mb-2">Sed do eiusmod tempor incididunt?</h4>
          <p class="text-ink-300">Ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida dictum fusce ut placerat.</p>
        </div>
        <div class="panel rounded-xl shadow-card p-6">
          <h4 class="font-semibold mb-2">Ut enim ad minim veniam?</h4>
          <p class="text-ink-300">Quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
        </div>
        <div class="panel rounded-xl shadow-card p-6">
          <h4 class="font-semibold mb-2">Duis aute irure dolor in reprehenderit?</h4>
          <p class="text-ink-300">In voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident.</p>
        </div>
      </div>
    </section>
  </main>

  <!-- Footer -->
  <footer class="border-t border-white/10 bg-bg-800/60">
    <div class="max-w-6xl mx-auto px-4 py-10 text-center text-xs text-ink-500">
      © 2025 QueueGuard • Be excellent to each other.
    </div>
  </footer>
</body>
</html>
