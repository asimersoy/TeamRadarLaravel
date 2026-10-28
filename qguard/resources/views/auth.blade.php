<x-layout :title="__(['login'=>'Sign in', 'register'=>'Create account', 'verify'=>'Verify email', 'forgot'=>'Reset password', 'reset'=>'Reset password'][$screen])">
<section class="panel auth-panel"><p class="eyebrow">{{ __('Your next team starts here') }}</p>
<h1>{{ __(['login'=>'Welcome back', 'register'=>'Create your account', 'verify'=>'Check your email', 'forgot'=>'Reset your password', 'reset'=>'Choose a new password'][$screen]) }}</h1>
<x-errors />
@if($screen === 'register')<p class="notice">{{ __('QGuard is for players aged 18 and over.') }}</p>@endif
@if($screen === 'login')
<div class="notice">{{ __('Normal matchmaking awaits Riot account linking. Explore the planned experience with fictional players.') }}</div>
<p><a class="button secondary" href="{{ route('guest.review') }}#welcome">{{ __('Continue as guest') }}</a></p><p class="muted">{{ __('The interactive design walkthrough is in English.') }}</p>
@endif
@if($screen === 'verify')
<p>{{ __('Verify your email before accessing QGuard. In this private build, email arrives in the local mail inbox.') }}</p>
<form method="post" action="{{ route('verification.send') }}">@csrf<button>{{ __('Resend verification email') }}</button></form>
@else
<form method="post" action="{{ ['login'=>route('login'), 'register'=>route('register'), 'forgot'=>route('password.email'), 'reset'=>route('password.store')][$screen] }}">
@csrf
@if($screen === 'register')<label>{{ __('Public handle') }}<input name="handle" required minlength="3" maxlength="24" pattern="[a-zA-Z0-9_]+" autocomplete="username" value="{{ old('handle') }}"><small>{{ __('3–24 letters, numbers or underscores. Friends find you by this handle.') }}</small></label>@endif
<label>{{ __('Email') }}<input type="email" name="email" autocomplete="email" required value="{{ old('email', request('email')) }}"></label>
@if($screen !== 'forgot')
<label>{{ __('Password') }}<input type="password" name="password" autocomplete="{{ $screen === 'login' ? 'current-password' : 'new-password' }}" required @if($screen !== 'login') minlength="12" @endif maxlength="128"></label>
@if($screen !== 'login')<label>{{ __('Confirm password') }}<input type="password" name="password_confirmation" autocomplete="new-password" required></label><small>{{ __('Use at least 12 characters.') }}</small>@endif
@endif
@if($screen === 'reset')<input type="hidden" name="token" value="{{ request()->route('token') }}">@endif
<button>{{ __(['login'=>'Sign in', 'register'=>'Create account', 'forgot'=>'Send reset link', 'reset'=>'Save new password'][$screen]) }}</button>
</form>
@endif
<div class="actions"><a href="{{ route('login') }}">{{ __('Sign in') }}</a><a href="{{ route('register') }}">{{ __('Create account') }}</a><a href="{{ route('password.request') }}">{{ __('Forgot password?') }}</a></div>
</section>
</x-layout>
