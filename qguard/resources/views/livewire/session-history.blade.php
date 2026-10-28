<div><p class="eyebrow">YOUR SESSIONS</p><h1>Good games. Shared history.</h1><p class="muted">Revisit your sessions and finish feedback before finding your next team.</p>
<div class="session-list">@forelse($sessions as $s)
<section class="panel"><div class="page-heading"><div><h2>VALORANT · Competitive</h2><p class="muted">Session #{{ $s->id }} · {{ $s->created_at }} UTC · {{ strtoupper($s->shard) }}</p></div><span class="pill">{{ str_replace('_',' ',$s->state) }}</span></div>
<p>{{ ($rosters[$s->id] ?? collect())->pluck('handle')->join(' · ') }}</p>
@php($own = $cards[$s->id] ?? collect())
<p class="muted">{{ $own->whereNotNull('submitted_at')->count() }} / {{ $own->count() }} required ratings submitted</p>
<div class="actions"><a wire:navigate class="button secondary" href="{{ $s->state === 'active' ? route('room',$s->id) : route('feedback',$s->id) }}">{{ $s->state === 'active' ? 'Return to session' : ($own->whereNull('submitted_at')->count() ? 'Finish feedback' : 'View session') }}</a></div></section>
@empty<section class="panel"><h2>No sessions yet.</h2><p class="muted">Your sessions will appear here after matching.</p><a wire:navigate class="button" href="{{ route('dashboard') }}">Go to matchmaking</a></section>@endforelse</div>{{ $sessions->links() }}</div>
