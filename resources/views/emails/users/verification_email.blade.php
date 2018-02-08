@component('mail::message')
# Account Verification Code

** VERIFICATION CODE: **  {{ $user->verification_code }}

@component('mail::button', ['url' => url( '/login' ) ])
Login
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
