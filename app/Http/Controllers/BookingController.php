<?php

namespace App\Http\Controllers;

use App\Booking;
use App\Hotel;
use App\User;
use App\Room;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function store(Request $request) {
        $request->validate([
            'check_in_date' => 'required',
            'check_in_time' => 'required',
            'check_out_date' => 'required',
            'check_out_time' => 'required',
            'rooms' => 'required'
        ]);

        $booking = Booking::create([
            'check_in_date' => $request->input('check_in_date'),
            'check_in_time' => $request->input('check_in_time'),
            'check_out_date' => $request->input('check_out_date'),
            'check_out_time' => $request->input('check_out_time'),
            'user_id' => auth()->user()->id,
            'hotel_id' => $request->input('hotel_id'),
            'adults' => $request->input('adults'),
            'children' => $request->input('children'),
            'total_price' => array_sum(collect(json_decode($request->input('rooms'), true))->pluck('total_amount')->toArray()),
            'number_of_rooms' => $request->input('number_of_rooms'),
            'payment_status' => false,
            'rooms' => $request->input('rooms')
        ]);

        return redirect()->route('booking.show', ['booking' => $booking]);
    }

    public function show($id) {
        $booking = Booking::where('id', $id)->first();
        $hotel = Hotel::find($booking->hotel_id)->first();
        $user = User::find($booking->user_id)->first();
        $rms = json_decode($booking->rooms, true);
        $rooms = Room::find(array_keys($rms))->toArray();
        
        return view('backend.booking.show')->with([
            'booking' => $booking,
            'hotel' => $hotel,
            'user' => $user,
            'rooms' => $rooms,
            'number_of_rooms' => $rms
            ]);
    }
}
