<details class="panel chat-panel" wire:ignore data-chat-room="{{ $room->id }}" data-reverb-key="{{ config('broadcasting.connections.reverb.key') }}" data-reverb-host="{{ config('qguard.reverb_browser_host') }}" data-reverb-port="{{ config('qguard.reverb_browser_port') }}">
    <summary class="chat-toggle" aria-label="Team chat">
        <span class="chat-icon" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"><path d="M5 4h14a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H9l-6 3V6a2 2 0 0 1 2-2Z"/><path d="M7 9h10M7 13h7"/></svg></span>
        <span class="chat-heading"><strong>Team chat</strong><small>Private messages for your matched team</small></span>
        <span class="chat-chevron" aria-hidden="true">⌄</span>
    </summary>
    <div class="chat-content">
        <p class="muted">Visible to matched participants and data-cleared administrators. Not encrypted from administrators.</p>
        <p class="muted chat-connection" data-connection role="status">Connecting · polling available</p>
        <button class="secondary" data-older hidden>Load older messages</button>
        <ol class="messages" aria-label="Team messages" tabindex="0"></ol>
        <form data-chat-form class="chat-composer">
            <label>Message to your team<textarea maxlength="2000" rows="2" required aria-describedby="chat-keyboard-help" placeholder="Say hello or coordinate your next game…"></textarea></label>
            <div class="chat-compose-actions"><p id="chat-keyboard-help" class="muted">Enter to send · Shift+Enter for a new line</p><button type="submit">Send message</button></div>
            <span data-send-status role="status"></span>
        </form>
        <p class="muted chat-link-note">Text only. Links are player-supplied; QGuard does not verify them or fetch previews.</p>
    </div>
</details>
