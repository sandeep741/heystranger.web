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
                                    {{Form::select('state',[''=>'Select Country']+@$arr_country->pluck('name','id')->toArray(), (isset($edit_data) && !empty($edit_data) ? @$edit_data->id : ''),['class'=>'form-control'])}}

                                    @if ($errors->has('name'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif

                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-2 control-label">Amenity on property :</label>
                                <div class="col-lg-10">
                                    <select multiple="multiple" data-placeholder="Amenity on property" class="select-icons">
                                        <optgroup label="Services">
                                            <option value="wordpress2" data-icon="wordpress2">Single bed</option>
                                            <option value="tumblr2" data-icon="tumblr2">2 x Single beds</option>
                                            <option value="stumbleupon" data-icon="stumbleupon">Double bed</option>
                                            <option value="pinterest2" data-icon="pinterest2">Family room</option>
                                            <option value="lastfm2" data-icon="lastfm2">Honeymoon suite</option>
                                            <option value="lastfm2" data-icon="lastfm2">Executive suite</option>
                                            <option value="lastfm2" data-icon="lastfm2">Premier room</option>
                                            <option value="lastfm2" data-icon="lastfm2">Twin rooms</option>
                                            <option value="lastfm2" data-icon="lastfm2">Air-conditioning</option>
                                            <option value="lastfm2" data-icon="lastfm2">Attic</option>
                                            <option value="lastfm2" data-icon="lastfm2">Babysitting</option>
                                            <option value="lastfm2" data-icon="lastfm2">Balcony</option>
                                            <option value="lastfm2" data-icon="lastfm2">Bar fridge</option>
                                            <option value="lastfm2" data-icon="lastfm2">Barbeque area</option>
                                            <option value="lastfm2" data-icon="lastfm2">Basement</option>
                                            <option value="lastfm2" data-icon="lastfm2">Bathroom / s</option>
                                            <option value="lastfm2" data-icon="lastfm2">Bathrooms in all Rooms</option>
                                            <option value="lastfm2" data-icon="lastfm2">Bathroom phone</option>
                                            <option value="lastfm2" data-icon="lastfm2">Bathrobe/s</option>
                                            <option value="lastfm2" data-icon="lastfm2">Breakfast nook</option>
                                            <option value="lastfm2" data-icon="lastfm2">Ceiling fans</option>
                                            <option value="lastfm2" data-icon="lastfm2">Chairs</option>
                                            <option value="lastfm2" data-icon="lastfm2">Child friendly</option>
                                            <option value="lastfm2" data-icon="lastfm2">Childcare Facility</option>
                                            <option value="lastfm2" data-icon="lastfm2">Cribs/infant beds available</option>
                                            <option value="lastfm2" data-icon="lastfm2">City view</option>
                                            <option value="lastfm2" data-icon="lastfm2">Covered parking</option>
                                            <option value="lastfm2" data-icon="lastfm2">Crockery and cutlery</option>
                                            <option value="lastfm2" data-icon="lastfm2">Daily housekeeping</option>
                                            <option value="lastfm2" data-icon="lastfm2">Dining room</option>
                                            <option value="lastfm2" data-icon="lastfm2">Dinner upon request</option>
                                            <option value="lastfm2" data-icon="lastfm2">Direct-dial phone</option>
                                            <option value="lastfm2" data-icon="lastfm2">Dishwasher</option>
                                            <option value="lastfm2" data-icon="lastfm2">Dryer</option>
                                            <option value="lastfm2" data-icon="lastfm2">DSTV</option>
                                            <option value="lastfm2" data-icon="lastfm2">DVD player</option>
                                            <option value="lastfm2" data-icon="lastfm2">Electric blanket/s</option>
                                            <option value="lastfm2" data-icon="lastfm2">Electric fencing</option>
                                            <option value="lastfm2" data-icon="lastfm2">Electric points</option>
                                            <option value="lastfm2" data-icon="lastfm2">Elevator/s</option>
                                            <option value="lastfm2" data-icon="lastfm2">Fireplace</option>
                                            <option value="lastfm2" data-icon="lastfm2">Garage parking</option>
                                            <option value="lastfm2" data-icon="lastfm2">Guest parking</option>
                                            <option value="lastfm2" data-icon="lastfm2">Hair dryer</option>
                                            <option value="lastfm2" data-icon="lastfm2">Halaal breakfast</option>
                                            <option value="lastfm2" data-icon="lastfm2">Halaal lunch</option>
                                            <option value="lastfm2" data-icon="lastfm2">Halaal dinner</option>
                                            <option value="lastfm2" data-icon="lastfm2">Hot plate</option>
                                            <option value="lastfm2" data-icon="lastfm2">Hypo-allergenic bedding</option>
                                            <option value="lastfm2" data-icon="lastfm2">Ironing board</option>
                                            <option value="lastfm2" data-icon="lastfm2">Iron</option>
                                            <option value="lastfm2" data-icon="lastfm2">In-room childcare</option>
                                            <option value="lastfm2" data-icon="lastfm2">Inside Parking</option>
                                            <option value="lastfm2" data-icon="lastfm2">International electric points</option>
                                            <option value="lastfm2" data-icon="lastfm2">Kitchen</option>
                                            <option value="lastfm2" data-icon="lastfm2">Laundry area</option>
                                            <option value="lastfm2" data-icon="lastfm2">Laundry service</option>
                                            <option value="lastfm2" data-icon="lastfm2">Light dinner</option>
                                            <option value="lastfm2" data-icon="lastfm2">Linen</option>
                                            <option value="lastfm2" data-icon="lastfm2">Living room</option>
                                            <option value="lastfm2" data-icon="lastfm2">Loft</option>
                                            <option value="lastfm2" data-icon="lastfm2">Lounge area</option>
                                            <option value="lastfm2" data-icon="lastfm2"> Luxury non-smoking room/s</option>
                                            <option value="lastfm2" data-icon="lastfm2">Luxury non-smoking loft/s</option>
                                            <option value="lastfm2" data-icon="lastfm2">Malaria area</option>
                                            <option value="lastfm2" data-icon="lastfm2">Malaria free area</option>
                                            <option value="lastfm2" data-icon="lastfm2">Microwave</option>
                                            <option value="lastfm2" data-icon="lastfm2"> Non-smoking Area</option>
                                            <option value="lastfm2" data-icon="lastfm2"> Garden</option>
                                            <option value="lastfm2" data-icon="lastfm2"> Refrigerator</option>
                                            <option value="lastfm2" data-icon="lastfm2"> Room service</option>
                                            <option value="lastfm2" data-icon="lastfm2"> SABC</option>
                                            <option value="lastfm2" data-icon="lastfm2"> Safe</option>
                                            <option value="lastfm2" data-icon="lastfm2">Share bathroom/s</option>
                                            <option value="lastfm2" data-icon="lastfm2">Safe off-street parking</option>
                                            <option value="lastfm2" data-icon="lastfm2"> Self-catering</option>
                                            <option value="lastfm2" data-icon="lastfm2"> Shower / s</option>
                                            <option value="lastfm2" data-icon="lastfm2"> Showers in all rooms</option>
                                            <option value="lastfm2" data-icon="lastfm2"> Private bathroom/s</option>
                                            <option value="lastfm2" data-icon="lastfm2"> Pet friendly</option>
                                            <option value="lastfm2" data-icon="lastfm2"> Stairs</option>
                                            <option value="lastfm2" data-icon="lastfm2">  Stove</option>
                                            <option value="lastfm2" data-icon="lastfm2">Tile floors</option>
                                            <option value="lastfm2" data-icon="lastfm2"> Toilet supplies</option>
                                            <option value="lastfm2" data-icon="lastfm2"> Towels</option>
                                            <option value="lastfm2" data-icon="lastfm2">  Wake-up calls</option>
                                            <option value="lastfm2" data-icon="lastfm2">  Wall heaters</option>
                                            <option value="lastfm2" data-icon="lastfm2"> Washer</option>
                                            <option value="lastfm2" data-icon="lastfm2"> Wheelchair friendly</option>
                                            <option value="lastfm2" data-icon="lastfm2">  Wi-fi</option>

                                        </optgroup>


                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">Activity on Property :</label>
                                <div class="col-lg-10">
                                    <select multiple="multiple" data-placeholder="Activity on Property" class="select-icons">
                                        <optgroup label="Services">
                                            <option value="wordpress2" data-icon="wordpress2">Abseiling</option>
                                            <option value="tumblr2" data-icon="tumblr2">Airport</option>
                                            <option value="tumblr2" data-icon="tumblr2">Airport Transport</option>
                                            <option value="tumblr2" data-icon="tumblr2">Bar</option>
                                            <option value="tumblr2" data-icon="tumblr2">Bar Tenders</option>
                                            <option value="tumblr2" data-icon="tumblr2">Bird Watching</option>
                                            <option value="tumblr2" data-icon="tumblr2">Board Sailing</option>
                                            <option value="tumblr2" data-icon="tumblr2"> Body Treatment</option>
                                            <option value="tumblr2" data-icon="tumblr2">Bonus / Rec Room</option>
                                            <option value="tumblr2" data-icon="tumblr2">Boat Trips Daily / Deep Sea</option>
                                            <option value="tumblr2" data-icon="tumblr2">Bungee Jumping</option>
                                            <option value="tumblr2" data-icon="tumblr2"> Bush Camp Sites</option>
                                            <option value="tumblr2" data-icon="tumblr2">Business Centre</option>
                                            <option value="tumblr2" data-icon="tumblr2"> Camping Facilities</option>
                                            <option value="tumblr2" data-icon="tumblr2">Canoeing</option>
                                            <option value="tumblr2" data-icon="tumblr2">Canopy Tours</option>
                                            <option value="tumblr2" data-icon="tumblr2"> Car Service</option>
                                            <option value="tumblr2" data-icon="tumblr2">Casino</option>
                                            <option value="tumblr2" data-icon="tumblr2"> Caving</option>
                                            <option value="tumblr2" data-icon="tumblr2">Chair Covers</option>
                                            <option value="tumblr2" data-icon="tumblr2"> Chapel</option>
                                            <option value="tumblr2" data-icon="tumblr2">Cherry Corner</option>
                                            <option value="tumblr2" data-icon="tumblr2"> Church</option>
                                            <option value="tumblr2" data-icon="tumblr2"> Clay Pigeon Shooting</option>
                                            <option value="tumblr2" data-icon="tumblr2">Clubhouse</option>
                                            <option value="tumblr2" data-icon="tumblr2"> Cocktail Parties</option>
                                            <option value="tumblr2" data-icon="tumblr2"> Conference Facilities</option>
                                            <option value="tumblr2" data-icon="tumblr2">Conference Centre</option>
                                            <option value="tumblr2" data-icon="tumblr2">Cottage/s</option>
                                            <option value="tumblr2" data-icon="tumblr2">Crocodile Cage Diving</option>
                                            <option value="tumblr2" data-icon="tumblr2"> Cycling</option>
                                            <option value="tumblr2" data-icon="tumblr2">  Cycling Route</option>
                                            <option value="tumblr2" data-icon="tumblr2">  Dance Club</option>
                                            <option value="tumblr2" data-icon="tumblr2"> Deep Sea Diving</option>
                                            <option value="tumblr2" data-icon="tumblr2">  Eco 4x4 Trail</option>
                                            <option value="tumblr2" data-icon="tumblr2"> Elephant Back Safari</option>
                                            <option value="tumblr2" data-icon="tumblr2">  Facial Treatments</option>
                                            <option value="tumblr2" data-icon="tumblr2">  Fishing</option>
                                            <option value="tumblr2" data-icon="tumblr2">Fitness Centre</option>
                                            <option value="tumblr2" data-icon="tumblr2"> Fly Fishing</option>
                                            <option value="tumblr2" data-icon="tumblr2">Full Day Conference</option>
                                            <option value="tumblr2" data-icon="tumblr2">Function Hiring Equipment</option>
                                            <option value="tumblr2" data-icon="tumblr2"> Functional Shared Kitchen</option>
                                            <option value="tumblr2" data-icon="tumblr2"> Gift Shop</option>
                                            <option value="tumblr2" data-icon="tumblr2">Golf Course</option>
                                            <option value="tumblr2" data-icon="tumblr2">Garage</option>
                                            <option value="tumblr2" data-icon="tumblr2"> Hall /s</option>
                                            <option value="tumblr2" data-icon="tumblr2"> Hand and Feet Treatments</option>
                                            <option value="tumblr2" data-icon="tumblr2"> Hang Gliding</option>
                                            <option value="tumblr2" data-icon="tumblr2">Heated Swimming Pool</option>
                                            <option value="tumblr2" data-icon="tumblr2">Helicopter Trips</option>
                                            <option value="tumblr2" data-icon="tumblr2">Hiking</option>
                                            <option value="tumblr2" data-icon="tumblr2"> Historical Buildings</option>
                                            <option value="tumblr2" data-icon="tumblr2"> Horse Racing</option>
                                            <option value="tumblr2" data-icon="tumblr2"> Hot Air Ballooning</option>
                                            <option value="tumblr2" data-icon="tumblr2"> Hydro Treatments</option>
                                            <option value="tumblr2" data-icon="tumblr2"> Juk Skei Park</option>
                                            <option value="tumblr2" data-icon="tumblr2"> Kite Surfing</option>
                                            <option value="tumblr2" data-icon="tumblr2"> Kloofing</option>
                                            <option value="tumblr2" data-icon="tumblr2"> Lake</option>
                                            <option value="tumblr2" data-icon="tumblr2">Library</option>
                                            <option value="tumblr2" data-icon="tumblr2"> Lion Farms</option>
                                            <option value="tumblr2" data-icon="tumblr2">  Mall</option>
                                            <option value="tumblr2" data-icon="tumblr2">  Micro Light</option>
                                            <option value="tumblr2" data-icon="tumblr2"> Monument & Statues</option>
                                            <option value="tumblr2" data-icon="tumblr2"> Mountain Biking</option>
                                            <option value="tumblr2" data-icon="tumblr2"> Mountain Bike Routes</option>
                                            <option value="tumblr2" data-icon="tumblr2"> Mountain Climbing</option>
                                            <option value="tumblr2" data-icon="tumblr2"> Music Facilities</option>
                                            <option value="tumblr2" data-icon="tumblr2"> Ostrich Rides</option>
                                            <option value="tumblr2" data-icon="tumblr2"> Paragliding</option>
                                            <option value="tumblr2" data-icon="tumblr2">  Picnic in the Garden</option>
                                            <option value="tumblr2" data-icon="tumblr2"> Playground</option>
                                            <option value="tumblr2" data-icon="tumblr2">  Pool Table / s</option>
                                            <option value="tumblr2" data-icon="tumblr2">  Power Boating</option>
                                            <option value="tumblr2" data-icon="tumblr2"> Private Air Trips</option>
                                            <option value="tumblr2" data-icon="tumblr2">  Private Functions</option>
                                            <option value="tumblr2" data-icon="tumblr2"> Putt Putt</option>
                                            <option value="tumblr2" data-icon="tumblr2"> Quad Biking</option>
                                            <option value="tumblr2" data-icon="tumblr2">  Rapp Jumping</option>
                                            <option value="tumblr2" data-icon="tumblr2"> Restaurant/s</option>
                                            <option value="tumblr2" data-icon="tumblr2"> Rhino Tracking</option>
                                            <option value="tumblr2" data-icon="tumblr2">  River Cruises</option>
                                            <option value="tumblr2" data-icon="tumblr2">  Rock Climbing</option>
                                            <option value="tumblr2" data-icon="tumblr2"> Salon</option>
                                            <option value="tumblr2" data-icon="tumblr2">Sailing (Yachting)</option>
                                            <option value="tumblr2" data-icon="tumblr2"> Sand Boarding</option>
                                            <option value="tumblr2" data-icon="tumblr2"> Sauna / Spa</option>
                                            <option value="tumblr2" data-icon="tumblr2"> Scuba Diving</option>
                                            <option value="tumblr2" data-icon="tumblr2"> Sea Kayaking</option>
                                            <option value="tumblr2" data-icon="tumblr2"> Seal Trips</option>
                                            <option value="tumblr2" data-icon="tumblr2"> Shark Cage Diving</option>
                                            <option value="tumblr2" data-icon="tumblr2"> Shopping Centre</option>
                                            <option value="tumblr2" data-icon="tumblr2"> Short Hiking Trails</option>
                                            <option value="tumblr2" data-icon="tumblr2"> Skateboarding</option>
                                            <option value="tumblr2" data-icon="tumblr2"> Sky Diving</option>
                                            <option value="tumblr2" data-icon="tumblr2"> Snorkelling</option>
                                            <option value="tumblr2" data-icon="tumblr2">Spa / Massages</option>
                                            <option value="tumblr2" data-icon="tumblr2">  Spear Fishing</option>
                                            <option value="tumblr2" data-icon="tumblr2">  Star Gazing</option>
                                            <option value="tumblr2" data-icon="tumblr2"> Steam Train Rides</option>
                                            <option value="tumblr2" data-icon="tumblr2"> Sun Downer Drives</option>
                                            <option value="tumblr2" data-icon="tumblr2">  Sunset Cruises</option>
                                            <option value="tumblr2" data-icon="tumblr2">  Surfing</option>
                                            <option value="tumblr2" data-icon="tumblr2">  Swimming Pool/s</option>
                                            <option value="tumblr2" data-icon="tumblr2">  Tennis Court/s</option>
                                            <option value="tumblr2" data-icon="tumblr2">  Tubing</option>
                                            <option value="tumblr2" data-icon="tumblr2">  Turtle Tours</option>
                                            <option value="tumblr2" data-icon="tumblr2">  Vintage Buildings</option>
                                            <option value="tumblr2" data-icon="tumblr2">  Walking Safari</option>
                                            <option value="tumblr2" data-icon="tumblr2">  Water Skiing</option>
                                            <option value="tumblr2" data-icon="tumblr2">  Water Sport</option>
                                            <option value="tumblr2" data-icon="tumblr2">  Wedding & Functions</option>
                                            <option value="tumblr2" data-icon="tumblr2"> Whale Watching</option>
                                            <option value="tumblr2" data-icon="tumblr2"> White River Rafting</option>
                                            <option value="tumblr2" data-icon="tumblr2"> Other - Provide details</option>
                                        </optgroup>
                                    </select>
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
@endsection