<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Password as PasswordRule;
use Illuminate\Validation\ValidationException;

final class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->merge(['email' => strtolower(trim($request->string('email'))), 'handle' => strtolower(trim($request->string('handle')))]);
        $data = $request->validate(['email' => 'required|email|max:254|unique:users', 'handle' => 'required|regex:/^[a-z0-9_]{3,24}$/|unique:users', 'password' => ['required', 'confirmed', PasswordRule::min(12)->max(128)]]);
        $user = DB::transaction(fn () => User::create($data + ['name' => $data['handle']]));
        event(new Registered($user));
        Auth::login($user);
        $request->session()->regenerate();

        return redirect()->route('verification.notice');
    }

    public function login(Request $request)
    {
        $request->merge(['email' => strtolower(trim($request->string('email')))]);
        $credentials = $request->validate(['email' => 'required|email', 'password' => 'required|string|max:128']);
        if (! Auth::attempt($credentials)) {
            throw ValidationException::withMessages(['email' => __('These credentials do not match our records.')]);
        }
        $request->session()->regenerate();

        return redirect()->intended(route('dashboard'));
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function verify(EmailVerificationRequest $request)
    {
        $request->fulfill();

        return redirect()->route('dashboard')->with('status', 'Email verified. Complete your game profile before queueing.');
    }

    public function resend(Request $request)
    {
        if (! $request->user()->hasVerifiedEmail()) {
            $request->user()->sendEmailVerificationNotification();
        }

        return back()->with('status', 'A verification email has been sent.');
    }

    public function forgot(Request $request)
    {
        $data = $request->validate(['email' => 'required|email']);
        Password::sendResetLink(['email' => strtolower($data['email'])]);

        return back()->with('status', 'If that account exists, a reset link has been sent.');
    }

    public function reset(Request $request)
    {
        $data = $request->validate(['token' => 'required', 'email' => 'required|email', 'password' => ['required', 'confirmed', PasswordRule::min(12)->max(128)]]);
        $status = Password::reset($data, function (User $user, string $password) {
            $user->forceFill(['password' => Hash::make($password), 'remember_token' => Str::random(60)])->save();
            DB::table('sessions')->where('user_id', $user->id)->delete();
            event(new PasswordReset($user));
        });
        if ($status !== Password::PasswordReset) {
            throw ValidationException::withMessages(['email' => __($status)]);
        }

        return redirect()->route('login')->with('status', 'Password reset. Sign in with your new password.');
    }
}
