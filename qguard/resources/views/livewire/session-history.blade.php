<div><p class="eyebrow">{{ __('YOUR SESSIONS') }}</p><h1>{{ __('Good games. Shared history.') }}</h1><p class="muted">{{ __('Revisit your sessions and finish feedback before finding your next team.') }}</p>
<div class="session-list">@forelse($sessions as $s)
<section class="panel"><div class="page-heading"><div><h2>{{ __('VALORANT · Competitive') }}</h2><p class="muted">{{ __('Session #:value1 · :value2 UTC · :value3', ['value1' => $s->id, 'value2' => $s->created_at, 'value3' => strtoupper($s->shard)]) }}</p></div><span class="pill">{{ __(str_replace('_',' ',$s->state)) }}</span></div>
<p>{{ ($rosters[$s->id] ?? collect())->pluck('handle')->join(' · ') }}</p>
@php($own = $cards[$s->id] ?? collect())
<p class="muted">{{ __(':value1 / :value2 required ratings submitted', ['value1' => $own->whereNotNull('submitted_at')->count(), 'value2' => $own->count()]) }}</p>
<div class="actions"><a wire:navigate class="button secondary" href="{{ $s->state === 'active' ? route('room',$s->id) : route('feedback',$s->id) }}">{{ __($s->state === 'active' ? 'Return to session' : ($own->whereNull('submitted_at')->count() ? 'Finish feedback' : 'View session')) }}</a></div></section>
@empty<section class="panel"><h2>{{ __('No sessions yet.') }}</h2><p class="muted">{{ __('Your sessions will appear here after matching.') }}</p><a wire:navigate class="button" href="{{ route('dashboard') }}">{{ __('Go to matchmaking') }}</a></section>@endforelse</div>{{ $sessions->links() }}</div>
