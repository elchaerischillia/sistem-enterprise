<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Promotion;
use App\Models\SendPromotion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SendPromotionController extends Controller
{
    // Menampilkan form untuk memilih kustomer dan promosi
    public function create()
    {
        $customers = Customer::all();
        $promotions = Promotion::all();
        return view('admin.send_promotions.create', compact('customers', 'promotions'));
    }

    // Mengirim promosi ke kustomer via email
    public function send(Request $request)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'promotion_id' => 'required|exists:promotions,id',
        ]);

        $customer = Customer::findOrFail($request->customer_id);
        $promotion = Promotion::findOrFail($request->promotion_id);

        // Mengirim email ke kustomer
        Mail::send('emails.promotion', ['customer' => $customer, 'promotion' => $promotion], function ($message) use ($customer) {
            $message->to($customer->email);
            $message->subject('Promosi Terbaru untuk Anda!');
        });

        // Menyimpan ke tabel send_promotions
        SendPromotion::create([
            'customer_id' => $request->customer_id,
            'promotion_id' => $request->promotion_id,
            'sent_date' => now(),
        ]);

        return redirect()->route('send_promotions.create')->with('success', 'Promotion sent successfully.');
    }
}
