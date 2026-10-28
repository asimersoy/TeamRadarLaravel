<div wire:cloak wire:poll.5s><p class="eyebrow">{{ __('Valorant · Competitive · :value1 · :value2', ['value1' => strtoupper($room->shard), 'value2' => strtoupper($room->language)]) }}</p><h1>{{ __('Your five are here.') }}</h1><p class="muted">{{ __('Session #:value1 · :value2 · Honor is the snapshot at matching, not individual feedback.', ['value1' => $room->id, 'value2' => __($room->state)]) }}</p>
<div class="notice">{{ __(':value1 Full five-stacks can span ranks; Valorant may reduce Ranked Rating rewards. Check the game client\'s current rules.', ['value1' => __($handoff['message'])]) }}</div>
<section class="panel"><h2>{{ __('Matched teammates') }}</h2><ul class="roster">@foreach($roster as $member)<li><div><strong>{{ $member->handle }}</strong><p class="muted">{{ $member->riot_id }} · {{ __($member->state) }} @if($member->user_id===$room->coordinator_id) {{ __('· Coordinator') }} @endif</p></div><div>{{ $ranks[$member->rank_snapshot] }} <small>{{ __('Self-declared') }}</small><p>{{ __('Honor :value1', ['value1' => number_format($member->honor_snapshot,1)]) }}</p></div></li>@endforeach</ul></section>
<x-errors />
<div class="actions">@if(in_array($participant->state,['matched','acknowledged']) && $room->state==='active')<button wire:click="acknowledge">{{ __('I joined') }}</button><button wire:click="endSession" class="secondary">{{ __('Session ended') }}</button>@endif<a href="{{ route('dashboard') }}">{{ __('Return to dashboard') }}</a></div>
@if($participant->state==='ended')<div class="notice">{{ __('Your participation has ended. You can queue again.') }} <a href="{{ route('feedback',$room->id) }}">{{ __('Open session feedback') }}</a></div>@endif
@if($room->state==='disbanded_no_show')<div class="notice">{{ __('This QGuard session was disbanded after a no-show response deadline. No game client was controlled.') }}</div>@endif
@if($noShow)<div class="notice" role="status">{{ __('No-show request open.') }} @if($noShow->response_deadline){{ __('Response required before :value1 UTC. The target can select I joined before this deadline.', ['value1' => $noShow->response_deadline]) }}@else {{ __('All four other players must vote before a response deadline starts.') }}@endif</div>@endif
@if($room->state==='active' && !$room->settled_at && (!$room->feedback_deadline || now()->lt($room->feedback_deadline)) && in_array($participant->state,['matched','acknowledged']))<details class="panel"><summary>{{ __('Someone has not joined') }}</summary><p class="muted">{{ __('Available five minutes after matching. All four others must agree, then the player has 30 seconds to respond.') }}</p><div class="actions">@foreach($roster as $member)@if($member->user_id!==auth()->id() && $member->state==='matched')<button class="secondary" wire:click="vote({{ $member->user_id }})">{{ __(':value1 has not joined', ['value1' => $member->handle]) }}</button>@endif@endforeach</div></details>@endif
<details class="panel chat-panel" wire:ignore data-chat-room="{{ $room->id }}" data-reverb-key="{{ config('broadcasting.connections.reverb.key') }}" data-reverb-host="{{ config('qguard.reverb_browser_host') }}" data-reverb-port="{{ config('qguard.reverb_browser_port') }}">
    <summary class="chat-toggle" aria-label="{{ __('Team chat') }}">
        <span class="chat-icon" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"><path d="M5 4h14a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H9l-6 3V6a2 2 0 0 1 2-2Z"/><path d="M7 9h10M7 13h7"/></svg></span>
        <span class="chat-heading"><strong>{{ __('Team chat') }}</strong><small>{{ __('Private messages for your matched team') }}</small></span>
        <span class="chat-chevron" aria-hidden="true">⌄</span>
    </summary>
    <div class="chat-content">
        <p class="muted">{{ __('Visible to matched participants and data-cleared administrators. Not encrypted from administrators.') }}</p>
        <p class="muted chat-connection" data-connection role="status">{{ __('Connecting · polling available') }}</p>
        <button class="secondary" data-older hidden>{{ __('Load older messages') }}</button>
        <ol class="messages" aria-label="{{ __('Team messages') }}" tabindex="0"></ol>
        <form data-chat-form class="chat-composer">
            <label>{{ __('Message to your team') }}<textarea maxlength="2000" rows="2" required aria-describedby="chat-keyboard-help" placeholder="{{ __('Say hello or coordinate your next game…') }}"></textarea></label>
            <div class="chat-compose-actions"><p id="chat-keyboard-help" class="muted">{{ __('Enter to send · Shift+Enter for a new line') }}</p><button type="submit">{{ __('Send message') }}</button></div>
            <span data-send-status role="status"></span>
        </form>
        <p class="muted chat-link-note">{{ __('Text only. Links are player-supplied; QGuard does not verify them or fetch previews.') }}</p>
    </div>
</details>
</div>
