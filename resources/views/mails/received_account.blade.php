@component('mail::message')
# Hello Mr,

Dear {{ $user->name }}, <br>
An account has been created in our platform. Here is your credentials: <br>
@component('mail::table')
| User Email        | Password      |
| :--------------:  |:------------: |
|{{ $user->email }} |{{ $password }}|
@endcomponent

@component('mail::button', ['url' => route('login')])
Login
@endcomponent


Thanks,<br>
{{ config('app.name') }}
@endcomponent
