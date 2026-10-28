<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? 'Find your next team' }} · QGuard</title>
    <link rel="icon" href="{{ asset('brand/favicon.svg') }}" type="image/svg+xml">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="{{ auth()->check() ? 'signed-in' : 'visitor' }}">
    <a class="skip-link" href="#main">Skip to content</a>
    <header class="site-header">
        <a class="brand" href="{{ route('home') }}" aria-label="QGuard home"><img src="{{ asset('brand/qguard-wide-dark.svg') }}" alt="QGuard — Good company, good games." width="240" height="62"></a>
        <span class="pill">Private development build</span>
        @if(auth()->check() && Route::has('dashboard'))
            <nav aria-label="Main" class="actions main-nav">
                <a wire:navigate href="{{ route('dashboard') }}" @if(request()->routeIs('dashboard')) aria-current="page" @endif>Matchmaking</a>
                <a wire:navigate href="{{ route('profile') }}" @if(request()->routeIs('profile')) aria-current="page" @endif>Profile &amp; settings</a>
                <a wire:navigate href="{{ route('history') }}" @if(request()->routeIs('history','session.detail')) aria-current="page" @endif>Sessions</a>
                <a wire:navigate href="{{ route('connections') }}" @if(request()->routeIs('connections')) aria-current="page" @endif>Connections</a>
                <a wire:navigate href="{{ route('settings') }}" @if(request()->routeIs('settings')) aria-current="page" @endif>Settings</a>
                <form method="post" action="{{ route('logout') }}">@csrf<button class="secondary">Sign out</button></form>
            </nav>
        @else
            <nav aria-label="Main" class="actions"><a href="{{ route('login') }}">Sign in</a><a class="button" href="{{ route('register') }}">Get started</a></nav>
        @endif
        @if(auth()->check() && auth()->user()->admin_cleared)<a href="{{ route('admin.cases') }}">Human review</a>@endif
    </header>
    <main id="main" class="page-shell">
        <noscript><p class="notice">Enable JavaScript to use the interactive dashboard, rooms and feedback forms.</p></noscript>
        {{ $slot }}
    </main>
    <footer class="site-footer">QGuard · Good company, good games.<span>Review build · No live game integration.</span></footer>
    @livewireScripts
</body>
</html>
