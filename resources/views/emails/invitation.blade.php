@component('mail::message')
# Gentle Invitation

We are inviting you to register on our site. Please click below button to register.

@component('mail::button', ['url' => $details['url']])
Signup
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
