@extends('app')
@section('content')

<div class="global-wrap container-fluid">
    <div class="row">
        <div class="container">

            <div class="col-sm-12">
                <div class="entry-content">

                    @if(count(Session::get('pkg_data')) > 0 && Session::get('pkg_data')->package_type == 'P')

                    <?php
                    $pkg_price = Session::get('pkg_data')->price;
                    $pkg_vat = Session::get('pkg_data')->vat;
                    $vat_amt = ($pkg_vat / 100) * $pkg_price;
                    $total = $vat_amt + $pkg_price;
                    ?>
                    <div class="row">
                        <div class='col-md-12'>
                            <br>

                            <table class='table table-striped table-hover table-bordered'>
                                <tr>
                                    <td colspan='2' style='text-align:center'><h4>Price Summary</h4></td>

                                </tr>
                                <tr>
                                    <td><b>Package Name :- </b></td><td>{{ (!empty(Session::get('pkg_data'))) ? Session::get('pkg_data')->name : '' }}</td>
                                </tr>
                                <tr>
                                    <td><b>Accomodation :- </b></td><td>{{ (!empty(Session::get('accommo_no'))) ? Session::get('accommo_no') : '' }}</td>
                                </tr>
                                <tr>
                                    <td><b>Venue & Conference :-</b></td><td>{{ (!empty(Session::get('venu_conf')) && Session::get('venu_conf') == 'Y' ? 'Yes' : 'No') }}</td>
                                </tr>
                                <tr>
                                    <td><b>Transport:- </b></td><td>{{ (!empty(Session::get('transport')) && Session::get('transport') == 'Y' ? 'Yes' : 'No') }}</td>
                                </tr>
                                <tr>
                                    <td><b>additional_service:- </b></td><td>{{ (!empty(Session::get('additional')) && Session::get('additional') == 'Y' ? 'Yes' : 'No') }}</td>
                                </tr>


                                <tr>
                                    <td><b>Total:- </b></td><td>{{ (isset($pkg_price) && !empty($pkg_price)) ? config('constants.currency').' '.$pkg_price : 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <td><b>Vat:- </b></td><td>{{ (isset($pkg_vat) && !empty($pkg_vat)) ? $pkg_vat.'%' : 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <td><b>Final Amount:- </b></td><td>{{ (isset($total) && !empty($total)) ? config('constants.currency').' '.$total : '' }}</td>
                                </tr>
                            </table>

                        </div>
                    </div>
                    @endif
                    <br>

                    @if(Session::get('pkg_data'))

                    <div class="woocommerce-info">Payment Method</div>

                    <input type="radio" name="payment" id="bankwire"> Bank Wire &nbsp; <input type="radio" name="payment" id="paypal"> Paypal
                    <br><br>


                            {!!
                            Form::open(
                            array(
                            'name' => 'bankwirebtn',
                            'id' => 'bankwirebtn',
                            'url' => 'register-step4',
                            'autocomplete' => 'off',
                            'class' => 'register_form',
                            'files' => false
                            )
                            )
                            !!}
                        <div class="row">
                            <div class="col-sm-8">
                                <div  class="woocommerce-checkout-payment">
                                    <ul class="wc_payment_methods payment_methods methods">
                                        <li class="wc_payment_method payment_method_bacs">
                                            <input class='btn btn-primary'  type='submit' name='bank_submit' value='Bank Wire' />
                                        </li>

                                    </ul>

                                </div>
                            </div>

                        </div>
                    {!! Form::close() !!}

    
                    <form  method="post" id="paypalbtn" class="checkout woocommerce-checkout" action="{!! URL::route('paypal.paypal') !!}">

                        <div class="row">
                            <div class="col-sm-8">
                                <!-- Display the payment button. -->
                                <input type="image" name="submit" border="0" src="https://www.paypalobjects.com/webstatic/en_US/i/btn/png/btn_buynow_107x26.png" alt="Buy Now">
                            </div>

                        </div>
                    </form>
                    
                    <br>

                    @else
                    <div class="container">
                        <div class="row text-center">
                            <div class="col-sm-6 col-sm-offset-3">
                                <br><br> <h2 style="color:#0fad00">Success</h2>
                                <h3>Dear, {{ isset($name) && !empty($name) ? $name : '' }}</h3>
                                <p style="font-size:20px;color:#5C5C5C;">Thank you for being as as Membership.We have sent you an email {{ isset($email) && !empty($email) ? $email : '' }} with your details
                                    Please go to your above email now and login.</p>
                                <a href="{{ route('login') }}" class="btn btn-success">     Log in      </a>
                                <br><br>
                            </div>

                        </div>
                    </div>
                    @endif
                </div>

            </div>
        </div>
    </div>
    <!-- end row -->
</div>
@endsection

@section('pageTitle')
Final Registration
@endsection

@section('addtional_css')
@endsection

@section('jscript')
<script type="text/javascript" src="{{asset('/assets/js/heystranger-js/city.js')}}"></script>
<script>

$("#paypalbtn").hide();
$("#bankwirebtn").hide();

$("#bankwire").change(function () {


    $("#paypalbtn").hide();
    $("#bankwirebtn").show();


});

$("#paypal").change(function () {

    $("#paypalbtn").show();
    $("#bankwirebtn").hide();


});


</script>
@endsection