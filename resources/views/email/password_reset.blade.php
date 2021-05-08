@component('mail::message')
# Hello,

A request for password reset was made on your account. Click on the liink below to reset your password else kindly
ignore this message if you did not make this request.

## This link will expire in 30 minutes.

@component('mail::button', ['url' => "$url"])
Reset Password
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
