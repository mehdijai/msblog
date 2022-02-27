@component('components.mail-template')
<div class="row">
<h3>Hi {{$subscriber['name']}} 👋🏽</h3>
<p>
    It seems that you  subscribed to our newsletter! <br>
    In order to complete the subscription you have to confirm your email.
</p>
</div>

<div align="center" class="row">
<a href="{{$subscriber['confirm_url']}}" class="button">Confirm my email</a>
</div>

<div class="row">
<i>The link is valid only for 24h</i>
</div>
@endcomponent