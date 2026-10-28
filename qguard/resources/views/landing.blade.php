<x-layout>
    <section class="hero">
        <div>
            <p class="eyebrow">{{ __('A better kind of five-stack') }}</p>
            <h1>{{ __('Your next game.') }}<br><span>{{ __('Your kind of team.') }}</span></h1>
            <p class="lead">{{ __('Find teammates who value communication, sportsmanship and effort. Build a group for a session, not a permanent team.') }}</p>
            <div class="notice">{{ __('Registration is open. Normal matchmaking awaits Riot account linking. Live game joining is not integrated.') }}</div>
            <a class="button" href="{{ route('register') }}">{{ __('Create your QGuard account') }}</a>
            <a class="button secondary" href="{{ route('guest.review') }}#welcome">{{ __('Explore as a guest') }}</a><p class="muted">{{ __('The interactive design walkthrough is in English.') }}</p>
        </div>
        <aside class="panel hero-panel" aria-label="{{ __('How QGuard works') }}">
            <span class="eyebrow">{{ __('The session loop') }}</span>
            <ol class="steps">
                <li><span>01</span><div><h2>{{ __('Find your five') }}</h2><p>{{ __('Queue solo or bring a few friends.') }}</p></div></li>
                <li><span>02</span><div><h2>{{ __('Make a connection') }}</h2><p>{{ __('Coordinate in a private team text room.') }}</p></div></li>
                <li><span>03</span><div><h2>{{ __('Leave honest feedback') }}</h2><p>{{ __('Honor reflects conduct, not aim or skill.') }}</p></div></li>
            </ol>
            <p class="muted">{{ __('This is a synthetic-data development build, not a live matchmaking service.') }}</p>
        </aside>
    </section>
</x-layout>
