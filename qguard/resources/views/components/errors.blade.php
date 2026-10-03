@if($errors->any())<div class="errors" role="alert" tabindex="-1"><strong>Please check the following</strong><ul>@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>@endif
<x-status />
