@component('mail::message')
# New Sale

Customer Details:\
Name: {{ $user->getFullName() }}\
Purchased Program (EN): {{ $program->getTranslation('title', 'en') }}\
Purchased Program (AR): {{ $program->getTranslation('title', 'ar') }}\
Program Language: {{ $program->getLanguage() }}\
Email: {{ $user->email }}\
Phone Number: {{ $user->phone_number }}

Thanks,<br>
{{ config('app.name') }}
@endcomponent