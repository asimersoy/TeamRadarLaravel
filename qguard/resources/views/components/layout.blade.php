<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? 'Find your next team' }} · QGuard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body>
    <a class="skip-link" href="#main">Skip to content</a>
    <header class="site-header">
        <a class="brand" href="{{ route('home') }}" aria-label="QGuard home"><span class="brand-mark" aria-hidden="true">Q</span>QGuard<span class="brand-dot">.</span></a>
        <span class="pill">Private development build</span>
        @if(auth()->check() && Route::has('dashboard'))
            <nav aria-label="Main" class="actions"><a href="{{ route('dashboard') }}">Dashboard</a><form method="post" action="{{ route('logout') }}">@csrf<button class="secondary">Sign out</button></form></nav>
        @else
            <nav aria-label="Main" class="actions"><a href="{{ route('login') }}">Sign in</a><a class="button" href="{{ route('register') }}">Get started</a></nav>
        @endif
        @if(auth()->check() && auth()->user()->admin_cleared)<a href="{{ route('admin.cases') }}">Human review</a>@endif
    </header>
    <main id="main" class="page-shell">
        {{ $slot }}
    </main>
    <footer class="site-footer">QGuard · Better company, one session at a time.<span>Game joining and Discord are not integrated.</span></footer>
    @livewireScripts
</body>
</html>
