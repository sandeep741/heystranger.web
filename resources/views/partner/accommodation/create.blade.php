@extends('admin.app')
@section('content')

<div class="content">
    <!-- Horizontal form options -->
    <div class="row">
        <div class="tabbable tab-content-bordered content-group-lg">

            @include('admin.layouts.partner-tab')
            

            <div class="tab-content">

                <?php
                $drop_down_yes = App\Helpers\Helper::dropDownYesNo('choose here');
                ?>

                <!---Accommodation form--->
                <div class="tab-pane fade {{ (empty(session()->get('tab_type'))) ? 'in active' : '' }} has-padding" id="accommodation">

                    {!!
                    Form::open(
                    array(
                    'name' => 'frm_accommodation',
                    'id' => 'frm_accommodation',
                    'url' => 'accomodation/'.(isset($edit_data) && !empty($edit_data) ? $edit_data->id : ''),
                    'autocomplete' => 'off',
                    'class' => 'form-horizontal',
                    'files' => true
                    )
                    )
                    !!}
                    <div class="panel panel-flat">
                        <div class="panel-heading">
                            <h5 class="panel-title">Listing details</h5>
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
                                    {{Form::select('accom_type',[''=>'Select type of Accommodation']+@$arr_accomm->pluck('name','id')->toArray(), null,['class'=>'form-control'])}}

                                    @if ($errors->has('accom_type'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('accom_type') }}</strong>
                                    </span>
                                    @endif

                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    {{Form::select('rating',[''=>'Start Ratings']+@config('constants.star_rating'), null,['class'=>'form-control'])}}
                                    @if ($errors->has('rating'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('rating') }}</strong>
                                    </span>
                                    @endif   

                                </div>



                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    {!! Form::text('reserving_email', (isset($edit_data) && !empty($edit_data) ? $edit_data->reserving_email : ''), ['class' => 'form-control email', 'placeholder' => 'Enter Reserving Email']) !!}
                                    @if ($errors->has('reserving_email'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('reserving_email') }}</strong>
                                    </span>
                                    @endif

                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    {{Form::select('country',[''=>'Select Country *']+@$arr_country->pluck('name','id')->toArray(), (isset($edit_data) && !empty($edit_data) ? @$edit_data->country_id : ''),['id'=> 'state_id', 'class'=>'form-control country_id'])}}

                                    @if ($errors->has('country'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('country') }}</strong>
                                    </span>
                                    @endif

                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    {{Form::select('state',[''=>'Select State *'], (isset($edit_data) && !empty($edit_data) ? @$edit_data->state_id : ''),['id'=> 'state_id', 'class'=>'form-control state_id'])}}

                                    @if ($errors->has('state'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('state') }}</strong>
                                    </span>
                                    @endif

                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    {{Form::select('city',[''=>'Select city *'], (isset($edit_data) && !empty($edit_data) ? @$edit_data->city_id : ''),['id'=> 'address_city_id', 'class'=>'form-control address_city_id'])}}

                                    @if ($errors->has('city'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                    @endif

                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    {!! Form::text('street_address', (isset($edit_data) && !empty($edit_data) ? $edit_data->stree_address : ''), ['class' => 'form-control', 'placeholder' => 'Enter Street Address']) !!}
                                    @if ($errors->has('street_address'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('street_address') }}</strong>
                                    </span>
                                    @endif

                                </div>
                            </div>

                            <div class="form-group">

                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    {!! Form::text('area', null, ['class' => 'form-control', 'placeholder' => 'Enter suburb Area']) !!}
                                    @if ($errors->has('area'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('area') }}</strong>
                                    </span>
                                    @endif

                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    {!! Form::text('contact_no', null, ['class' => 'form-control', 'placeholder' => 'Enter Contact Number Ex: (+27) 00 000 0000']) !!}
                                    @if ($errors->has('contact_no'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('contact_no') }}</strong>
                                    </span>
                                    @endif

                                </div>

                            </div>

                            <div class="form-group">

                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    {!! Form::text('alternate_no', null, ['class' => 'form-control', 'placeholder' => 'Enter Alternate no Ex: (+27) 00 000 0000']) !!}
                                    @if ($errors->has('area'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('alternate_no') }}</strong>
                                    </span>
                                    @endif

                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    {{ Form::file('accomm_images[]', ['id' => 'acco_image', 'title' => 'press ctrl to select more than one image', 'class' => 'file-styled maxfile', 'multiple' => true]) }}
                                    @if ($errors->has('accomm_images'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('accomm_images') }}</strong>
                                    </span>
                                    @endif
                                    <div class="validation text-danger" style="display:none;"></div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-3 control-label">Establishment Detail:</label>

                                <div class="col-lg-9 col-md-9 col-sm-9">
                                    {!! Form::textarea('establish_details', null, ['rows' => 5, 'cols' => 5, 'class' => 'form-control', 'placeholder' => 'Give a short description about your establishment']) !!}
                                    @if ($errors->has('establish_details'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('establish_details') }}</strong>
                                    </span>
                                    @endif
                                    {{ Form::input('hidden', 'type', 'A', ['readonly' => 'readonly']) }}

                                </div>
                            </div>

                            <div class="text-right">
                                <button type="submit" name="acco" value="" class="btn btn-primary">Next Section</button>
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
                        $room_type = [];
                        $room_type[] = array(
                            'value' => '',
                            'display' => 'Type of Rooms *',
                            'data-icon' => 'stumbleupon'
                        );

                        if (isset($arr_room) && !empty($arr_room)) {
                            foreach ($arr_room as $value) {
                                $room_type[] = array(
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
                        ?>


                        <div class="panel-body">

                            <div class="form-group">

                                <div class="col-md-2">
                                    {!! Form::fancyselect('is_accommo', (isset($drop_down_yes) && !empty($drop_down_yes) && count($drop_down_yes) > 0 ? $drop_down_yes : ''), null, ['id' => 'select_accommo', 'class'=>'select-icons']) !!}
                                </div>

                            </div>

                            <div id="accom_faclity">
                                <div class="form-group">
                                    <label class="col-lg-1 control-label">Description:</label>
                                    <div class="col-lg-9">
                                        {!! Form::textarea('accommo_desc', null, ['rows' => 3, 'cols' => 3, 'class' => 'form-control required', 'placeholder' => 'Give a short description about your Accommodation *']) !!}
                                        @if ($errors->has('accommo_desc'))
                                        <span class="help-block" style = "display:block;color:red;">
                                            <strong>{{ $errors->first('accommo_desc') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="form-group">
                                        <label class="col-lg-1 control-label">Room Description:</label>
                                        <div class="col-lg-9">
                                            {!! Form::textarea('room_desc[]', null, ['rows' => 3, 'cols' => 3, 'class' => 'form-control required', 'placeholder' => 'Give a short description about this Room *']) !!}
                                            @if ($errors->has('room_desc.0'))
                                            <span class="help-block" style = "display:block;color:red;">
                                                <strong>{{ $errors->first('room_desc.0') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-2">

                                            {!! Form::text('room_name[]', null, ['class' => 'form-control required', 'placeholder' => 'Rooms Name *']) !!}
                                            @if ($errors->has('room_name.0'))
                                            <span class="help-block" style = "display:block;color:red;">
                                                <strong>{{ $errors->first('room_name.0') }}</strong>
                                            </span>
                                            @endif
                                        </div>

                                        <div class="col-md-2">

                                            {!! Form::fancyselect('room_type[]', $room_type, null, ['class'=>'select-icons required']) !!}

                                            @if ($errors->has('room_type.0'))
                                            <span class="help-block" style = "display:block;color:red;">
                                                <strong>{{ $errors->first('room_type.0') }}</strong>
                                            </span>
                                            @endif

                                        </div>

                                        <div class="col-md-2">

                                            {!! Form::fancyselect('guest[]', $room_cap, null, ['class'=>'select-icons required']) !!}

                                            @if ($errors->has('guest.0'))
                                            <span class="help-block" style = "display:block;color:red;">
                                                <strong>{{ $errors->first('guest.0') }}</strong>
                                            </span>
                                            @endif

                                        </div>

                                        <div class="col-md-2">

                                            {!! Form::number('room_qty[]', null, ['min' => '0', 'class' => 'form-control required', 'placeholder' => 'Rooms Quantity *']) !!}
                                            @if ($errors->has('room_avail.0'))
                                            <span class="help-block" style = "display:block;color:red;">
                                                <strong>{{ $errors->first('room_avail.0') }}</strong>
                                            </span>
                                            @endif
                                        </div>



                                        <div class="col-md-2">
                                            {!! Form::text('room_price[]', null, ['class' => 'form-control required number', 'placeholder' => 'Price per Person *']) !!}
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

                                        <div class="col-md-8">
                                            <div class="col-md-2">    
                                                <label class="control-label">Promotion:</label>
                                            </div>

                                            <div class="col-md-3">    
                                                {!! Form::fancyselect('is_room_promo[]', (isset($drop_down_yes) && !empty($drop_down_yes) && count($drop_down_yes) > 0 ? $drop_down_yes : ''), (isset($room_detail) && !empty($room_detail) && count($room_detail) > 0 ? $room_detail->is_promo : ''), ['class'=>'select-icons room_promo']) !!}

                                                {{ Form::input('hidden', 'promoval[]', (isset($room_detail) && !empty($room_detail) && count($room_detail) > 0 ? $room_detail->is_promo : ''), ['readonly' => 'readonly']) }}
                                            </div>
                                        </div>

                                    </div>


                                    <div class="form-group room_promo_div" style="display:none;">

                                        <div class="col-md-2">
                                            {!! Form::text('room_promo_price[]', null, ['class' => 'form-control', 'placeholder' => 'Promotion Price *']) !!}
                                            @if ($errors->has('room_promo_price.0'))
                                            <span class="help-block" style = "display:block;color:red;">
                                                <strong>{{ $errors->first('room_promo_price.0') }}</strong>
                                            </span>
                                            @endif
                                        </div>

                                        <label class="col-lg-1 control-label">From Date:</label>
                                        <div class="col-md-2">

                                            {!! Form::date('room_from_date[]', null, ['class' => 'form-control', 'placeholder' => 'From Date *']) !!}
                                            @if ($errors->has('room_from_date.0'))
                                            <span class="help-block" style = "display:block;color:red;">
                                                <strong>{{ $errors->first('room_from_date.0') }}</strong>
                                            </span>
                                            @endif
                                        </div>

                                        <label class="col-lg-1 control-label">Till Date:</label>
                                        <div class="col-md-2">
                                            {!! Form::date('room_to_date[]', null, ['class' => 'form-control', 'placeholder' => 'Till Date *']) !!}
                                            @if ($errors->has('room_from_date.0'))
                                            <span class="help-block" style = "display:block;color:red;">
                                                <strong>{{ $errors->first('room_from_date.0') }}</strong>
                                            </span>
                                            @endif
                                        </div>

                                        <div class="col-lg-4">
                                            {!! Form::textarea('room_promo_desc[]', null, ['rows' => 3, 'cols' => 3, 'class' => 'form-control required', 'placeholder' => 'Give a short description about your term for this offer *']) !!}
                                            @if ($errors->has('room_promo_desc.0'))
                                            <span class="help-block" style = "display:block;color:red;">
                                                <strong>{{ $errors->first('room_promo_desc.0') }}</strong>
                                            </span>
                                            @endif
                                        </div>

                                    </div>

                                    <a href="javascript:void(0)" class='btn btn-success btn-add-more' >Add More</a>
                                </div>
                            </div>


                            <h5>Do you have Venue facilities</h5>			

                            <div class="form-group">

                                <div class="col-md-2">
                                    {!! Form::fancyselect('is_venu', (isset($drop_down_yes) && !empty($drop_down_yes) && count($drop_down_yes) > 0 ? $drop_down_yes : ''), null, ['id' => 'select_venu', 'class'=>'select-icons']) !!}
                                </div>

                            </div>
                            <div id='venu_faclity'>

                                <div class="form-group">
                                    <label class="col-lg-1 control-label">Description:</label>
                                    <div class="col-lg-9">


                                        {!! Form::textarea('venue_desc', null, ['rows' => 3, 'cols' => 3, 'class' => 'form-control', 'placeholder' => 'Give a short description about your Venue facility *']) !!}
                                        @if ($errors->has('venue_desc'))
                                        <span class="help-block" style = "display:block;color:red;">
                                            <strong>{{ $errors->first('venue_desc') }}</strong>
                                        </span>
                                        @endif

                                    </div>
                                </div>	

                                <div class="form-group">

                                    <div class="form-group">
                                        <label class="col-lg-1 control-label">Venu Description:</label>
                                        <div class="col-lg-9">

                                            {!! Form::textarea('venue_short_descr[]', null, ['rows' => 3, 'cols' => 3, 'class' => 'form-control', 'placeholder' => 'Give a short description about this Venue *']) !!}
                                            @if ($errors->has('venue_short_descr.0'))
                                            <span class="help-block" style = "display:block;color:red;">
                                                <strong>{{ $errors->first('venue_short_descr.0') }}</strong>
                                            </span>
                                            @endif
                                        </div>

                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-2">

                                            {!! Form::text('venue_name[]', null, ['class' => 'form-control', 'placeholder' => 'Venue Name']) !!}
                                            @if ($errors->has('venue_name'))
                                            <span class="help-block" style = "display:block;color:red;">
                                                <strong>{{ $errors->first('venue_name') }}</strong>
                                            </span>
                                            @endif
                                        </div>

                                        <div class="col-md-2">

                                            {!! Form::number('venue_qty[]', null, ['min' => '0', 'class' => 'form-control', 'placeholder' => 'Max Capacity']) !!}
                                            @if ($errors->has('venue_capacity.0'))
                                            <span class="help-block" style = "display:block;color:red;">
                                                <strong>{{ $errors->first('venue_capacity.0') }}</strong>
                                            </span>
                                            @endif
                                        </div>


                                        <div class="col-md-2">
                                            {!! Form::text('venue_price[]', null, ['class' => 'form-control', 'placeholder' => 'Venue rental price']) !!}
                                            @if ($errors->has('venue_price.0'))
                                            <span class="help-block" style = "display:block;color:red;">
                                                <strong>{{ $errors->first('venue_price.0') }}</strong>
                                            </span>
                                            @endif

                                        </div>

                                        <div class="col-md-2">
                                            {!! Form::text('venue_price_per_seat[]', null, ['class' => 'form-control', 'placeholder' => 'price per seat']) !!}
                                            @if ($errors->has('venue_price_per_seat.0'))
                                            <span class="help-block" style = "display:block;color:red;">
                                                <strong>{{ $errors->first('venue_price_per_seat.0') }}</strong>
                                            </span>
                                            @endif

                                        </div>


                                        <div class="col-md-2">
                                            {{ Form::file('venue_img[]', ['id' => 'venue_img', 'class' => 'file-styled', 'multiple' => false]) }}
                                            @if ($errors->has('venue_img.0'))
                                            <span class="help-block" style = "display:block;color:red;">
                                                <strong>{{ $errors->first('venue_img.0') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>


                                    <div class="form-group">

                                        <div class="col-md-8">
                                            <div class="col-md-2">    
                                                <label class="control-label">Promotion:</label>
                                            </div>

                                            <div class="col-md-3">    
                                                {!! Form::fancyselect('is_venue_promo[]', (isset($drop_down_yes) && !empty($drop_down_yes) && count($drop_down_yes) > 0 ? $drop_down_yes : ''), null, ['class'=>'select-icons venue_promo']) !!}
                                                @if ($errors->has('is_venue_promo.0'))
                                                <span class="help-block" style = "display:block;color:red;">
                                                    <strong>{{ $errors->first('is_venue_promo.0') }}</strong>
                                                </span>
                                                @endif

                                            </div>
                                        </div>

                                    </div>

                                    <div class="form-group venue_promo_div" style="display:none;">

                                        <div class="col-md-2">
                                            {!! Form::text('venue_promo_price[]', null, ['class' => 'form-control', 'placeholder' => 'Promotion Price *']) !!}
                                            @if ($errors->has('venue_promo_price.0'))
                                            <span class="help-block" style = "display:block;color:red;">
                                                <strong>{{ $errors->first('venue_promo_price.0') }}</strong>
                                            </span>
                                            @endif
                                        </div>

                                        <label class="col-lg-1 control-label">From Date:</label>
                                        <div class="col-md-2">

                                            {!! Form::date('venue_from_date[]', null, ['class' => 'form-control', 'placeholder' => 'From Date *']) !!}
                                            @if ($errors->has('venue_from_date.0'))
                                            <span class="help-block" style = "display:block;color:red;">
                                                <strong>{{ $errors->first('venue_from_date.0') }}</strong>
                                            </span>
                                            @endif
                                        </div>

                                        <label class="col-lg-1 control-label">Till Date:</label>
                                        <div class="col-md-2">
                                            {!! Form::date('venue_to_date[]', null, ['class' => 'form-control', 'placeholder' => 'Till Date *']) !!}
                                            @if ($errors->has('venue_from_date.0'))
                                            <span class="help-block" style = "display:block;color:red;">
                                                <strong>{{ $errors->first('venue_from_date.0') }}</strong>
                                            </span>
                                            @endif
                                        </div>

                                        <div class="col-lg-4">
                                            {!! Form::textarea('venue_promo_desc[]', null, ['rows' => 3, 'cols' => 3, 'class' => 'form-control required', 'placeholder' => 'Give a short description about your term for this offer *']) !!}
                                            @if ($errors->has('venue_promo_desc.0'))
                                            <span class="help-block" style = "display:block;color:red;">
                                                <strong>{{ $errors->first('venue_promo_desc.0') }}</strong>
                                            </span>
                                            @endif
                                        </div>

                                    </div>



                                    <a href="javascript:void(0)" class="venu-add-more btn btn-success" >Add More</a>
                                </div>
                            </div>


                            <h5>Do you have Conference facilities</h5>

                            <div class="form-group">

                                <div class="col-md-2">
                                    {!! Form::fancyselect('is_confer', (isset($drop_down_yes) && !empty($drop_down_yes) && count($drop_down_yes) > 0 ? $drop_down_yes : ''), null, ['id' => 'select_confer', 'class'=>'select-icons']) !!}
                                </div>

                            </div>

                            <div id='confer_faclity'>
                                <div class="form-group">
                                    <label class="col-lg-1 control-label">Description:</label>
                                    <div class="col-lg-9">
                                        {!! Form::textarea('confer_desc', null, ['rows' => 3, 'cols' => 3, 'class' => 'form-control', 'placeholder' => 'Give a short description about your Conference Facility']) !!}
                                        @if ($errors->has('confer_desc'))
                                        <span class="help-block" style = "display:block;color:red;">
                                            <strong>{{ $errors->first('confer_desc') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">

                                    <div class="form-group">
                                        <label class="col-lg-1 control-label">Conference Description:</label>
                                        <div class="col-lg-9">
                                            {!! Form::textarea('confer_short_descr[]', null, ['rows' => 3, 'cols' => 3, 'class' => 'form-control', 'placeholder' => 'Give a short description about this Conference *']) !!}
                                            @if ($errors->has('confer_short_descr.0'))
                                            <span class="help-block" style = "display:block;color:red;">
                                                <strong>{{ $errors->first('confer_short_descr.0') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-2">

                                            {!! Form::text('confer_name[]', null, ['class' => 'form-control', 'placeholder' => 'Conference Name']) !!}
                                            @if ($errors->has('confer_name.0'))
                                            <span class="help-block" style = "display:block;color:red;">
                                                <strong>{{ $errors->first('confer_name.0') }}</strong>
                                            </span>
                                            @endif
                                        </div>

                                        <div class="col-md-2">

                                            {!! Form::number('confer_qty[]', null, ['min' => '0', 'class' => 'form-control', 'placeholder' => 'Max Capacity']) !!}
                                            @if ($errors->has('confer_avail.0'))
                                            <span class="help-block" style = "display:block;color:red;">
                                                <strong>{{ $errors->first('confer_avail.0') }}</strong>
                                            </span>
                                            @endif
                                        </div>


                                        <div class="col-md-2">
                                            {!! Form::text('confer_price[]', null, ['class' => 'form-control', 'placeholder' => 'Conference rental price']) !!}
                                            @if ($errors->has('confer_price.0'))
                                            <span class="help-block" style = "display:block;color:red;">
                                                <strong>{{ $errors->first('confer_price.0') }}</strong>
                                            </span>
                                            @endif

                                        </div>


                                        <div class="col-md-2">
                                            {!! Form::text('confer_price_per_seat[]', null, ['class' => 'form-control', 'placeholder' => 'Price per seat']) !!}
                                            @if ($errors->has('confer_price_per_seat.0'))
                                            <span class="help-block" style = "display:block;color:red;">
                                                <strong>{{ $errors->first('confer_price_per_seat.0') }}</strong>
                                            </span>
                                            @endif

                                        </div>


                                        <div class="col-md-2">
                                            {{ Form::file('confer_img[]', ['id' => 'acco_image', 'class' => 'file-styled', 'multiple' => false]) }}
                                            @if ($errors->has('confer_img.0'))
                                            <span class="help-block" style = "display:block;color:red;">
                                                <strong>{{ $errors->first('confer_img.0') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group">  

                                    <div class="col-md-8">
                                        <div class="col-md-2">    
                                            <label class="control-label">Promotion:</label>
                                        </div>

                                        <div class="col-md-3">    
                                            {!! Form::fancyselect('is_confer_promo[]', (isset($drop_down_yes) && !empty($drop_down_yes) && count($drop_down_yes) > 0 ? $drop_down_yes : ''), (isset($confer_data) && !empty($confer_data) && count($confer_data) > 0 ? $confer_data->is_promo : ''), ['class'=>'select-icons confer_promo']) !!}
                                            @if ($errors->has('is_confer_promo.0'))
                                            <span class="help-block" style = "display:block;color:red;">
                                                <strong>{{ $errors->first('is_confer_promo.0') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                </div>

                                <div class="form-group confer_promo_div" style="display:none;">

                                    <div class="col-md-2">
                                        {!! Form::text('confer_promo_price[]', null, ['class' => 'form-control', 'placeholder' => 'Promotion Price *']) !!}
                                        @if ($errors->has('confer_promo_price.0'))
                                        <span class="help-block" style = "display:block;color:red;">
                                            <strong>{{ $errors->first('confer_promo_price.0') }}</strong>
                                        </span>
                                        @endif
                                    </div>

                                    <label class="col-lg-1 control-label">From Date:</label>
                                    <div class="col-md-2">

                                        {!! Form::date('confer_from_date[]', null, ['class' => 'form-control', 'placeholder' => 'From Date *']) !!}
                                        @if ($errors->has('confer_from_date.0'))
                                        <span class="help-block" style = "display:block;color:red;">
                                            <strong>{{ $errors->first('confer_from_date.0') }}</strong>
                                        </span>
                                        @endif
                                    </div>

                                    <label class="col-lg-1 control-label">Till Date:</label>
                                    <div class="col-md-2">
                                        {!! Form::date('confer_to_date[]', null, ['class' => 'form-control', 'placeholder' => 'Till Date *']) !!}
                                        @if ($errors->has('confer_from_date.0'))
                                        <span class="help-block" style = "display:block;color:red;">
                                            <strong>{{ $errors->first('confer_from_date.0') }}</strong>
                                        </span>
                                        @endif
                                    </div>

                                    <div class="col-lg-4">
                                        {!! Form::textarea('confer_promo_desc[]', null, ['rows' => 3, 'cols' => 3, 'class' => 'form-control required', 'placeholder' => 'Give a short description about your term for this offer *']) !!}
                                        @if ($errors->has('confer_promo_desc.0'))
                                        <span class="help-block" style = "display:block;color:red;">
                                            <strong>{{ $errors->first('confer_promo_desc.0') }}</strong>
                                        </span>
                                        @endif
                                    </div>

                                </div>

                                <a href="javascript:void(0)" class="confer-add-more btn btn-success">Add More</a>
                            </div>


                            <h5>Do you have Health / Spa facilities</h5>

                            <div class="form-group">

                                <div class="col-md-2">
                                    {!! Form::fancyselect('is_health', (isset($drop_down_yes) && !empty($drop_down_yes) && count($drop_down_yes) > 0 ? $drop_down_yes : ''), null, ['id' => 'select_health', 'class'=>'select-icons']) !!}
                                </div>

                            </div>

                            <div id='health_faclity'>


                                <div class="form-group">
                                    <label class="col-lg-1 control-label">Description:</label>
                                    <div class="col-lg-9">
                                        {!! Form::textarea('health_desc', null, ['rows' => 3, 'cols' => 3, 'class' => 'form-control', 'placeholder' => 'Give a short description about your Health / Spa']) !!}
                                        @if ($errors->has('health_desc'))
                                        <span class="help-block" style = "display:block;color:red;">
                                            <strong>{{ $errors->first('health_desc') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">

                                    <div class="form-group">
                                        <label class="col-lg-1 control-label">Service Description:</label>
                                        <div class="col-lg-9">
                                            {!! Form::textarea('health_short_desc[]', (isset($arr_confer_detail) && !empty($arr_confer_detail) && count($arr_confer_detail) > 0 ? $arr_confer_detail[0]->short_desc : ''), ['rows' => 3, 'cols' => 3, 'class' => 'form-control', 'placeholder' => 'Give a short description about this Service *']) !!}
                                            @if ($errors->has('health_short_desc.0'))
                                            <span class="help-block" style = "display:block;color:red;">
                                                <strong>{{ $errors->first('health_short_desc.0') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-2">

                                            {!! Form::text('health_name[]', null, ['class' => 'form-control', 'placeholder' => 'Name Service']) !!}
                                            @if ($errors->has('health_name.0'))
                                            <span class="help-block" style = "display:block;color:red;">
                                                <strong>{{ $errors->first('health_name.0') }}</strong>
                                            </span>
                                            @endif
                                        </div>

                                        <div class="col-md-2">

                                            {!! Form::text('treatment[]', null, ['class' => 'form-control', 'placeholder' => 'Name treatment']) !!}
                                            @if ($errors->has('treatment.0'))
                                            <span class="help-block" style = "display:block;color:red;">
                                                <strong>{{ $errors->first('treatment.0') }}</strong>
                                            </span>
                                            @endif
                                        </div>


                                        <div class="col-md-2">
                                            {!! Form::text('service_price[]', null, ['class' => 'form-control', 'placeholder' => 'Price per treatment']) !!}
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

                                        <div class="col-md-8">
                                            <div class="col-md-2">    
                                                <label class="control-label">Promotion:</label>
                                            </div>

                                            <div class="col-md-3">    
                                                {!! Form::fancyselect('is_health_promo', (isset($drop_down_yes) && !empty($drop_down_yes) && count($drop_down_yes) > 0 ? $drop_down_yes : ''), null, ['class'=>'select-icons confer_promo']) !!}
                                            </div>
                                        </div>

                                    </div>

                                    <div class="form-group health_promo_div" style="display: none;">

                                        <div class="col-md-2">
                                            {!! Form::text('health_promo_price[]', null, ['class' => 'form-control', 'placeholder' => 'Promotion Price *']) !!}
                                            @if ($errors->has('health_promo_price.0'))
                                            <span class="help-block" style = "display:block;color:red;">
                                                <strong>{{ $errors->first('health_promo_price.0') }}</strong>
                                            </span>
                                            @endif
                                        </div>

                                        <label class="col-lg-1 control-label">From Date:</label>
                                        <div class="col-md-2">

                                            {!! Form::date('health_from_date[]', null, ['class' => 'form-control', 'placeholder' => 'From Date *']) !!}
                                            @if ($errors->has('health_from_date.0'))
                                            <span class="help-block" style = "display:block;color:red;">
                                                <strong>{{ $errors->first('health_from_date.0') }}</strong>
                                            </span>
                                            @endif
                                        </div>

                                        <label class="col-lg-1 control-label">Till Date:</label>
                                        <div class="col-md-2">
                                            {!! Form::date('health_to_date[]', null, ['class' => 'form-control', 'placeholder' => 'Till Date *']) !!}
                                            @if ($errors->has('health_from_date.0'))
                                            <span class="help-block" style = "display:block;color:red;">
                                                <strong>{{ $errors->first('health_from_date.0') }}</strong>
                                            </span>
                                            @endif
                                        </div>

                                        <div class="col-lg-4">
                                            {!! Form::textarea('health_promo_desc[]', null, ['rows' => 3, 'cols' => 3, 'class' => 'form-control required', 'placeholder' => 'Give a short description about your term for this offer *']) !!}
                                            @if ($errors->has('health_promo_desc.0'))
                                            <span class="help-block" style = "display:block;color:red;">
                                                <strong>{{ $errors->first('confer_promo_desc.0') }}</strong>
                                            </span>
                                            @endif
                                        </div>

                                    </div>

                                    <a href="javascript:void(0)" class="health-add-more btn btn-success">Add More</a>
                                </div>
                            </div>

                            <h5>Do you have Transport facilities</h5>			

                            <div class="form-group">

                                <div class="col-md-2">
                                    {!! Form::fancyselect('is_trans', (isset($drop_down_yes) && !empty($drop_down_yes) && count($drop_down_yes) > 0 ? $drop_down_yes : ''), null, ['id' => 'select_trans', 'class'=>'select-icons']) !!}
                                </div>

                            </div>

                            <div id ="trans_faclity">

                                <h6>Transport</h6>

                                <div class="form-group">
                                    <label class="col-lg-1 control-label">Description:</label>
                                    <div class="col-lg-9">
                                        {!! Form::textarea('trans_desc', null, ['rows' => 3, 'cols' => 3, 'class' => 'form-control', 'placeholder' => 'Give a short description about your Transport facility']) !!}
                                        @if ($errors->has('trans_desc'))
                                        <span class="help-block" style = "display:block;color:red;">
                                            <strong>{{ $errors->first('trans_desc') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            {{ Form::input('hidden', 'type', 'A', ['readonly' => 'readonly']) }}
                            <div class="text-right">
                                <button type="submit" name="room" value="" class="btn btn-primary">Next Section</button>
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

                        if (!empty($arr_activity) && count($arr_activity) > 0) {
                            foreach ($arr_activity as $actvity) {
                                $activity_option[] = array(
                                    'value' => $actvity->id,
                                    'display' => $actvity->name,
                                    'data-icon' => 'stumbleupon'
                                );
                            }
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
                                    {!! Form::textarea('amenity_desc', null, ['rows' => 5, 'cols' => 5, 'class' => 'form-control', 'placeholder' => 'Give a short description about your Amenities on property *']) !!}
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
                                    {!! Form::multiselect('amenity_property[]', $amenity_option, null, ['class'=>'select-icons', 'placeholder' => 'Select Amenity on Property *', 'data-placeholder' => "Select Amenity on property *", 'multiple' => 'multiple']) !!}

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
                                    {!! Form::textarea('activity_desc', null, ['rows' => 5, 'cols' => 5, 'class' => 'form-control', 'placeholder' => 'Give a short description about your Activities on property *']) !!}
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
                                    {!! Form::multiselect('activity_property[]', $activity_option, null, ['class'=>'select-icons', 'placeholder' => 'Select Activity on Property *', 'data-placeholder' => "Select Activity on property *", 'multiple' => 'multiple']) !!}
                                    @if ($errors->has('activity_property'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('activity_property') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group attract-parents">
                                <h5>Popular Attraction and Surroundings: Please provide as many details as possible</h5>

                                <div class="col-md-4">

                                    {!! Form::text('attraction_name[]', null, ['class' => 'form-control required', 'placeholder' => 'Name of Attraction *']) !!}

                                    @if ($errors->has('attraction_name.0'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('attraction_name.0') }}</strong>
                                    </span>
                                    @endif

                                </div>

                                <div class="col-md-4">

                                    {!! Form::fancyselect('surrounding[]', $surr, null, ['class'=>'select-icons required']) !!}

                                    @if ($errors->has('surrounding.0'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('surrounding.0') }}</strong>
                                    </span>
                                    @endif

                                </div>

                                <div class="col-md-4">

                                    {!! Form::text('approx_dist[]', null, ['class' => 'form-control required', 'placeholder' => 'Approximate Distance Example 5km']) !!}
                                    @if ($errors->has('approx_dist.0'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('approx_dist.0') }}</strong>
                                    </span>
                                    @endif
                                </div>


                            </div>
                            <a href="javascript:void(0)" class="attract-add-more btn btn-success">Add More</a>

                            {{ Form::input('hidden', 'type', 'A', ['readonly' => 'readonly']) }}


                            <div class="text-right">
                                <button type="submit" name="activity" value="" class="btn btn-primary">Next Section</button>
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
                                    {!! Form::text('cancel', null, ['class' => 'form-control', 'placeholder' => 'Enter Cancellation Policy *']) !!}
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
                                    {!! Form::text('timein', null, ['class' => 'form-control', 'placeholder' => 'Enter Time In *']) !!}
                                    @if ($errors->has('timein'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('timein') }}</strong>
                                    </span>
                                    @endif
                                </div>


                                <div class="col-lg-6">
                                    {!! Form::text('timeout', null, ['class' => 'form-control required', 'placeholder' => 'Enter Time Out *']) !!}
                                    @if ($errors->has('timeout'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('timeout') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-lg-6">
                                    {!! Form::text('child_extra', null, ['class' => 'form-control', 'placeholder' => 'Children & Extra']) !!}
                                </div>


                                <div class="col-lg-6">
                                    {!! Form::text('pets', null, ['class' => 'form-control', 'placeholder' => 'Pets']) !!}
                                </div>
                            </div>

                            <div class="form-group">

                                <div class="col-lg-6">
                                    {!! Form::multiselect('payment_type[]', $payment_option, null, ['class'=>'select-icons', 'placeholder' => 'Payment accepted at this facility *', 'data-placeholder' => "Payment accepted at this facility *", 'multiple' => 'multiple']) !!}
                                    @if ($errors->has('payment_type'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('payment_type') }}</strong>
                                    </span>
                                    @endif
                                </div>


                                <div class="col-lg-6">
                                    {!! Form::text('lang_spoken', null, ['class' => 'form-control', 'placeholder' => 'Language Spoken At Facility']) !!}

                                </div>
                            </div>

                            <div class="form-group">

                                <div class="col-lg-4">
                                    {!! Form::fancyselect('acco_duration', $acco_option, null, ['class'=>'select-icons']) !!}
                                    @if ($errors->has('acco_duration'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('acco_duration') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="col-lg-4">
                                    {!! Form::fancyselect('corpo_deals', $corporate_deal_yes, null, ['class'=>'select-icons']) !!}
                                    @if ($errors->has('corpo_deals'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('corpo_deals') }}</strong>
                                    </span>
                                    @endif

                                </div>

                                <div class="col-lg-4">
                                    {!! Form::fancyselect('contract_deal', $contractor_deal_yes, null, ['class'=>'select-icons']) !!}
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
                                    {!! Form::textarea('policy_terms', null, ['rows' => 5, 'cols' => 5, 'class' => 'form-control', 'placeholder' => 'Give a short description about your Terms *']) !!}
                                    @if ($errors->has('policy_terms'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('policy_terms') }}</strong>
                                    </span>
                                    @endif
                                </div>

                            </div>


                            <div class="text-right">
                                {{ Form::input('hidden', 'type', 'A', ['readonly' => 'readonly']) }}
                                <button type="submit" name="policy" value="" class="btn btn-primary">Next Section</button>
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
                                    {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Enter Your Title *']) !!}
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
                                    {!! Form::textarea('keyword', null, ['rows' => 5, 'cols' => 5, 'class' => 'form-control', 'placeholder' => 'Enter your Keywords here *']) !!}
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
                                    {!! Form::textarea('meta_desc', null, ['rows' => 5, 'cols' => 5, 'class' => 'form-control', 'placeholder' => 'Enter your Meta Tags here *']) !!}
                                    @if ($errors->has('meta_desc'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('meta_desc') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                {{ Form::input('hidden', 'type', 'A', ['readonly' => 'readonly']) }}
                            </div>

                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">Next Section </button>
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
                                    {!! Form::fancyselect('video_cond', $drop_down_yes, null, ['id'=>'vid_con', 'class'=>'select-icons']) !!}
                                </div>
                            </div>


                            <div class="form-group" id="viddiv" style='display:none;'>
                                <label class="col-lg-3 control-label">Accommodation Video </label>
                                <div class="col-lg-9">
                                    {!! Form::text('video_link', null, ['class' => 'form-control', 'placeholder' => 'Paste Your Accommodation Link here Eg-: http://example.com *']) !!}
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
                                    {!! Form::text('lat', null, ['class' => 'form-control', 'placeholder' => 'Enter Latitude Eg-: 00.000 *']) !!}
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
                                    {!! Form::text('long', null, ['class' => 'form-control', 'placeholder' => 'Enter Longitude Eg-: 00.000 *']) !!}
                                    @if ($errors->has('long'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('long') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                {{ Form::input('hidden', 'type', 'A', ['readonly' => 'readonly']) }}
                            </div>


                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">Submit</button>
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
Add New Listing
@endsection

@section('addtional_css')

@endsection

@section('jscript')

<script type="text/javascript" src="{{ asset('/assets/admin/js/select2.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/assets/admin/js/uniform.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/assets/admin/js/app.js') }}"></script>
<script type="text/javascript" src="{{ asset('/assets/admin/js/form_layouts.js') }}"></script>
<script type="text/javascript" src="{{asset('/assets/js/heystranger-js/city.js')}}"></script>
<script type="text/javascript" src="{{asset('/assets/js/heystranger-js/client-validation.js')}}"></script>

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
           '{!! Form::fancyselect('room_type[]', (isset($room_type) && !empty($room_type) ? $room_type : ''), null, ['class'=>'form-control select-icons']) !!}'+
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
            '{{ Form::input('hidden', 'room_id[]',null, ['readonly' => 'readonly']) }}'+
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
    
    promoHideShow('.room_promo_div', '.room_promo');
    promoHideShow('.venue_promo_div', '.venue_promo');
    promoHideShow('.confer_promo_div', '.confer_promo');
    promoHideShow('.health_promo_div', '.health_promo');
    
    
});


    appendPromoHideShow('.room_promo_div', '.append_room_promo');
    appendPromoHideShow('.venue_promo_div', '.append_venue_promo');
    appendPromoHideShow('.confer_promo_div', '.append_confer_promo');
    appendPromoHideShow('.health_promo_div', '.append_health_promo');


///////////////div hide and show for append promotion off yes/no////////////////

function appendPromoHideShow(div, val){
    
    $(document).on('change', val, function () {
    
    if($(this).val()  == 'Y'){
        $(this).parents().children(div).show();
    } else {
        $(this).parents().children(div).hide();
    }
    
});
    
}

///////////////div hide and show for edit time promotion off yes/no////////////////
function promoHideShow(div, dropval){
    
    var values = $(dropval).val()
    
    if(values != ''){
      
      if(values == 'object'){
          var count = values.length;
      }
    
    
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