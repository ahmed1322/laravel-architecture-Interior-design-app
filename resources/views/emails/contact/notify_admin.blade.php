@component('mail::message')
<div><strong>From:</strong> {{ $data['name'] }}</div>
<div><strong>Email:</strong> {{ $data['email'] }}</div>
<hr>
<strong>Message:</strong>
<div><p>{{ $data['message'] }}</p></div>
@endcomponent
