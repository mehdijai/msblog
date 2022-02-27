@component('components.mail-template')
<div class="row">
<h3>From {{$name}} | {{$email}}</h1>
<p>
{{$message}}
</p>
</div>
@endcomponent