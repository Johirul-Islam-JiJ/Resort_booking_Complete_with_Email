@component('mail::message')
# Hello, {{ $user->name }}!!

A new booking has been received for {{ $booking->resort->name }}

@component('mail::table')
|User Name            |Resort Name                  |Date                                                                                 |
|:-------------------:|:---------------------- -:   |:-----------------------------------------------------------------------------------:|
|{{ $booking->name }} | {{ $booking->resort->name }}|{{ $booking->resort->date }} from{{ $booking->checkin }} to {{ $booking->checkout }} |
@endcomponent


@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
