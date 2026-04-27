<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Booking;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Xendit\Configuration;
use Xendit\Invoice\InvoiceApi;
use Xendit\Invoice\CreateInvoiceRequest;

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

        $total_price = $days * $room->price;

        $booking = Booking::create([
            'user_id' => Auth::id(),
            'room_id' => $room->id,
            'check_in' => $request->check_in,
            'check_out' => $request->check_out,
            'total_price' => $total_price,
            'status' => 'pending'
        ]);

        Configuration::setXenditKey(config('services.xendit.secret_key'));
        $apiInstance = new InvoiceApi();
        $create_invoice_request = new CreateInvoiceRequest([
            'external_id' => 'booking-' . $booking->id . '-' . time(),
            'amount' => $total_price,
            'payer_email' => Auth::user()->email,
            'description' => 'Booking Room: ' . $room->name,
            'success_redirect_url' => route('bookings.index')
        ]);

        try {
            $result = $apiInstance->createInvoice($create_invoice_request);
            
            $booking->update([
                'payment_id' => $result['id'],
                'payment_url' => $result['invoice_url']
            ]);

            return redirect($result['invoice_url']);
        } catch (\Exception $e) {
            // Fallback if Xendit fails
            return redirect()->route('bookings.index')->with('error', 'Gagal membuat invoice pembayaran: ' . $e->getMessage());
        }
    }

    public function index()
    {
        $bookings = Auth::user()->bookings()->with('room')->latest()->get();
        return view('bookings.index', compact('bookings'));
    }

    public function webhook(Request $request)
    {
        $webhookToken = config('services.xendit.webhook_token');
        
        if ($request->header('x-callback-token') !== $webhookToken) {
            return response()->json(['message' => 'Invalid token'], 403);
        }

        $externalId = $request->input('external_id');
        if (!$externalId) {
            return response()->json(['message' => 'Missing external_id'], 400);
        }

        $parts = explode('-', $externalId);
        if (count($parts) < 2) {
            return response()->json(['message' => 'Invalid external_id format'], 400);
        }
        
        $bookingId = $parts[1];
        
        $booking = Booking::find($bookingId);
        if (!$booking) {
            return response()->json(['message' => 'Booking not found'], 404);
        }

        $status = $request->input('status');
        
        if ($status === 'PAID' || $status === 'SETTLED') {
            $booking->update(['status' => 'paid']);
        } elseif ($status === 'EXPIRED') {
            $booking->update(['status' => 'expired']);
        }

        return response()->json(['message' => 'Webhook received successfully']);
    }
}
    