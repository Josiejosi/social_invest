@component('mail::message')
# Welcome to {{ config('app.name') }}

## Registered Details.

** Name: ** {{ $user->name }} {{ $user->surname }}.
** Cell: ** {{ $user->cell_phone_number }}.
** Email: ** {{ $user->email }}.
** Password: **  *********.

** VERIFICATION CODE: **  {{ $user->verification_code }}

### You will need this code to send to your friends.

** REFFERAL CODE: **  {{ $user->referral_code }}

@component('mail::button', ['url' => url('/') ])
Get Started
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
