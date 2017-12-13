@extends('admin.app')
@section('content')

<div class="content">
    <!-- Horizontal form options -->
    <div class="row">
        <div class="tabbable tab-content-bordered content-group-lg">
            <ul class="nav nav-tabs nav-lg nav-tabs-highlight">
                <li class="active">
                    <a href="#james" data-toggle="tab">
                        Accommodation Detail <span class="status-mark position-right border-danger"></span>
                    </a>
                </li>
                <li>
                    <a href="#william" data-toggle="tab">
                        Keywords & Meta Tags <span class="status-mark position-right border-success"></span>
                    </a>
                </li>
                <li>
                    <a href="#jared" data-toggle="tab">
                        Video & Map <span class="status-mark position-right border-warning"></span>
                    </a>
                </li>

            </ul>
            <div class="tab-content">
                <div class="tab-pane fade in active has-padding" id="james">

                    {!!
                    Form::open(
                    array(
                    'name' => 'frm_accomm',
                    'id' => 'frm_accomm',
                    'url' => 'accomodation/'.(isset($edit_data) && !empty($edit_data) ? $edit_data->id : ''),
                    'autocomplete' => 'off',
                    'class' => 'form-horizontal',
                    'files' => false
                    )
                    )
                    !!}
                    <div class="panel panel-flat">
                        <div class="panel-heading">
                            <h5 class="panel-title">Accommodation Detail</h5>
                        </div>
                        <div class="panel-body">

                            <div class="form-group">

                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    {!! Form::text('name', (isset($edit_data) && !empty($edit_data) ? $edit_data->name : ''), ['class' => 'form-control', 'placeholder' => 'Enter Accommodation Name*']) !!}
                                    @if ($errors->has('name'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif

                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    {{Form::select('type_accomm',[''=>'Choose type of Accommodation']+@$arr_accomm->pluck('name','id')->toArray(), (isset($edit_data) && !empty($edit_data) ? @$edit_data->id : ''),['class'=>'form-control'])}}

                                    @if ($errors->has('name'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif

                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    {{Form::select('rating',[''=>'Start Ratings']+@config('constants.star_rating'), (isset($edit_data) && !empty($edit_data) ? @$edit_data->id : ''),['class'=>'form-control'])}}


<!--<input type="file" class="file-styled">
<span class="help-block">Accommodation Image Accepted formats: gif, png, jpg. Max file size 2Mb</span>-->
                                </div>
                                
                                
                                
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    {!! Form::text('name', (isset($edit_data) && !empty($edit_data) ? $edit_data->name : ''), ['class' => 'form-control', 'placeholder' => 'Enter Reserving Email']) !!}
                                    @if ($errors->has('name'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif

                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    {{Form::select('country',[''=>'Select Country *']+@$arr_country->pluck('name','id')->toArray(), (isset($edit_data) && !empty($edit_data) ? @$edit_data->id : ''),['id'=> 'state_id', 'class'=>'form-control country_id'])}}

                                    @if ($errors->has('name'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif

                                </div>
                                
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    {{Form::select('state',[''=>'Select State *'], (isset($edit_data) && !empty($edit_data) ? @$edit_data->id : ''),['id'=> 'state_id', 'class'=>'form-control state_id'])}}

                                    @if ($errors->has('name'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif

                                </div>
                            </div>
                            <div class="form-group">
                               <div class="col-lg-6 col-md-6 col-sm-12">
                                    {{Form::select('city',[''=>'Select city *'], (isset($edit_data) && !empty($edit_data) ? @$edit_data->id : ''),['id'=> 'address_city_id', 'class'=>'form-control address_city_id'])}}

                                    @if ($errors->has('name'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif

                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-3 control-label">Accommodation Detail:</label>
                                <div class="col-lg-9">
                                    <textarea rows="5" cols="5" class="form-control" placeholder="Enter Accommodation Description"></textarea>
                                </div>
                            </div>



                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">Submit form </button>
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
                <div class="tab-pane fade has-padding" id="william">
                    <form action="#" class="form-horizontal">
                        <div class="panel panel-flat">
                            <div class="panel-heading">
                                <h5 class="panel-title">Keywords & Metatags</h5>
                            </div>
                            <div class="panel-body">


                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Title:</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" placeholder="Enter Your Title">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Keywords:</label>
                                    <div class="col-lg-9">
                                        <textarea rows="5" cols="5" class="form-control" placeholder="Enter your Keywords here"></textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Meta Tags:</label>
                                    <div class="col-lg-9">
                                        <textarea rows="5" cols="5" class="form-control" placeholder="Enter your Meta Tags here"></textarea>
                                    </div>
                                </div>

                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary">Update </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="tab-pane fade has-padding" id="jared">
                    <form action="#" class="form-horizontal">
                        <div class="panel panel-flat">
                            <div class="panel-heading">
                                <h5 class="panel-title">Video and Map</h5>
                            </div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Accommodation Video </label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" placeholder="Paste Your Accommodation Link here">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Accommodation Location:</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" placeholder="Enter Your Google Map Link here">
                                    </div>
                                </div>


                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary">Update </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection

@section('pageTitle')
Add Accommodation
@endsection

@section('addtional_css')

@endsection

@section('jscript')
<script type="text/javascript" src="{{ asset('/assets/admin/js/select2.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/assets/admin/js/uniform.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/assets/admin/js/app.js') }}"></script>
<script type="text/javascript" src="{{ asset('/assets/admin/js/form_layouts.js') }}"></script>
<script type="text/javascript" src="{{asset('/assets/js/heystranger-js/city.js')}}"></script>
@endsection