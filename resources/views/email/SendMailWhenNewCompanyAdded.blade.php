@component('mail::message')
# Introduction

The body of your message.
<br>
Testing notification mail with markdown mail and ques.

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
