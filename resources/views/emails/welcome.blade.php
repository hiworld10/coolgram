@component('mail::message')
# Welcome to CoolGram

Thanks for registering on our site. We hope you enjoy!

@component('mail::button', ['url' => 'http://coolgram.localhost'])
Go to CoolGram
@endcomponent

Thanks,<br>
The CoolGram Team
{{-- {{ config('app.name') }} --}}
@endcomponent
