@extends('admin.app')
@section('content')

<div class="content">
    <!-- Horizontal form options -->
    <div class="row">
        <div class="tabbable tab-content-bordered content-group-lg">

            @include('admin.layouts.partner-tab')

            <div class="tab-content">

                <?php
                $urlId = Request::segment(2);
                $drop_down_yes = App\Helpers\Helper::dropDownYesNo('choose here');
                
                ?>

                <!---Accommodation form--->
                <div class="tab-pane fade {{ (empty(session()->get('tab_type'))) ? 'in active' : '' }} has-padding" id="accommodation">

                    {!!
                    Form::open(
                    array(
                    'name' => 'frm_accommodation',
                    'id' => 'frm_accommodation',
                    'url' => 'accomodation/'.(isset($arr_accommo_detail) && !empty($arr_accommo_detail) ? $arr_accommo_detail->id : ''),
                    'autocomplete' => 'off',
                    'class' => 'form-horizontal',
                    'files' => true
                    )
                    )
                    !!}

                    {{ method_field('PUT') }}
                    <div class="panel panel-flat">
                        <div class="panel-heading">
                            <h5 class="panel-title">Listing details</h5>
                        </div>
                        <div class="panel-body">

                            <div class="form-group">

                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    {!! Form::text('name', (isset($arr_accommo_detail) && !empty($arr_accommo_detail) ? $arr_accommo_detail->title : ''), ['class' => 'form-control', 'placeholder' => 'Enter Accommodation Name*']) !!}
                                    @if ($errors->has('name'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif

                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    {{Form::select('accom_type',[''=>'Select type of Accommodation']+@$arr_accomm->pluck('name','id')->toArray(), (isset($arr_accommo_detail->accomType) && !empty($arr_accommo_detail->accomType) ? $arr_accommo_detail->accomType->id : ''),['class'=>'form-control'])}}

                                    @if ($errors->has('accom_type'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('accom_type') }}</strong>
                                    </span>
                                    @endif

                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    {{Form::select('rating',[''=>'Start Ratings']+@config('constants.star_rating'), (isset($arr_accommo_detail) && !empty($arr_accommo_detail) ? $arr_accommo_detail->rating : ''),['class'=>'form-control'])}}
                                    @if ($errors->has('rating'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('rating') }}</strong>
                                    </span>
                                    @endif   

                                </div>



                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    {!! Form::text('reserving_email', (isset($arr_accommo_detail) && !empty($arr_accommo_detail) ? $arr_accommo_detail->reserve_email : ''), ['class' => 'form-control email', 'placeholder' => 'Enter Reserving Email']) !!}
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
                                    {{Form::select('state',[''=>'Select State *', $arr_accommo_detail->stateName->id => $arr_accommo_detail->stateName->name], (isset($arr_accommo_detail->stateName) && !empty($arr_accommo_detail->stateName) && count($arr_accommo_detail->stateName) > 0 ? $arr_accommo_detail->stateName->id : ''),['id'=> 'state_id', 'class'=>'form-control state_id'])}}

                                    @if ($errors->has('state'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('state') }}</strong>
                                    </span>
                                    @endif

                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-6 col-md-6 col-sm-12">

                                    {{Form::select('city',[''=>'Select city *', $arr_accommo_detail->cityName->id => $arr_accommo_detail->cityName->name], (isset($arr_accommo_detail->cityName) && !empty($arr_accommo_detail->cityName) && count($arr_accommo_detail->cityName) > 0 ? $arr_accommo_detail->cityName->id : ''),['id'=> 'address_city_id', 'class'=>'form-control address_city_id'])}}

                                    @if ($errors->has('city'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                    @endif

                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    {!! Form::text('street_address', (isset($arr_accommo_detail) && !empty($arr_accommo_detail) ? $arr_accommo_detail->street_address : ''), ['class' => 'form-control', 'placeholder' => 'Enter Street Address']) !!}
                                    @if ($errors->has('street_address'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('street_address') }}</strong>
                                    </span>
                                    @endif

                                </div>
                            </div>

                            <div class="form-group">

                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    {!! Form::text('area', (isset($arr_accommo_detail) && !empty($arr_accommo_detail) ? $arr_accommo_detail->area : ''), ['class' => 'form-control', 'placeholder' => 'Enter suburb Area']) !!}
                                    @if ($errors->has('area'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('area') }}</strong>
                                    </span>
                                    @endif

                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    {!! Form::text('contact_no', (isset($arr_accommo_detail) && !empty($arr_accommo_detail) ? $arr_accommo_detail->contact_no : ''), ['class' => 'form-control', 'placeholder' => 'Enter Contact Number Ex: (+27) 00 000 0000']) !!}
                                    @if ($errors->has('contact_no'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('contact_no') }}</strong>
                                    </span>
                                    @endif

                                </div>

                            </div>

                            <div class="form-group">

                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    {!! Form::text('alternate_no', (isset($arr_accommo_detail) && !empty($arr_accommo_detail) ? $arr_accommo_detail->alternate_no : ''), ['class' => 'form-control', 'placeholder' => 'Enter Alternate no Ex:  (+27) 00 000 0000']) !!}
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
                                    {!! Form::textarea('establish_details', (isset($arr_accommo_detail) && !empty($arr_accommo_detail) ? $arr_accommo_detail->establish_details : ''), ['rows' => 5, 'cols' => 5, 'class' => 'form-control', 'placeholder' => 'Give a short description about your establishment']) !!}
                                    @if ($errors->has('establish_details'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('establish_details') }}</strong>
                                    </span>
                                    @endif
                                    {{ Form::input('hidden', 'type', 'A', ['readonly' => 'readonly']) }}
                                    {{ Form::input('hidden', 'id', $arr_accommo_detail->id, ['readonly' => 'readonly']) }}

                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Estabishment Images :</label>
                                <div class="col-sm-10">
                                    {{ Form::file('accomm_images[]', ['id' => 'acco_image', 'title' => 'press ctrl to select more than one image', 'class' => 'file-styled maxfile', 'multiple' => true]) }}
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
                                <button type="submit" name="acco" value="accom" class="btn btn-primary">Next section</button>
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>

                <!---Room form--->

                <div class="tab-pane {{ (!empty(session()->get('tab_type')) && session()->get('tab_type') == '2') ? 'in active' : '' }} fade has-padding" id="rooms">

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
                            <h5 class="panel-title">Do you have Accommodation facilities</h5>
                        </div>

                        <?php
                        $room_type_option = [];
                        $room_type_option[] = array(
                            'value' => '',
                            'display' => 'Select Type of Rooms *',
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

                        $w = 1;
                        ?>


                        <div class="panel-body">

                            <div class="form-group">

                                <div class="col-md-2">
                                    {!! Form::fancyselect('is_accommo', (isset($drop_down_yes) && !empty($drop_down_yes) && count($drop_down_yes) > 0 ? $drop_down_yes : ''), (isset($arr_room_detail) && !empty($arr_room_detail) && count($arr_room_detail) > 0 ? $arr_room_detail[0]->is_accommo : ''), ['id' => 'select_accommo', 'class'=>'select-icons']) !!}
                                </div>

                            </div>

                            <div id="accom_faclity">

                                <div class="form-group">
                                    <label class="col-lg-1 control-label">Description:</label>
                                    <div class="col-lg-9">
                                        {!! Form::textarea('accommo_desc', (isset($arr_room_detail) && !empty($arr_room_detail) && count($arr_room_detail) > 0 ? $arr_room_detail[0]->desc : ''), ['rows' => 3, 'cols' => 3, 'class' => 'form-control required', 'placeholder' => 'Give a short description about your Accommodation Facilities *']) !!}
                                        @if ($errors->has('room_short_desc.0'))
                                        <span class="help-block" style = "display:block;color:red;">
                                            <strong>{{ $errors->first('room_short_desc.0') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>




                                <div class="form-group">
                                    @if(isset($arr_room_detail) && !empty($arr_room_detail) && count($arr_room_detail) > 0)

                                    @foreach($arr_room_detail as $room_detail)

                                    <div class="form-group roomparent">
                                        <div class="form-group">
                                            <label class="col-lg-1 control-label">Room Description:</label>
                                            <div class="col-lg-9">
                                                {!! Form::textarea('room_desc[]', (isset($room_detail) && !empty($room_detail) && count($room_detail) > 0 ? $room_detail->room_desc : ''), ['rows' => 3, 'cols' => 3, 'class' => 'form-control shortdesc', 'placeholder' => 'Give a short description about this Room *']) !!}
                                                @if ($errors->has('room_desc.0'))
                                                <span class="help-block" style = "display:block;color:red;">
                                                    <strong>{{ $errors->first('room_desc.0') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>



                                        <div class="form-group">

                                            <div class="col-md-2">

                                                {!! Form::text('room_name[]', (isset($room_detail) && !empty($room_detail) ? $room_detail->title : ''), ['class' => 'form-control required', 'placeholder' => 'Rooms Name *']) !!}
                                                @if ($errors->has('room_name.0'))
                                                <span class="help-block" style = "display:block;color:red;">
                                                    <strong>{{ $errors->first('room_name.0') }}</strong>
                                                </span>
                                                @endif
                                            </div>

                                            <div class="col-md-2">

                                                {!! Form::fancyselect('room_type[]', $room_type_option, (isset($room_detail->roomType) && !empty($room_detail->roomType) && count($room_detail->roomType) > 0  ? $room_detail->roomType->id : ''), ['class'=>'select-icons required']) !!}

                                                @if ($errors->has('room_type.0'))
                                                <span class="help-block" style = "display:block;color:red;">
                                                    <strong>{{ $errors->first('room_type.0') }}</strong>
                                                </span>
                                                @endif

                                            </div>

                                            <div class="col-md-2">

                                                {!! Form::fancyselect('guest[]', $room_cap, (isset($room_detail) && !empty($room_detail) ? $room_detail->guest : ''), ['class'=>'select-icons']) !!}

                                                @if ($errors->has('guest.0'))
                                                <span class="help-block" style = "display:block;color:red;">
                                                    <strong>{{ $errors->first('guest.0') }}</strong>
                                                </span>
                                                @endif

                                            </div>

                                            <div class="col-md-2">

                                                {!! Form::number('room_qty[]', (isset($room_detail) && !empty($room_detail) ? $room_detail->qty : ''), ['min' => '0', 'class' => 'form-control required', 'placeholder' => 'Rooms Quantity *']) !!}
                                                @if ($errors->has('room_avail.0'))
                                                <span class="help-block" style = "display:block;color:red;">
                                                    <strong>{{ $errors->first('room_avail.0') }}</strong>
                                                </span>
                                                @endif
                                            </div>



                                            <div class="col-md-2">
                                                {!! Form::text('room_price[]', (isset($room_detail) && !empty($room_detail) ? $room_detail->price : ''), ['class' => 'form-control required number', 'placeholder' => 'Price per Person *']) !!}
                                                @if ($errors->has('room_price.0'))
                                                <span class="help-block" style = "display:block;color:red;">
                                                    <strong>{{ $errors->first('room_price.0') }}</strong>
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

                                        </div>

                                        <div class="form-group">

                                            <div class="col-sm-2">
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


                                            @if(app('request')->input('type') == 'P')
                                            <div class="col-md-8">
                                                <div class="col-md-2">    
                                                    <label class="control-label">Promotion:</label>
                                                </div>

                                                <div class="col-md-3">    
                                                    {!! Form::fancyselect('is_room_promo[]', (isset($drop_down_yes) && !empty($drop_down_yes) && count($drop_down_yes) > 0 ? $drop_down_yes : ''), (isset($room_detail) && !empty($room_detail) && count($room_detail) > 0 ? $room_detail->is_promo : ''), ['class'=>'select-icons room_promo']) !!}

                                                    {{ Form::input('hidden', 'promoval[]', (isset($room_detail) && !empty($room_detail) && count($room_detail) > 0 ? $room_detail->is_promo : ''), ['readonly' => 'readonly']) }}
                                                </div>
                                            </div>
                                            @endif



                                        </div>

                                        @if(app('request')->input('type') == 'P')
                                        <div class="form-group room_promo_div<?php echo $w; ?>">

                                            <div class="col-md-2">
                                                {!! Form::text('room_promo_price[]', (isset($room_detail) && !empty($room_detail) ? $room_detail->promo_price : ''), ['class' => 'form-control', 'placeholder' => 'Promotion Price *']) !!}
                                                @if ($errors->has('room_promo_price.0'))
                                                <span class="help-block" style = "display:block;color:red;">
                                                    <strong>{{ $errors->first('room_promo_price.0') }}</strong>
                                                </span>
                                                @endif
                                            </div>

                                            <label class="col-lg-1 control-label">From Date:</label>
                                            <div class="col-md-2">

                                                {!! Form::date('room_from_date[]', (isset($room_detail) && !empty($room_detail) ? date('Y-m-d', strtotime($room_detail->from_date)) : ''), ['class' => 'form-control', 'placeholder' => (isset($room_detail) && !empty($room_detail) ? date('m/d/Y', strtotime($room_detail->from_date)) : '')]) !!}
                                                @if ($errors->has('room_from_date.0'))
                                                <span class="help-block" style = "display:block;color:red;">
                                                    <strong>{{ $errors->first('room_from_date.0') }}</strong>
                                                </span>
                                                @endif
                                            </div>

                                            <label class="col-lg-1 control-label">Till Date:</label>
                                            <div class="col-md-2">
                                                {!! Form::date('room_to_date[]', (isset($room_detail) && !empty($room_detail) ? date('Y-m-d', strtotime($room_detail->to_date)) : ''), ['class' => 'form-control', 'placeholder' => 'Till Date *']) !!}
                                                @if ($errors->has('room_to_date.0'))
                                                <span class="help-block" style = "display:block;color:red;">
                                                    <strong>{{ $errors->first('room_to_date.0') }}</strong>
                                                </span>
                                                @endif
                                            </div>

                                            <div class="col-lg-4">
                                                {!! Form::textarea('room_promo_desc[]', (isset($room_detail) && !empty($room_detail) && count($room_detail) > 0 ? $room_detail->promo_desc : ''), ['rows' => 3, 'cols' => 3, 'class' => 'form-control', 'placeholder' => 'Give a short description about your term for this offer *']) !!}
                                                @if ($errors->has('room_promo_desc.0'))
                                                <span class="help-block" style = "display:block;color:red;">
                                                    <strong>{{ $errors->first('room_promo_desc.0') }}</strong>
                                                </span>
                                                @endif
                                            </div>

                                        </div>
                                        @endif

                                        @if($w != 1)
                                        <a href="javascript:void(0)" style="margin: 9px 0px 0px 10px;" id="{{ $room_detail->id }}" class="delete-room  label label-danger">Remove</a>
                                        {{ Form::input('hidden', 'room_id[]', (isset($room_detail) && !empty($room_detail) && count($room_detail) > 0 ? $room_detail->id : ''), ['readonly' => 'readonly']) }}

                                        @elseif($w==1)

                                        {{ Form::input('hidden', 'room_id[]', (isset($room_detail) && !empty($room_detail) && count($room_detail) > 0 ? $room_detail->id : ''), ['readonly' => 'readonly']) }}

                                        @endif

                                        <?php $w++ ?>
                                    </div>
                                    @endforeach

                                    @endif

                                    <br><br>

                                    <a href="javascript:void(0)" class='btn btn-success btn-add-more' >Add More</a>
                                </div>

                            </div>

                            <h5>Do you have Venue facilities</h5>			

                            <div class="form-group">

                                <div class="col-md-2">
                                    {!! Form::fancyselect('is_venu', (isset($drop_down_yes) && !empty($drop_down_yes) && count($drop_down_yes) > 0 ? $drop_down_yes : ''), (isset($arr_venu_detail) && !empty($arr_venu_detail) && count($arr_venu_detail) > 0 ? $arr_venu_detail[0]->is_venu : ''), ['id' => 'select_venu', 'class'=>'select-icons']) !!}
                                </div>

                            </div>


                            <div id='venu_faclity'>

                                <div class="form-group">
                                    <label class="col-lg-1 control-label">Description:</label>
                                    <div class="col-lg-9">

                                        {!! Form::textarea('venue_desc', (isset($arr_venu_detail) && !empty($arr_venu_detail) && count($arr_venu_detail) > 0 ? $arr_venu_detail[0]->desc : ''), ['rows' => 3, 'cols' => 3, 'class' => 'form-control', 'placeholder' => 'Give a short description about your Venue facility']) !!}
                                        @if ($errors->has('venue_desc'))
                                        <span class="help-block" style = "display:block;color:red;">
                                            <strong>{{ $errors->first('venue_desc') }}</strong>
                                        </span>
                                        @endif
                                    </div>

                                </div>

                                <div class="form-group">

                                    @if(isset($arr_venu_detail) && !empty($arr_venu_detail) && count($arr_venu_detail) > 0)
                                    <?php $x = 1; ?>
                                    @foreach($arr_venu_detail as $venu_data)

                                    <div class="form-group venuparents">

                                        <div class="form-group">
                                            <label class="col-lg-1 control-label">Venu Description:</label>
                                            <div class="col-lg-9">

                                                {!! Form::textarea('venue_short_descr[]', (isset($venu_data) && !empty($venu_data) ? $venu_data->venu_desc : ''), ['rows' => 3, 'cols' => 3, 'class' => 'form-control', 'placeholder' => 'Give a short description about this Venue *']) !!}
                                                @if ($errors->has('venue_short_descr.0'))
                                                <span class="help-block" style = "display:block;color:red;">
                                                    <strong>{{ $errors->first('venue_short_descr.0') }}</strong>
                                                </span>
                                                @endif
                                            </div>

                                        </div>

                                        <div class="form-group">

                                            <div class="col-md-2">

                                                {!! Form::text('venue_name[]', (isset($venu_data) && !empty($venu_data) ? $venu_data->title : ''), ['class' => 'form-control', 'placeholder' => 'Venue Name']) !!}
                                                @if ($errors->has('venue_name.0'))
                                                <span class="help-block" style = "display:block;color:red;">
                                                    <strong>{{ $errors->first('venue_name.0') }}</strong>
                                                </span>
                                                @endif
                                            </div>

                                            <div class="col-md-2">

                                                {!! Form::number('venue_qty[]', (isset($venu_data) && !empty($venu_data) ? $venu_data->qty : ''), ['min' => '0', 'class' => 'form-control', 'placeholder' => 'Max Capacity']) !!}
                                                @if ($errors->has('venue_capacity.0'))
                                                <span class="help-block" style = "display:block;color:red;">
                                                    <strong>{{ $errors->first('venue_capacity.0') }}</strong>
                                                </span>
                                                @endif
                                            </div>


                                            <div class="col-md-2">
                                                {!! Form::text('venue_price[]', (isset($venu_data) && !empty($venu_data) ? $venu_data->rental_price : ''), ['class' => 'form-control', 'placeholder' => 'Venue rental price']) !!}
                                                @if ($errors->has('venue_price.0'))
                                                <span class="help-block" style = "display:block;color:red;">
                                                    <strong>{{ $errors->first('venue_price.0') }}</strong>
                                                </span>
                                                @endif

                                            </div>

                                            <div class="col-md-2">
                                                {!! Form::text('venue_price_per_seat[]', (isset($venu_data) && !empty($venu_data) ? $venu_data->price_per_seat : ''), ['class' => 'form-control', 'placeholder' => 'Price per seat']) !!}
                                                @if ($errors->has('venue_price_per_seat.0'))
                                                <span class="help-block" style = "display:block;color:red;">
                                                    <strong>{{ $errors->first('venue_price_per_seat.0') }}</strong>
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
                                        </div>

                                        <div class="form-group">

                                            <div class="col-sm-2">
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

                                            @if(app('request')->input('type') == 'P')
                                            <div class="col-md-8">
                                                <div class="col-md-2">    
                                                    <label class="control-label">Promotion:</label>
                                                </div>

                                                <div class="col-md-3">    
                                                    {!! Form::fancyselect('is_venue_promo[]', (isset($drop_down_yes) && !empty($drop_down_yes) && count($drop_down_yes) > 0 ? $drop_down_yes : ''), (isset($venu_data) && !empty($venu_data) && count($venu_data) > 0 ? $venu_data->is_promo : ''), ['class'=>'select-icons venue_promo']) !!}

                                                    {{ Form::input('hidden', 'venueval[]', (isset($venu_data) && !empty($venu_data) && count($venu_data) > 0 ? $venu_data->is_promo : ''), ['readonly' => 'readonly']) }}
                                                </div>
                                            </div>
                                            @endif

                                        </div>

                                        @if(app('request')->input('type') == 'P')
                                        <div class="form-group venue_promo_div<?php echo $x; ?>">

                                            <div class="col-md-2">
                                                {!! Form::text('venue_promo_price[]', (isset($venu_data) && !empty($venu_data) ? $venu_data->promo_price : ''), ['class' => 'form-control', 'placeholder' => 'Promotion Price *']) !!}
                                                @if ($errors->has('venue_promo_price.0'))
                                                <span class="help-block" style = "display:block;color:red;">
                                                    <strong>{{ $errors->first('venue_promo_price.0') }}</strong>
                                                </span>
                                                @endif
                                            </div>

                                            <label class="col-lg-1 control-label">From Date:</label>
                                            <div class="col-md-2">

                                                {!! Form::date('venue_from_date[]', (isset($venu_data) && !empty($venu_data) ? date('Y-m-d', strtotime($venu_data->from_date)) : ''), ['class' => 'form-control', 'placeholder' => 'From Date *']) !!}
                                                @if ($errors->has('venue_from_date.0'))
                                                <span class="help-block" style = "display:block;color:red;">
                                                    <strong>{{ $errors->first('venue_from_date.0') }}</strong>
                                                </span>
                                                @endif
                                            </div>

                                            <label class="col-lg-1 control-label">Till Date:</label>
                                            <div class="col-md-2">
                                                {!! Form::date('venue_to_date[]', (isset($venu_data) && !empty($venu_data) ? date('Y-m-d', strtotime($venu_data->to_date)) : ''), ['class' => 'form-control', 'placeholder' => 'Till Date *']) !!}
                                                @if ($errors->has('venue_from_date.0'))
                                                <span class="help-block" style = "display:block;color:red;">
                                                    <strong>{{ $errors->first('venue_from_date.0') }}</strong>
                                                </span>
                                                @endif
                                            </div>

                                            <div class="col-lg-4">
                                                {!! Form::textarea('venue_promo_desc[]', (isset($venu_data) && !empty($venu_data) && count($venu_data) > 0 ? $venu_data->promo_desc : ''), ['rows' => 3, 'cols' => 3, 'class' => 'form-control required', 'placeholder' => 'Give a short description about your term for this offer *']) !!}
                                                @if ($errors->has('venue_promo_desc.0'))
                                                <span class="help-block" style = "display:block;color:red;">
                                                    <strong>{{ $errors->first('venue_promo_desc.0') }}</strong>
                                                </span>
                                                @endif
                                            </div>

                                        </div>
                                        @endif

                                        @if($x != 1)
                                        <a href="javascript:void(0)" style="margin: 9px 0px 0px 10px;" v_id="{{ $venu_data->id }}" class="delete-venu label label-danger">Remove</a>
                                        {{ Form::input('hidden', 'venue_id[]', (isset($venu_data) && !empty($venu_data) && count($venu_data) > 0 ? $venu_data->id : ''), ['readonly' => 'readonly']) }}

                                        @elseif($x==1)

                                        {{ Form::input('hidden', 'venue_id[]', (isset($venu_data) && !empty($venu_data) && count($venu_data) > 0 ? $venu_data->id : ''), ['readonly' => 'readonly']) }}

                                        @endif

                                        <?php $x++; ?>
                                    </div>
                                    @endforeach

                                    @endif
                                    <br>
                                    <a href="javascript:void(0)" class="venu-add-more btn btn-success" >Add More</a>


                                </div> 

                            </div>

                            <h5>Do you have Conference facilities</h5>

                            <div class="form-group">

                                <div class="col-md-2">
                                    {!! Form::fancyselect('is_confer', (isset($drop_down_yes) && !empty($drop_down_yes) && count($drop_down_yes) > 0 ? $drop_down_yes : ''), (isset($arr_confer_detail) && !empty($arr_confer_detail) && count($arr_confer_detail) > 0 ? $arr_confer_detail[0]->is_confer : ''), ['id' => 'select_confer', 'class'=>'select-icons']) !!}
                                    @if ($errors->has('is_confer.0'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('is_confer.0') }}</strong>
                                    </span>
                                    @endif
                                </div>

                            </div>

                            <div id='confer_faclity'>

                                <div class="form-group">
                                    <label class="col-lg-1 control-label">Description:</label>
                                    <div class="col-lg-9">
                                        {!! Form::textarea('confer_desc', (isset($arr_confer_detail) && !empty($arr_confer_detail) && count($arr_confer_detail) > 0 ? $arr_confer_detail[0]->desc : ''), ['rows' => 3, 'cols' => 3, 'class' => 'form-control', 'placeholder' => 'Give a short description about your Conference Facility']) !!}
                                        @if ($errors->has('confer_desc'))
                                        <span class="help-block" style = "display:block;color:red;">
                                            <strong>{{ $errors->first('confer_desc') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">

                                    @if(isset($arr_confer_detail) && !empty($arr_confer_detail) && count($arr_confer_detail) > 0)
                                    <?php $y = 1; ?>
                                    @foreach($arr_confer_detail as $confer_data)
                                    <div class="form-group conferparents">
                                        <div class="form-group">
                                            <label class="col-lg-1 control-label">Conference Description:</label>
                                            <div class="col-lg-9">
                                                {!! Form::textarea('confer_short_descr[]', (isset($confer_data) && !empty($confer_data) && count($confer_data) > 0 ? $confer_data->confer_desc : ''), ['rows' => 3, 'cols' => 3, 'class' => 'form-control', 'placeholder' => 'Give a short description about this Conference *']) !!}
                                                @if ($errors->has('confer_short_descr.0'))
                                                <span class="help-block" style = "display:block;color:red;">
                                                    <strong>{{ $errors->first('confer_short_descr.0') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-2">

                                                {!! Form::text('confer_name[]', (isset($confer_data) && !empty($confer_data) ? $confer_data->title : ''), ['class' => 'form-control', 'placeholder' => 'Conference Name']) !!}
                                                @if ($errors->has('confer_name.0'))
                                                <span class="help-block" style = "display:block;color:red;">
                                                    <strong>{{ $errors->first('confer_name.0') }}</strong>
                                                </span>
                                                @endif
                                            </div>

                                            <div class="col-md-2">

                                                {!! Form::number('confer_qty[]', (isset($confer_data) && !empty($confer_data) ? $confer_data->qty : ''), ['min' => '0', 'class' => 'form-control', 'placeholder' => 'Max Capacity']) !!}
                                                @if ($errors->has('confer_avail.0'))
                                                <span class="help-block" style = "display:block;color:red;">
                                                    <strong>{{ $errors->first('confer_avail.0') }}</strong>
                                                </span>
                                                @endif
                                            </div>


                                            <div class="col-md-2">
                                                {!! Form::text('confer_price[]', (isset($confer_data) && !empty($confer_data) ? $confer_data->rental_price : ''), ['class' => 'form-control', 'placeholder' => 'Conference rental price']) !!}
                                                @if ($errors->has('confer_price.0'))
                                                <span class="help-block" style = "display:block;color:red;">
                                                    <strong>{{ $errors->first('confer_price.0') }}</strong>
                                                </span>
                                                @endif

                                            </div>

                                            <div class="col-md-2">
                                                {!! Form::text('confer_price_per_seat[]', (isset($confer_data) && !empty($confer_data) ? $confer_data->price_per_seat : ''), ['class' => 'form-control', 'placeholder' => 'Price per seat']) !!}
                                                @if ($errors->has('confer_price_per_seat.0'))
                                                <span class="help-block" style = "display:block;color:red;">
                                                    <strong>{{ $errors->first('confer_price_per_seat.0') }}</strong>
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

                                        </div>

                                        <div class="form-group">  

                                            <div class="col-sm-2">
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

                                            @if(app('request')->input('type') == 'P')
                                            <div class="col-md-8">
                                                <div class="col-md-2">    
                                                    <label class="control-label">Promotion:</label>
                                                </div>

                                                <div class="col-md-3">    
                                                    {!! Form::fancyselect('is_confer_promo[]', (isset($drop_down_yes) && !empty($drop_down_yes) && count($drop_down_yes) > 0 ? $drop_down_yes : ''), (isset($confer_data) && !empty($confer_data) && count($confer_data) > 0 ? $confer_data->is_promo : ''), ['class'=>'select-icons confer_promo']) !!}

                                                    {{ Form::input('hidden', 'conferval[]', (isset($confer_data) && !empty($confer_data) && count($confer_data) > 0 ? $confer_data->is_promo : ''), ['readonly' => 'readonly']) }}
                                                </div>
                                            </div>
                                            @endif

                                        </div> 

                                        @if(app('request')->input('type') == 'P')
                                        <div class="form-group confer_promo_div<?php echo $y; ?>">

                                            <div class="col-md-2">
                                                {!! Form::text('confer_promo_price[]', (isset($confer_data) && !empty($confer_data) ? $confer_data->promo_price : ''), ['class' => 'form-control', 'placeholder' => 'Promotion Price *']) !!}
                                                @if ($errors->has('confer_promo_price.0'))
                                                <span class="help-block" style = "display:block;color:red;">
                                                    <strong>{{ $errors->first('confer_promo_price.0') }}</strong>
                                                </span>
                                                @endif
                                            </div>

                                            <label class="col-lg-1 control-label">From Date:</label>
                                            <div class="col-md-2">

                                                {!! Form::date('confer_from_date[]', (isset($confer_data) && !empty($confer_data) ? date('Y-m-d', strtotime($confer_data->from_date)) : ''), ['class' => 'form-control', 'placeholder' => 'From Date *']) !!}
                                                @if ($errors->has('confer_from_date.0'))
                                                <span class="help-block" style = "display:block;color:red;">
                                                    <strong>{{ $errors->first('confer_from_date.0') }}</strong>
                                                </span>
                                                @endif
                                            </div>

                                            <label class="col-lg-1 control-label">Till Date:</label>
                                            <div class="col-md-2">
                                                {!! Form::date('confer_to_date[]', (isset($confer_data) && !empty($confer_data) ? date('Y-m-d', strtotime($confer_data->to_date)) : ''), ['class' => 'form-control', 'placeholder' => 'Till Date *']) !!}
                                                @if ($errors->has('confer_from_date.0'))
                                                <span class="help-block" style = "display:block;color:red;">
                                                    <strong>{{ $errors->first('confer_from_date.0') }}</strong>
                                                </span>
                                                @endif
                                            </div>

                                            <div class="col-lg-4">
                                                {!! Form::textarea('confer_promo_desc[]', (isset($confer_data) && !empty($confer_data) && count($confer_data) > 0 ? $confer_data->promo_desc : ''), ['rows' => 3, 'cols' => 3, 'class' => 'form-control required', 'placeholder' => 'Give a short description about your term for this offer *']) !!}
                                                @if ($errors->has('confer_promo_desc.0'))
                                                <span class="help-block" style = "display:block;color:red;">
                                                    <strong>{{ $errors->first('confer_promo_desc.0') }}</strong>
                                                </span>
                                                @endif
                                            </div>

                                        </div>
                                        @endif

                                        @if($y != 1)
                                        <a href="javascript:void(0)" style="margin: 9px 0px 0px 10px;" c_id="{{ $confer_data->id }}" class="delete-confer label label-danger">Remove</a>
                                        {{ Form::input('hidden', 'confer_id[]', (isset($confer_data) && !empty($confer_data) && count($confer_data) > 0 ? $confer_data->id : ''), ['readonly' => 'readonly']) }}

                                        @elseif($y==1)

                                        {{ Form::input('hidden', 'confer_id[]', (isset($confer_data) && !empty($confer_data) && count($confer_data) > 0 ? $confer_data->id : ''), ['readonly' => 'readonly']) }}

                                        @endif



                                        <?php $y++; ?>
                                    </div>
                                    @endforeach

                                    @endif
                                    <br><br>
                                    <a href="javascript:void(0)" class="confer-add-more btn btn-success">Add More</a>
                                </div>      

                            </div>


                            <h5>Do you have Health / Spa facilities</h5>

                            <div class="form-group">

                                <div class="col-md-2">
                                    {!! Form::fancyselect('is_health', (isset($drop_down_yes) && !empty($drop_down_yes) && count($drop_down_yes) > 0 ? $drop_down_yes : ''), (isset($arr_health_detail) && !empty($arr_health_detail) && count($arr_health_detail) > 0 ? $arr_health_detail[0]->is_health : ''), ['id' => 'select_health', 'class'=>'select-icons']) !!}
                                </div>

                            </div>

                            <div id='health_faclity'>

                                <div class="form-group">
                                    <label class="col-lg-1 control-label">Description:</label>
                                    <div class="col-lg-9">
                                        {!! Form::textarea('health_desc', (isset($arr_health_detail) && !empty($arr_health_detail) && count($arr_health_detail) > 0 ? $arr_health_detail[0]->desc : ''), ['rows' => 3, 'cols' => 3, 'class' => 'form-control', 'placeholder' => 'Give a short description about your Health / Spa']) !!}
                                        @if ($errors->has('health_desc'))
                                        <span class="help-block" style = "display:block;color:red;">
                                            <strong>{{ $errors->first('health_desc') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">

                                    @if(isset($arr_health_detail) && !empty($arr_health_detail) && count($arr_health_detail) > 0)
                                    <?php $z = 1; ?>
                                    @foreach($arr_health_detail as $health_data)

                                    <div class="form-group healthparents">

                                        <div class="form-group">
                                            <label class="col-lg-1 control-label">Service Description:</label>
                                            <div class="col-lg-9">
                                                {!! Form::textarea('health_short_desc[]', (isset($health_data) && !empty($health_data) && count($health_data) > 0 ? $health_data->service_desc : ''), ['rows' => 3, 'cols' => 3, 'class' => 'form-control', 'placeholder' => 'Give a short description about this Service *']) !!}
                                                @if ($errors->has('health_short_desc.0'))
                                                <span class="help-block" style = "display:block;color:red;">
                                                    <strong>{{ $errors->first('health_short_desc.0') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-2">

                                                {!! Form::text('health_name[]', (isset($health_data) && !empty($health_data) ? $health_data->title : ''), ['class' => 'form-control', 'placeholder' => 'Name Service']) !!}
                                                @if ($errors->has('health_name.0'))
                                                <span class="help-block" style = "display:block;color:red;">
                                                    <strong>{{ $errors->first('health_name.0') }}</strong>
                                                </span>
                                                @endif
                                            </div>

                                            <div class="col-md-2">

                                                {!! Form::text('treatment[]', (isset($health_data) && !empty($health_data) ? $health_data->treatment : ''), ['class' => 'form-control', 'placeholder' => 'Name treatment']) !!}
                                                @if ($errors->has('treatment.0'))
                                                <span class="help-block" style = "display:block;color:red;">
                                                    <strong>{{ $errors->first('treatment.0') }}</strong>
                                                </span>
                                                @endif
                                            </div>


                                            <div class="col-md-2">
                                                {!! Form::text('service_price[]', (isset($health_data) && !empty($health_data) ? $health_data->price_per_treatment : ''), ['class' => 'form-control', 'placeholder' => 'Price per treatment']) !!}
                                                @if ($errors->has('service_price.0'))
                                                <span class="help-block" style = "display:block;color:red;">
                                                    <strong>{{ $errors->first('service_price.0') }}</strong>
                                                </span>
                                                @endif

                                            </div>


                                            <div class="col-md-2">
                                                {{ Form::file('health_img[]', ['id' => 'health_img', 'class' => 'file-styled', 'multiple' => false]) }}
                                                @if ($errors->has('health_img.0'))
                                                <span class="help-block" style = "display:block;color:red;">
                                                    <strong>{{ $errors->first('health_img.0') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>


                                        <div class="form-group">

                                            <div class="col-sm-2">
                                                <div class="edit-prod-image-cls">
                                                    <span class="prod-img-span" style="position: relative;">

                                                        @if(!empty($health_data->health_image) && file_exists(public_path('health_images' . '/'. $health_data->id.'_'.$health_data->health_image)))

                                                        <img src="{{ url('/')}}/health_images/{{ $health_data->id }}_{{ $health_data->health_image }}" height="140" width="140"/>
                                                        @else
                                                        <img src="{{ url('/')}}/assets/images/no-image.png" height="140" width="140"/>
                                                        @endif
                                                    </span>
                                                </div>
                                            </div>

                                            @if(app('request')->input('type') == 'P')
                                            <div class="col-md-8">
                                                <div class="col-md-2">    
                                                    <label class="control-label">Promotion:</label>
                                                </div>

                                                <div class="col-md-3">    
                                                    {!! Form::fancyselect('is_health_promo[]', (isset($drop_down_yes) && !empty($drop_down_yes) && count($drop_down_yes) > 0 ? $drop_down_yes : ''), (isset($health_data) && !empty($health_data) && count($health_data) > 0 ? $health_data->is_promo : ''), ['class'=>'select-icons confer_promo']) !!}

                                                    {{ Form::input('hidden', 'healthval[]', (isset($health_data) && !empty($health_data) && count($health_data) > 0 ? $health_data->is_promo : ''), ['readonly' => 'readonly']) }}
                                                </div>
                                            </div>
                                            @endif

                                        </div>

                                        @if(app('request')->input('type') == 'P')
                                        <div class="form-group health_promo_div<?php echo $z; ?>">

                                            <div class="col-md-2">
                                                {!! Form::text('health_promo_price[]', (isset($health_data) && !empty($health_data) ? $health_data->promo_price : ''), ['class' => 'form-control', 'placeholder' => 'Promotion Price *']) !!}
                                                @if ($errors->has('health_promo_price.0'))
                                                <span class="help-block" style = "display:block;color:red;">
                                                    <strong>{{ $errors->first('health_promo_price.0') }}</strong>
                                                </span>
                                                @endif
                                            </div>

                                            <label class="col-lg-1 control-label">From Date:</label>
                                            <div class="col-md-2">

                                                {!! Form::date('health_from_date[]', (isset($health_data) && !empty($health_data) ? date('Y-m-d', strtotime($health_data->from_date)) : ''), ['class' => 'form-control', 'placeholder' => 'From Date *']) !!}
                                                @if ($errors->has('health_from_date.0'))
                                                <span class="help-block" style = "display:block;color:red;">
                                                    <strong>{{ $errors->first('health_from_date.0') }}</strong>
                                                </span>
                                                @endif
                                            </div>

                                            <label class="col-lg-1 control-label">Till Date:</label>
                                            <div class="col-md-2">
                                                {!! Form::date('health_to_date[]', (isset($health_data) && !empty($health_data) ? date('Y-m-d', strtotime($health_data->to_date)) : ''), ['class' => 'form-control', 'placeholder' => 'Till Date *']) !!}
                                                @if ($errors->has('health_from_date.0'))
                                                <span class="help-block" style = "display:block;color:red;">
                                                    <strong>{{ $errors->first('health_from_date.0') }}</strong>
                                                </span>
                                                @endif
                                            </div>

                                            <div class="col-lg-4">
                                                {!! Form::textarea('health_promo_desc[]', (isset($health_data) && !empty($health_data) && count($health_data) > 0 ? $health_data->promo_desc : ''), ['rows' => 3, 'cols' => 3, 'class' => 'form-control required', 'placeholder' => 'Give a short description about your term for this offer *']) !!}
                                                @if ($errors->has('health_promo_desc.0'))
                                                <span class="help-block" style = "display:block;color:red;">
                                                    <strong>{{ $errors->first('confer_promo_desc.0') }}</strong>
                                                </span>
                                                @endif
                                            </div>

                                        </div>
                                        @endif

                                        @if($z != 1)
                                        <a href="javascript:void(0)" style="margin: 9px 0px 0px 10px;" h_id="{{ $health_data->id }}" class="delete-health label label-danger">Remove</a>
                                        {{ Form::input('hidden', 'health_id[]', (isset($health_data) && !empty($health_data) && count($health_data) > 0 ? $health_data->id : ''), ['readonly' => 'readonly']) }}

                                        @elseif($z==1)

                                        {{ Form::input('hidden', 'health_id[]', (isset($health_data) && !empty($health_data) && count($health_data) > 0 ? $health_data->id : ''), ['readonly' => 'readonly']) }}

                                        @endif


                                        <?php $z++; ?>
                                    </div>
                                    @endforeach

                                    @endif
                                    <br><br>
                                    <a href="javascript:void(0)" class="health-add-more btn btn-success">Add More</a>
                                </div>


                            </div>


                            <h5>Do you have Transport facilities</h5>			

                            <div class="form-group">

                                <div class="col-md-2">
                                    {!! Form::fancyselect('is_trans', (isset($drop_down_yes) && !empty($drop_down_yes) && count($drop_down_yes) > 0 ? $drop_down_yes : ''), (isset($arr_trans_detail) && !empty($arr_trans_detail) && count($arr_trans_detail) > 0 ? $arr_trans_detail->is_trans : ''), ['id' => 'select_trans', 'class'=>'select-icons']) !!}
                                </div>

                            </div>

                            <div id ="trans_faclity">

                                <div class="form-group">
                                    <label class="col-lg-1 control-label">Description:</label>
                                    <div class="col-lg-9">
                                        {!! Form::textarea('trans_desc', (isset($arr_trans_detail) && !empty($arr_trans_detail) && count($arr_trans_detail) > 0 ? $arr_trans_detail->desc : ''), ['rows' => 3, 'cols' => 3, 'class' => 'form-control', 'placeholder' => 'Give a short description about your Transport Services']) !!}
                                        @if ($errors->has('trans_desc'))
                                        <span class="help-block" style = "display:block;color:red;">
                                            <strong>{{ $errors->first('trans_desc') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            {{ Form::input('hidden', 'trans_id', (isset($arr_trans_detail) && !empty($arr_trans_detail) ? $arr_trans_detail->id : ''), ['readonly' => 'readonly']) }}
                            {{ Form::input('hidden', 'accommo_id', (isset($urlId) && !empty($urlId) ? $urlId : ''), ['readonly' => 'readonly']) }}
                            {{ Form::input('hidden', 'type', (app('request')->input('type') ? app('request')->input('type') : 'A'), ['readonly' => 'readonly']) }}

                            <div class="text-right">
                                <button type="submit" name="room_update" value="room" class="btn btn-primary">Next section</button>
                            </div>


                        </div>



                    </div>
                    {!! Form::close() !!}




                </div>

                <!---Activity form--->
                <div class="tab-pane {{ (!empty(session()->get('tab_type')) && session()->get('tab_type') == '3') ? 'in active' : '' }} fade has-padding" id="activity">

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
                    ?>

                    <div class="panel panel-flat">
                        <div class="panel-heading">
                            <h5 class="panel-title">Activities</h5>
                        </div>
                        <div class="panel-body">

                            <div class="form-group">
                                <label class="col-lg-2 control-label">Amenity:</label>
                                <div class="col-lg-10">
                                    {!! Form::textarea('amenity_desc', (isset($arr_amenity_detail) && !empty($arr_amenity_detail) && count($arr_amenity_detail) > 0 ? $arr_amenity_detail->first()->desc : ''), ['rows' => 5, 'cols' => 5, 'class' => 'form-control', 'placeholder' => 'Give a short description about your Amenities on property *']) !!}
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
                                    {!! Form::multiselect('amenity_property[]', $amenity_option, (isset($selected_ameity) && !empty($selected_ameity) && count($selected_ameity) > 0 ? $selected_ameity : '' ), ['class'=>'select-icons', 'placeholder' => 'Select Amenity on Property *', 'data-placeholder' => "Select Amenity on property *", 'multiple' => 'multiple']) !!}

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
                                    {!! Form::textarea('activity_desc', (isset($arr_activity_detail) && !empty($arr_activity_detail) && count($arr_activity_detail) > 0 ? $arr_activity_detail->first()->desc : ''), ['rows' => 5, 'cols' => 5, 'class' => 'form-control', 'placeholder' => 'Give a short description about your Activities on property *']) !!}
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
                                    {!! Form::multiselect('activity_property[]', $activity_option, (isset($selecteds) && !empty($selecteds) && count($selecteds) > 0 ? $selecteds : '' ), ['class'=>'select-icons', 'placeholder' => 'Select Activity on Property *', 'data-placeholder' => "Select Activity on property *", 'multiple' => 'multiple']) !!}
                                    @if ($errors->has('activity_property'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('activity_property') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>



                            <h5>Popular Attraction and Surroundings: Please provide as many details as possible</h5>

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

                                    {!! Form::text('approx_dist[]', (isset($surr_detail) && !empty($surr_detail) ? $surr_detail->distance : ''), ['class' => 'form-control required', 'placeholder' => 'Approximate Distance Example 5km']) !!}
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

                            {{ Form::input('hidden', 'accommo_id', (isset($urlId) && !empty($urlId) ? $urlId : ''), ['readonly' => 'readonly']) }}
                            {{ Form::input('hidden', 'type', 'A', ['readonly' => 'readonly']) }}


                            <div class="text-right">
                                <button type="submit" name="activity" value="Update" class="btn btn-primary">Next section</button>
                            </div>

                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>

                <!---policy form--->
                <div class="tab-pane {{ (!empty(session()->get('tab_type')) && session()->get('tab_type') == '4') ? 'in active' : '' }} fade has-padding" id="policy">

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
                            'display' => 'Duration Of Accommodation *',
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

                    if (isset($arr_policy_detail) && !empty($arr_policy_detail) && count($arr_policy_detail) > 0) {
                        $pmt_accept = [];
                        foreach ($arr_policy_detail->paymentAccept as $val) {
                            $pmt_accept[] = $val->payment_mode_id;
                        }
                    }
                    $corporate_deal_yes = App\Helpers\Helper::dropDownYesNo('Corporate Deals');
                    $contractor_deal_yes = App\Helpers\Helper::dropDownYesNo('Contractors Deals');
                    ?>

                    <div class="panel panel-flat">
                        <div class="panel-heading">
                            <h5 class="panel-title">Policies</h5>
                        </div>
                        <div class="panel-body">


                            <div class="form-group extra-parents">

                                <div class="col-lg-6">
                                    {!! Form::text('deposite', config('constants.policy')['policy_share'].'% Deposit', ['class' => 'form-control', 'readonly' => 'true']) !!}
                                </div>


                                <div class="col-lg-6">
                                    {!! Form::text('cancel', (isset($arr_policy_detail) && !empty($arr_policy_detail) && count($arr_policy_detail) > 0 ? $arr_policy_detail->policy_cancel : ''), ['class' => 'form-control', 'placeholder' => 'Enter Cancellation Policy *']) !!}
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
                                    {!! Form::text('timein', (isset($arr_policy_detail) && !empty($arr_policy_detail) && count($arr_policy_detail) > 0 ? $arr_policy_detail->time_in : ''), ['class' => 'form-control', 'placeholder' => 'Enter Time In *']) !!}
                                    @if ($errors->has('timein'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('timein') }}</strong>
                                    </span>
                                    @endif
                                </div>


                                <div class="col-lg-6">
                                    {!! Form::text('timeout', (isset($arr_policy_detail) && !empty($arr_policy_detail) && count($arr_policy_detail) > 0 ? $arr_policy_detail->time_out : ''), ['class' => 'form-control', 'placeholder' => 'Enter Time Out *']) !!}
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
                                    {!! Form::multiselect('payment_type[]', $payment_option, (isset($pmt_accept) && !empty($pmt_accept) && count($pmt_accept) > 0 ? $pmt_accept : '3'), ['class'=>'select-icons', 'placeholder' => 'Payment accepted at this facility *', 'data-placeholder' => "Payment accepted at this facility *", 'multiple' => 'multiple']) !!}
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
                                    {!! Form::fancyselect('acco_duration', $acco_option, (isset($arr_policy_detail) && !empty($arr_policy_detail) && count($arr_policy_detail) > 0 ? $arr_policy_detail->acco_duration : ''), ['class'=>'select-icons']) !!}
                                    @if ($errors->has('acco_duration'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('acco_duration') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="col-lg-4">
                                    {!! Form::fancyselect('corpo_deals', $corporate_deal_yes, (isset($arr_policy_detail) && !empty($arr_policy_detail) && count($arr_policy_detail) > 0 ? $arr_policy_detail->corpo_deals : ''), ['class'=>'select-icons']) !!}
                                    @if ($errors->has('corpo_deals'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('corpo_deals') }}</strong>
                                    </span>
                                    @endif

                                </div>

                                <div class="col-lg-4">
                                    {!! Form::fancyselect('contract_deal', $contractor_deal_yes, (isset($arr_policy_detail) && !empty($arr_policy_detail) && count($arr_policy_detail) > 0 ? $arr_policy_detail->contract_deal : ''), ['class'=>'select-icons']) !!}
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
                                    {!! Form::textarea('policy_terms', (isset($arr_policy_detail) && !empty($arr_policy_detail) && count($arr_policy_detail) > 0 ? $arr_policy_detail->policy_terms : ''), ['rows' => 5, 'cols' => 5, 'class' => 'form-control', 'placeholder' => 'Give a short description about your Terms *']) !!}
                                    @if ($errors->has('policy_terms'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('policy_terms') }}</strong>
                                    </span>
                                    @endif
                                </div>

                            </div>

                            <div class="text-right">
                                {{ Form::input('hidden', 'accommo_id', (isset($urlId) && !empty($urlId) ? $urlId : ''), ['readonly' => 'readonly']) }}
                                {{ Form::input('hidden', 'policy_id', (isset($arr_policy_detail) && !empty($arr_policy_detail) ? $arr_policy_detail->id : ''), ['readonly' => 'readonly']) }}
                                {{ Form::input('hidden', 'type', 'A', ['readonly' => 'readonly']) }}
                                <button type="submit" name="policy" value="Update" class="btn btn-primary">Next section</button>
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>

                <!---meta tag form--->
                <div class="tab-pane fade {{ (!empty(session()->get('tab_type')) && session()->get('tab_type') == '5') ? 'in active' : '' }} has-padding" id="keywords">
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
                                    {!! Form::text('title', ( isset($arr_meta_detail) && !empty($arr_meta_detail) && count($arr_meta_detail) > 0 ? $arr_meta_detail->title : ''), ['class' => 'form-control', 'placeholder' => 'Enter Your Title *']) !!}
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
                                    {!! Form::textarea('keyword', ( isset($arr_meta_detail) && !empty($arr_meta_detail) && count($arr_meta_detail) > 0 ? $arr_meta_detail->keyword : ''), ['rows' => 5, 'cols' => 5, 'class' => 'form-control', 'placeholder' => 'Enter your Keywords here *']) !!}
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
                                    {!! Form::textarea('meta_desc', ( isset($arr_meta_detail) && !empty($arr_meta_detail) && count($arr_meta_detail) > 0 ? $arr_meta_detail->meta_desc : ''), ['rows' => 5, 'cols' => 5, 'class' => 'form-control', 'placeholder' => 'Enter your Meta Tags here *']) !!}
                                    @if ($errors->has('meta_desc'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('meta_desc') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                {{ Form::input('hidden', 'accommo_id', (isset($urlId) && !empty($urlId) ? $urlId : ''), ['readonly' => 'readonly']) }}
                                {{ Form::input('hidden', 'meta_id', (isset($arr_meta_detail) && !empty($arr_meta_detail) ? $arr_meta_detail->id : ''), ['readonly' => 'readonly']) }}
                                {{ Form::input('hidden', 'type', 'A', ['readonly' => 'readonly']) }}
                            </div>

                            <div class="text-right">
                                <button type="submit" name="meta_tag" value="meta" class="btn btn-primary">Next section</button>
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>

                <!---video & map form--->
                <div class="tab-pane fade has-padding {{ (!empty(session()->get('tab_type')) && session()->get('tab_type') == '6') ? 'in active' : '' }}" id="videomap">
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
                    <div class="panel panel-flat">
                        <div class="panel-heading">
                            <h5 class="panel-title">Video and Map</h5>
                        </div>
                        <div class="panel-body">

                            <div class="form-group">
                                <label class="col-lg-6 control-label">Do you have any video link :</label>
                                <div class="col-lg-12">
                                    {!! Form::fancyselect('video_cond', $drop_down_yes, ( isset($arr_video_detail) && !empty($arr_video_detail) && count($arr_video_detail) > 0 ? $arr_video_detail->is_link : ''), ['id'=>'vid_con', 'class'=>'select-icons']) !!}
                                </div>
                            </div>


                            <div class="form-group" id="viddiv" style='display:none;'>
                                <label class="col-lg-3 control-label">Accommodation Video </label>
                                <div class="col-lg-9">
                                    {!! Form::text('video_link', ( isset($arr_video_detail) && !empty($arr_video_detail) && count($arr_video_detail) > 0 ? $arr_video_detail->video_link : ''), ['class' => 'form-control', 'placeholder' => 'Paste Your Accommodation Link here Eg-: http://example.com *']) !!}
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
                                    {!! Form::text('lat', ( isset($arr_video_detail) && !empty($arr_video_detail) && count($arr_video_detail) > 0 ? $arr_video_detail->lat : ''), ['class' => 'form-control', 'placeholder' => 'Enter Latitude Eg-: 00.000 *']) !!}
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
                                    {!! Form::text('long', ( isset($arr_video_detail) && !empty($arr_video_detail) && count($arr_video_detail) > 0 ? $arr_video_detail->long : ''), ['class' => 'form-control', 'placeholder' => 'Enter Longitude Eg-: 00.000 *']) !!}
                                    @if ($errors->has('long'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('long') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                {{ Form::input('hidden', 'accommo_id', (isset($urlId) && !empty($urlId) ? $urlId : ''), ['readonly' => 'readonly']) }}
                                {{ Form::input('hidden', 'video_id', (isset($arr_video_detail) && !empty($arr_video_detail) ? $arr_video_detail->id : ''), ['readonly' => 'readonly']) }}
                                {{ Form::input('hidden', 'type', 'A', ['readonly' => 'readonly']) }}
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

@endsection

@section('pageTitle')
Update New Listing
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
                    
            '<div class="form-group">'+
            '<label class="col-lg-1 control-label">Room Description:</label>'+
            '<div class="col-lg-9">'+
            '{!! Form::textarea('room_desc[]', null, ['rows' => 3, 'cols' => 3, 'class' => 'form-control required', 'placeholder' => "Give a short description about this Room *"]) !!}'+
            '</div>'+
            '</div>'+
                                
                                
            '<div class="form-group">'+
            
            '<div class="col-md-2">'+
            '{!! Form::text('room_name[]', null, ['class' => 'form-control', 'placeholder' => 'Rooms Name *']) !!}'+
            '</div>'+
            
            '<div class="col-md-2">'+
           '{!! Form::fancyselect('room_type[]', (isset($room_type_option) && !empty($room_type_option) ? $room_type_option : ''), null, ['class'=>'form-control select-icons']) !!}'+
           '</div>'+
           
            '<div class="col-md-2">'+
            '{!! Form::fancyselect('guest[]', (isset($room_cap) && !empty($room_cap) ? $room_cap : ''), null, ['class'=>'form-control select-icons']) !!}'+
            '</div>'+
            
            '<div class="col-md-2">'+
            '{!! Form::number('room_qty[]', null, ['min' => '0', 'class' => 'form-control', 'placeholder' => 'Rooms Quantity *']) !!}'+
            '</div>'+
    
            '<div class="col-md-2">'+
            '{!! Form::text('room_price[]', null, ['class' => 'form-control required number', 'placeholder' => 'Price per Person *']) !!}'+
            '</div>'+
    
            '<div class="col-md-2">'+
            '{{ Form::file('room_img[]', ['id' => 'room_img', 'class' => 'form-control file-styled', 'multiple' => false]) }}'+
            '</div>'+
            '</div>'+
            
            @if(app('request')->input('type') == 'P')
            
            '<div class="form-group">'+
            '<div class="col-md-8">'+
            '<div class="col-md-2">'+
            '<label class="control-label">Promotion:</label>'+
            '</div>'+
            
            '<div class="col-md-3">'+
            '{!! Form::fancyselect('is_room_promo[]', (isset($drop_down_yes) && !empty($drop_down_yes) && count($drop_down_yes) > 0 ? $drop_down_yes : ''), null, ['class'=>'form-control select-icons append_room_promo']) !!}'+
            '</div>'+
            
            '</div>'+
            
            '</div>'+
            
            @endif
            
            '<div class="form-group room_promo_div" style="display:none">'+
            
            '<div class="col-md-2">'+
            '{!! Form::text('room_promo_price[]', null, ['class' => 'form-control', 'placeholder' => 'Promotion Price *']) !!}'+
            '</div>'+
            
            '<label class="col-lg-1 control-label">From Date:</label>'+
            
            '<div class="col-md-2">'+
            '{!! Form::date('room_from_date[]', null, ['class' => 'form-control', 'placeholder' => 'From Date *']) !!}'+
            '</div>'+
            
            '<label class="col-lg-1 control-label">Till Date:</label>'+
            
            '<div class="col-md-2">'+
            '{!! Form::date('room_to_date[]', null, ['class' => 'form-control', 'placeholder' => 'Till Date *']) !!}'+
            '</div>'+
            
            '<div class="col-lg-4">'+
            '{!! Form::textarea('room_promo_desc[]', null, ['rows' => 3, 'cols' => 3, 'class' => 'form-control', 'placeholder' => "Give a short description about your term for this offer *"]) !!}'+
            '</div>'+
            
            '</div>'+
            
            '<a href="javascript:void(0)" style="margin: 9px 0px 0px 10px;" class="btn-remove label label-danger">Remove</a>'+
            '</div>';
    
        $(".btn-add-more").on('click', function(e){
            
            e.preventDefault();
            $(this).before(room_temp);
            //console.log($(this).parents().find('.room_promo_div').attr('class'));
            //$(this).parents().find('.room_promo_div').hide();
        });
        
        
        
        $(document).on('click','.btn-remove',function(e){    
                
                e.preventDefault();
                //console.log($(this).parents(".parentss").attr('class'));
                $(this).parents(".parentss").remove();
        });
        
        
        //////////////////////////venu add more////////////////////////
        var venu_temp = '<div class="form-group venu-parents">'+
                
            '<div class="form-group">'+
            '<label class="col-lg-1 control-label">Venu Description:</label>'+
            '<div class="col-lg-9">'+
            '{!! Form::textarea('venue_short_descr[]', null, ['rows' => 3, 'cols' => 3, 'class' => 'form-control required', 'placeholder' => "Give a short description about this Venue *"]) !!}'+
            '</div>'+
            '</div>'+
            
            '<div class="form-group">'+
                
            '<div class="col-md-2">'+
            '{!! Form::text('venue_name[]', null, ['class' => 'form-control', 'placeholder' => 'Venue Name']) !!}'+
            '</div>'+    
            
            '<div class="col-md-2">'+
            '{!! Form::number('venue_qty[]', null, ['min' => '0', 'class' => 'form-control', 'placeholder' => 'Max Capacity']) !!}'+
            '</div>'+
    
            '<div class="col-md-2">'+
            '{!! Form::text('venue_price[]', null, ['class' => 'form-control', 'placeholder' => 'Venue rental price']) !!}'+
            '</div>'+
            
            '<div class="col-md-2">'+
            '{!! Form::text('venue_price_per_seat[]', null, ['class' => 'form-control', 'placeholder' => 'Price per seat']) !!}'+
            '</div>'+
    
            '<div class="col-md-2">'+
            '{{ Form::file('venu_img[]', ['class' => 'form-control file-styled', 'multiple' => false]) }}'+
            '</div>'+
            '</div>'+
            
            @if(app('request')->input('type') == 'P')
            
            '<div class="form-group">'+
            '<div class="col-md-8">'+
            '<div class="col-md-2">'+
            '<label class="control-label">Promotion:</label>'+
            '</div>'+
            
            '<div class="col-md-3">'+
            '{!! Form::fancyselect('is_venue_promo[]', (isset($drop_down_yes) && !empty($drop_down_yes) && count($drop_down_yes) > 0 ? $drop_down_yes : ''), null, ['class'=>'form-control select-icons append_venue_promo']) !!}'+
            '</div>'+
            '</div>'+
            
            '</div>'+
            @endif
            
            '<div class="form-group venue_promo_div" style="display:none">'+
            '<div class="col-md-2">'+
            '{!! Form::text('venue_promo_price[]', null, ['class' => 'form-control', 'placeholder' => 'Promotion Price *']) !!}'+
            '</div>'+
            
            '<label class="col-lg-1 control-label">From Date:</label>'+
            '<div class="col-md-2">'+
            '{!! Form::date('venue_from_date[]', null, ['class' => 'form-control', 'placeholder' => 'From Date *']) !!}'+
            '</div>'+
            
            '<label class="col-lg-1 control-label">Till Date:</label>'+
            '<div class="col-md-2">'+
            '{!! Form::date('venue_to_date[]', null, ['class' => 'form-control', 'placeholder' => 'Till Date *']) !!}'+
            '</div>'+
            
            '<div class="col-lg-4">'+
            '{!! Form::textarea('venue_promo_desc[]', null, ['rows' => 3, 'cols' => 3, 'class' => 'form-control', 'placeholder' => "Give a short description about your term for this offer *"]) !!}'+
            '</div>'+
            
            '</div>'+
            
            
            '<a href="javascript:void(0)" style="margin: 9px 0px 0px 10px;" class="venu-remove label label-danger">Remove</a>'+
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
                
            '<div class="form-group">'+
            '<label class="col-lg-1 control-label">Conference Description:</label>'+
            '<div class="col-lg-9">'+
            '{!! Form::textarea('confer_short_descr[]', null, ['rows' => 3, 'cols' => 3, 'class' => 'form-control required', 'placeholder' => "Give a short description about this Conference *"]) !!}'+
            '</div>'+
            '</div>'+
                
            '<div class="form-group">'+    
            '<div class="col-md-2">'+
            '{!! Form::text('confer_name[]', null, ['class' => 'form-control', 'placeholder' => 'Conference Name']) !!}'+
            '</div>'+    
            
            '<div class="col-md-2">'+
            '{!! Form::number('confer_qty[]', null, ['min' => '0', 'class' => 'form-control', 'placeholder' => 'Max Capacity']) !!}'+
            '</div>'+
    
            '<div class="col-md-2">'+
            '{!! Form::text('confer_price[]', null, ['class' => 'form-control', 'placeholder' => 'Conference rental price']) !!}'+
            '</div>'+
            
            '<div class="col-md-2">'+
            '{!! Form::text('confer_price_per_seat[]', null, ['class' => 'form-control', 'placeholder' => 'price per seat']) !!}'+
            '</div>'+
    
            '<div class="col-md-2">'+
            '{{ Form::file('confer_img[]', ['class' => 'form-control file-styled', 'multiple' => false]) }}'+
            '</div>'+
            '</div>'+
            
            @if(app('request')->input('type') == 'P')
            '<div class="form-group">'+
            '<div class="col-md-8">'+
            '<div class="col-md-2">'+
            '<label class="control-label">Promotion:</label>'+
            '</div>'+
            
            '<div class="col-md-3">'+
            '{!! Form::fancyselect('is_confer_promo[]', (isset($drop_down_yes) && !empty($drop_down_yes) && count($drop_down_yes) > 0 ? $drop_down_yes : ''), null, ['class'=>'form-control select-icons append_confer_promo']) !!}'+
            '</div>'+
            '</div>'+
            
            '</div>'+
            @endif
            
            '<div class="form-group confer_promo_div" style="display:none">'+
            '<div class="col-md-2">'+
            '{!! Form::text('confer_promo_price[]', null, ['class' => 'form-control required number', 'placeholder' => 'Promotion Price *']) !!}'+
            '</div>'+
            
            '<label class="col-lg-1 control-label">From Date:</label>'+
            '<div class="col-md-2">'+
            '{!! Form::date('confer_from_date[]', null, ['class' => 'form-control', 'placeholder' => 'From Date *']) !!}'+
            '</div>'+
            
            '<label class="col-lg-1 control-label">Till Date:</label>'+
            '<div class="col-md-2">'+
            '{!! Form::date('confer_to_date[]', null, ['class' => 'form-control', 'placeholder' => 'Till Date *']) !!}'+
            '</div>'+
            
            '<div class="col-lg-4">'+
            '{!! Form::textarea('confer_promo_desc[]', null, ['rows' => 3, 'cols' => 3, 'class' => 'form-control required', 'placeholder' => "Give a short description about your term for this offer *"]) !!}'+
            '</div>'+
            
            '</div>'+
            
            '<a href="javascript:void(0)" style="margin: 9px 0px 0px 10px;" class="confer-remove label label-danger">Remove</a>'+
            '</div>';
    
        $(".confer-add-more").on('click', function(e){
            e.preventDefault();
            $(this).before(confer_temp)
        });
        
        $(document).on('click','.confer-remove',function(e){    
                e.preventDefault();
                $(this).parents(".confer-parents").remove();
        });
        
        //////////////////////////Health add more////////////////////////
        var health_temp = '<div class="form-group health-parents">'+
                
            '<div class="form-group">'+
            '<label class="col-lg-1 control-label">Service Description:</label>'+
            '<div class="col-lg-9">'+
            '{!! Form::textarea('health_short_desc[]', null, ['rows' => 3, 'cols' => 3, 'class' => 'form-control required', 'placeholder' => "Give a short description about this Service *"]) !!}'+
            '</div>'+
            '</div>'+
            
            '<div class="form-group">'+
            '<div class="col-md-2">'+
            '{!! Form::text('health_name[]', null, ['class' => 'form-control', 'placeholder' => 'Name Service']) !!}'+
            '</div>'+    
            
            '<div class="col-md-2">'+
            '{!! Form::text('treatment[]', null, ['class' => 'form-control', 'placeholder' => 'Name treatment']) !!}'+
            '</div>'+
    
            '<div class="col-md-2">'+
            '{!! Form::text('service_price[]', null, ['class' => 'form-control', 'placeholder' => 'Price per treatment']) !!}'+
            '</div>'+
            
            '<div class="col-md-2">'+
            '{{ Form::file('health_img[]', ['class' => 'form-control file-styled', 'multiple' => false]) }}'+
            '</div>'+
            '</div>'+
            
            @if(app('request')->input('type') == 'P')
            '<div class="form-group">'+
            '<div class="col-md-8">'+
            '<div class="col-md-2">'+
            '<label class="control-label">Promotion:</label>'+
            '</div>'+
            
            '<div class="col-md-3">'+
            '{!! Form::fancyselect('is_health_promo[]', (isset($drop_down_yes) && !empty($drop_down_yes) && count($drop_down_yes) > 0 ? $drop_down_yes : ''), null, ['class'=>'form-control select-icons append_health_promo']) !!}'+
            '</div>'+
            '</div>'+
            
            '</div>'+
            @endif
            
            '<div class="form-group health_promo_div" style="display:none">'+
            '<div class="col-md-2">'+
            '{!! Form::text('health_promo_price[]', null, ['class' => 'form-control', 'placeholder' => 'Promotion Price *']) !!}'+
            '</div>'+
            
            '<label class="col-lg-1 control-label">From Date:</label>'+
            '<div class="col-md-2">'+
            '{!! Form::date('health_from_date[]', null, ['class' => 'form-control', 'placeholder' => 'From Date *']) !!}'+
            '</div>'+
            
            '<label class="col-lg-1 control-label">Till Date:</label>'+
            '<div class="col-md-2">'+
            '{!! Form::date('health_to_date[]', null, ['class' => 'form-control', 'placeholder' => 'Till Date *']) !!}'+
            '</div>'+
            
            '<div class="col-lg-4">'+
            '{!! Form::textarea('health_promo_desc[]', null, ['rows' => 3, 'cols' => 3, 'class' => 'form-control', 'placeholder' => "Give a short description about your term for this offer *"]) !!}'+
            '</div>'+
            
            '</div>'+
            
            '<a href="javascript:void(0)" style="margin: 9px 0px 0px 10px;" class="health-remove label label-danger">Remove</a>'+
            '</div>';
    
        $(".health-add-more").on('click', function(e){
            e.preventDefault();
            $(this).before(health_temp)
        });
        
        $(document).on('click','.health-remove',function(e){    
                e.preventDefault();
                $(this).parents(".health-parents").remove();
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
        
        
$(document).ready(function () {
    
    hideAndShow('#accom_faclity', '#select_accommo');
    hideAndShow('#venu_faclity', '#select_venu');
    hideAndShow('#confer_faclity', '#select_confer');
    hideAndShow('#health_faclity', '#select_health');
    hideAndShow('#trans_faclity', '#select_trans');
    hideAndShow('#viddiv', '#vid_con');
    promoHideShow('.room_promo_div', '.room_promo', 'promoval[]');
    promoHideShow('.venue_promo_div', '.venue_promo', 'venueval[]');
    promoHideShow('.confer_promo_div', '.confer_promo', 'conferval[]');
    promoHideShow('.health_promo_div', '.health_promo', 'healthval[]');
    appendPromoHideShow('.room_promo_div', '.append_room_promo');
    appendPromoHideShow('.venue_promo_div', '.append_venue_promo');
    appendPromoHideShow('.confer_promo_div', '.append_confer_promo');
    appendPromoHideShow('.health_promo_div', '.append_health_promo');
});


///////////////div hide and show for append promotion off yes/no////////////////




function appendPromoHideShow(div, val){
    $(document).on('change', val, function () {
    
    //console.log($(this).parents().children('.room_promo_div').hide());
    
    if($(this).val()  == 'Y'){
        $(this).parents().children(div).show();
    } else {
        $(this).parents().children(div).hide();
    }
    
});
    
}

///////////////div hide and show for edit time promotion off yes/no////////////////
function promoHideShow(div, dropval, hidfield){
    
    var values = $("input[name=\'"+hidfield+"\']").map(function(){return $(this).val();}).get();
    
    if(values != ''){
      
        var count = values.length;
        
        
    for(i=1; i<=count; i++){
        if(values[i-1] == 'Y'){
            $(div+i).show();
            
            }else{
                $(div+i).hide();
        }
    }
    }
$(dropval).change(function () {
  
    var checkVal = $(this).val();
    if (checkVal == 'Y') {
        $(this).parent().parent().parent().next().show();

    } else {
        $(this).parent().parent().parent().next().hide();
    }

});
    
}

///////////////faciclitie hide and show////////////////
function hideAndShow(divId, dropDownId){
    
    $(divId).css("display", "none");
    
    var dropVal = $(dropDownId).val();
    
            if (dropVal == 'Y') {
                $(divId).css("display", "block");
            }

            $(dropDownId).change(function () {
                var checkVal = $(this).val();
                
                if (checkVal == 'Y') {
                    $(divId).show();
                    

                } else {
                    $(divId).hide();
                    
                }


            });
}
</script>

@endsection