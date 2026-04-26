<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Order;
use Illuminate\Support\Str;
use Barryvdh\DomPDF\Facade\Pdf;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'address' => 'required|string',
            'order_type' => 'required|in:refill,empty_gallon',
        ]);

        $price = $request->order_type == 'refill' ? 5000 : 50000;

        $order = Order::create([
            'transaction_id' => 'VIO-' . strtoupper(Str::random(8)),
            'customer_name' => $request->customer_name,
            'address' => $request->address,
            'order_type' => $request->order_type,
            'total_price' => $price,
            'payment_status' => 'pending',
        ]);

        return redirect()->route('order.payment', $order);
    }

    public function payment(Order $order)
    {
        return view('payment', compact('order'));
    }

    public function receipt(Order $order)
    {
        // Mark as paid since it's dummy
        if ($order->payment_status == 'pending') {
            $order->update(['payment_status' => 'paid']);
        }
        return view('receipt', compact('order'));
    }

    public function downloadPdf(Order $order)
    {
        $pdf = Pdf::loadView('pdf_receipt', compact('order'));
        return $pdf->download('receipt-' . $order->transaction_id . '.pdf');
    }
}
