<x-layout :title="ucfirst(str_replace('-', ' ', $screen))">
<section class="panel auth-panel"><p class="eyebrow">Your next team starts here</p>
<h1>{{ ['login'=>'Welcome back', 'register'=>'Create your account', 'verify'=>'Check your email', 'forgot'=>'Reset your password', 'reset'=>'Choose a new password'][$screen] }}</h1>
<x-errors />
@if($screen === 'verify')
<p>Verify your email before accessing QGuard. In this private build, email arrives in the local mail inbox.</p>
<form method="post" action="{{ route('verification.send') }}">@csrf<button>Resend verification email</button></form>
@else
<form method="post" action="{{ ['login'=>route('login'), 'register'=>route('register'), 'forgot'=>route('password.email'), 'reset'=>route('password.store')][$screen] }}">
@csrf
@if($screen === 'register')<label>Public handle<input name="handle" required minlength="3" maxlength="24" pattern="[a-zA-Z0-9_]+" autocomplete="username" value="{{ old('handle') }}"><small>3–24 letters, numbers or underscores. Friends find you by this handle.</small></label>@endif
<label>Email<input type="email" name="email" autocomplete="email" required value="{{ old('email', request('email')) }}"></label>
@if($screen !== 'forgot')
<label>Password<input type="password" name="password" autocomplete="{{ $screen === 'login' ? 'current-password' : 'new-password' }}" required @if($screen !== 'login') minlength="12" @endif maxlength="128"></label>
@if($screen !== 'login')<label>Confirm password<input type="password" name="password_confirmation" autocomplete="new-password" required></label><small>Use at least 12 characters.</small>@endif
@endif
@if($screen === 'reset')<input type="hidden" name="token" value="{{ request()->route('token') }}">@endif
<button>{{ ['login'=>'Sign in', 'register'=>'Create account', 'forgot'=>'Send reset link', 'reset'=>'Save new password'][$screen] }}</button>
</form>
@endif
<div class="actions"><a href="{{ route('login') }}">Sign in</a><a href="{{ route('register') }}">Create account</a><a href="{{ route('password.request') }}">Forgot password?</a></div>
</section>
</x-layout>
