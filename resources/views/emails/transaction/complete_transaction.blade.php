@component('mail::message')
# Confirm Transaction

Member has made a donation, please confirm if you have received it.

@component( 'mail::button', [ 'url' => $transaction ])
Confirm
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
