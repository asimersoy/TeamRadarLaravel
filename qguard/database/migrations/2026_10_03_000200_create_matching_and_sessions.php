<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('queue_entries', function (Blueprint $t) {
            $t->id();
            $t->foreignId('party_id')->constrained('parties');
            $t->string('state')->default('waiting');
            $t->string('shard', 10);
            $t->string('language', 10);
            $t->string('mode')->default('competitive');
            $t->unsignedInteger('party_version');
            $t->jsonb('roster');
            $t->timestampTz('queued_at');
            $t->jsonb('search_cursor')->nullable();
            $t->string('search_status')->default('not_scanned');
            $t->timestampsTz();
            $t->index(['state', 'shard', 'language', 'id']);
        });
        DB::statement("CREATE UNIQUE INDEX one_waiting_entry ON queue_entries (party_id) WHERE state = 'waiting'");
        Schema::create('matcher_progress', function (Blueprint $t) {
            $t->string('bucket')->primary();
            $t->unsignedBigInteger('anchor_cursor')->default(0);
            $t->timestampsTz();
        });
        Schema::create('game_sessions', function (Blueprint $t) {
            $t->id();
            $t->string('state')->default('active');
            $t->string('shard', 10);
            $t->string('language', 10);
            $t->string('mode')->default('competitive');
            $t->foreignId('coordinator_id')->constrained('users');
            $t->string('compatibility_version')->default('valorant-five-stack-v1');
            $t->timestampTz('feedback_started_at')->nullable();
            $t->timestampTz('feedback_deadline')->nullable()->index();
            $t->timestampTz('settled_at')->nullable();
            $t->unsignedBigInteger('version')->default(1);
            $t->timestampsTz();
        });
        Schema::create('session_participants', function (Blueprint $t) {
            $t->id();
            $t->foreignId('game_session_id')->constrained('game_sessions');
            $t->foreignId('user_id')->constrained('users');
            $t->foreignId('origin_party_id')->constrained('parties');
            $t->string('handle', 24);
            $t->string('riot_id', 80);
            $t->unsignedSmallInteger('rank_snapshot');
            $t->string('rank_source')->default('self_declared');
            $t->string('ownership')->default('unverified');
            $t->decimal('honor_snapshot', 14, 8);
            $t->string('state')->default('matched');
            $t->timestampTz('acknowledged_at')->nullable();
            $t->timestampTz('ended_at')->nullable();
            $t->timestampsTz();
            $t->unique(['game_session_id', 'user_id']);
        });
        Schema::table('active_participations', fn (Blueprint $t) => $t->foreign('game_session_id')->references('id')->on('game_sessions'));
    }

    public function down(): void
    {
        throw new LogicException('Forward migrations only.');
    }
};
