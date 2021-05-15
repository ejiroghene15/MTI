@component('mail::message')
# Hello {{ auth()->user()->first_name }} {{ auth()->user()->last_name }}

Your payment for the course {{ $course }} has been received. 

Best Regards,<br>
{{ config('app.name') }}
@endcomponent
