<?php

namespace App\Http\Controllers;

use App\Mail\BookingConfirmation;
use App\Mail\NewMailReceived;
use App\Models\Resort;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class BookingController extends Controller
{

    public function index()
    {
        $bookings = Booking::with('resort')->latest()->paginate();
        return view('bookings.index', compact('bookings'));
    }


    public function create(Resort $resort)
    {
        return view('bookings.create', compact('resort'));
    }


    public function store(Request $request, Resort $resort)
    {
        // Checking Date exits or not
        $bookingExits = Booking::where('resort_id', $request->resort_id)
            ->whereBetween('checkin', [$request->checkin, $request->checkout])
            ->orWhereBetween('checkout', [$request->checkin, $request->checkout])
            ->orWhere(function ($query) use ($request) {
                $query->where('checkin', '<=', $request->checkin)
                    ->where('checkout', '>=', $request->checkout);
            })->first();

        if ($bookingExits) {
            return view('datecheck.error');
        } else {
            $valid = $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'email', 'max:255'],
                'phone' => ['required', 'digits:11'],
                'checkin' => ['required', 'date', 'after_or_equal:today'],
                'checkout' => ['required', 'date', 'after_or_equal:checkin'],
            ]);

            $booking = $resort->bookings()->create($valid);

            $user = User::first();
            if ($booking) {
                // send mail
                try {
                    Mail::to($booking->email)->send(new BookingConfirmation($booking));
                    Mail::to($user->email)->send(new NewMailReceived($booking, $user));
                } catch (\Exception $exception) {
                    echo $exception-> getMessage();
                }
                return redirect('/')->with('message', ' Booking Complete Successfully');
            }
            return back()->with('error', 'Somethings Went Wrong');
        }
    }


    public function show(Resort $resort, Booking $booking)
    {
        //
    }


    public function edit(Resort $resort, Booking $booking)
    {
        //
    }

    public function update(Request $request, Resort $resort, Booking $booking)
    {
        //
    }


    // public function destroy(Resort $resort, Booking $booking)
    // {
    //     $booking = Booking::find($booking->id);
    //     $booking->destroy();

    //     return back();
    // }
}
