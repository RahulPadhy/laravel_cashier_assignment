@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-12 col-md-8 col-lg-6">
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <h2 class="card-title">{{ $product->name }}</h2>
                <p class="text-muted">{{ $product->description }}</p>
                <h4 class="mb-4">Price: ${{ number_format($product->price, 2) }}</h4>

                <div id="payment-message" class="alert d-none"></div>

                <form id="payment-form">
                    <label for="card-element" class="form-label">Credit / Debit Card</label>
                    <div id="card-element" class="form-control mb-3 p-2">
                        <!-- Stripe Card Form -->
                    </div>
                    
                    <button id="submit" class="btn btn-success w-100 mt-3 d-flex justify-content-center align-items-center">
                        <span id="button-text">Pay Now</span>
                        <span id="spinner" class="spinner-border spinner-border-sm ms-2 d-none" role="status" aria-hidden="true"></span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://js.stripe.com/v3/"></script>
<script>
    const stripe = Stripe("{{ env('STRIPE_KEY') }}");
    const elements = stripe.elements();
    const cardElement = elements.create("card", { hidePostalCode: true });
    cardElement.mount("#card-element");

    const form = document.getElementById("payment-form");
    const message = document.getElementById("payment-message");
    const submitButton = document.getElementById("submit");
    const buttonText = document.getElementById("button-text");
    const spinner = document.getElementById("spinner");

    form.addEventListener("submit", async (e) => {
        e.preventDefault();

        // Show loader
        buttonText.textContent = "Processing...";
        spinner.classList.remove("d-none");
        submitButton.disabled = true;
        message.classList.add("d-none");

        try {
            // Step 1: Create PaymentIntent
            let res = await fetch("{{ route('payment.intent', $product->id) }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                }
            });
            let data = await res.json();

            // Step 2: Confirm Card Payment
            const { paymentIntent, error } = await stripe.confirmCardPayment(data.clientSecret, {
                payment_method: { card: cardElement }
            });

            if (error) {
                message.classList.remove("d-none", "alert-success");
                message.classList.add("alert-danger");
                message.innerText = error.message;
            } else if (paymentIntent.status === "succeeded") {
                // Step 3: Save in DB
                let saveRes = await fetch("{{ route('payment.process', $product->id) }}", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    },
                    body: JSON.stringify({ paymentIntentId: paymentIntent.id })
                });
                let saveData = await saveRes.json();

                // Redirect to thank you page
                window.location.href = saveData.redirect_url;
            }
        } catch (err) {
            message.classList.remove("d-none", "alert-success");
            message.classList.add("alert-danger");
            message.innerText = "Something went wrong. Please try again.";
        } finally {
            // Reset button
            spinner.classList.add("d-none");
            buttonText.textContent = "Pay Now";
            submitButton.disabled = false;
        }
    });
</script>
@endsection
