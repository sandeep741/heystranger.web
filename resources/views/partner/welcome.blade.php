@extends('admin.app')
@section('content')

<div class="row">
    <div class="category-content">
        <div class="row">
            <div class="col-xs-4">
                <button class="btn bg-teal-400 btn-block btn-float btn-float-lg" type="button"><i class="icon-git-branch"></i> <span>Accommodation</span></button>
                <button class="btn bg-purple-300 btn-block btn-float btn-float-lg" type="button"><i class="icon-mail-read"></i> <span>Hotel Booked</span></button>
            </div>

            <div class="col-xs-4">
                <button class="btn bg-warning-400 btn-block btn-float btn-float-lg" type="button"><i class="icon-stats-bars"></i> <span>Statistics</span></button>
                <button class="btn bg-blue btn-block btn-float btn-float-lg" type="button"><i class="icon-people"></i> <span>Users</span></button>
            </div>

            <div class="col-xs-4">
                <button class="btn bg-warning-400 btn-block btn-float btn-float-lg" type="button"><i class="icon-stats-bars"></i> <span>Statistics</span></button>
                <button class="btn bg-blue btn-block btn-float btn-float-lg" type="button"><i class="icon-people"></i> <span>Users</span></button>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="panel panel-white">
        <div class="panel-heading">
            <h6 class="panel-title text-semibold">My Accommodation</h6>
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
                    <th><input type="checkbox" class="styled"></th>
                    <th>Preview</th>
                    <th>Accommodation Name</th>
                    <th>Type</th>
                    <th>Date</th>
                    <th>Info</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><input type="checkbox" class="styled"></td>
                    <td>
                        <a href="images/1.png" data-popup="lightbox">
                            <img src="images/1.png" alt="" class="img-rounded img-preview">
                        </a>
                    </td>
                    <td><a href="#">Ignorant saw her drawings</a></td>
                    <td><a href="#">Eugene Kopyov</a></td>
                    <td>Jun 10, 2015</td>
                    <td>
                        <ul class="list-condensed list-unstyled no-margin">
                            <li><span class="text-semibold">Size:</span> 215 Kb</li>
                            <li><span class="text-semibold">Format:</span> .jpg</li>
                        </ul>
                    </td>
                    <td class="text-center">
                        <ul class="icons-list">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="icon-menu9"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li><a href="#"><i class="icon-pencil7"></i> Edit file</a></li>
                                    <li><a href="#"><i class="icon-copy"></i> Copy file</a></li>
                                    <li><a href="#"><i class="icon-eye-blocked"></i> Unpublish</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#"><i class="icon-bin"></i> Move to trash</a></li>
                                </ul>
                            </li>
                        </ul>
                    </td>
                </tr>
                <tr>
                    <td><input type="checkbox" class="styled"></td>
                    <td>
                        <a href="images/1.png" data-popup="lightbox">
                            <img src="images/1.png" alt="" class="img-rounded img-preview">
                        </a>
                    </td>
                    <td><a href="#">Case oh an that or away sigh</a></td>
                    <td><a href="#">James Alexander</a></td>
                    <td>Jun 9, 2015</td>
                    <td>
                        <ul class="list-condensed list-unstyled no-margin">
                            <li><span class="text-semibold">Size:</span> 636 Kb</li>
                            <li><span class="text-semibold">Format:</span> .png</li>
                        </ul>
                    </td>
                    <td class="text-center">
                        <ul class="icons-list">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="icon-menu9"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li><a href="#"><i class="icon-pencil7"></i> Edit file</a></li>
                                    <li><a href="#"><i class="icon-copy"></i> Copy file</a></li>
                                    <li><a href="#"><i class="icon-eye-blocked"></i> Unpublish</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#"><i class="icon-bin"></i> Move to trash</a></li>
                                </ul>
                            </li>
                        </ul>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('pageTitle')
Dashboard
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