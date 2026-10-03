@props(['sessions'])
@if($sessions->isNotEmpty())<section class="notice"><h2>Outstanding feedback</h2><p>You can finalize or skip these sessions without blocking your next queue.</p><div class="actions">@foreach($sessions as $sessionId)<a href="{{ route('feedback',$sessionId) }}">Feedback for session #{{ $sessionId }}</a>@endforeach</div></section>@endif
