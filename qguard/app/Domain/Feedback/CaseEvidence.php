<?php

namespace App\Domain\Feedback;

use Illuminate\Support\Facades\DB;

final class CaseEvidence
{
    public static function flag(int $sessionId, bool $late = false, ?array $invalidations = null): void
    {
        $case = DB::table('moderation_cases')->where('game_session_id', $sessionId)->lockForUpdate()->first();
        $fields = ['status' => 'open', 'has_late_evidence' => $late || ($case?->has_late_evidence ?? false), 'updated_at' => now()];
        if ($invalidations !== null) {
            $fields['automatic_invalidations'] = json_encode($invalidations);
        }
        if ($case) {
            $fields['version'] = $case->version + 1;
            DB::table('moderation_cases')->where('id', $case->id)->update($fields);
        } else {
            DB::table('moderation_cases')->insert($fields + ['game_session_id' => $sessionId, 'created_at' => now()]);
        }
    }
}
