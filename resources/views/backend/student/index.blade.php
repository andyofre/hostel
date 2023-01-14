@extends('layouts.include.student.master')
@section('content')
<style>
    .custom_card {
    border-radius: 0.5rem !important;
    text-align: center;
    font-family: 'Bahnschrift' !important;
}

.custom_card .card-title {
    font-size: 1.5rem;
    text-align: center;
    color: white !important;
}

.custom_btn {
    padding: 0.5rem 1rem !important;
    background-color: white !important;
    box-shadow: 0px 0px 1rem rgba(0,0,0,.3) !important;
    border-radius: 0.5rem !important;
    margin: 3rem !important;
}

.custom_btn:hover {
    box-shadow: 0px 0px 0.2rem rgba(0,0,0,.1) !important;
}

.payment_card {
    background-image: linear-gradient(to right,#8971ea,#7f72ea,#7574ea,#6a75e9,#5f76e8);
}

.regular_card {
    background-image: linear-gradient(to right, #f575ca, #c542b4);
}

.custom_card .card-text {
    color: white;
}

.custom_card .card-icon {
    border: 4px solid white;
    border-radius: 100%;
    padding: 1rem;
    color: white;
    margin: 3rem;
}

</style>
<div class="pd-ltr-20">

    <div class="row">

        {{-- @php
            $split = [
            "type" => "percentage",
            "currency" => "NGN",

        [ "subaccount" => "ACCT_2hwidwz5y9atbvn", "share" => 300],

            "bearer_type" => "all",
            "main_account_share" => 700
        ];
    @endphp --}}


        @if (Auth::user()->portalFee == 'UNPAID')

        <div class="card payment_card custom_card col-md-4 m-2 bg-danger text-white">

            <div class="card-body ">
                <h5 class="card-title h6">Registration was successful</h5>
                <p class="card-text h5 py-1"> Hostel portal fee, pay the sum of 500 to proceed to apply for hostel.</p>
                <span class="h2">&#8358; 500</span>

                @php

                @endphp  

                <form method="POST" action="{{ route('paying') }}" accept-charset="UTF-8" class="form-horizontal" role="form">
                    {{-- <form id="paymentForm"> --}}
                        @csrf

                        <div class="form-group">
                            <input type="email" id="email-address" required class="form-control"  hidden value="{{ Auth::user()->email }}" name="email">
                            <input type="text" id="name" required class="form-control"  hidden value="{{ Auth::user()->fullName }}" name="name">

                            <input type="text" id="amount" required class="form-control"  hidden  value="610" name="amount">
                        </div>

                        <div class="text-center">
                            <button class="btn custom_btn" type="submit">Pay now</button>
                        </div>

                    </form>

            </div>

        </div>
        @endif





            @if (Auth::user()->portalFee == 'PAID')
            <div class="card regular_card custom_card col-md-4 m-2">
                <div class="card-body">
                    <h1 class="card-title">Your portal fee payment was received</h1>
                    <h1><i class="fa fa-check fa-2x card-icon"></i></h1>
                    <p class="card-text">You can now proceed to book hostel</p>
                </div>
            </div>
            @endif



            @if (Auth::user()->payStatus == 'PAID')

            <div class="card custom_card col-md-3  m-2 bg-dark">
                <div class="card-body text-white">
                    <h1 class="card-title text-white mb-3" style="font-size:21px;"> Generate payment Invoice </h1>
                    <h1><i class="fas fa-donate fa-2x text-white"></i></h1>
                    {{-- <p class="card-text">Your payment was received</p> --}}
                    <form action="" method="POST">
                        @csrf
                        <div class="text-center">
                        <a href="" class="btn custom_btn bg-white">Generate</a>
                    </div>

                    </form>
                </div>
            </div>

        @endif

    </div>




</div>



@endsection

@section('scripts')

{{-- <script src="https://js.paystack.co/v1/inline.js"></script>

<script>
    let paymentForm = document.getElementById("paymentForm");
    paymentForm.addEventListener("submit", payWithPaystack, false);

    function payWithPaystack(e){
        e.preventDefault();

            let handler = PaystackPop.setup({
            key: 'pk_test_490c5d622c79c6136b01fbcbd859057ce7d243c0', // Replace with your public key
            email: document.getElementById("email-address").value,
            amount: document.getElementById("amount").value * 100,
            ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
            // label: "Optional string that replaces customer email"
            onClose: function(){
            alert('Window closed.');
            },
            callback: function(response){
                let reference = response.reference;

                $.ajax({
                    type: "GET",
                    url: "{{URL::to('verify-payment')}}/"+reference,
                    // dataType:'dataType',
                    success: function(response){
                        console.log(response);
                    }
                });


            }
        });
        handler.openIframe();
    }
</script> --}}
@endsection

