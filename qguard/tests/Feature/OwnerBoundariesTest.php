<?php

use App\Domain\Feedback\AdminReview;
use App\Livewire\Profile;
use App\Models\User;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use Livewire\Livewire;

uses(RefreshDatabase::class);

it('assigns only one explicitly chosen verified super admin and audits once', function () {
    $owner = User::factory()->create();
    $other = User::factory()->create();
    $unverified = User::factory()->unverified()->create();
    $this->artisan('qguard:assign-super-admin', ['user' => $unverified->id])->assertFailed();
    $this->artisan('qguard:assign-super-admin', ['user' => $owner->id])->assertSuccessful();
    $this->artisan('qguard:assign-super-admin', ['user' => $owner->id])->assertSuccessful();
    $this->artisan('qguard:assign-super-admin', ['user' => $other->id])->assertFailed();
    expect($owner->fresh()->admin_cleared)->toBeTrue()->and($other->fresh()->admin_cleared)->toBeFalse();
    expect(DB::table('admin_access_events')->where('action', 'super_admin_assigned')->count())->toBe(1);
    $this->actingAs($other)->get('/admin/cases')->assertForbidden();
    $this->actingAs($owner)->get('/admin/cases')->assertOk();
});

it('enforces the singleton at the database boundary including direct writes', function () {
    User::factory()->create(['admin_cleared' => true]);
    $other = User::factory()->create();
    expect(fn () => DB::transaction(fn () => DB::table('users')->where('id', $other->id)->update(['admin_cleared' => true])))
        ->toThrow(QueryException::class);
    expect($other->fresh()->admin_cleared)->toBeFalse();
});

it('refuses migration over multiple existing admins without demoting them', function () {
    DB::statement('DROP INDEX users_one_super_admin');
    User::factory()->count(2)->create(['admin_cleared' => true]);
    $migration = require database_path('migrations/2026_10_29_000600_limit_super_admin.php');
    expect(fn () => $migration->up())->toThrow(RuntimeException::class);
    expect(User::where('admin_cleared', true)->count())->toBe(2);
});

it('retains singleton assignment and access audit when rolling the index back and forward', function () {
    $owner = User::factory()->create(['admin_cleared' => true]);
    app(AdminReview::class)->audit($owner, null, 'inbox');
    $migration = require database_path('migrations/2026_10_29_000600_limit_super_admin.php');
    $migration->down();
    $migration->up();
    expect($owner->fresh()->admin_cleared)->toBeTrue();
    expect(DB::table('admin_access_events')->count())->toBe(1);
});

it('switches interface language independently of matching language and restricts redirect destinations', function () {
    $user = User::factory()->readyPlayer()->create(['language' => 'en']);
    $this->actingAs($user)->from('/profile')->post('/interface-language', ['locale' => 'tr'])->assertRedirect('/profile');
    $this->get('/profile')->assertOk()->assertSee('Profil ve ayarlar')->assertSee('lang="tr"', false);
    expect($user->fresh()->language)->toBe('en');
    $this->post('/interface-language', ['locale' => '../invalid'])->assertSessionHasErrors('locale');
    $this->get('/sessions')->assertOk()->assertSee('Henüz oturum yok.');
    $this->from('https://elsewhere.invalid/path')->post('/interface-language', ['locale' => 'en'])->assertRedirect('/');
    $this->get('/profile')->assertSee('Profile &amp; settings', false)->assertSee('lang="en"', false);
});

it('localizes validation and notification without granting age or admin privileges', function () {
    Notification::fake();
    $this->withSession(['interface_locale' => 'tr'])->get('/register')->assertSee('QGuard, 18 yaş ve üzeri oyuncular içindir.')->assertDontSee('name="date_of_birth"', false);
    $this->post('/register', ['email' => 'bad'])->assertSessionHasErrors(['email' => 'E-posta geçerli bir e-posta adresi olmalıdır.']);
    $this->post('/register', ['handle' => 'turkish_player', 'email' => 'tr@example.test', 'password' => 'a-valid-long-password', 'password_confirmation' => 'a-valid-long-password', 'admin_cleared' => true])->assertRedirect('/verify-email');
    $user = User::first();
    expect($user->admin_cleared)->toBeFalse();
    Notification::assertSentTo($user, VerifyEmail::class, fn ($notification) => $notification->locale === 'tr');
});

it('localizes Livewire feedback while retaining exact user handles', function () {
    $user = User::factory()->readyPlayer()->create(['handle' => 'Ready']);
    $this->withSession(['interface_locale' => 'tr'])->actingAs($user)->get('/profile')->assertOk()->assertSee('Ready');
    app()->setLocale('tr');
    Livewire::actingAs($user)->test(Profile::class)->set('handle', 'fresh_handle')->call('saveHandle')
        ->assertSee('Kullanıcı adı güncellendi. Mevcut eşleşmiş kadrolar eski kaydını korur.');
});
