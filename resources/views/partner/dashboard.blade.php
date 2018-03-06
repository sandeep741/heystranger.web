@extends('admin.app')
@section('content')

<div class="row">
    <div class="category-content">
        <div class="row">
            <div class="col-xs-4">
                <button class="btn bg-teal-400 btn-block btn-float btn-float-lg" type="button"><i class="icon-git-branch"></i> <span>My Bookings</span></button>
                <button class="btn bg-purple-300 btn-block btn-float btn-float-lg" type="button"><i class="icon-mail-read"></i> <span>My Emails</span></button>
            </div>

            <div class="col-xs-4">
                <button class="btn bg-warning-400 btn-block btn-float btn-float-lg" type="button"><i class="icon-stats-bars"></i> <span>Reviews</span></button>
                <button class="btn bg-blue btn-block btn-float btn-float-lg" type="button"><i class="icon-people"></i> <span>Users</span></button>
            </div>

            <div class="col-xs-4">
                <button class="btn bg-warning-400 btn-block btn-float btn-float-lg" type="button"><i class="icon-stats-bars"></i> <span>Statistics</span></button>
                <button class="btn bg-blue btn-block btn-float btn-float-lg" type="button"><i class="icon-people"></i> <span>Listing Status</span></button>
            </div>
        </div>
    </div>
</div>



<div class="row">
    <div class="panel panel-white" style="{{ (Session::has('success') ? 'margin:52px 0px 20px 0px' : '') }}">
        <div class="panel-heading">
            <h6 class="panel-title text-semibold">Listing details</h6>
            <div class="heading-elements">
                <ul class="icons-list">
                    <li><a data-action="collapse"></a></li>
                    <li><a data-action="reload"></a></li>
                    <li><a data-action="close"></a></li>
                </ul>
            </div>
        </div>
        <table class="table table-striped media-library table-lg">
            <thead>
                <tr>
                    <th>S.no</th>
                    <th>Listing Name</th>
                    <th>Type</th>
                    <th>Country</th>
                    <th>Package</th>
                    <th>Activation Date</th>
                    <th>Activation Status</th>
                    <th>Date</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @if(isset($datas) && !empty($datas) && count($datas) > 0)
                @foreach($datas as $key => $data)
                <?php 
                    $country = App\Helpers\Helper::getAllCountry($data->country_id);
                ?>

                <tr>
                    <td>{{ ($datas->currentpage()-1) * $datas->perpage() + $key + 1 }}</td>
                    <td>{{ (isset($data) && !empty($data)) ? $data->title : '' }}</td>
                    <td>{{ (isset($data->accomType) && !empty($data->accomType)) ? $data->accomType->name : '' }}</td>
                    <td>{{ (isset($country) && !empty($country)) ? $country->name : '' }}</td>
                    <td>package name</td>
                    <td>10/10/2018</td>
                    <td>{!! (isset($data) && !empty($data) && ($data->status == '1')) ? '<span class="label label-success">Active</span>' : '<span class="label label-danger">Pending</span>' !!}</td>
                    <td>{{ $data ? $data->updated_at->diffForHumans() : '' }}</td>

                    <td class="text-center">
                        <ul class="icons-list">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="icon-menu9"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li><a href="{{ route('activate-registration', ['id' => $data->id]) }}"><i class="icon-pencil7"></i> Registration & Payment</a></li>
                                    <li><a href="#"><i class="icon-pencil7"></i>Cancellation</a></li>
                                </ul>
                            </li>
                        </ul>
                    </td>
                </tr>
                @endforeach

                @else
                <tr>
                    <td colspan="6" align="center"><span class="label label-danger">No Record Found</span></td>
                </tr>
                @endif

                <tr>
                    <td colspan="6" align="center"> {{ $datas->render() }} </td>
                </tr>
            </tbody>
        </table>
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