<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;

class ReceiptController extends Controller
{
    public function show($id)
    {
        $payment = Payment::with('product')->findOrFail($id);
        return view('receipt.show', compact('payment'));
    }

    public function all()
    {
        $payments = Payment::with('product')->latest()->get();
        return view('receipt.all', compact('payments'));
    }
}
