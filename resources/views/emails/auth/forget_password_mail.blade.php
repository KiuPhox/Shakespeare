@component('mail::message')
Hello {{$user_name}}
The body of your message.

@component('mail::button', ['url' => route('getResetPassword', $reset_code)])
Click here to reset your password
@endcomponent
<p>Or click the following link</p>
<p>
    <a href="{{route('getResetPassword', $reset_code)}}">{{route('getResetPassword', $reset_code)}}</a>
</p>
Thanks,<br>
{{ config('app.name') }}
@endcomponent
