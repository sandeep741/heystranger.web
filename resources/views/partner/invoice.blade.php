@extends('admin.app')
@section('content')

<div class="panel panel-white">
    <div class="panel-heading">
        <h6 class="panel-title">My Booking Invoice</h6>
        <div class="heading-elements">
            <button type="button" class="btn btn-default btn-xs heading-btn"><i class="icon-file-check position-left"></i> Save</button>
            <button type="button" class="btn btn-default btn-xs heading-btn"><i class="icon-printer position-left"></i> Print</button>
        </div>
    </div>
    <div class="panel-body no-padding-bottom">
        <div class="row">
            <div class="col-md-6 content-group">
                <img src="images/logo-white.png" class="content-group mt-10" alt="" style="width: 120px;">
                <ul class="list-condensed list-unstyled">
                    <li>2269 Elba Lane</li>
                    <li>Paris, France</li>
                    <li>888-555-2311888-555-2311</li>
                </ul>
            </div>
            <div class="col-md-6 content-group">
                <div class="invoice-details">
                    <h5 class="text-uppercase text-semibold">Invoice #49029</h5>
                    <ul class="list-condensed list-unstyled">
                        <li>Date: <span class="text-semibold">January 12, 2015</span></li>
                        <li>Due date: <span class="text-semibold">May 12, 2015</span></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-lg-9 content-group">
                <span class="text-muted">Invoice To:</span>
                <ul class="list-condensed list-unstyled">
                    <li>
                        <h5>Rebecca Manes</h5>
                    </li>
                    <li><span class="text-semibold">Normand axis LTD</span></li>
                    <li>3 Goodman Street</li>
                    <li>London E1 8BF</li>
                    <li>United Kingdom</li>
                    <li>888-555-2311888-555-2311</li>
                    <li><a href="#">rebecca@normandaxis.ltd</a></li>
                </ul>
            </div>
            <div class="col-md-6 col-lg-3 content-group">
                <span class="text-muted">Payment Details:</span>
                <ul class="list-condensed list-unstyled invoice-payment-details">
                    <li>
                        <h5>Total Due: <span class="text-right text-semibold">$8,750</span></h5>
                    </li>
                    <li>Bank name: <span class="text-semibold">Profit Bank Europe</span></li>
                    <li>Country: <span>United Kingdom</span></li>
                    <li>City: <span>London E1 8BF</span></li>
                    <li>Address: <span>3 Goodman Street</span></li>
                    <li>IBAN: <span class="text-semibold">KFH37784028476740</span></li>
                    <li>SWIFT code: <span class="text-semibold">BPT4E</span></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-lg">
            <thead>
                <tr>
                    <th>L.No</th>
                    <th>Listing Name</th>
                    <th>Type</th>
                    <th class="col-sm-1">Country</th>
                    <th class="col-sm-1">Package</th>
                    <th class="col-sm-1">Cost</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        1
                    </td>
                    <td>
                        Name
                    </td>
                    <td>
                        Villa
                    </td>
                    <td>$70</td>
                    <td>57</td>
                    <td><span class="text-semibold">$3,990</span></td>
                </tr>


            </tbody>
        </table>
    </div>
    <div class="panel-body">
        <div class="row invoice-payment">
            <div class="col-sm-7">
                <div class="content-group">
                    <h6>Authorized person</h6>
                    <div class="mb-15 mt-15">
                        <img src="images/signature.png" class="display-block" style="width: 150px;" alt="">
                    </div>
                    <ul class="list-condensed list-unstyled text-muted">
                        <li>Eugene Kopyov</li>
                        <li>2269 Elba Lane</li>
                        <li>Paris, France</li>
                        <li>888-555-2311888-555-2311</li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-5">
                <div class="content-group">
                    <h6>Total due</h6>
                    <div class="table-responsive no-border">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th>Subtotal:</th>
                                    <td class="text-right">$7,000</td>
                                </tr>
                                <tr>
                                    <th>Tax: <span class="text-regular">(25%)</span></th>
                                    <td class="text-right">$1,750</td>
                                </tr>
                                <tr>
                                    <th>Total:</th>
                                    <td class="text-right text-primary">
                                        <h5 class="text-semibold">$8,750</h5>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
        <h6>Other information</h6>
        <p class="text-muted">Thank you for using Hey Stranger. This invoice can be paid via PayPal, Bank transfer, Skrill or Payoneer. Payment is due within 30 days from the date of delivery. Late payment is possible, but with with a fee of 10% per month. Company registered in England and Wales #6893003, registered office: 3 Goodman Street, London E1 8BF, United Kingdom. Phone number: 888-555-2311888-555-2311</p>
    </div>
</div>

@endsection

@section('pageTitle')
Partner Dashboard
@endsection

@section('addtional_css')
@endsection

@section('jscript')
<script type="text/javascript" src="{{ asset('/assets/admin/js/d3.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/assets/admin/js/d3_tooltip.js') }}"></script>
<script type="text/javascript" src="{{ asset('/assets/admin/js/switchery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/assets/admin/js/uniform.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/assets/admin/js/bootstrap_multiselect.js') }}"></script>
<script type="text/javascript" src="{{ asset('/assets/admin/js/moment.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/assets/admin/js/daterangepicker.js') }}"></script>
<script type="text/javascript" src="{{ asset('/assets/admin/js/app.js') }}"></script>
<script type="text/javascript" src="{{ asset('/assets/admin/js/dashboard.js') }}"></script>
@endsection