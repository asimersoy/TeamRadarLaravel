<?php

use Illuminate\Support\Facades\Broadcast;
use Illuminate\Support\Facades\DB;

Broadcast::channel('room.{id}', fn ($user, $id) => $user->hasVerifiedEmail() && DB::table('session_participants')->where(['game_session_id' => $id, 'user_id' => $user->id])->where('state', '!=', 'removed_no_show')->exists());
