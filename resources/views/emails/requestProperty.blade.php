@component('mail::message')

# Request for property {{$propertyTitle}}

{{$body}}

Get in touch @: {{$email}} 

@component('mail::button', ['url' => "http://newvostan.test/property/$property"])
See Requested
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent