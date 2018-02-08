@component('mail::message')
# Password Reset

You have requested a password reset link. if this is not you please ignore.

@component('mail::button', [ 'url' => url( '/reset_password' ) ])
Reset Link
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
