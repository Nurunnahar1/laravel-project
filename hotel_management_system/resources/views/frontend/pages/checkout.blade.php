@extends('frontend.layout.app')
@section('content')
  <div class="page-top">
            <div class="bg"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Checkout</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="page-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-6 checkout-left">

                        <form action=" " method="post" class="frm_checkout" >
                            <div class="billing-info">
                                <h4 class="mb_30">Billing Information</h4>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label for="">Name: *</label>
                                        <input type="text" class="form-control mb_15" name="billing_name" value="{{ Auth::guard('customer')->user()->name }}">
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="">Email Address: *</label>
                                        <input type="text" class="form-control mb_15" name="billing_email" value="{{ Auth::guard('customer')->user()->email }}">
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="">Phone Number: *</label>
                                        <input type="text" class="form-control mb_15" name="billing_phone" value="{{ Auth::guard('customer')->user()->phone }}">
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="">Country: *</label>
                                        <input type="text" class="form-control mb_15" name="billing_country" value="{{ Auth::guard('customer')->user()->country }}">
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="">Address: *</label>
                                        <input type="text" class="form-control mb_15" name="billing_address" value="{{ Auth::guard('customer')->user()->address }}">
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="">State: *</label>
                                        <input type="text" class="form-control mb_15" name="billing_state" value="{{ Auth::guard('customer')->user()->state }}">
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="">City: *</label>
                                        <input type="text" class="form-control mb_15" name="billing_city" value="{{ Auth::guard('customer')->user()->city }}">
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="">Zip Code: *</label>
                                        <input type="text" class="form-control mb_15" name="billing_zip" value="{{ Auth::guard('customer')->user()->zip }}">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary bg-website mb_30">Continue to payment</button>
                        </form>

                    </div>
                    <div class="col-lg-4 col-md-6 checkout-right">
                        <div class="inner">
                            <h4 class="mb_10">Cart Details</h4>
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>

                                         @php
                                        $arr_cart_room_id = array();
                                        $i = 0;
                                        foreach (session()->get('cart_room_id') as $value){
                                            $arr_cart_room_id[$i] = $value;
                                            $i++;
                                        }

                                        $arr_cart_checkin_date = array();
                                        $i = 0;
                                        foreach (session()->get('cart_checkin_date') as $value){
                                            $arr_cart_checkin_date[$i] = $value;
                                            $i++;
                                        }

                                        $arr_cart_checkout_date = array();
                                        $i = 0;
                                        foreach (session()->get('cart_checkout_date') as $value){
                                            $arr_cart_checkout_date[$i] = $value;
                                            $i++;
                                        }

                                        $arr_cart_adult = array();
                                        $i = 0;
                                        foreach (session()->get('cart_adult') as $value){
                                            $arr_cart_adult[$i] = $value;
                                            $i++;
                                        }


                                        $arr_cart_children = array();
                                        $i = 0;
                                        foreach (session()->get('cart_children') as $value){
                                            $arr_cart_children[$i] = $value;
                                            $i++;
                                        }

                                    $total_prices = 0;


                                    for ($i = 0; $i < count($arr_cart_room_id); $i++)
                                    {
                                        $room_data = DB::table('rooms')->where('id', $arr_cart_room_id[$i])->first();
                                    @endphp
                                        <tr>
                                            <td>
                                                {{ $room_data->name }}
                                                <br>
                                                ({{ $arr_cart_checkin_date[$i] }} - {{ $arr_cart_checkout_date[$i] }})
                                                <br>
                                                Adult: {{ $arr_cart_adult[$i] }}, Children: {{ $arr_cart_children[$i] }}
                                            </td>
                                            <td class="p_price">$
                                                    @php
                                                        $checkin_date = trim($arr_cart_checkin_date[$i]);
                                                        $checkout_date = trim($arr_cart_checkout_date[$i]);

                                                        $datetime1 = DateTime::createFromFormat('d/m/Y', $checkin_date);
                                                        $datetime2 = DateTime::createFromFormat('d/m/Y', $checkout_date);

                                                        if ($datetime1 && $datetime2) {
                                                            $interval = $datetime1->diff($datetime2);
                                                            $days_difference = ($interval->days)+1;
                                                            echo $subtotal = $days_difference*($room_data->price);
                                                        } else {
                                                            echo "Failed to parse date strings.";
                                                        }
                                                    @endphp
                                                </td>
                                        </tr>

                                        @php
                                        $total_prices += $subtotal;
                                            }
                                        @endphp


                                        <tr>
                                            <td><b>Total:</b></td>
                                            <td class="p_price"><b>${{ $total_prices }}</b></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
