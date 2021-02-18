@component('mail::message')
<div>
    <h3>hey,waht`s up {{ $post_author }}</h3>
</div>
<div>
    <h4>You Have New Comment on : {{ $post_title }}</h4>
    <h4>From {{ $comment_owner }}</h4>
</div>
<hr>
<p>{{ $comment }}</p>

@component('mail::button', ['url' => $post_url, 'color' => 'success'])
View Post
@endcomponent

@endcomponent
