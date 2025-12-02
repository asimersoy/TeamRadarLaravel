@extends('layouts.game')

@section('content')
<div class="max-w-6xl mx-auto px-4 py-16">
    <div class="grid md:grid-cols-3 gap-8">
        
        <!-- Left Column: User Stats -->
        <div class="md:col-span-1 space-y-6">
            <div class="panel rounded-xl shadow-card p-6">
                <div class="flex items-center gap-4 mb-6">
                    <div class="w-16 h-16 rounded bg-bg-800 border border-white/10 flex items-center justify-center text-2xl font-bold text-brand-400">
                        {{ substr(auth()->user()->name, 0, 1) }}
                    </div>
                    <div>
                        <h2 class="text-xl font-semibold">{{ auth()->user()->name }}</h2>
                        <div class="text-sm text-ink-300">Level 42</div>
                    </div>
                </div>
                
                <div class="space-y-4">
                    <div>
                        <div class="flex justify-between text-sm mb-1">
                            <span class="text-ink-300">Rank</span>
                            <span class="font-medium text-accent-500">Gold II</span>
                        </div>
                        <div class="h-2 bg-bg-800 rounded-full overflow-hidden">
                            <div class="h-full bg-accent-500 w-2/3"></div>
                        </div>
                    </div>
                    
                    <div>
                        <div class="flex justify-between text-sm mb-1">
                            <span class="text-ink-300">Reputation</span>
                            <span class="font-medium text-success-500">Good Standing</span>
                        </div>
                        <div class="h-2 bg-bg-800 rounded-full overflow-hidden">
                            <div class="h-full bg-success-500 w-full"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Matches (Placeholder) -->
            <div class="panel rounded-xl shadow-card p-6 opacity-75">
                <h3 class="font-semibold mb-4">Recent Matches</h3>
                <div class="space-y-3 text-sm text-ink-300">
                    <div class="flex justify-between">
                        <span>Victory</span>
                        <span class="text-success-500">+24 RR</span>
                    </div>
                    <div class="flex justify-between">
                        <span>Defeat</span>
                        <span class="text-danger-500">-18 RR</span>
                    </div>
                    <div class="flex justify-between">
                        <span>Victory</span>
                        <span class="text-success-500">+19 RR</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Middle/Right: Matchmaking Interface -->
        <div class="md:col-span-2">
            <div class="panel rounded-xl shadow-card p-8 h-full flex flex-col items-center justify-center text-center relative overflow-hidden">
                
                <!-- Background decoration -->
                <div class="absolute inset-0 -z-10 opacity-10"
                     style="background: radial-gradient(circle at 50% 50%, rgba(76,201,240,0.4), transparent 70%);"></div>

                <h1 class="text-3xl md:text-4xl font-bold mb-4">Ready to Queue?</h1>
                <p class="text-ink-300 max-w-md mb-10">
                    Find teammates who communicate and play to win. No toxicity allowed.
                </p>

                <!-- Queue Settings -->
                <div class="flex flex-wrap justify-center gap-4 mb-10">
                    <label class="cursor-pointer">
                        <input type="radio" name="mode" class="peer sr-only" checked>
                        <div class="px-4 py-2 rounded-lg border border-white/10 bg-bg-800/50 peer-checked:border-brand-500 peer-checked:bg-brand-500/10 peer-checked:text-brand-400 transition">
                            Competitive
                        </div>
                    </label>
                    <label class="cursor-pointer">
                        <input type="radio" name="mode" class="peer sr-only">
                        <div class="px-4 py-2 rounded-lg border border-white/10 bg-bg-800/50 peer-checked:border-brand-500 peer-checked:bg-brand-500/10 peer-checked:text-brand-400 transition">
                            Unrated
                        </div>
                    </label>
                </div>

                <!-- Big Button -->
                <button class="group relative px-8 py-4 bg-brand-500 hover:bg-brand-600 text-bg-900 font-bold text-xl rounded-xl transition-all transform hover:scale-105 glow">
                    <span class="relative z-10 flex items-center gap-3">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                        Find Match
                    </span>
                </button>

                <div class="mt-6 text-xs text-ink-500">
                    Estimated wait: <span class="text-ink-300">~45s</span> • <span class="text-success-500">1,240 players online</span>
                </div>

            </div>
        </div>

    </div>
</div>
@endsection
