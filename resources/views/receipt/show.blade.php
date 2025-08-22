@extends('layouts.app')

@section('content')
<h2 class="mb-4 text-center">Payment Receipt</h2>

<div class="card shadow-lg p-4 rounded-lg mx-auto" style="max-width: 600px;">
    <div class="card-body">
        <h4 class="card-title mb-3">{{ $payment->product->name }}</h4>

        <p><strong>Amount Paid:</strong> 
            <span class="text-success">${{ number_format($payment->amount, 2) }}</span>
        </p>

        <p><strong>Transaction ID:</strong> 
            <span class="text-monospace">{{ $payment->transaction_id }}</span>
        </p>

        <p><strong>Status:</strong> 
            <span class="badge 
                @if($payment->status === 'succeeded') badge-success 
                @elseif($payment->status === 'pending') badge-warning 
                @else badge-danger @endif">
                {{ ucfirst($payment->status) }}
            </span>
        </p>

        <p><strong>Date:</strong> {{ $payment->created_at->format('d M Y, h:i A') }}</p>
    </div>
</div>

<div class="text-center mt-4">
    <a href="/" class="btn btn-primary px-4">Back to Products</a>
    <a href="/orders" class="btn btn-secondary px-4">View All Orders</a>
</div>
@endsection
