<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Payment;
use Stripe\Stripe;
use Stripe\Charge;
use Stripe\PaymentIntent;

class CheckoutController extends Controller
{
    // Step 1: Create a PaymentIntent and return client secret
    public function createPaymentIntent($id)
    {
        $product = Product::findOrFail($id);

        Stripe::setApiKey(env('STRIPE_SECRET'));

        $paymentIntent = PaymentIntent::create([
            'amount' => $product->price * 100,
            'currency' => 'usd',
            'metadata' => ['product_id' => $product->id],
        ]);

        return response()->json([
            'clientSecret' => $paymentIntent->client_secret,
        ]);
    }

    // Step 2: Save payment after confirmation
    public function processPayment(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        // Save payment details
        $payment = Payment::create([
            'product_id'     => $product->id,
            'transaction_id' => $request->paymentIntentId,
            'amount'         => $product->price,
            'status'         => 'succeeded',
        ]);

        return response()->json(['redirect_url' => route('receipt', $payment->id)]);
    }
}
