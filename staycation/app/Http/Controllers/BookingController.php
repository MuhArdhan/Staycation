<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Booking;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function store(Request $request) {
        $days = Carbon::parse($request->check_in)
            ->diffInDays($request->check_out);

        $room = Room::find($request->room_id);
        $request->validate([
            'room_id' => 'required|exists:rooms,id',
            'check_in' => 'required|date',
            'check_out' => 'required|date|after:check_in',
        ]);

        Booking::create([
            'user_id' => Auth::id(),
            'room_id' => $room->id,
            'check_in' => $request->check_in,
            'check_out' => $request->check_out,
            'total_price' => $days * $room->price,
            'status' => 'pending'
        ]);

        return redirect()->back()->with('success', 'Booking berhasil!');
    }
}
    