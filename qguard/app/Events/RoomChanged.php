<?php

namespace App\Events;

use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;

final class RoomChanged implements ShouldBroadcast
{
    use Dispatchable;

    public function __construct(public int $sessionId, public int $version) {}

    public function broadcastOn(): array
    {
        return [new PrivateChannel('room.'.$this->sessionId)];
    }

    public function broadcastAs(): string
    {
        return 'room.changed';
    }

    public function broadcastWith(): array
    {
        return ['session_id' => $this->sessionId, 'version' => $this->version];
    }
}
