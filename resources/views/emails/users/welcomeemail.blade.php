@component('mail::message')
# Welcome to {{ config('app.name') }}

## Registered Details.

#### ** Name: ** {{ $user->name }} {{ $user->surname }}.
#### ** Email: ** {{ $user->email }}.
#### ** Password: **  *********.

#### ** VERIFICATION CODE: **  {{ $user->verification_code }}

### You will need this link to send to your friends.

#### ** REFFERAL LINK: **  <a href="{{ url('/join') }}/{{ $user->referral_code }}">{{ url('/join') }}/{{ $user->referral_code }}</a>

@component('mail::button', ['url' => url('/') ])
Get Started
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
