<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('handle', 24)->nullable()->unique();
            $table->string('riot_id', 80)->nullable();
            $table->string('shard', 10)->default('eu');
            $table->string('language', 10)->default('en');
            $table->unsignedSmallInteger('stated_rank')->nullable();
            $table->boolean('competitive_access')->default(false);
            $table->boolean('admin_cleared')->default(false);
            $table->boolean('is_synthetic')->default(false);
        });
        DB::statement('CREATE UNIQUE INDEX users_email_normalized_unique ON users (lower(email))');
        DB::statement('CREATE UNIQUE INDEX users_handle_normalized_unique ON users (lower(handle))');
        DB::statement('ALTER TABLE users ADD CONSTRAINT stated_rank_bounds CHECK (stated_rank BETWEEN 1 AND 25)');
        Schema::create('honor_states', function (Blueprint $table) {
            $table->foreignId('user_id')->primary()->constrained('users');
            $table->decimal('honor_score', 14, 8)->default(50);
            $table->decimal('smoothed_raw_rating_reference', 14, 8)->nullable();
            $table->unsignedBigInteger('eligible_rating_count')->default(0);
            $table->string('calculation_version')->default('honor-v1');
            $table->timestampsTz();
        });
        DB::statement('ALTER TABLE honor_states ADD CONSTRAINT honor_bounds CHECK (honor_score BETWEEN 0 AND 100 AND (smoothed_raw_rating_reference IS NULL OR smoothed_raw_rating_reference BETWEEN 0 AND 100) AND eligible_rating_count >= 0)');
        Schema::create('friendships', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_low')->constrained('users');
            $table->foreignId('user_high')->constrained('users');
            $table->foreignId('requester_id')->constrained('users');
            $table->string('state')->default('pending');
            $table->timestampsTz();
            $table->unique(['user_low', 'user_high']);
        });
        DB::statement('ALTER TABLE friendships ADD CONSTRAINT friend_order CHECK (user_low < user_high AND requester_id IN (user_low, user_high))');
        Schema::create('parties', function (Blueprint $table) {
            $table->id();
            $table->foreignId('owner_id')->constrained('users');
            $table->string('state')->default('idle')->index();
            $table->string('shard', 10);
            $table->string('language', 10);
            $table->string('mode')->default('competitive');
            $table->unsignedInteger('version')->default(1);
            $table->timestampsTz();
        });
        Schema::create('party_memberships', function (Blueprint $table) {
            $table->id();
            $table->foreignId('party_id')->constrained('parties');
            $table->foreignId('user_id')->constrained('users');
            $table->boolean('ready')->default(false);
            $table->timestampTz('joined_at');
            $table->timestampTz('left_at')->nullable();
        });
        DB::statement('CREATE UNIQUE INDEX current_party_membership ON party_memberships (user_id) WHERE left_at IS NULL');
        Schema::create('party_invitations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('party_id')->constrained('parties');
            $table->foreignId('recipient_id')->constrained('users');
            $table->string('state')->default('pending');
            $table->timestampsTz();
            $table->unique(['party_id', 'recipient_id']);
        });
        Schema::create('active_participations', function (Blueprint $table) {
            $table->foreignId('user_id')->primary()->constrained('users');
            $table->foreignId('party_id')->nullable()->constrained('parties');
            // Foreign key is added with game_sessions at S3, not Laravel login sessions.
            $table->unsignedBigInteger('game_session_id')->nullable()->index();
        });
        DB::statement('ALTER TABLE active_participations ADD CONSTRAINT exactly_one_active_place CHECK (num_nonnulls(party_id, game_session_id) = 1)');
        DB::table('users')->orderBy('id')->each(function ($user) {
            DB::table('honor_states')->insert(['user_id' => $user->id, 'created_at' => now(), 'updated_at' => now()]);
        });
    }

    public function down(): void
    {
        throw new LogicException('Use forward migrations; business evidence is retained.');
    }
};
