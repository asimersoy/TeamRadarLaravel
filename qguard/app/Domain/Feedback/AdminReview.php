<?php

namespace App\Domain\Feedback;

use App\Domain\Parties\SocialService;
use App\Models\User;
use Illuminate\Support\Facades\DB;

final class AdminReview
{
    public function authorize(User $actor): void
    {
        abort_unless($actor->hasVerifiedEmail() && $actor->fresh()->admin_cleared, 403);
    }

    public function audit(User $actor, ?int $caseId, string $action, array $context = []): void
    {
        $this->authorize($actor);
        DB::table('admin_access_events')->insert(['actor_id' => $actor->id, 'case_id' => $caseId, 'action' => $action, 'context' => json_encode($context), 'created_at' => now()]);
    }

    public function review(User $actor, int $caseId, int $expectedVersion, string $status, string $note): void
    {
        $this->authorize($actor);
        validator(compact('status', 'note'), ['status' => 'in:open,reviewed', 'note' => 'nullable|string|max:4000'])->validate();
        DB::transaction(function () use ($actor, $caseId, $expectedVersion, $status, $note) {
            $case = DB::table('moderation_cases')->where('id', $caseId)->lockForUpdate()->first();
            abort_unless($case, 404);
            SocialService::require($case->version === $expectedVersion, 'New evidence or another review changed this case. Reload it before reviewing.');
            DB::table('moderation_cases')->where('id', $caseId)->update(['status' => $status, 'review_note' => $note, 'version' => $case->version + 1, 'updated_at' => now()]);
            $this->audit($actor, $caseId, 'review', ['status' => $status, 'previous_version' => $expectedVersion]);
        });
    }
}
