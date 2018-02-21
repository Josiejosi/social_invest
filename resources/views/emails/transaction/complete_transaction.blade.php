@component('mail::message')
# Confirm Transaction

### {{ $sender->name }} {{ $sender->surname }}  has made a contribution of {{ $amount }} USD, please confirm if you have received it.


@component( 'mail::button', [ 'url' => $url ])
	Confirm
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
