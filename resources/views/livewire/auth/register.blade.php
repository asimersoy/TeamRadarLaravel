<?php

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('components.layouts.auth')] class extends Component {
    public string $name = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';

    /**
     * Handle an incoming registration request.
     */
    public function register(): void
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
        ]);

        $validated['password'] = Hash::make($validated['password']);

        event(new Registered(($user = User::create($validated))));

        Auth::login($user);

        $this->redirectIntended(route('dashboard', absolute: false), navigate: true);
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
            <h1 class="text-xl font-semibold">{{ __('Create your account') }}</h1>
            <p class="mt-1 text-sm text-ink-300">
                {{ __('Join QueueGuard and start matching with better teammates') }}
            </p>
        </div>

        <!-- Form -->
        <div class="px-6 pb-6 pt-4">
            <form method="POST" wire:submit="register" class="space-y-5">
                @csrf

                <!-- Name -->
                <div>
                    <label for="name" class="block text-sm mb-1 text-zinc-300">{{ __('Username') }}</label>
                    <input id="name" type="text" wire:model="name"
                           class="w-full h-11 rounded-lg
                                  bg-zinc-800 border border-zinc-700
                                  px-3 text-zinc-100 placeholder-zinc-400
                                  focus:outline-none focus:ring-2 focus:ring-cyan-400/40 focus:border-cyan-400"
                           placeholder="{{ __('Your gamer tag') }}" autocomplete="username" autofocus>
                    @error('name') <div class="mt-1 text-red-500 text-sm">{{ $message }}</div> @enderror
                </div>

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
                           class="w-full h-11 rounded-lg
                                  bg-zinc-800 border border-zinc-700
                                  px-3 text-zinc-100 placeholder-zinc-400
                                  focus:outline-none focus:ring-2 focus:ring-cyan-400/40 focus:border-cyan-400"
                           placeholder="••••••••" autocomplete="new-password">
                    @error('password') <div class="mt-1 text-red-500 text-sm">{{ $message }}</div> @enderror
                </div>

                <!-- Confirm Password -->
                <div>
                    <label for="password_confirmation" class="block text-sm mb-1 text-zinc-300">{{ __('Confirm Password') }}</label>
                    <input id="password_confirmation" type="password" wire:model="password_confirmation"
                           class="w-full h-11 rounded-lg
                                  bg-zinc-800 border border-zinc-700
                                  px-3 text-zinc-100 placeholder-zinc-400
                                  focus:outline-none focus:ring-2 focus:ring-cyan-400/40 focus:border-cyan-400"
                           placeholder="••••••••" autocomplete="new-password">
                    @error('password_confirmation') <div class="mt-1 text-red-500 text-sm">{{ $message }}</div> @enderror
                </div>

                <!-- Submit -->
                <button type="submit"
                        class="w-full h-11 rounded-lg bg-brand-500 hover:bg-brand-600 text-bg-900 font-medium transition">
                    {{ __('Create account') }}
                </button>

                <!-- Switch to login -->
                <div class="text-center text-sm text-ink-300">
                    {{ __('Already have an account?') }}
                    <a href="{{ route('login') }}" class="text-brand-400 hover:text-brand-300">
                        {{ __('Log in') }}
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

