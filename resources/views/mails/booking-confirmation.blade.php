@component('mail::message')
# Hello, {{ $booking->name }}!!

Your resort Booking is success!! {{ $booking->resort->date }}, from{{ $booking->checkin }} to {{ $booking->checkout }}

@component('mail::table')
| Resort Name    | Price Per Day    | Location |
| :-------------:  |:-------------:   | :--------:|
| {{ $booking->resort->name }}       | {{ $booking->resort->price }}         | {{ $booking->resort->location }}      |
@endcomponent


Thanks,<br>
{{ config('app.name') }}
@endcomponent
