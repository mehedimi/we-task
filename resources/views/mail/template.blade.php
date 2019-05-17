@component('mail::message')
# Introduction

{{ $mail->body }}



Thanks,<br>
{{ config('app.name') }}
@endcomponent
