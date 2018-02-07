@extends('app')
@section('content')

<div class="global-wrap container-fluid">
    <div class="row">
        <div class="container">

            <div class="row mb20">
                <div class="col-sm-12">
                    <div class="post-5200 page type-page status-publish hentry">
                        <div class="entry-content">
                            <div class="woocommerce">
                                <br>
                                <div class="woocommerce-info">Bank Transfer Method</div>

                                <div class="row">
                                    <div class="col-sm-8">

                                        <h5 style='color:green;font-weight:bold'>You have Successfully Registered </h5>
                                        <h3>Dear, {{ isset($name) && !empty($name) ? $name : '' }}</h3>
                                        <p style="font-size:20px;color:#5C5C5C;">Thank you for being as as Membership.We have sent you an email {{ isset($email) && !empty($email) ? $email : '' }} with your details
                                            Please go to your above email now and login.</p>

                                        <div id="order_review" class="woocommerce-checkout-review-order mt20">
                                            <div id="payment" class="woocommerce-checkout-payment">
                                                <table class='table table-striped table-bordered table-hover'>
                                                    <tr>
                                                        <td colspan='2'>
                                                            <b>Bank Detail</b>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Account Name : </td><td>Testing</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Account No. : </td><td>123456789</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Bank Name : </td><td>Testing</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Branch Name : </td><td>Testing</td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
 </div>
                            </div>
                        </div>
                        <div>
                        </div>
                        <div class="entry-meta">
                            <a href="{{ route('login') }}" class='btn btn-primary'>Click here to login</a>
                        </div>
                    </div>
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