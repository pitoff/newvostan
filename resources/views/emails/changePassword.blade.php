@component('mail::message')
# Password-Reset

Please, Click on the link provided below to reset password. <br>Link expires in 5 minutes.

@component('mail::button', ['url' => "http://newvostan.test/update-pass/$token/user/$email"])
Click here
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
