@extends('layouts.app')

@section('content')
<h2 class="mb-4 text-center">All Orders</h2>

@if($payments->count() > 0)
    <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle text-center">
            <thead class="thead-dark">
                <tr>
                    <th>Product</th>
                    <th>Amount</th>
                    <th>Transaction ID</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th>Receipt</th>
                </tr>
            </thead>
            <tbody>
                @foreach($payments as $payment)
                <tr>
                    <td>{{ $payment->product->name }}</td>
                    <td>${{ number_format($payment->amount, 2) }}</td>
                    <td class="text-monospace">{{ $payment->transaction_id }}</td>
                    <td>
                        <span class="badge 
                            @if($payment->status === 'succeeded') badge-success 
                            @elseif($payment->status === 'pending') badge-warning 
                            @else badge-danger @endif">
                            {{ ucfirst($payment->status) }}
                        </span>
                    </td>
                    <td>{{ $payment->created_at->format('d M Y, h:i A') }}</td>
                    <td>
                        <a href="{{ route('receipt', $payment->id) }}" class="btn btn-sm btn-info">
                            View
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@else
    <div class="alert alert-info text-center">
        No orders found yet. 🚀
    </div>
@endif
@endsection
