@component('mail::message')
# Introduction
Hello {{$user->name}}
The body of your message.

@component('mail::button', ['url' => route('verify_email', $user->email_verification_code)])
Verify
@endcomponent
<p><a href="{{route('verify_email', $user->email_verification_code)}}">
        {{route('verify_email', $user->email_verification_code)}}
    </a></p>
Thanks,<br>
{{ config('app.name') }}
@endcomponent
