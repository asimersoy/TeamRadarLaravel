<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('feedback_submissions', function (Blueprint $t) {
            $t->id();
            $t->foreignId('game_session_id')->constrained('game_sessions');
            $t->foreignId('participant_id')->constrained('session_participants');
            $t->boolean('skipped')->default(false);
            $t->boolean('self_admitted_early_leave')->default(false);
            $t->timestampTz('finalized_at');
            $t->unique(['game_session_id', 'participant_id']);
        });
        Schema::create('behavior_ratings', function (Blueprint $t) {
            $t->id();
            $t->foreignId('submission_id')->constrained('feedback_submissions');
            $t->foreignId('reviewer_participant_id')->constrained('session_participants');
            $t->foreignId('recipient_participant_id')->constrained('session_participants');
            $t->unsignedSmallInteger('communication');
            $t->unsignedSmallInteger('sportsmanship');
            $t->unsignedSmallInteger('effort');
            $t->unique(['submission_id', 'recipient_participant_id']);
        });
        DB::statement('ALTER TABLE behavior_ratings ADD CONSTRAINT rating_bounds CHECK (communication BETWEEN 1 AND 10 AND sportsmanship BETWEEN 1 AND 10 AND effort BETWEEN 1 AND 10 AND reviewer_participant_id <> recipient_participant_id)');
        Schema::create('conduct_reports', function (Blueprint $t) {
            $t->id();
            $t->foreignId('game_session_id')->constrained('game_sessions');
            $t->foreignId('reporter_participant_id')->constrained('session_participants');
            $t->foreignId('target_participant_id')->constrained('session_participants');
            $t->string('category');
            $t->text('note')->nullable();
            $t->boolean('late')->default(false);
            $t->timestampTz('created_at');
            $t->unique(['game_session_id', 'reporter_participant_id', 'target_participant_id', 'category', 'late'], 'distinct_report');
        });
        Schema::create('rank_observations', function (Blueprint $t) {
            $t->id();
            $t->foreignId('submission_id')->constrained('feedback_submissions');
            $t->foreignId('target_participant_id')->constrained('session_participants');
            $t->string('observation');
            $t->unique(['submission_id', 'target_participant_id']);
        });
        Schema::create('honor_settlements', function (Blueprint $t) {
            $t->id();
            $t->foreignId('game_session_id')->unique()->constrained('game_sessions');
            $t->string('calculation_version');
            $t->jsonb('parameters');
            $t->jsonb('exclusions');
            $t->timestampTz('created_at');
        });
        Schema::create('honor_applications', function (Blueprint $t) {
            $t->id();
            $t->foreignId('settlement_id')->constrained('honor_settlements');
            $t->foreignId('rating_id')->unique()->constrained('behavior_ratings');
            $t->foreignId('recipient_id')->constrained('users');
            $t->decimal('input_rating', 14, 8);
            $t->jsonb('before_state');
            $t->jsonb('after_state');
            $t->timestampTz('created_at');
        });
        Schema::create('moderation_cases', function (Blueprint $t) {
            $t->id();
            $t->foreignId('game_session_id')->unique()->constrained('game_sessions');
            $t->string('status')->default('open');
            $t->boolean('has_late_evidence')->default(false);
            $t->jsonb('automatic_invalidations')->nullable();
            $t->text('review_note')->nullable();
            $t->unsignedBigInteger('version')->default(1);
            $t->timestampsTz();
        });
        Schema::create('admin_access_events', function (Blueprint $t) {
            $t->id();
            $t->foreignId('actor_id')->constrained('users');
            $t->foreignId('case_id')->nullable()->constrained('moderation_cases');
            $t->string('action');
            $t->jsonb('context')->nullable();
            $t->timestampTz('created_at');
        });
    }

    public function down(): void
    {
        throw new LogicException('Forward migrations only.');
    }
};
