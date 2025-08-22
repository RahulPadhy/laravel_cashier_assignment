@extends('layouts.app')

@section('content')
<h2 class="mb-4">Products</h2>

<div class="row">
    @foreach($products as $product)
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
            <div class="card h-100 shadow-sm border-0">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">{{ $product->name }}</h5>
                    <p class="card-text text-muted mb-2">
                        ${{ number_format($product->price, 2) }}
                    </p>
                    <div class="mt-auto">
                        <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary btn-block">
                            Buy Now
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection
