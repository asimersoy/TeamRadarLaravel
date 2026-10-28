<?php

namespace App\Http\Controllers;

use App\Domain\Parties\MembershipTransaction;
use App\Domain\Parties\SocialService;
use App\Domain\Review\ReviewSession;
use App\Domain\Sessions\SessionService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\RateLimiter;

final class ChatController extends Controller
{
    public function index(Request $request, int $session)
    {
        app(ReviewSession::class)->due();
        $service = app(SessionService::class);
        $participant = $service->participant($request->user(), $session);
        $request->validate(['before' => 'nullable|integer|min:1']);
        $query = DB::table('chat_messages as m')->join('session_participants as p', fn ($join) => $join->on('p.user_id', '=', 'm.sender_id')->on('p.game_session_id', '=', 'm.game_session_id'))->where('m.game_session_id', $session);
        if ($request->filled('before')) {
            $query->where('m.id', '<', $request->integer('before'));
        }
        $messages = $query->orderByDesc('m.id')->limit(50)->get(['m.id', 'm.body', 'm.created_at', 'p.handle']);

        return response()->json(['messages' => $messages->reverse()->values(), 'older_cursor' => $messages->count() === 50 ? $messages->last()->id : null, 'can_post' => $service->canPost(DB::table('game_sessions')->find($session), $participant)]);
    }

    public function store(Request $request, int $session)
    {
        app(ReviewSession::class)->due();
        $data = $request->validate(['body' => ['required', 'string', 'max:2000', function ($attribute, $value, $fail) {
            if (preg_match('/(?:javascript|data|vbscript)\s*:/iu', $value)) {
                $fail('Script and embedded-data URLs are not allowed.');
            }
        }], 'client_message_id' => 'required|uuid']);
        $id = MembershipTransaction::run(function () use ($request, $session, $data) {
            $room = DB::table('game_sessions')->where('id', $session)->lockForUpdate()->first();
            $service = app(SessionService::class);
            $p = $service->participant($request->user(), $session);
            $existing = DB::table('chat_messages')->where(['game_session_id' => $session, 'sender_id' => $p->user_id, 'client_message_id' => $data['client_message_id']])->first();
            if ($existing) {
                SocialService::require($existing->body === $data['body'], 'Retry this message with its original text.');

                return $existing->id;
            }
            SocialService::require($service->canPost($room, $p), 'This room is read-only for you.');
            $key = 'chat:'.$p->user_id;
            abort_if(RateLimiter::tooManyAttempts($key, 30), 429);
            RateLimiter::hit($key, 60);
            $id = DB::table('chat_messages')->insertGetId($data + ['game_session_id' => $session, 'sender_id' => $p->user_id, 'created_at' => now()]);
            $service->changed($session);

            return $id;
        });

        return response()->json(['id' => $id, 'status' => 'sent']);
    }
}
