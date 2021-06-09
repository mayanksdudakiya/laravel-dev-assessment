@component('mail::message')
# Verify OTP

You OTP is: {{ $details['otp'] }}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
