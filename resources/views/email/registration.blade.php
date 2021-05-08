@component('mail::message')
# Hello {{ request()->fname }} {{ request()->lname }}

Your Registration was successful and your account has been created.
We require that you kindly verify this email address to be sure you are the one that actually registered.

@component('mail::button', ['url' => "$url"])
Verify Email
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
