@extends('frontend.layout.app')
@section('content')
{{-- <script src="https://www.paypalobjects.com/api/checkout.js"></script> --}}
    <div class="page-top">
        <div class="bg"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Payment</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="page-content">
        <div class="container">
            <div class="row cart">
                <div class="col-lg-4 col-md-4 checkout-left mb_30">

                    <h4>Make Payment</h4>
                    <select name="payment_method" class="form-control select2" id="paymentMethodChange" autocomplete="off">
                        <option value="">Select Payment Method</option>
                        <option value="PayPal">PayPal</option>
                        <option value="Stripe">Stripe</option>
                    </select>

                    <div class="paypal mt_20">

                        <h4>Pay with PayPal</h4>
                        <form action="{{ route('paypal') }}" method="POST">
                           @csrf
                           <div id="paypal-button" class="text-warning btn btn-dark ">Paypal</div>

                        </form>
                    </div>

                    <div class="stripe mt_20">
                        <h4>Pay with Stripe</h4>
                        <p>Write necessary code here</p>
                    </div>

                </div>
                <div class="col-lg-4 col-md-4 checkout-left mb_30">
                        <h4 class="mb_10">Billing Details</h4>
                        <div>Name: {{ session()->get('billing_name') }}</div>
                        <div>Email: {{ session()->get('billing_email') }}</div>
                        <div>Phone: {{ session()->get('billing_phone') }}</div>
                        <div>Country: {{ session()->get('billing_country') }}</div>
                        <div>Address: {{ session()->get('billing_address') }}</div>
                        <div>State: {{ session()->get('billing_state') }}</div>
                        <div>City: {{ session()->get('billing_city') }}</div>
                        <div>Zip: {{ session()->get('billing_zip') }}</div>
                </div>





                <div class="col-lg-4 col-md-4 checkout-right">
                    <div class="inner">
                        <h4 class="mb_10">Cart Details</h4>
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>
                                            Regular Couple Bed
                                            <br>
                                            (05/07/2022 - 07/07/2022)
                                            <br>
                                            Adult: 2, Children: 0
                                        </td>
                                        <td class="p_price">$60</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Regular Couple Bed
                                            <br>
                                            (05/07/2022 - 05/07/2022)
                                            <br>
                                            Adult: 2, Children: 0
                                        </td>
                                        <td class="p_price">$60</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Delux Couple Bed
                                            <br>
                                            (10/07/2022 - 11/07/2022)
                                            <br>
                                            Adult: 2, Children: 2
                                        </td>
                                        <td class="p_price">$40</td>
                                    </tr>
                                    <tr>
                                        <td><b>Total:</b></td>
                                        <td class="p_price"><b>$160</b></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
  {{-- @php
    $client = 'ARJ2bbdI_PrsIVJXX7eyeO8CBP93LTedk7NUbvpkdEmQa_vHWYe2A__TdByQe2G-vj0WXcS_3K0ZHhSe';
    $final_price = '100';
@endphp


<script>
    paypal.Button.render({
        env: 'sandbox',
        client: {
            sandbox: '{{ $client }}',
            production: '{{ $client }}'
        },
        locale: 'en_US',
        style: {
            size: 'medium',
            color: 'blue',
            shape: 'rect',
        },

        // set up a payment
        payment: function (data, actions) {
            return actions.payment.create({
                transactions: [{
                    amount: {
                        total: '{{ $final_price }}',
                        currency: 'USD'
                    }
                }]
            });
        },

        // Execute the payment
        onAuthorize: function (data, actions) {
            return actions.redirect();
        }
    }, '#paypal-button');
</script> --}}

@endsection
