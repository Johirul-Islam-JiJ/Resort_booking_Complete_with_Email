<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Booking;
use App\Models\User;


class NewMailReceived extends Mailable
{
    use Queueable, SerializesModels;
    public $booking;
    public $user;

    public function __construct(Booking $booking, User $user)
    {
        $this->booking = $booking;
        $this->user = $user;
    }

    public function build()
    {
        return $this->markdown('mails.new-booking-received');
    }
}
