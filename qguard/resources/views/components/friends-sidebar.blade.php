@props(['friends', 'party', 'members', 'activeSession' => null])
<aside class="friends-sidebar panel" aria-label="Friends sidebar">
    <header class="friends-header"><div><p class="eyebrow">Your connections</p><h2>Friends <span class="friend-count">{{ $friends->where('state', 'accepted')->count() }}</span></h2></div></header>
    <details class="friend-add" wire:ignore.self><summary>Add a friend</summary>
        <form wire:submit="requestFriend"><label>Exact friend handle<input wire:model="friendHandle" maxlength="24" placeholder="Their QGuard handle" required></label><button wire:loading.attr="disabled" wire:target="requestFriend">Send friend request</button></form>
    </details>
    <div class="friends-scroll">
        <ul class="friend-list" aria-label="Accepted friends">
            @forelse($friends->where('state', 'accepted') as $friend)
                <li class="friend-row" wire:key="friend-{{ $friend->id }}">
                    <div class="friend-identity"><span class="friend-avatar" aria-hidden="true">{{ mb_strtoupper(mb_substr($friend->handle, 0, 1)) }}</span><div><strong>{{ $friend->handle }}</strong><small>QGuard friend</small></div></div>
                    <div class="friend-actions">
                        <button class="secondary" wire:click="inviteFriend({{ $friend->id }})" wire:loading.attr="disabled" wire:target="inviteFriend" aria-label="Invite {{ $friend->handle }} to party" @disabled(!$party || $party->owner_id !== auth()->id() || $party->state !== 'idle' || $members->count() >= 5)>Invite</button>
                        <details class="friend-options" wire:ignore.self><summary aria-label="Options for {{ $friend->handle }}">•••</summary><button class="secondary" wire:click="friendship({{ $friend->id }}, 'remove')">Remove friend</button></details>
                    </div>
                </li>
            @empty
                <li class="friends-empty">Your next five starts with a friend.<small>Add someone by their QGuard handle, or queue solo.</small></li>
            @endforelse
        </ul>
        @if($friends->where('state', 'pending')->isNotEmpty())
            <h3 class="friend-requests-heading">Requests <span class="friend-count">{{ $friends->where('state', 'pending')->count() }}</span></h3>
            <ul class="friend-list" aria-label="Friend requests">
                @foreach($friends->where('state', 'pending') as $friend)
                    <li class="friend-row" wire:key="friend-{{ $friend->id }}">
                        <div class="friend-identity"><span class="friend-avatar pending-avatar" aria-hidden="true">{{ mb_strtoupper(mb_substr($friend->handle, 0, 1)) }}</span><div><strong>{{ $friend->handle }}</strong><small>{{ $friend->requester_id === auth()->id() ? 'Request sent' : 'Wants to be friends' }}</small></div></div>
                        <div class="friend-actions">@if($friend->requester_id === auth()->id())<button class="secondary" wire:click="friendship({{ $friend->id }}, 'cancel')">Cancel request</button>@else<button wire:click="friendship({{ $friend->id }}, 'accept')">Accept friend</button><button class="secondary" wire:click="friendship({{ $friend->id }}, 'decline')">Decline friend</button>@endif</div>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
    <p class="friends-footer">QGuard friends · no Riot sync<br>{{ $activeSession ? 'Finish your session before starting a new party.' : (!$party ? 'Start a party to invite friends.' : ($party->state === 'waiting' ? 'Cancel the queue before inviting friends.' : ($party->owner_id !== auth()->id() ? 'Only your party leader can send invitations.' : ($members->count() >= 5 ? 'Your party is full.' : 'Invite friends to your party, then get ready.')))) }}</p>
</aside>
