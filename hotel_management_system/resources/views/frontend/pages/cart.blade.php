@extends('frontend.layout.app')
@section('content')
    <div class="page-top">
        <div class="bg"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Cart</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="page-content">
        <div class="container">
            <div class="row cart">
                <div class="col-md-12">

                    @if(session()->has('cart_room_id'))

                    <div class="table-responsive">
                        <table class="table table-bordered table-cart">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Serial</th>
                                    <th>Photo</th>
                                    <th>Room Info</th>
                                    <th>Price/Night</th>
                                    <th>Checkin</th>
                                    <th>Checkout</th>
                                    <th>Guests</th>
                                    <th>Subtotal</th>
                                </tr>
                            </thead>
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
                                                    <a href="{{ route('cartDelete',$arr_cart_room_id[$i]) }}" class="cart-delete-link"
                                                        onclick="return confirm('Are you sure?');"><i class="fa fa-times"></i></a>
                                                </td>
                                                <td>{{ $i+1 }}</td>
                                                <td><img src="{{ asset('uploads/room/'.$room_data->featured_photo) }}"></td>
                                                <td>

                                                    <a href="{{ route('room.details',$room_data->id) }}" class="room-name">{{ $room_data->name }}</a>
                                                </td>
                                                <td>${{ $room_data->price }}</td>
                                                <td>{{ $arr_cart_checkin_date[$i] }}</td>
                                                <td>{{ $arr_cart_checkout_date[$i] }}</td>
                                                <td>
                                                    Adult: {{ $arr_cart_adult[$i] }}<br>
                                                    Children: {{ $arr_cart_children[$i] }}
                                                </td>
                                                <td>$
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
                                    <td colspan="8" class="tar">Total:</td>
                                    <td>${{ $total_prices }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="checkout mb_20">
                        <a href="{{ route('checkoutPage') }}" class="btn btn-primary bg-website">Checkout</a>
                    </div>

                    @else
                    <div class="text-danger mb-3">Cart is empty !</div>
                    @endif

                </div>
            </div>
        </div>
    </div>
@endsection


























