@if($errors->any())<div id="validation-errors" class="errors" role="alert" tabindex="-1" data-error-fields="{{ json_encode($errors->keys()) }}"><strong>Please check the following</strong><ul>@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>@endif
<x-status />
