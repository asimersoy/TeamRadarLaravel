<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('game_sessions', function (Blueprint $t) {
            $t->string('workflow_version')->default('first-pass-v1');
            $t->timestampTz('end_deadline')->nullable()->index();
            $t->timestampTz('closed_at')->nullable();
            $t->string('closure_reason')->nullable();
        });
        Schema::create('session_end_requests', function (Blueprint $t) {
            $t->id();
            $t->foreignId('game_session_id')->constrained('game_sessions');
            $t->foreignId('user_id')->constrained('users');
            $t->timestampTz('created_at');
            $t->unique(['game_session_id', 'user_id']);
        });
        Schema::create('review_feedback_cards', function (Blueprint $t) {
            $t->id();
            $t->foreignId('game_session_id')->constrained('game_sessions');
            $t->foreignId('author_id')->constrained('users');
            $t->foreignId('recipient_id')->constrained('users');
            $t->unsignedSmallInteger('overall')->nullable();
            $t->unsignedSmallInteger('communication')->nullable();
            $t->unsignedSmallInteger('play_style')->nullable();
            $t->timestampTz('submitted_at')->nullable();
            $t->timestampTz('created_at');
            $t->unique(['game_session_id', 'author_id', 'recipient_id'], 'one_review_card');
            $t->index(['author_id', 'submitted_at']);
        });
        DB::statement('ALTER TABLE review_feedback_cards ADD CONSTRAINT review_card_bounds CHECK (author_id <> recipient_id AND (overall IS NULL OR overall BETWEEN 1 AND 10) AND (communication IS NULL OR communication BETWEEN 0 AND 100) AND (play_style IS NULL OR play_style BETWEEN 0 AND 100) AND ((submitted_at IS NULL AND overall IS NULL AND communication IS NULL AND play_style IS NULL) OR (submitted_at IS NOT NULL AND overall IS NOT NULL)))');
        Schema::create('descriptor_states', function (Blueprint $t) {
            $t->id();
            $t->foreignId('user_id')->constrained('users');
            $t->string('dimension');
            $t->decimal('honor_score', 14, 8)->default(50);
            $t->decimal('smoothed_raw_rating_reference', 14, 8)->nullable();
            $t->unsignedBigInteger('eligible_rating_count')->default(0);
            $t->string('calculation_version');
            $t->timestampTz('updated_at');
            $t->unique(['user_id', 'dimension']);
        });
        Schema::create('review_score_applications', function (Blueprint $t) {
            $t->id();
            $t->foreignId('card_id')->constrained('review_feedback_cards');
            $t->foreignId('recipient_id')->constrained('users');
            $t->string('dimension');
            $t->decimal('input_rating', 14, 8);
            $t->string('calculation_version');
            $t->jsonb('parameters');
            $t->string('exclusion_reason')->nullable();
            $t->jsonb('before_state')->nullable();
            $t->jsonb('after_state')->nullable();
            $t->timestampTz('created_at');
            $t->unique(['card_id', 'dimension']);
        });
        Schema::create('session_admissions', function (Blueprint $t) {
            $t->id();
            $t->foreignId('game_session_id')->constrained('game_sessions');
            $t->foreignId('user_id')->constrained('users');
            $t->timestampTz('created_at');
            $t->unique(['game_session_id', 'user_id']);
        });
        Schema::create('party_code_versions', function (Blueprint $t) {
            $t->id();
            $t->foreignId('game_session_id')->constrained('game_sessions');
            $t->foreignId('host_id')->constrained('users');
            $t->unsignedInteger('version');
            $t->string('code', 256);
            $t->timestampTz('created_at');
            $t->unique(['game_session_id', 'version']);
        });
        Schema::create('lobby_discrepancies', function (Blueprint $t) {
            $t->id();
            $t->foreignId('game_session_id')->constrained('game_sessions');
            $t->foreignId('reporter_id')->constrained('users');
            $t->foreignId('target_id')->constrained('users');
            $t->unsignedSmallInteger('claimed_rank');
            $t->string('state')->default('pending');
            $t->timestampTz('created_at');
            $t->timestampTz('resolved_at')->nullable();
        });
        DB::statement("CREATE UNIQUE INDEX one_pending_discrepancy ON lobby_discrepancies (game_session_id) WHERE state = 'pending'");
        Schema::create('lobby_discrepancy_votes', function (Blueprint $t) {
            $t->id();
            $t->foreignId('discrepancy_id')->constrained('lobby_discrepancies');
            $t->foreignId('user_id')->constrained('users');
            $t->boolean('mismatch');
            $t->timestampTz('created_at');
            $t->unique(['discrepancy_id', 'user_id']);
        });
        Schema::create('match_offers', function (Blueprint $t) {
            $t->id();
            $t->string('state')->default('pending');
            $t->timestampTz('deadline')->index();
            $t->foreignId('game_session_id')->nullable()->constrained('game_sessions');
            $t->timestampTz('created_at');
            $t->timestampTz('resolved_at')->nullable();
        });
        Schema::create('match_offer_members', function (Blueprint $t) {
            $t->id();
            $t->foreignId('offer_id')->constrained('match_offers');
            $t->foreignId('queue_entry_id')->constrained('queue_entries');
            $t->foreignId('user_id')->constrained('users');
            $t->boolean('accepted')->nullable();
            $t->timestampTz('responded_at')->nullable();
            $t->unique(['offer_id', 'user_id']);
        });
        Schema::create('rank_confirmations', function (Blueprint $t) {
            $t->id();
            $t->foreignId('user_id')->constrained('users');
            $t->foreignId('party_id')->constrained('parties');
            $t->unsignedInteger('party_version');
            $t->string('identity_snapshot');
            $t->unsignedSmallInteger('observed_rank')->nullable();
            $t->timestampTz('observed_at')->nullable();
            $t->string('source')->default('synthetic_unavailable');
            $t->unsignedSmallInteger('declared_rank');
            $t->timestampTz('confirmed_at');
            $t->foreignId('queue_entry_id')->nullable()->constrained('queue_entries');
        });
    }

    public function down(): void
    {
        throw new LogicException('Additive evidence migration. Use a reviewed forward repair; do not erase records.');
    }
};
