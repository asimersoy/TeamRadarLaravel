<?php

namespace App\Console\Commands;

use App\Domain\Feedback\AdminReview;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class AssignSuperAdmin extends Command
{
    protected $signature = 'qguard:assign-super-admin {user : Existing verified user ID}';

    protected $description = 'Assign the one owner-operated super admin; never replaces an existing administrator';

    public function handle(): int
    {
        if (! ctype_digit((string) $this->argument('user'))) {
            $this->error('Provide an existing verified user ID.');

            return self::FAILURE;
        }

        return DB::transaction(function () {
            // Serialize concurrent operator assignments; the index also protects direct writes.
            DB::statement('LOCK TABLE users IN SHARE ROW EXCLUSIVE MODE');
            $user = User::find($this->argument('user'));
            if (! $user || ! $user->hasVerifiedEmail()) {
                $this->error('The account must exist and have a verified email.');

                return self::FAILURE;
            }
            if (User::where('admin_cleared', true)->whereKeyNot($user->id)->exists()) {
                $this->error('A different super admin is already assigned. No accounts were changed.');

                return self::FAILURE;
            }
            if (! $user->admin_cleared) {
                $user->forceFill(['admin_cleared' => true])->save();
                app(AdminReview::class)->audit($user, null, 'super_admin_assigned');
            }
            $this->info('The selected account is the super admin.');

            return self::SUCCESS;
        });
    }
}
