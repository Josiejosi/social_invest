@component('mail::message')
# Confirm Transaction

Member has made a donation of {{ transaction->amount }} USD, please confirm if you have received it.

@component( 'mail::button', [ 'url' => url( '/complete_contribution/'.{{$transaction->id}} ) ])
Confirm
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
