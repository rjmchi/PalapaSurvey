@component('mail::message')
# Introduction

A new survey question has been proposed.
{{$name}}

@component('mail::button', ['url' => ''])
Answer the survey
@endcomponent

Thanks,<br>
The Los Palmares BOD
@endcomponent
