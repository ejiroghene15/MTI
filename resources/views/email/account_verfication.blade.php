@component('mail::message')
# Hello {{ auth()->user()->first_name }} {{ auth()->user()->last_name }}

Kindly verify your email address to prevent your account from being suspended.

@component('mail::button', ['url' => "$url"])
Verify Email
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
