@component('mail::message')

Hello {{$user->name}}
Please click the following link to verify.

@component('mail::button', ['url' => route('verify_email', $user->email_verification_code)])
Verify
@endcomponent
<p><a href="{{route('verify_email', $user->email_verification_code)}}">
        {{route('verify_email', $user->email_verification_code)}}
    </a></p>
Thanks,<br>
{{ config('app.name') }}
@endcomponent
