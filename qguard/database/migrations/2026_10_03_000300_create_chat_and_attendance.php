<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('chat_messages', function (Blueprint $t) {
            $t->id();
            $t->foreignId('game_session_id')->constrained('game_sessions');
            $t->foreignId('sender_id')->constrained('users');
            $t->uuid('client_message_id');
            $t->text('body');
            $t->timestampTz('created_at');
            $t->unique(['game_session_id', 'sender_id', 'client_message_id']);
            $t->index(['game_session_id', 'id']);
        });
        Schema::create('no_show_requests', function (Blueprint $t) {
            $t->id();
            $t->foreignId('game_session_id')->constrained('game_sessions');
            $t->foreignId('target_id')->constrained('users');
            $t->string('state')->default('voting');
            $t->timestampTz('response_deadline')->nullable();
            $t->timestampsTz();
        });
        DB::statement("CREATE UNIQUE INDEX one_open_no_show ON no_show_requests (game_session_id) WHERE state IN ('voting','responding')");
        Schema::create('no_show_votes', function (Blueprint $t) {
            $t->id();
            $t->foreignId('no_show_request_id')->constrained('no_show_requests');
            $t->foreignId('voter_id')->constrained('users');
            $t->timestampTz('created_at');
            $t->unique(['no_show_request_id', 'voter_id']);
        });
    }

    public function down(): void
    {
        throw new LogicException('Forward migrations only.');
    }
};
