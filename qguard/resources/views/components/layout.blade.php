<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ __(':value1 · QGuard', ['value1' => __($title ?? 'Find your next team')]) }}</title>
    <link rel="icon" href="{{ asset('brand/favicon.svg') }}" type="image/svg+xml">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="{{ auth()->check() ? 'signed-in' : 'visitor' }}">
    <a class="skip-link" href="#main">{{ __('Skip to content') }}</a>
    <header class="site-header">
        <a class="brand" href="{{ route('home') }}" aria-label="{{ __('QGuard home') }}"><img src="{{ asset('brand/qguard-wide-dark.svg') }}" alt="QGuard — Good company, good games." width="240" height="62"></a>
        <span class="pill">{{ __('Private development build') }}</span>
        <form class="locale-switch" method="post" action="{{ route('locale') }}">@csrf
            <label>{{ __('Interface language') }}<select name="locale" aria-label="{{ __('Interface language') }}"><option value="en" @selected(app()->getLocale()==='en')>English</option><option value="tr" @selected(app()->getLocale()==='tr')>Türkçe</option></select></label>
            <button class="secondary">{{ __('Apply language') }}</button>
        </form>
        @if(auth()->check() && Route::has('dashboard'))
            <nav aria-label="{{ __('Main') }}" class="actions main-nav">
                <a wire:navigate href="{{ route('dashboard') }}" @if(request()->routeIs('dashboard')) aria-current="page" @endif>{{ __('Matchmaking') }}</a>
                <a wire:navigate href="{{ route('profile') }}" @if(request()->routeIs('profile')) aria-current="page" @endif>{{ __('Profile & settings') }}</a>
                <a wire:navigate href="{{ route('history') }}" @if(request()->routeIs('history','session.detail')) aria-current="page" @endif>{{ __('Sessions') }}</a>
                <a wire:navigate href="{{ route('connections') }}" @if(request()->routeIs('connections')) aria-current="page" @endif>{{ __('Connections') }}</a>
                <a wire:navigate href="{{ route('settings') }}" @if(request()->routeIs('settings')) aria-current="page" @endif>{{ __('Settings') }}</a>
                <form method="post" action="{{ route('logout') }}">@csrf<button class="secondary">{{ __('Sign out') }}</button></form>
            </nav>
        @else
            <nav aria-label="{{ __('Main') }}" class="actions"><a href="{{ route('login') }}">{{ __('Sign in') }}</a><a class="button" href="{{ route('register') }}">{{ __('Get started') }}</a></nav>
        @endif
        @if(auth()->check() && auth()->user()->admin_cleared)<a href="{{ route('admin.cases') }}">{{ __('Human review') }}</a>@endif
    </header>
    <main id="main" class="page-shell">
        <noscript><p class="notice">{{ __('Enable JavaScript to use the interactive dashboard, rooms and feedback forms.') }}</p></noscript>
        {{ $slot }}
    </main>
    <footer class="site-footer">
        <span>QGuard · Good company, good games.</span>
        <span>{{ __('Review build · No live game integration.') }}</span>
        <p class="riot-notice">QGuard isn't endorsed by Riot Games and doesn't reflect the views or opinions of Riot Games or anyone officially involved in producing or managing Riot Games properties. Riot Games, and all associated properties are trademarks or registered trademarks of Riot Games, Inc.</p>
    </footer>
    @livewireScripts
</body>
</html>
