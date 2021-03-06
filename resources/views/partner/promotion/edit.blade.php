@extends('admin.app')
@section('content')
<?php
$urlId = app('request')->input('id');
?>

<div class="content">
    <!-- Horizontal form options -->
    <div class="row">
        <div class="tabbable tab-content-bordered content-group-lg">
            <ul class="nav nav-tabs nav-lg nav-tabs-highlight">

                <li class="active">
                    <a href="#accommodation" data-toggle="tab">
                        Promotion <span class="status-mark position-right border-danger"></span>
                    </a>
                </li>

                <li>
                    <a href="#rooms" data-toggle="tab">
                        Room<span class="status-mark position-right border-success"></span>
                    </a>
                </li>

                <li>
                    <a href="#activity" data-toggle="tab">
                        Activities <span class="status-mark position-right border-success"></span>
                    </a>
                </li>

                <li>
                    <a href="#policy" data-toggle="tab">
                        Policies <span class="status-mark position-right border-success"></span>
                    </a>
                </li>

                <li>
                    <a href="#keywords" data-toggle="tab">
                        Keywords & Meta Tags <span class="status-mark position-right border-success"></span>
                    </a>
                </li>

                <li>
                    <a href="#videomap" data-toggle="tab">
                        Video & Map <span class="status-mark position-right border-warning"></span>
                    </a>
                </li>

            </ul>

            <div class="tab-content">

                <!---Accommodation form--->
                <div class="tab-pane fade in active has-padding" id="accommodation">

                    {!!
                    Form::open(
                    array(
                    'name' => 'frm_accommodation',
                    'id' => 'frm_accommodation',
                    'url' => 'accomodation/'.(isset($arr_accommo_detail) && !empty($arr_accommo_detail) && count($arr_accommo_detail) > 0 ? $arr_accommo_detail->id : ''),
                    'autocomplete' => 'off',
                    'class' => 'form-horizontal',
                    'files' => true
                    )
                    )
                    !!}

                    {{ method_field('PUT') }}
                    <div class="panel panel-flat">
                        <div class="panel-heading">
                            <h5 class="panel-title">Promotion Detail</h5>
                        </div>
                        <div class="panel-body">

                            <div class="form-group">

                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    {!! Form::text('name', (isset($arr_accommo_detail) && !empty($arr_accommo_detail) && count($arr_accommo_detail) > 0 ? $arr_accommo_detail->title : ''), ['class' => 'form-control', 'placeholder' => 'Enter Accommodation Name*']) !!}
                                    @if ($errors->has('name'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif

                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    {{Form::select('accom_type',[''=>'Select type of Venue & Conference']+@$arr_accomm->pluck('name','id')->toArray(), (isset($arr_accommo_detail->accomType) && !empty($arr_accommo_detail->accomType) ? $arr_accommo_detail->accomType->id : ''),['class'=>'form-control'])}}

                                    @if ($errors->has('accom_type'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('accom_type') }}</strong>
                                    </span>
                                    @endif

                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    {{Form::select('rating',[''=>'Start Ratings']+@config('constants.star_rating'), (isset($arr_accommo_detail) && !empty($arr_accommo_detail) && count($arr_accommo_detail) > 0 ? $arr_accommo_detail->rating : ''),['class'=>'form-control'])}}
                                    @if ($errors->has('rating'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('rating') }}</strong>
                                    </span>
                                    @endif   

                                </div>



                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    {!! Form::text('reserving_email', (isset($arr_accommo_detail) && !empty($arr_accommo_detail) && count($arr_accommo_detail) > 0 ? $arr_accommo_detail->reserve_email : ''), ['class' => 'form-control email', 'placeholder' => 'Enter Reserving Email']) !!}
                                    @if ($errors->has('reserving_email'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('reserving_email') }}</strong>
                                    </span>
                                    @endif

                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    {{Form::select('country',[''=>'Select Country *']+@$arr_country->pluck('name','id')->toArray(), (isset($arr_accommo_detail->countryName) && !empty($arr_accommo_detail->countryName) && count($arr_accommo_detail->countryName) > 0 ? $arr_accommo_detail->countryName->id : ''),['id'=> 'state_id', 'class'=>'form-control country_id'])}}

                                    @if ($errors->has('country'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('country') }}</strong>
                                    </span>
                                    @endif

                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <?php 
                                    $state = [
                                        '' => 'Select State *'
                                        
                                    ];
                                    $city = [
                                        '' => 'Select City *'
                                        
                                    ];
                                    if(isset($arr_accommo_detail->stateName) && !empty($arr_accommo_detail->stateName) && count($arr_accommo_detail->stateName)){
                                        $state[] = array(
                                            $arr_accommo_detail->stateName->id => $arr_accommo_detail->stateName->name
                                            
                                        );
                                        
                                        
                                        
                                    }
                                    
                                    if(isset($arr_accommo_detail->cityName) && !empty($arr_accommo_detail->cityName) && count($arr_accommo_detail->cityName)){
                                        $city[] = array(
                                            $arr_accommo_detail->cityName->id => $arr_accommo_detail->cityName->name
                                            
                                        );
                                        
                                        
                                        
                                    }
                                    
                                    
                                    ?>
                                   
                                    {{Form::select('state', $state, (isset($arr_accommo_detail->stateName) && !empty($arr_accommo_detail->stateName) && count($arr_accommo_detail->stateName) > 0 ? $arr_accommo_detail->stateName->id : ''),['id'=> 'state_id', 'class'=>'form-control state_id'])}}

                                    @if ($errors->has('state'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('state') }}</strong>
                                    </span>
                                    @endif

                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-6 col-md-6 col-sm-12">

                                    {{Form::select('city', $city, (isset($arr_accommo_detail->cityName) && !empty($arr_accommo_detail->cityName) && count($arr_accommo_detail->cityName) > 0 ? $arr_accommo_detail->cityName->id : ''),['id'=> 'address_city_id', 'class'=>'form-control address_city_id'])}}

                                    @if ($errors->has('city'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                    @endif

                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    {!! Form::text('street_address', (isset($arr_accommo_detail) && !empty($arr_accommo_detail) && count($arr_accommo_detail) > 0 ? $arr_accommo_detail->street_address : ''), ['class' => 'form-control', 'placeholder' => 'Enter Street Address']) !!}
                                    @if ($errors->has('street_address'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('street_address') }}</strong>
                                    </span>
                                    @endif

                                </div>
                            </div>

                            <div class="form-group">

                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    {!! Form::text('area', (isset($arr_accommo_detail) && !empty($arr_accommo_detail) && count($arr_accommo_detail) > 0 ? $arr_accommo_detail->area : ''), ['class' => 'form-control', 'placeholder' => 'Enter suburb Area']) !!}
                                    @if ($errors->has('area'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('area') }}</strong>
                                    </span>
                                    @endif

                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    {!! Form::text('contact_no', (isset($arr_accommo_detail) && !empty($arr_accommo_detail) && count($arr_accommo_detail) > 0 ? $arr_accommo_detail->contact_no : ''), ['class' => 'form-control', 'placeholder' => 'Enter Contact Number']) !!}
                                    @if ($errors->has('contact_no'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('contact_no') }}</strong>
                                    </span>
                                    @endif

                                </div>

                            </div>

                            <div class="form-group">

                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    {!! Form::text('alternate_no', (isset($arr_accommo_detail) && !empty($arr_accommo_detail) && count($arr_accommo_detail) > 0 ? $arr_accommo_detail->alternate_no : ''), ['class' => 'form-control', 'placeholder' => 'Enter Alternate no']) !!}
                                    @if ($errors->has('area'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('alternate_no') }}</strong>
                                    </span>
                                    @endif

                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-3 control-label">Establishment Detail:</label>

                                <div class="col-lg-9 col-md-9 col-sm-9">
                                    {!! Form::textarea('establish_details', (isset($arr_accommo_detail) && !empty($arr_accommo_detail) && count($arr_accommo_detail) > 0 ? $arr_accommo_detail->establish_details : ''), ['rows' => 5, 'cols' => 5, 'class' => 'form-control', 'placeholder' => 'Give a description about your establishment']) !!}
                                    @if ($errors->has('establish_details'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('establish_details') }}</strong>
                                    </span>
                                    @endif
                                    {{ Form::input('hidden', 'type', 'P', ['readonly' => 'readonly']) }}
                                    {{ Form::input('hidden', 'id', (isset($arr_accommo_detail) && !empty($arr_accommo_detail) && count($arr_accommo_detail) > 0 ? $arr_accommo_detail : ''), ['readonly' => 'readonly']) }}

                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Accommodation Image</label>
                                <div class="col-sm-10">
                                    {{ Form::file('accomm_images[]', ['id' => 'acco_image', 'class' => 'file-styled maxfile', 'multiple' => true]) }}
                                    @if(isset($arr_accommo_detail) && count($arr_accommo_detail->accommoImages) > 0)
                                    <p class="mk-actv-thmb-msg">check the radio button to make active thumb.</p>
                                    <div class="edit-prod-image-cls">
                                        @foreach($arr_accommo_detail->accommoImages as $varImage)
                                        <span class="prod-img-span" style="position: relative;">
                                            <span class="img-del-cls" title="Delete Image" id="{{ $varImage->image_name }}_{{ $varImage->id }}">
                                                <a href="javascript:void" id="{{ $varImage->id }}" class="delete-image"><i class="fa fa-times-circle"></i></a>
                                            </span>

                                            @if(!empty($varImage->image_name) && file_exists(public_path('accom_venu_promo_images' . '/'. $varImage->image_name)))
                                            <img src="{{ url('/')}}/accom_venu_promo_images/{{ $varImage->image_name }}" height="140" width="140"/>
                                            {{ Form::radio('active_thumb', $varImage->id, $varImage->active_thumb=='1'?$varImage->id:'', ['class' => 'active_thumb_cls',
                                                            'data-toggle' => 'tooltip',
                                                            'title' => 'check to make it active thumb']) }}
                                            @else
                                            <img src="{{ url('/')}}/assets/images/no-image.png" height="140" width="140"/>        
                                            @endif
                                        </span>
                                        @endforeach
                                    </div>
                                    @endif
                                </div>
                                <div class="validation text-danger" style="display:none;"></div>
                            </div>

                            <div class="text-right">
                                <button type="submit" name="acco" value="accom" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>

                <!---Room form--->
                <div class="tab-pane fade has-padding" id="rooms">

                    {!!
                    Form::open(
                    array(
                    'name' => 'frm_room',
                    'id' => 'frm_room',
                    'url' => route('room_detail'),
                    'autocomplete' => 'off',
                    'class' => 'form-horizontal',
                    'files' => true
                    )
                    )
                    !!}

                    <div class="panel panel-flat">
                        <div class="panel-heading">
                            <h5 class="panel-title">Rooms</h5>
                        </div>
                        <div class="panel-body">

                            <div class="form-group">
                                <label class="col-lg-1 control-label">Description:</label>
                                <div class="col-lg-9">
                                    {!! Form::textarea('room_desc', (isset($arr_room_detail) && !empty($arr_room_detail) && count($arr_room_detail) > 0 ? $arr_room_detail[0]->desc : ''), ['rows' => 3, 'cols' => 3, 'class' => 'form-control required', 'placeholder' => 'Give a description about your Accommodation *']) !!}
                                    @if ($errors->has('room_desc'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('room_desc') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <?php
                            $w = 1;
                            $room_type_option = [];
                            $room_type_option[] = array(
                                'value' => '',
                                'display' => 'Select Type of Room *',
                                'data-icon' => 'stumbleupon'
                            );

                            if (isset($arr_room) && !empty($arr_room) && count($arr_room) > 0) {
                                foreach ($arr_room as $value) {
                                    $room_type_option[] = array(
                                        'value' => $value->id,
                                        'display' => $value->name,
                                        'data-icon' => 'stumbleupon'
                                    );
                                }
                            }

                            $room_cap = [];

                            $room_cap[] = array(
                                'value' => '',
                                'display' => 'Max Guest *',
                                'data-icon' => 'stumbleupon'
                            );

                            for ($i = 1; $i <= 50; $i++) {

                                $room_cap[] = array(
                                    'value' => $i,
                                    'display' => $i,
                                    'data-icon' => 'stumbleupon'
                                );
                            }

                            $con_venss = array(array(
                                    'value' => '',
                                    'display' => 'Choose Here',
                                    'data-icon' => 'stumbleupon'
                                ),
                                array(
                                    'value' => 'Y',
                                    'display' => 'Yes',
                                    'data-icon' => 'stumbleupon'
                                ),
                                array(
                                    'value' => 'N',
                                    'display' => 'No',
                                    'data-icon' => 'stumbleupon'
                                )
                            );
                            ?>

                            @if(isset($arr_room_detail) && !empty($arr_room_detail) && count($arr_room_detail) > 0)

                            @foreach($arr_room_detail as $room_detail)

                            <div class="form-group parentss">

                                <div class="col-md-2">

                                    {!! Form::fancyselect('room_type[]', $room_type_option, (isset($room_detail->roomType) && !empty($room_detail->roomType) && count($room_detail->roomType) > 0  ? $room_detail->roomType->id : ''), ['class'=>'select-icons required']) !!}

                                    @if ($errors->has('room_type.0'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('room_type.0') }}</strong>
                                    </span>
                                    @endif

                                </div>

                                <div class="col-md-2">

                                    {!! Form::fancyselect('guest[]', $room_cap, (isset($room_detail) && !empty($room_detail) ? $room_detail->guest : ''), ['class'=>'select-icons required']) !!}

                                    @if ($errors->has('guest.0'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('guest.0') }}</strong>
                                    </span>
                                    @endif

                                </div>

                                <div class="col-md-2">

                                    {!! Form::text('room_avail[]', (isset($room_detail) && !empty($room_detail) ? $room_detail->available : ''), ['class' => 'form-control required', 'placeholder' => 'Room Available *']) !!}
                                    @if ($errors->has('room_avail.0'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('room_avail.0') }}</strong>
                                    </span>
                                    @endif
                                </div>



                                <div class="col-md-2">
                                    {!! Form::text('room_price[]', (isset($room_detail) && !empty($room_detail) ? $room_detail->price : ''), ['class' => 'form-control required number', 'placeholder' => 'Room Price *']) !!}
                                    @if ($errors->has('room_price.0'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('room_price.0') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="col-md-2">
                                    {!! Form::text('room_short_desc[]', (isset($room_detail) && !empty($room_detail) ? $room_detail->short_desc : ''), ['class' => 'form-control required', 'placeholder' => 'Short Description *']) !!}
                                    @if ($errors->has('room_short_desc.0'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('room_short_desc.0') }}</strong>
                                    </span>
                                    @endif
                                </div>


                                <div class="col-md-2">
                                    {{ Form::file('room_img[]', ['id' => 'room_img', 'class' => 'file-styled', 'multiple' => false]) }}
                                    @if ($errors->has('room_img'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('room_img') }}</strong>
                                    </span>
                                    @endif


                                </div>

                                <div class="col-sm-10">
                                    <div class="edit-prod-image-cls">
                                        <span class="prod-img-span" style="position: relative;">
                                            @if(!empty($room_detail->room_image) && file_exists(public_path('room_images' . '/'. $room_detail->id.'_'.$room_detail->room_image)))
                                            <img src="{{ url('/')}}/room_images/{{ $room_detail->id }}_{{ $room_detail->room_image }}" height="140" width="140"/>
                                            @else
                                            <img src="{{ url('/')}}/assets/images/no-image.png" height="140" width="140"/>
                                            @endif
                                        </span>
                                    </div>
                                </div>
                                @if($w != 1)
                                <a href="javascript:void(0)" style="margin: 9px 0px 0px 10px;" id="{{ $room_detail->id }}" class="delete-room  label label-danger">Remove</a>
                                {{ Form::input('hidden', 'room_id[]', (isset($room_detail) && !empty($room_detail) && count($room_detail) > 0 ? $room_detail->id : ''), ['readonly' => 'readonly']) }}

                                @elseif($w==1)

                                {{ Form::input('hidden', 'room_id[]', (isset($room_detail) && !empty($room_detail) && count($room_detail) > 0 ? $room_detail->id : ''), ['readonly' => 'readonly']) }}

                                @endif

                            </div>

                            <?php $w++ ?>
                            @endforeach
                            @endif

                            <a href="javascript:void(0)" class='btn btn-success btn-add-more' >Add More</a>

                            <h5>Do you have Venue & Conference facilities at this property</h5>			

                            <div class="form-group">

                                <div class="col-md-2">
                                    {!! Form::fancyselect('ven_con_cond', (isset($con_venss) && !empty($con_venss) && count($con_venss) > 0 ? $con_venss : ''), (isset($arr_room_detail) && !empty($arr_room_detail) && count($arr_room_detail) > 0 ? $arr_room_detail[0]->venu_conf_cond : ''), ['id' => 'condit', 'class'=>'select-icons']) !!}
                                </div>

                            </div>

                            <div id='cv'>

                                <h6>Venue</h6>

                                <div class="form-group">
                                    <label class="col-lg-1 control-label">Description:</label>
                                    <div class="col-lg-9">

                                        {!! Form::textarea('venue_desc', (isset($arr_venu_detail) && !empty($arr_venu_detail) && count($arr_venu_detail) > 0 ? $arr_venu_detail[0]->desc : ''), ['rows' => 3, 'cols' => 3, 'class' => 'form-control required', 'placeholder' => 'Give a description about your Venue facility *']) !!}
                                        @if ($errors->has('venue_desc'))
                                        <span class="help-block" style = "display:block;color:red;">
                                            <strong>{{ $errors->first('venue_desc') }}</strong>
                                        </span>
                                        @endif
                                    </div>

                                </div>	

                                @if(isset($arr_venu_detail) && !empty($arr_venu_detail) && count($arr_venu_detail) > 0)
                                <?php $x = 1; ?>
                                @foreach($arr_venu_detail as $venu_data)

                                <div class="form-group venu-parents">
                                    <div class="col-md-2">

                                        {!! Form::text('venue_name[]', (isset($venu_data) && !empty($venu_data) ? $venu_data->name : ''), ['class' => 'form-control required', 'placeholder' => 'Venue Name *']) !!}
                                        @if ($errors->has('venue_name'))
                                        <span class="help-block" style = "display:block;color:red;">
                                            <strong>{{ $errors->first('venue_name') }}</strong>
                                        </span>
                                        @endif
                                    </div>

                                    <div class="col-md-2">

                                        {!! Form::text('venue_capacity[]', (isset($venu_data) && !empty($venu_data) ? $venu_data->capacity : ''), ['class' => 'form-control required', 'placeholder' => 'Capacity *']) !!}
                                        @if ($errors->has('venue_capacity.0'))
                                        <span class="help-block" style = "display:block;color:red;">
                                            <strong>{{ $errors->first('venue_capacity.0') }}</strong>
                                        </span>
                                        @endif
                                    </div>


                                    <div class="col-md-2">
                                        {!! Form::text('venue_price[]', (isset($venu_data) && !empty($venu_data) ? $venu_data->price : ''), ['class' => 'form-control required number', 'placeholder' => 'Venue Price *']) !!}
                                        @if ($errors->has('venue_price.0'))
                                        <span class="help-block" style = "display:block;color:red;">
                                            <strong>{{ $errors->first('venue_price.0') }}</strong>
                                        </span>
                                        @endif

                                    </div>


                                    <div class="col-md-2">
                                        {!! Form::text('venue_short_descr[]', (isset($venu_data) && !empty($venu_data) ? $venu_data->short_desc : ''), ['class' => 'form-control required', 'placeholder' => 'Short Description *']) !!}
                                        @if ($errors->has('venue_short_descr.0'))
                                        <span class="help-block" style = "display:block;color:red;">
                                            <strong>{{ $errors->first('venue_short_descr.0') }}</strong>
                                        </span>
                                        @endif

                                    </div>

                                    <div class="col-md-2">
                                        {{ Form::file('venu_img[]', ['id' => 'venu_img', 'class' => 'file-styled', 'multiple' => false]) }}
                                        @if ($errors->has('venu_img.0'))
                                        <span class="help-block" style = "display:block;color:red;">
                                            <strong>{{ $errors->first('venu_img.0') }}</strong>
                                        </span>
                                        @endif
                                    </div>

                                    <div class="col-sm-10">
                                        <div class="edit-prod-image-cls">
                                            <span class="prod-img-span" style="position: relative;">
                                                @if(!empty($venu_data->venu_image) && file_exists(public_path('venue_images' . '/'. $venu_data->id.'_'.$venu_data->venu_image)))
                                                <img src="{{ url('/')}}/venue_images/{{ $venu_data->id }}_{{ $venu_data->venu_image }}" height="140" width="140"/>
                                                @else
                                                <img src="{{ url('/')}}/assets/images/no-image.png" height="140" width="140"/>
                                                @endif
                                            </span>
                                        </div>
                                    </div>
                                    @if($x != 1)
                                    <a href="javascript:void(0)" style="margin: 9px 0px 0px 10px;" v_id="{{ $venu_data->id }}" class="delete-venu label label-danger">Remove</a>
                                    {{ Form::input('hidden', 'venue_id[]', (isset($venu_data) && !empty($venu_data) && count($venu_data) > 0 ? $venu_data->id : ''), ['readonly' => 'readonly']) }}

                                    @elseif($x==1)

                                    {{ Form::input('hidden', 'venue_id[]', (isset($venu_data) && !empty($venu_data) && count($venu_data) > 0 ? $venu_data->id : ''), ['readonly' => 'readonly']) }}

                                    @endif

                                </div>

                                <?php $x++; ?>
                                @endforeach

                                @endif

                                <a href="javascript:void(0)" class="venu-add-more btn btn-success" >Add More</a>
                                <br>
                                <br>
                                <h6>Conference</h6>

                                <div class="form-group">
                                    <label class="col-lg-1 control-label">Description:</label>
                                    <div class="col-lg-9">
                                        {!! Form::textarea('confer_desc', (isset($arr_confer_detail) && !empty($arr_confer_detail) && count($arr_confer_detail) > 0 ? $arr_confer_detail[0]->desc : ''), ['rows' => 3, 'cols' => 3, 'class' => 'form-control required', 'placeholder' => 'Give a description about your Conference facility *']) !!}
                                        @if ($errors->has('confer_desc'))
                                        <span class="help-block" style = "display:block;color:red;">
                                            <strong>{{ $errors->first('confer_desc') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                @if(isset($arr_confer_detail) && !empty($arr_confer_detail) && count($arr_confer_detail) > 0)
                                <?php $y = 1; ?>
                                @foreach($arr_confer_detail as $confer_data)

                                <div class="form-group confer-parents">
                                    <div class="col-md-2">

                                        {!! Form::text('confer_name[]', (isset($confer_data) && !empty($confer_data) ? $confer_data->name : ''), ['class' => 'form-control required', 'placeholder' => 'Conference Name *']) !!}
                                        @if ($errors->has('confer_name'))
                                        <span class="help-block" style = "display:block;color:red;">
                                            <strong>{{ $errors->first('confer_name') }}</strong>
                                        </span>
                                        @endif
                                    </div>

                                    <div class="col-md-2">

                                        {!! Form::text('confer_avail[]', (isset($confer_data) && !empty($confer_data) ? $confer_data->capacity : ''), ['class' => 'form-control required', 'placeholder' => 'Capacity *']) !!}
                                        @if ($errors->has('confer_avail.0'))
                                        <span class="help-block" style = "display:block;color:red;">
                                            <strong>{{ $errors->first('confer_avail.0') }}</strong>
                                        </span>
                                        @endif
                                    </div>


                                    <div class="col-md-2">
                                        {!! Form::text('confer_price[]', (isset($confer_data) && !empty($confer_data) ? $confer_data->price : ''), ['class' => 'form-control required number', 'placeholder' => 'Conference Price *']) !!}
                                        @if ($errors->has('confer_price.0'))
                                        <span class="help-block" style = "display:block;color:red;">
                                            <strong>{{ $errors->first('confer_price.0') }}</strong>
                                        </span>
                                        @endif

                                    </div>


                                    <div class="col-md-2">
                                        {!! Form::text('confer_short_descr[]', (isset($confer_data) && !empty($confer_data) ? $confer_data->short_desc : ''), ['class' => 'form-control required', 'placeholder' => 'Short Description *']) !!}
                                        @if ($errors->has('confer_short_descr.0'))
                                        <span class="help-block" style = "display:block;color:red;">
                                            <strong>{{ $errors->first('confer_short_descr.0') }}</strong>
                                        </span>
                                        @endif

                                    </div>

                                    <div class="col-md-2">
                                        {{ Form::file('confer_img[]', ['id' => 'confer_img', 'class' => 'file-styled', 'multiple' => false]) }}
                                        @if ($errors->has('confer_img.0'))
                                        <span class="help-block" style = "display:block;color:red;">
                                            <strong>{{ $errors->first('confer_img.0') }}</strong>
                                        </span>
                                        @endif
                                    </div>

                                    <div class="col-sm-10">
                                        <div class="edit-prod-image-cls">
                                            <span class="prod-img-span" style="position: relative;">
                                                @if(!empty($confer_data->confer_image) && file_exists(public_path('confer_images' . '/'. $confer_data->id.'_'.$confer_data->confer_image)))
                                                <img src="{{ url('/')}}/confer_images/{{ $confer_data->id }}_{{ $confer_data->confer_image }}" height="140" width="140"/>
                                                @else
                                                <img src="{{ url('/')}}/assets/images/no-image.png" height="140" width="140"/>
                                                @endif
                                            </span>
                                        </div>
                                    </div>
                                    @if($y != 1)
                                    <a href="javascript:void(0)" style="margin: 9px 0px 0px 10px;" c_id="{{ $confer_data->id }}" class="delete-confer label label-danger">Remove</a>
                                    {{ Form::input('hidden', 'confer_id[]', (isset($confer_data) && !empty($confer_data) && count($confer_data) > 0 ? $confer_data->id : ''), ['readonly' => 'readonly']) }}

                                    @elseif($y==1)

                                    {{ Form::input('hidden', 'confer_id[]', (isset($confer_data) && !empty($confer_data) && count($confer_data) > 0 ? $confer_data->id : ''), ['readonly' => 'readonly']) }}

                                    @endif

                                </div>
                                <?php $y++; ?>
                                @endforeach

                                @endif

                                <a href="javascript:void(0)" class="confer-add-more btn btn-success">Add More</a>
                                {{ Form::input('hidden', 'accommo_id', (isset($urlId) && !empty($urlId) ? $urlId : ''), ['readonly' => 'readonly']) }}
                                {{ Form::input('hidden', 'type', 'P', ['readonly' => 'readonly']) }}
                            </div>

                            <div class="text-right">
                                <button type="submit" name="room_update" value="room" class="btn btn-primary">Update</button>
                            </div>


                        </div>
                    </div>

                    {!! Form::close() !!}

                </div>

                <!---Activity form--->
                <div class="tab-pane fade has-padding" id="activity">

                    {!!
                    Form::open(
                    array(
                    'name' => 'frm_activity',
                    'id' => 'frm_activity',
                    'url' => route('activity_detail'),
                    'autocomplete' => 'off',
                    'class' => 'form-horizontal',
                    'files' => false
                    )
                    )
                    !!}

                    <?php
                    $amenity_option = [];

                    if (!empty($arr_amenity) && count($arr_amenity) > 0) {
                        foreach ($arr_amenity as $amenity) {
                            $amenity_option[] = array(
                                'value' => $amenity->id,
                                'display' => $amenity->name,
                                'data-icon' => 'stumbleupon'
                            );
                        }
                    }


                    $activity_option = [];

                    if (!empty($arr_activity) && count($arr_activity) > 0) {
                        foreach ($arr_activity as $actvity) {
                            $activity_option[] = array(
                                'value' => $actvity->id,
                                'display' => $actvity->name,
                                'data-icon' => 'stumbleupon'
                            );
                        }
                    }


                    $selecteds = [];
                    if (!empty($arr_activity_detail) && count($arr_activity_detail) > 0) {
                        foreach ($arr_activity_detail as $selcted) {
                            $selecteds[] = $selcted->activity_id;
                        }
                    }


                    $selected_ameity = [];
                    if (!empty($arr_amenity_detail) && count($arr_amenity_detail) > 0) {
                        foreach ($arr_amenity_detail as $selamenit) {
                            $selected_ameity[] = $selamenit->amenity_id;
                        }
                    }


                    $surr = [];
                    $surr[] = array(
                        'value' => '',
                        'display' => 'Select Type of Attractoin *',
                        'data-icon' => 'stumbleupon'
                    );

                    if (!empty($arr_surr) && count($arr_surr) > 0) {
                        foreach ($arr_surr as $surrvalue) {
                            $surr[] = array(
                                'value' => $surrvalue->id,
                                'display' => $surrvalue->name,
                                'data-icon' => 'stumbleupon'
                            );
                        }
                    }


                    $shuttle_option = [];
                    $shuttle_option = array(array(
                            'value' => '',
                            'display' => 'Shuttle Service *',
                            'data-icon' => 'stumbleupon'
                        ),
                        array(
                            'value' => 'Y',
                            'display' => 'Yes',
                            'data-icon' => 'stumbleupon'
                        ),
                        array(
                            'value' => 'N',
                            'display' => 'No',
                            'data-icon' => 'stumbleupon'
                        )
                    );
                    ?>

                    <div class="panel panel-flat">
                        <div class="panel-heading">
                            <h5 class="panel-title">Activities</h5>
                        </div>
                        <div class="panel-body">

                            <div class="form-group">
                                <label class="col-lg-2 control-label">Amenity:</label>
                                <div class="col-lg-10">
                                    {!! Form::textarea('amenity_desc', (isset($arr_amenity_detail) && !empty($arr_amenity_detail) && count($arr_amenity_detail) > 0 ? $arr_amenity_detail->first()->desc : ''), ['rows' => 5, 'cols' => 5, 'class' => 'form-control required', 'placeholder' => 'Amenity description *']) !!}
                                    @if ($errors->has('amenity_desc'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('amenity_desc') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-2 control-label">Amenity on property:</label>
                                <div class="col-lg-10">
                                    {!! Form::multiselect('amenity_property[]', $amenity_option, (isset($selected_ameity) && !empty($selected_ameity) && count($selected_ameity) > 0 ? $selected_ameity : '' ), ['class'=>'select-icons required', 'placeholder' => 'Select Amenity on Property *', 'data-placeholder' => "Select Amenity on property *", 'multiple' => 'multiple']) !!}

                                    @if ($errors->has('amenity_property'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('amenity_property') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-2 control-label">Activity:</label>
                                <div class="col-lg-10">
                                    {!! Form::textarea('activity_desc', (isset($arr_activity_detail) && !empty($arr_activity_detail) && count($arr_activity_detail) > 0 ? $arr_activity_detail->first()->desc : ''), ['rows' => 5, 'cols' => 5, 'class' => 'form-control required', 'placeholder' => 'Activity description *']) !!}
                                    @if ($errors->has('activity_desc'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('activity_desc') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-2 control-label">Activity on Property :</label>
                                <div class="col-lg-10">
                                    {!! Form::multiselect('activity_property[]', $activity_option, (isset($selecteds) && !empty($selecteds) && count($selecteds) > 0 ? $selecteds : '' ), ['class'=>'select-icons required', 'placeholder' => 'Select Activity on Property *', 'data-placeholder' => "Select Activity on property *", 'multiple' => 'multiple']) !!}
                                    @if ($errors->has('activity_property'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('activity_property') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>



                            <h5>Popular Attraction and surroundings: Please provide as many details as possible</h5>

                            @if(isset($arr_surr_detail) && !empty($arr_surr_detail) && count($arr_surr_detail) > 0)
                            <?php $z = 1; ?>
                            @foreach($arr_surr_detail as $surr_detail)

                            <div class="form-group attract-parents">
                                <div class="col-md-4">

                                    {!! Form::text('attraction_name[]', (isset($surr_detail) && !empty($surr_detail) ? $surr_detail->name : ''), ['class' => 'form-control required', 'placeholder' => 'Name of Attraction *']) !!}

                                    @if ($errors->has('attraction_name.0'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('attraction_name.0') }}</strong>
                                    </span>
                                    @endif

                                </div>

                                <div class="col-md-4">

                                    {!! Form::fancyselect('surrounding[]', $surr, (isset($surr_detail) && !empty($surr_detail) ? $surr_detail->surrounding_id : ''), ['class'=>'select-icons required']) !!}

                                    @if ($errors->has('surrounding.0'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('surrounding.0') }}</strong>
                                    </span>
                                    @endif

                                </div>

                                <div class="col-md-4">

                                    {!! Form::text('approx_dist[]', (isset($surr_detail) && !empty($surr_detail) ? $surr_detail->distance : ''), ['class' => 'form-control required', 'placeholder' => 'Approximate Distance *']) !!}
                                    @if ($errors->has('approx_dist.0'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('approx_dist.0') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                @if($z != 1)
                                <a href="javascript:void(0)" style="margin: 9px 0px 0px 10px;" su_id="{{ $surr_detail->id }}" class="delete-surr  label label-danger">Remove</a>
                                {{ Form::input('hidden', 'suur_id[]', (isset($surr_detail) && !empty($surr_detail) && count($surr_detail) > 0 ? $surr_detail->id : ''), ['readonly' => 'readonly']) }}

                                @elseif($z==1)

                                {{ Form::input('hidden', 'suur_id[]', (isset($surr_detail) && !empty($surr_detail) && count($surr_detail) > 0 ? $surr_detail->id : ''), ['readonly' => 'readonly']) }}

                                @endif
                                <?php $z++ ?>

                            </div>

                            @endforeach
                            @endif

                            <a href="javascript:void(0)" class="attract-add-more btn btn-success">Add More</a>

                            <div class="panel-heading">
                                <h6 class="panel-title">Transport</h6>
                            </div> 			

                            <div class="form-group">
                                <label class="col-lg-8 control-label">Transport / Shuttle Service</label>
                                <div class="col-lg-12">

                                    {!! Form::fancyselect('shuttle', $shuttle_option, (isset($arr_surr_detail) && !empty($arr_surr_detail) && count($arr_surr_detail) > 0 ? $arr_surr_detail->first()->shuttle : ''), ['class'=>'select-icons required']) !!}
                                    @if ($errors->has('shuttle'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('shuttle') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                {{ Form::input('hidden', 'accommo_id', (isset($urlId) && !empty($urlId) ? $urlId : ''), ['readonly' => 'readonly']) }}
                                {{ Form::input('hidden', 'type', 'P', ['readonly' => 'readonly']) }}
                            </div>

                            <div class="text-right">
                                <button type="submit" name="activity" value="Update" class="btn btn-primary">Update</button>
                            </div>

                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>

                <!---policy form--->
                <div class="tab-pane fade has-padding" id="policy">

                    {!!
                    Form::open(
                    array(
                    'name' => 'frm_policy',
                    'id' => 'frm_policy',
                    'url' => route('policy_detail'),
                    'autocomplete' => 'off',
                    'class' => 'form-horizontal',
                    'files' => true
                    )
                    )
                    !!}

                    <?php
                    $payment_option = [];

                    if (!empty($arr_payment) && count($arr_payment) > 0) {
                        foreach ($arr_payment as $payment) {
                            $payment_option[] = array(
                                'value' => $payment->id,
                                'display' => $payment->name,
                                'data-icon' => 'stumbleupon'
                            );
                        }
                    }

                    $acco_option = [];
                    $acco_option = array(array(
                            'value' => '',
                            'display' => 'Select Duration of Accommodation *',
                            'data-icon' => 'stumbleupon'
                        ),
                        array(
                            'value' => 'long_term',
                            'display' => 'Long Term',
                            'data-icon' => 'stumbleupon'
                        ),
                        array(
                            'value' => 'short_term',
                            'display' => 'Short Term',
                            'data-icon' => 'stumbleupon'
                        ),
                        array(
                            'value' => 'long_short_term',
                            'display' => 'Long & short term',
                            'data-icon' => 'stumbleupon'
                        )
                    );


                    $corporate_option = [];
                    $corporate_option = array(array(
                            'value' => '',
                            'display' => 'Select Corporate Deals *',
                            'data-icon' => 'stumbleupon'
                        ),
                        array(
                            'value' => 'Y',
                            'display' => 'Yes',
                            'data-icon' => 'stumbleupon'
                        ),
                        array(
                            'value' => 'N',
                            'display' => 'No',
                            'data-icon' => 'stumbleupon'
                        )
                    );

                    $contractor_option = [];
                    $contractor_option = array(array(
                            'value' => '',
                            'display' => 'Select Contractors Deals *',
                            'data-icon' => 'stumbleupon'
                        ),
                        array(
                            'value' => 'Y',
                            'display' => 'Yes',
                            'data-icon' => 'stumbleupon'
                        ),
                        array(
                            'value' => 'N',
                            'display' => 'No',
                            'data-icon' => 'stumbleupon'
                        )
                    );

                    $extra_option = [];
                    $extra_option = array(array(
                            'value' => '',
                            'display' => 'Select Extra Condition *',
                            'data-icon' => 'stumbleupon'
                        ),
                        array(
                            'value' => 'Y',
                            'display' => 'Yes',
                            'data-icon' => 'stumbleupon'
                        ),
                        array(
                            'value' => 'N',
                            'display' => 'No',
                            'data-icon' => 'stumbleupon'
                        )
                    );

                    if (isset($arr_policy_detail) && !empty($arr_policy_detail) && count($arr_policy_detail) > 0) {
                        $pmt_accept = [];
                        foreach ($arr_policy_detail->paymentAccept as $val) {
                            $pmt_accept[] = $val->payment_mode_id;
                        }
                    }
                    ?>

                    <div class="panel panel-flat">
                        <div class="panel-heading">
                            <h5 class="panel-title">Policies</h5>
                        </div>
                        <div class="panel-body">


                            <div class="form-group extra-parents">

                                <div class="col-lg-6">
                                    {!! Form::text('deposite', config('constants.policy')['policy_share'].'% Deposit', ['class' => 'form-control required', 'readonly' => 'true']) !!}
                                </div>


                                <div class="col-lg-6">
                                    {!! Form::text('cancel', (isset($arr_policy_detail) && !empty($arr_policy_detail) && count($arr_policy_detail) > 0 ? $arr_policy_detail->policy_cancel : ''), ['class' => 'form-control required', 'placeholder' => 'Enter Cancellation Policy *']) !!}
                                    @if ($errors->has('cancel'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('cancel') }}</strong>
                                    </span>
                                    @endif

                                </div>
                            </div>

                            <h6> 
                                {{ config('constants.policy')['desc'] }}

                            </h6>

                            <div class="form-group">

                                <div class="col-lg-6">
                                    {!! Form::text('timein', (isset($arr_policy_detail) && !empty($arr_policy_detail) && count($arr_policy_detail) > 0 ? $arr_policy_detail->time_in : ''), ['class' => 'form-control required', 'placeholder' => 'Enter Time In *']) !!}
                                    @if ($errors->has('timein'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('timein') }}</strong>
                                    </span>
                                    @endif
                                </div>


                                <div class="col-lg-6">
                                    {!! Form::text('timeout', (isset($arr_policy_detail) && !empty($arr_policy_detail) && count($arr_policy_detail) > 0 ? $arr_policy_detail->time_out : ''), ['class' => 'form-control required', 'placeholder' => 'Enter Time Out *']) !!}
                                    @if ($errors->has('timeout'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('timeout') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-lg-6">
                                    {!! Form::text('child_extra', (isset($arr_policy_detail) && !empty($arr_policy_detail) && count($arr_policy_detail) > 0 ? $arr_policy_detail->extra_child : ''), ['class' => 'form-control', 'placeholder' => 'Children & Extra']) !!}
                                </div>


                                <div class="col-lg-6">
                                    {!! Form::text('pets', (isset($arr_policy_detail) && !empty($arr_policy_detail) && count($arr_policy_detail) > 0 ? $arr_policy_detail->pets : ''), ['class' => 'form-control', 'placeholder' => 'Pets']) !!}
                                </div>
                            </div>

                            <div class="form-group">

                                <div class="col-lg-6">
                                    {!! Form::multiselect('payment_type[]', $payment_option, (isset($pmt_accept) && !empty($pmt_accept) && count($pmt_accept) > 0 ? $pmt_accept : '3'), ['class'=>'select-icons required', 'placeholder' => 'Payment accepted at this facility *', 'data-placeholder' => "Payment accepted at this facility *", 'multiple' => 'multiple']) !!}
                                    @if ($errors->has('payment_type'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('payment_type') }}</strong>
                                    </span>
                                    @endif
                                </div>


                                <div class="col-lg-6">
                                    {!! Form::text('lang_spoken', (isset($arr_policy_detail) && !empty($arr_policy_detail) && count($arr_policy_detail) > 0 ? $arr_policy_detail->lang_spoken : ''), ['class' => 'form-control', 'placeholder' => 'Language Spoken At Facility']) !!}

                                </div>
                            </div>

                            <div class="form-group">

                                <div class="col-lg-4">
                                    {!! Form::fancyselect('acco_duration', $acco_option, (isset($arr_policy_detail) && !empty($arr_policy_detail) && count($arr_policy_detail) > 0 ? $arr_policy_detail->acco_duration : ''), ['class'=>'select-icons required']) !!}
                                    @if ($errors->has('acco_duration'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('acco_duration') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="col-lg-4">
                                    {!! Form::fancyselect('corpo_deals', $corporate_option, (isset($arr_policy_detail) && !empty($arr_policy_detail) && count($arr_policy_detail) > 0 ? $arr_policy_detail->corpo_deals : ''), ['class'=>'select-icons required']) !!}
                                    @if ($errors->has('corpo_deals'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('corpo_deals') }}</strong>
                                    </span>
                                    @endif

                                </div>

                                <div class="col-lg-4">
                                    {!! Form::fancyselect('contract_deal', $contractor_option, (isset($arr_policy_detail) && !empty($arr_policy_detail) && count($arr_policy_detail) > 0 ? $arr_policy_detail->contract_deal : ''), ['class'=>'select-icons required']) !!}
                                    @if ($errors->has('contract_deal'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('contract_deal') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-lg-3 control-label">Your  Terms</label>
                                <div class="col-lg-9">
                                    {!! Form::textarea('policy_terms', (isset($arr_policy_detail) && !empty($arr_policy_detail) && count($arr_policy_detail) > 0 ? $arr_policy_detail->policy_terms : ''), ['rows' => 5, 'cols' => 5, 'class' => 'form-control required', 'placeholder' => 'Enter your Terms *']) !!}
                                    @if ($errors->has('policy_terms'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('policy_terms') }}</strong>
                                    </span>
                                    @endif
                                </div>

                            </div>

                            <h5>Do you offer extra's ( Example:Flower )</h5>	

                            @if(isset($arr_offer_detail) && !empty($arr_offer_detail) && count($arr_offer_detail) > 0)
                            <?php $a = 1; ?>
                            @foreach($arr_offer_detail as $offer_detail)

                            <div class="form-group extra-parents">

                                <div class="col-md-3">
                                    {!! Form::text('item[]', (isset($offer_detail) && !empty($offer_detail) && count($offer_detail) > 0 ? $offer_detail->name : ''), ['class' => 'form-control required', 'placeholder' => 'Item Name *']) !!}
                                    @if ($errors->has('item.0'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('item.0') }}</strong>
                                    </span>
                                    @endif

                                </div>

                                <div class="col-md-3">
                                    {!! Form::text('extra_price[]', (isset($offer_detail) && !empty($offer_detail) && count($offer_detail) > 0 ? $offer_detail->price : ''), ['class' => 'form-control required', 'placeholder' => 'Enter Price *']) !!}
                                    @if ($errors->has('extra_price.0'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('extra_price.0') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="col-md-3">
                                    {!! Form::fancyselect('extra_cond[]', $extra_option, (isset($offer_detail) && !empty($offer_detail) && count($offer_detail) > 0 ? $offer_detail->condition : ''), ['class'=>'select-icons required']) !!}
                                    @if ($errors->has('extra_cond.0'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('extra_cond.0') }}</strong>
                                    </span>
                                    @endif

                                </div>

                                <div class="col-md-2">
                                    {{ Form::file('extra_img[]', ['id' => 'extra_img', 'class' => 'file-styled', 'multiple' => false]) }}
                                    @if ($errors->has('extra_img.0'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('extra_img.0') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="col-sm-10">
                                    <div class="edit-prod-image-cls">
                                        <span class="prod-img-span" style="position: relative;">
                                            @if(!empty($offer_detail->offer_image) && file_exists(public_path('extra_images' . '/'. $offer_detail->id.'_'.$offer_detail->offer_image)))
                                            <img src="{{ url('/')}}/extra_images/{{ $offer_detail->id }}_{{ $offer_detail->offer_image }}" height="140" width="140"/>
                                            @else
                                            <img src="{{ url('/')}}/assets/images/no-image.png" height="140" width="140"/>
                                            @endif
                                        </span>
                                    </div>
                                </div>

                                @if($a != 1)
                                <a href="javascript:void(0)" style="margin: 9px 0px 0px 10px;" off_id="{{ $offer_detail->id }}" class="delete-offer  label label-danger">Remove</a>
                                {{ Form::input('hidden', 'offer_id[]', (isset($offer_detail) && !empty($offer_detail) && count($offer_detail) > 0 ? $offer_detail->id : ''), ['readonly' => 'readonly']) }}

                                @elseif($a==1)

                                {{ Form::input('hidden', 'offer_id[]', (isset($offer_detail) && !empty($offer_detail) && count($offer_detail) > 0 ? $offer_detail->id : ''), ['readonly' => 'readonly']) }}

                                @endif
                                <?php $a++ ?>

                            </div>

                            @endforeach
                            @endif

                            {{ Form::input('hidden', 'accommo_id', (isset($urlId) && !empty($urlId) ? $urlId : ''), ['readonly' => 'readonly']) }}
                            {{ Form::input('hidden', 'policy_id', (isset($arr_policy_detail) && !empty($arr_policy_detail) ? $arr_policy_detail->id : ''), ['readonly' => 'readonly']) }}
                            {{ Form::input('hidden', 'type', 'P', ['readonly' => 'readonly']) }}

                            <a href="javascript:void(0)" class='btn btn-success extra-add-more'>Add</a>


                            <div class="text-right">
                                <button type="submit" name="policy" value="Update" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>

                <!---meta tag form--->
                <div class="tab-pane fade has-padding" id="keywords">
                    {!!
                    Form::open(
                    array(
                    'name' => 'frm_meta',
                    'id' => 'frm_meta',
                    'url' => route('metatag_detail'),
                    'autocomplete' => 'off',
                    'class' => 'form-horizontal',
                    'files' => true
                    )
                    )
                    !!}
                    <div class="panel panel-flat">
                        <div class="panel-heading">
                            <h5 class="panel-title">Keywords & Metatags</h5>
                        </div>

                        <div class="panel-body">

                            <div class="form-group">
                                <label class="col-lg-3 control-label">Title:</label>
                                <div class="col-lg-9">
                                    {!! Form::text('title', ( isset($arr_meta_detail) && !empty($arr_meta_detail) && count($arr_meta_detail) > 0 ? $arr_meta_detail->title : ''), ['class' => 'form-control required', 'placeholder' => 'Enter Your Title *']) !!}
                                    @if ($errors->has('title'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-3 control-label">Keywords:</label>
                                <div class="col-lg-9">
                                    {!! Form::textarea('keyword', ( isset($arr_meta_detail) && !empty($arr_meta_detail) && count($arr_meta_detail) > 0 ? $arr_meta_detail->keyword : ''), ['rows' => 5, 'cols' => 5, 'class' => 'form-control required', 'placeholder' => 'Enter your Keywords here *']) !!}
                                    @if ($errors->has('keyword'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('keyword') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-3 control-label">Meta Tags:</label>
                                <div class="col-lg-9">
                                    {!! Form::textarea('meta_desc', ( isset($arr_meta_detail) && !empty($arr_meta_detail) && count($arr_meta_detail) > 0 ? $arr_meta_detail->meta_desc : ''), ['rows' => 5, 'cols' => 5, 'class' => 'form-control required', 'placeholder' => 'Enter your Meta Tags here *']) !!}
                                    @if ($errors->has('meta_desc'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('meta_desc') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                {{ Form::input('hidden', 'accommo_id', (isset($urlId) && !empty($urlId) ? $urlId : ''), ['readonly' => 'readonly']) }}
                                {{ Form::input('hidden', 'meta_id', (isset($arr_meta_detail) && !empty($arr_meta_detail) ? $arr_meta_detail->id : ''), ['readonly' => 'readonly']) }}
                                {{ Form::input('hidden', 'type', 'P', ['readonly' => 'readonly']) }}
                            </div>

                            <div class="text-right">
                                <button type="submit" name="meta_tag" value="meta" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>

                <!---video & map form--->
                <div class="tab-pane fade has-padding" id="videomap">
                    {!!
                    Form::open(
                    array(
                    'name' => 'frm_video',
                    'id' => 'frm_video',
                    'url' => route('video_map_detail'),
                    'autocomplete' => 'off',
                    'class' => 'form-horizontal',
                    'files' => true
                    )
                    )
                    !!}

                    <?php
                    $video_option = [];
                    $video_option = array(array(
                            'value' => '',
                            'display' => 'Choose Here',
                            'data-icon' => 'stumbleupon'
                        ),
                        array(
                            'value' => 'Y',
                            'display' => 'Yes',
                            'data-icon' => 'stumbleupon'
                        ),
                        array(
                            'value' => 'N',
                            'display' => 'No',
                            'data-icon' => 'stumbleupon'
                        )
                    );
                    ?>
                    <div class="panel panel-flat">
                        <div class="panel-heading">
                            <h5 class="panel-title">Video and Map</h5>
                        </div>
                        <div class="panel-body">

                            <div class="form-group">
                                <label class="col-lg-6 control-label">Do you have any video link :</label>
                                <div class="col-lg-12">
                                    {!! Form::fancyselect('video_cond', $video_option, ( isset($arr_video_detail) && !empty($arr_video_detail) && count($arr_video_detail) > 0 ? $arr_video_detail->is_link : ''), ['id'=>'vid_con', 'class'=>'select-icons required']) !!}
                                </div>
                            </div>


                            <div class="form-group" id="viddiv" style='display:none;'>
                                <label class="col-lg-3 control-label">Accommodation Video </label>
                                <div class="col-lg-9">
                                    {!! Form::text('video_link', ( isset($arr_video_detail) && !empty($arr_video_detail) && count($arr_video_detail) > 0 ? $arr_video_detail->video_link : ''), ['class' => 'form-control required url', 'placeholder' => 'Paste Your Accommodation Link here Eg-: http://example.com *']) !!}
                                    @if ($errors->has('video_link'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('video_link') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <h4> Location</h4>							

                            <div class="form-group">
                                <label class="col-lg-3 control-label">Latitude:</label>
                                <div class="col-lg-9">
                                    {!! Form::text('lat', ( isset($arr_video_detail) && !empty($arr_video_detail) && count($arr_video_detail) > 0 ? $arr_video_detail->lat : ''), ['class' => 'form-control required latCoord', 'placeholder' => 'Enter Latitude *']) !!}
                                    @if ($errors->has('lat'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('lat') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Longitude:</label>
                                <div class="col-lg-9">
                                    {!! Form::text('long', ( isset($arr_video_detail) && !empty($arr_video_detail) && count($arr_video_detail) > 0 ? $arr_video_detail->long : ''), ['class' => 'form-control required longCoord', 'placeholder' => 'Enter Longitude *']) !!}
                                    @if ($errors->has('long'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('long') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                {{ Form::input('hidden', 'accommo_id', (isset($urlId) && !empty($urlId) ? $urlId : ''), ['readonly' => 'readonly']) }}
                                {{ Form::input('hidden', 'video_id', (isset($arr_video_detail) && !empty($arr_video_detail) ? $arr_video_detail->id : ''), ['readonly' => 'readonly']) }}
                                {{ Form::input('hidden', 'type', 'P', ['readonly' => 'readonly']) }}
                            </div>

                            <div class="text-right">
                                <button type="submit" name="video_map" value="video" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>

            </div>

        </div>
    </div>
</div>
</div>

@endsection

@section('pageTitle')
Edit Promotion
@endsection

@section('addtional_css')
<style>
    .img-del-cls {
        color: #f00;
        font-size: 20px;
        position: absolute;
        right: -5px;
        top: -14px;
        cursor: pointer;
    }
    .mk-actv-thmb-msg {
        color: #f00;
        font-size: 13px;
        margin: 5px 0 -10px 4px;
    }
</style>

@endsection

@section('jscript')

<script type="text/javascript" src="{{ asset('/assets/admin/js/select2.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/assets/admin/js/uniform.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/assets/admin/js/app.js') }}"></script>
<script type="text/javascript" src="{{ asset('/assets/admin/js/form_layouts.js') }}"></script>
<script type="text/javascript" src="{{asset('/assets/js/heystranger-js/city.js')}}"></script>
<script type="text/javascript" src="{{asset('/assets/js/heystranger-js/client-validation.js')}}"></script>
<script type="text/javascript" src="{{asset('/assets/js/heystranger-js/delete-image.js')}}"></script>
<script type="text/javascript" src="{{asset('/assets/js/heystranger-js/delete-room.js')}}"></script>

<script type="text/javascript">

//////////////////////////room add more////////////////////////
            var room_temp = '<div class="form-group parentss">'+
            
            '<div class="col-md-2">'+
           '{!! Form::fancyselect('room_type[]', (isset($room_type_option) && !empty($room_type_option) ? $room_type_option : ''), null, ['class'=>'form-control select-icons']) !!}</div>'+
           
            '<div class="col-md-2">'+
            '{!! Form::fancyselect('guest[]', (isset($room_cap) && !empty($room_cap) ? $room_cap : ''), null, ['class'=>'form-control select-icons']) !!}'+
            '</div>'+
            
            '<div class="col-md-2">'+
            '{!! Form::text('room_avail[]', null, ['class' => 'form-control', 'placeholder' => 'Room Available *']) !!}'+
            '</div>'+
    
            '<div class="col-md-2">'+
            '{!! Form::text('room_price[]', null, ['class' => 'form-control required number', 'placeholder' => 'Room Price *']) !!}'+
            '</div>'+
    
            '<div class="col-md-2">'+
            '{!! Form::text('room_short_desc[]', null, ['class' => 'form-control', 'placeholder' => 'Short Description *']) !!}'+
            '</div>'+
            
            '<div class="col-md-2">'+
            '{{ Form::file('room_img[]', ['id' => 'room_img', 'class' => 'form-control file-styled', 'multiple' => false]) }}'+
            '</div>'+
            '<a href="javascript:void(0)" style="margin: 9px 0px 0px 10px;" class="btn-remove label label-danger">Remove</a>'+
            '{{ Form::input('hidden', 'room_id[]',null, ['readonly' => 'readonly']) }}'+
            '</div>';
    
        $(".btn-add-more").on('click', function(e){
            e.preventDefault();
            $(this).before(room_temp)
        });
        
        $(document).on('click','.btn-remove',function(e){    
                
                e.preventDefault();
                $(this).parents(".parentss").remove();
        });
        
        
        //////////////////////////venu add more////////////////////////
        var venu_temp = '<div class="form-group venu-parents">'+
                
            '<div class="col-md-2">'+
            '{!! Form::text('venue_name[]', null, ['class' => 'form-control required', 'placeholder' => 'Venue Name *']) !!}'+
            '</div>'+    
            
            '<div class="col-md-2">'+
            '{!! Form::text('venue_capacity[]', null, ['class' => 'form-control required', 'placeholder' => 'Capacity *']) !!}'+
            '</div>'+
    
            '<div class="col-md-2">'+
            '{!! Form::text('venue_price[]', null, ['class' => 'form-control required number', 'placeholder' => 'Venue Price *']) !!}'+
            '</div>'+
    
            '<div class="col-md-2">'+
            '{!! Form::text('venue_short_descr[]', null, ['class' => 'form-control required', 'placeholder' => 'Short Description *']) !!}'+
            '</div>'+
            
            '<div class="col-md-2">'+
            '{{ Form::file('venu_img[]', ['class' => 'form-control file-styled', 'multiple' => false]) }}'+
            '</div>'+
            '<a href="javascript:void(0)" style="margin: 9px 0px 0px 10px;" class="venu-remove label label-danger">Remove</a>'+
            '{{ Form::input('hidden', 'venue_id[]',null, ['readonly' => 'readonly']) }}'+
            '</div>';
    
        $(".venu-add-more").on('click', function(e){
            e.preventDefault();
            $(this).before(venu_temp)
        });
        
        $(document).on('click','.venu-remove',function(e){    
                e.preventDefault();
                $(this).parents(".venu-parents").remove();
        });
        
        //////////////////////////conference add more////////////////////////
        var confer_temp = '<div class="form-group confer-parents">'+
                
            '<div class="col-md-2">'+
            '{!! Form::text('confer_name[]', null, ['class' => 'form-control required', 'placeholder' => 'Conference Name *']) !!}'+
            '</div>'+    
            
            '<div class="col-md-2">'+
            '{!! Form::text('confer_avail[]', null, ['class' => 'form-control required', 'placeholder' => 'Capacity *']) !!}'+
            '</div>'+
    
            '<div class="col-md-2">'+
            '{!! Form::text('confer_price[]', null, ['class' => 'form-control required number', 'placeholder' => 'Conference Price *']) !!}'+
            '</div>'+
    
            '<div class="col-md-2">'+
            '{!! Form::text('confer_short_descr[]', null, ['class' => 'form-control required', 'placeholder' => 'Short Description *']) !!}'+
            '</div>'+
            
            '<div class="col-md-2">'+
            '{{ Form::file('confer_img[]', ['class' => 'form-control file-styled', 'multiple' => false]) }}'+
            '</div>'+
            '<a href="javascript:void(0)" style="margin: 9px 0px 0px 10px;" class="confer-remove label label-danger">Remove</a>'+
            '{{ Form::input('hidden', 'confer_id[]',null, ['readonly' => 'readonly']) }}'+
            '</div>';
    
        $(".confer-add-more").on('click', function(e){
            e.preventDefault();
            $(this).before(confer_temp)
        });
        
        $(document).on('click','.confer-remove',function(e){    
                e.preventDefault();
                $(this).parents(".confer-parents").remove();
        });


        //////////////////////////attraction add more////////////////////////
        var attract_temp = '<div class="form-group attract-parents">'+
                
            '<div class="col-md-4">'+
            '{!! Form::text('attraction_name[]', null, ['class' => 'form-control required', 'placeholder' => 'Name of Attraction *']) !!}'+
            '</div>'+    
            
            '<div class="col-md-4">'+
            '{!! Form::fancyselect('surrounding[]', (isset($surr) && !empty($surr) ? $surr : ''), null, ['class'=>'form-control select-icons required']) !!}'+
            '</div>'+
    
            '<div class="col-md-4">'+
            '{!! Form::text('approx_dist[]', null, ['class' => 'form-control required', 'placeholder' => 'Approximate Distance *']) !!}'+
            '</div>'+
            '<a href="javascript:void(0)" style="margin: 9px 0px 0px 10px;" class="attract-remove label label-danger">Remove</a>'+
            '{{ Form::input('hidden', 'suur_id[]', null, ['readonly' => 'readonly']) }}' +
            '</div>';
    
        $(".attract-add-more").on('click', function(e){
            e.preventDefault();
            $(this).before(attract_temp)
        });
        
        $(document).on('click','.attract-remove',function(e){    
                e.preventDefault();
                $(this).parents(".attract-parents").remove();
        });
        
        //////////////////////////extra offer add more////////////////////////
        var extra_temp = '<div class="form-group extra-parents">'+
                
            '<div class="col-md-3">'+
            '{!! Form::text('item[]', null, ['class' => 'form-control required', 'placeholder' => 'Item *']) !!}'+
            '</div>'+    
            
            '<div class="col-md-3">'+
            '{!! Form::text('extra_price[]', null, ['class' => 'form-control required', 'placeholder' => 'Enter Price *']) !!}'+
            '</div>'+
    
            '<div class="col-md-3">'+
            '{!! Form::fancyselect('extra_cond[]', (isset($extra_option) && !empty($extra_option) ? $extra_option : ''), null, ['class'=>'form-control select-icons required']) !!}'+
            '</div>'+
            
            '<div class="col-md-3">'+
            '{{ Form::file('extra_img[]', ['id' => 'extra_img', 'class' => 'form-control file-styled', 'multiple' => false]) }}'+
            '</div>'+
            
            '<a href="javascript:void(0)" style="margin: 9px 0px 0px 10px;" class="extra-remove label label-danger">Remove</a>'+
            '{{ Form::input('hidden', 'offer_id[]', null, ['readonly' => 'readonly']) }}' +
            '</div>';
    
        $(".extra-add-more").on('click', function(e){
            e.preventDefault();
            $(this).before(extra_temp)
        });

        $(document).on('click','.extra-remove',function(e){    
                e.preventDefault();
                $(this).parents(".extra-parents").remove();
        });

        $(document).ready(function () {

            $('#cv').css("display", "none");

            var befco = $('#condit').val();

            if (befco == 'Y') {

                $('#cv').css("display", "block");
                $('.both').css("display", "block");
            } else {

                $('#cv').css("display", "none");
                $('.both').css("display", "none");
            }


            $('#condit').change(function () {

                var co = $('#condit').val();

                if (co == 'Y') {
                    $('#cv').css("display", "block");
                    $('.both').css("display", "block");
                } else {
                    $('#cv').css("display", "none");
                    $('.both').css("display", "none");

                }
            });

            var bm = $('#vid_con').val();
            if (bm == 'Y') {
                $('#viddiv').css("display", "block");
            }

            $('#vid_con').change(function () {
                var conn2 = $('#vid_con').val();

                if (conn2 == 'Y') {
                    $('#viddiv').show();

                } else {
                    $('#viddiv').hide();
                }


            });
        });
</script>

@endsection