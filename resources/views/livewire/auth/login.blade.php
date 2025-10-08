<?php

use Illuminate\Auth\Events\Lockout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Volt\Component;

new #[Layout('components.layouts.auth')] class extends Component {
    #[Validate('required|string|email')]
    public string $email = '';

    #[Validate('required|string')]
    public string $password = '';

    public bool $remember = false;

    /**
     * Handle an incoming authentication request.
     */
    public function login(): void
    {
        $this->validate();

        $this->ensureIsNotRateLimited();

        if (! Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->remember)) {
            RateLimiter::hit($this->throttleKey());

            throw ValidationException::withMessages([
                'email' => __('auth.failed'),
            ]);
        }

        RateLimiter::clear($this->throttleKey());
        Session::regenerate();

        $this->redirectIntended(default: route('dashboard', absolute: false), navigate: true);
    }

    /**
     * Ensure the authentication request is not rate limited.
     */
    protected function ensureIsNotRateLimited(): void
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        event(new Lockout(request()));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'email' => __('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    /**
     * Get the authentication rate limiting throttle key.
     */
    protected function throttleKey(): string
    {
        return Str::transliterate(Str::lower($this->email).'|'.request()->ip());
    }
}; ?>

<div class="max-w-md mx-auto py-12">
    <!-- Card -->
    <div class="panel rounded-xl shadow-card border border-white/10 overflow-hidden">

        <!-- Tabs / selector (links) -->
        <div class="px-6 pt-5">
            <div class="relative inline-flex rounded-lg border border-white/10 bg-bg-800/60 p-1">
                <a href="{{ route('login') }}"
                   class="px-4 py-2 text-sm font-medium rounded-md transition
                          {{ request()->routeIs('login') ? 'bg-brand-500 text-bg-900' : 'text-ink-300 hover:text-ink-100' }}">
                    {{ __('Login') }}
                </a>
                <a href="{{ route('register') }}"
                   class="px-4 py-2 text-sm font-medium rounded-md transition
                          {{ request()->routeIs('register') ? 'bg-brand-500 text-bg-900' : 'text-ink-300 hover:text-ink-100' }}">
                    {{ __('Register') }}
                </a>
            </div>
        </div>

        <!-- Header -->
        <div class="px-6 pt-5">
            <h1 class="text-xl font-semibold">{{ __('Welcome back') }}</h1>
            <p class="mt-1 text-sm text-ink-300">
                {{ __('Log in to continue to your account') }}
            </p>

            <!-- Session Status -->
            @if (session('status'))
                <div class="mt-3 text-sm text-center text-ink-300">
                    {{ session('status') }}
                </div>
            @endif
        </div>

        <!-- Form -->
        <div class="px-6 pb-6 pt-4">
            <form method="POST" wire:submit="login" class="space-y-5">
                @csrf

                <!-- Email -->
                <div>
                <label for="email" class="block text-sm mb-1 text-zinc-300">{{ __('Email') }}</label>
                <input id="email" type="email" wire:model="email"
                        class="w-full h-11 rounded-lg 
                                bg-zinc-800 border border-zinc-700 
                                px-3 text-zinc-100 placeholder-zinc-400
                                focus:outline-none focus:ring-2 focus:ring-cyan-400/40 focus:border-cyan-400"
                        placeholder="you@example.com" autocomplete="email">
                @error('email') <div class="mt-1 text-red-500 text-sm">{{ $message }}</div> @enderror
                </div>

                <!-- Password -->
                <div>
                <label for="password" class="block text-sm mb-1 text-zinc-300">{{ __('Password') }}</label>
                <input id="password" type="password" wire:model="password"
                        class="w-full h-11 rounded-lg bg-bg-700/60
                                bg-zinc-800 border border-zinc-700 
                                px-3 text-zinc-100 placeholder-zinc-400
                                focus:outline-none focus:ring-2 focus:ring-cyan-400/40 focus:border-cyan-400"
                        placeholder="••••••••" autocomplete="current-password">
                @error('password') <div class="mt-1 text-red-500 text-sm">{{ $message }}</div> @enderror
                </div>


                <!-- Remember me -->
                <div class="flex items-center justify-between">
                    <label class="inline-flex items-center gap-2 text-sm text-ink-300">
                        <input type="checkbox" wire:model="remember"
                            class="rounded border-white/20 bg-bg-800/60 text-brand-500 focus:ring-brand-500/40">
                        <span>{{ __('Remember me') }}</span>
                    </label>
                    <!-- Forgot Password -->
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}"
                           class="text-sm text-brand-400 hover:text-brand-300 transition">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
                </div>
                

                <!-- Submit -->
                <button type="submit"
                        class="w-full h-11 rounded-lg bg-brand-500 hover:bg-brand-600 text-bg-900 font-medium transition">
                    {{ __('Login') }}
                </button>
            </form>
        </div>
    </div>
</div>
