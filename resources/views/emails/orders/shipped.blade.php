@component('mail::message')
# Introduction

The body of your message.
<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi saepe illo aspernatur illum explicabo laudantium. Autem distinctio est fugiat exercitationem sint.</p>

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent