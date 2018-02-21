@component('mail::message')
# BlockChain Wallet

You have a new BlockChain.info wallet.

@component('mail::button', ['url' => url('/wallet')])
Open Wallet
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
