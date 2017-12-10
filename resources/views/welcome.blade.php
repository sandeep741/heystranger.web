@extends('app')
@section('content')
<div class="global-wrap container-fluid">
    <div class="row">
        <div class="container-fluid">
            <div class="vc_row wpb_row st bg-holder vc_custom_1422334320496 vc_row-has-fill">
                <div class='container-fluid'>
                    <div class='row'>
                        <div class="wpb_column column_container col-md-12 vc_custom_1417686538290">
                            <div class="vc_column-inner wpb_wrapper">
                                <div id="text-slider-wrapper" class="top-area show-onload">
                                    <div class="bg-holder full">
                                        <div class="bg-front full-height">
                                            <div class="container full-height">
                                                <div class="rel full-height div_tagline">
                                                    <div class="tagline" id="tagline">
                                                        <span>It's time </span>
                                                        <ul>
                                                            <li>To Relax</li>
                                                            <li>To Explore</li>

                                                            <li>To Travel With Us</li>
                                                            <li>To See the World</li>
                                                            <li>For Something New</li>
                                                        </ul>
                                                    </div>
                                                    <div class="container">
                                                        <div class="search-tabs search-tabs-bg search-tabs-abs-bottom  no-boder-search ">
                                                            <div class="tabbable">
                                                                <ul class="nav nav-tabs" id="myTab">
                                                                    <li class="active">
                                                                        <a href="#tab-hotel0"
                                                                           data-toggle="tab"><i class="fa fa-building-o"></i>                                <span>Accommodation</span></a>
                                                                    </li>
                                                                    <li >
                                                                        <a href="#tab-cars1"
                                                                           data-toggle="tab"><i class="fa fa-car"></i>                                <span>Venues & Coneference</span></a>
                                                                    </li>
                                                                    <li >
                                                                        <a href="#tab-tour2"
                                                                           data-toggle="tab"><i class="fa fa-flag-o"></i>                                <span>Transport</span></a>
                                                                    </li>
                                                                    <li >
                                                                        <a href="#tab-rental3"
                                                                           data-toggle="tab"><i class="fa fa-home"></i>                                <span>Tours</span></a>
                                                                    </li>
                                                                    <li >
                                                                        <a href="#tab-activities4"
                                                                           data-toggle="tab"><i class="fa fa-bolt"></i>                                <span>Activities</span></a>
                                                                    </li>
                                                                    <li >
                                                                        <a href="#tab-custom_flight6"
                                                                           data-toggle="tab"><i class="fa fa-plane"></i>                                <span>Flight</span></a>
                                                                    </li>
                                                                </ul>
                                                                <div class="tab-content">
                                                                    <div class="tab-pane fade active in" id="tab-hotel0">
                                                                        <h2 class='mb20'>Search and Save on Accommodation</h2>
                                                                        <form role="search" method="get" class="search main-search" action="#">
                                                                            <input type="hidden" name="lang" value="en">
                                                                            <div class="row">
                                                                                <div class=" col-md-12 col-lg-12 col-sm-12 col-xs-12 ">
                                                                                    <div class="form-group form-group- form-group-icon-left">
                                                                                        <label for="field-hotel-location">Where</label>
                                                                                        <i class="fa fa-map-marker input-icon"></i>
                                                                                        <div class="st-select-wrapper">
                                                                                            <input id="field-hotel-location" autocomplete="off" type="text" name="location_name" value="" class="form-control st-location-name  required" placeholder="Country/Provience/City">
                                                                                            <select id="field-hotel-location" name="location_id" class="st-location-id st-hidden" placeholder="Destination; Zip Code" tabindex="-1">
                                                                                                <option value=""></option>
                                                                                                <option  value="277">Russia||87144</option>
                                                                                                <option  value="279">Germany||108 303</option>
                                                                                                <option  value="285">Australia||16 192</option>
                                                                                                <option  value="276">Sydney, Australia||16 192</option>
                                                                                                <option  value="5410">Japan||363564</option>
                                                                                                <option  value="287">Paris, France||39 664</option>
                                                                                                <option  value="1957">United States||70 686</option>
                                                                                                <option  value="275">New York City, United States||3 560</option>
                                                                                                <option  value="284">Las Vegas, Nevada State, United States||70 686</option>
                                                                                                <option  value="1952">Virginia  State, United States||1 430</option>
                                                                                                <option  value="282">Virginia Beach, Virginia  State, United States||1 205</option>
                                                                                            </select>
                                                                                            <div class="option-wrapper"></div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class=" col-md-3 col-lg-3 col-sm-12 col-xs-12 ">
                                                                                    <div data-date-format="mm/dd/yyyy" class="form-group input-daterange  form-group- form-group-icon-left">
                                                                                        <label for="field-hotel-checkin">Check in</label>
                                                                                        <i class="fa fa-calendar input-icon input-icon-highlight"></i>
                                                                                        <input id="field-hotel-checkin" placeholder="mm/dd/yyyy" class="form-control checkin_hotel off" value="" name="start" type="text" />
                                                                                    </div>
                                                                                </div>
                                                                                <div class=" col-md-3 col-lg-3 col-sm-12 col-xs-12 ">
                                                                                    <div data-date-format="mm/dd/yyyy" class="form-group input-daterange form-group- form-group-icon-left">
                                                                                        <label for="field-hotel-checkout">Check out</label>
                                                                                        <i class="fa fa-calendar input-icon input-icon-highlight"></i>
                                                                                        <input id="field-hotel-checkout" placeholder="mm/dd/yyyy" class="form-control off checkout_hotel" value="" name="end" type="text" />
                                                                                    </div>
                                                                                </div>
                                                                                <div class=" col-md-3 col-lg-3 col-sm-12 col-xs-12 ">
                                                                                    <div class="form-group form-group- form-group-select-plus">
                                                                                        <label for="field-hotel-room-num">Rooms</label>
                                                                                        <div class="btn-group btn-group-select-num " data-toggle="buttons">
                                                                                            <label class="btn btn-primary active">
                                                                                                <input type="radio" value="1" name="options" />1</label>
                                                                                            <label class="btn btn-primary ">
                                                                                                <input type="radio" value="2" name="options" />2</label>
                                                                                            <label class="btn btn-primary ">
                                                                                                <input type="radio" value="3" name="options" />3</label>
                                                                                            <label class="btn btn-primary ">
                                                                                                <input type="radio" value="4" name="options" />3+</label>
                                                                                        </div>
                                                                                        <select id="field-hotel-room-num" class="form-control hidden " name="room_num_search">
                                                                                            @for($i=1; $i<=14; $i++)
                                                                                            <option  value='{{ $i }}'>{{ $i }}</option>
                                                                                            @endfor
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                                <div class=" col-md-3 col-lg-3 col-sm-12 col-xs-12 ">
                                                                                    <div class="form-group form-group- form-group-select-plus">
                                                                                        <label for="field-hotel-adult">Adult</label>
                                                                                        <div class="btn-group btn-group-select-num " data-toggle="buttons">
                                                                                            <label class="btn btn-primary active">
                                                                                                <input type="radio" value="1"  />1</label>
                                                                                            <label class="btn btn-primary ">
                                                                                                <input type="radio" value="2"  />2</label>
                                                                                            <label class="btn btn-primary ">
                                                                                                <input type="radio" value="3"  />3</label>
                                                                                            <label class="btn btn-primary ">
                                                                                                <input type="radio" value="4"  />3+</label>
                                                                                        </div>
                                                                                        <select id="field-hotel-adult" class="form-control hidden" name="adult_number">
                                                                                            @for($i=1; $i<=14; $i++)
                                                                                            <option  value='{{ $i }}'>{{ $i }}</option>
                                                                                            @endfor
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <!--Search Advance-->
                                                                            <div class="search_advance">
                                                                                <div class="expand_search_box form-group form-group-">
                                                                                    <span class="expand_search_box-more"> <i class="btn btn-primary fa fa-plus mr10"></i>Advanced Search</span>
                                                                                    <span class="expand_search_box-less"> <i class="btn btn-primary fa fa-minus mr10"></i>Advanced Search</span>
                                                                                </div>
                                                                                <div class="view_more_content_box">
                                                                                    <div class="row">
                                                                                        <div class=" col-md-12 col-lg-12 col-sm-12 col-xs-12 ">
                                                                                            <div class="form-custom-taxonomy form-group form-group-"
                                                                                                 taxonomy="">
                                                                                                <label for="field-hotel-tax-">Hotel Theme</label>
                                                                                                <div class="row">
                                                                                                </div>
                                                                                                <input type="hidden" class="data_taxonomy" name="taxonomy[]" value="">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class=" col-md-12 col-lg-12 col-sm-12 col-xs-12 ">
                                                                                            <div class="form-custom-taxonomy form-group form-group-"
                                                                                                 taxonomy="room_type">
                                                                                                <label for="field-hotelroom-tax-room_type">Room Facilitites</label>
                                                                                                <div class="row">
                                                                                                    <div  style='clear:both' class="checkbox col-xs-12 col-sm-4">
                                                                                                        <label>
                                                                                                            <input class="i-check item_tanoxomy"   type="checkbox"
                                                                                                                   value="18"/>Deluxe                        </label>
                                                                                                    </div>
                                                                                                    <div  class="checkbox col-xs-12 col-sm-4">
                                                                                                        <label>
                                                                                                            <input class="i-check item_tanoxomy"   type="checkbox"
                                                                                                                   value="76"/>Family Suite                        </label>
                                                                                                    </div>
                                                                                                    <div  class="checkbox col-xs-12 col-sm-4">
                                                                                                        <label>
                                                                                                            <input class="i-check item_tanoxomy"   type="checkbox"
                                                                                                                   value="19"/>Normal                        </label>
                                                                                                    </div>
                                                                                                    <div  style='clear:both' class="checkbox col-xs-12 col-sm-4">
                                                                                                        <label>
                                                                                                            <input class="i-check item_tanoxomy"   type="checkbox"
                                                                                                                   value="21"/>Queen Room                        </label>
                                                                                                    </div>
                                                                                                    <div  class="checkbox col-xs-12 col-sm-4">
                                                                                                        <label>
                                                                                                            <input class="i-check item_tanoxomy"   type="checkbox"
                                                                                                                   value="22"/>Standard Double-Double Room                        </label>
                                                                                                    </div>
                                                                                                    <div  class="checkbox col-xs-12 col-sm-4">
                                                                                                        <label>
                                                                                                            <input class="i-check item_tanoxomy"   type="checkbox"
                                                                                                                   value="20"/>Standard Room                        </label>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <input type="hidden" class="data_taxonomy" name="taxonomy_hotel_room[room_type]" value="">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class=" col-md-6 col-lg-6 col-sm-12 col-xs-12 ">
                                                                                            <div class="form-group form-group- form-group-icon-left">
                                                                                                <label for="field-hotel-location">Hotel Name</label>
                                                                                                <i class="fa fa-map-marker input-icon"></i>
                                                                                                <div class="st-select-wrapper">
                                                                                                    <input id="field-hotel-location" autocomplete="off" type="text" name="location_name" value="" class="form-control st-location-name  off" placeholder="">
                                                                                                    <select id="field-hotel-location" name="location_id" class="st-location-id st-hidden" placeholder="" tabindex="-1">
                                                                                                        <option value=""></option>
                                                                                                        <option  value="277">Russia||87144</option>
                                                                                                        <option  value="279">Germany||108 303</option>
                                                                                                        <option  value="285">Australia||16 192</option>
                                                                                                        <option  value="276">Sydney, Australia||16 192</option>
                                                                                                        <option  value="5410">Japan||363564</option>
                                                                                                        <option  value="287">Paris, France||39 664</option>
                                                                                                        <option  value="1957">United States||70 686</option>
                                                                                                        <option  value="275">New York City, United States||3 560</option>
                                                                                                        <option  value="284">Las Vegas, Nevada State, United States||70 686</option>
                                                                                                        <option  value="1952">Virginia  State, United States||1 430</option>
                                                                                                        <option  value="282">Virginia Beach, Virginia  State, United States||1 205</option>
                                                                                                    </select>
                                                                                                    <div class="option-wrapper"></div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class=" col-md-6 col-lg-6 col-sm-12 col-xs-12 ">
                                                                                            <div class=" form-group form-group- ">    <label>Filter Price </label><input name="price_range" type="text" value="0;354" class="price-slider" data-symbol="$" data-min="0" data-max="354" data-step="0">     </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <!--End search Advance-->
                                                                            <button class="btn btn-primary btn-lg" type="submit">Search for Accommodation</button>
                                                                        </form>
                                                                    </div>
                                                                    <div class="tab-pane fade " id="tab-cars1">
                                                                        <h2 class='mb20'>Search for Cheap Rental Cars</h2>
                                                                        <form method="get" action="#" class="main-search">
                                                                            <input type="hidden" name="lang" value="en">
                                                                            <div class="row">
                                                                                <div class=''>
                                                                                    <div class=" col-md-12 col-lg-12 col-sm-12 col-xs-12 ">
                                                                                        <div class="form-group form-group- form-group-icon-left">
                                                                                            <label for="field-car-dropoff">Pick-up From</label>
                                                                                            <i class="fa fa-map-marker input-icon"></i>
                                                                                            <div class="st-select-wrapper">
                                                                                                <input id="field-car-dropoff" data-children="location_id_drop_off" data-clear="clear" autocomplete="off" type="text" name="pick-up" value="" class="form-control st-location-name required" placeholder="Destination; Zip Code ">
                                                                                                <select  data-current-country="" name="location_id_pick_up" class="st-location-id st-hidden" tabindex="-1">
                                                                                                    <option value=""></option>
                                                                                                    <option  data-country="IT" value="280">Italy||16 711</option>
                                                                                                    <option  data-country="VN" value="281">Vietnam||154 047</option>
                                                                                                    <option  data-country="FR" value="283">Marseille, France||39 664</option>
                                                                                                    <option  data-country="FR" value="287">Paris, France||39 664</option>
                                                                                                    <option  data-country="US" value="1957">United States||70 686</option>
                                                                                                    <option  data-country="US" value="275">New York City, United States||3 560</option>
                                                                                                </select>
                                                                                                <div class="option-wrapper"></div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="same_location form-group form-group- form-group-icon-left ">
                                                                                            <!-- <label  for="required_dropoff"> -->
                                                                                            <input style="display:none;" checked type="checkbox" name="required_dropoff" value="required_dropoff" id="" class="required-field">
                                                                                            <!-- </label> -->
                                                                                            <a href='javascript:void(0)' id='required_dropoff' class="required-field change_same_location" data-change="Same Location" >Different Location</a>
                                                                                        </div>
                                                                                        <div class="form-drop-off field-hidden">
                                                                                            <div class=" form-group form-group- form-group-icon-left">
                                                                                                <label for="field-car-pickup"> Drop-off To</label>
                                                                                                <i class="fa fa-map-marker input-icon"></i>
                                                                                                <div class="st-select-wrapper">
                                                                                                    <input id="field-car-pickup" data-parent="location_id_pick_up" data-clear="clear" autocomplete="off" type="text" name="drop-off" value="" class="form-control st-location-name" placeholder=" Destination; Zip Code" >
                                                                                                    <select  data-current-country="" name="location_id_drop_off" class="st-location-id st-hidden " tabindex="-1">
                                                                                                        <option value=""></option>
                                                                                                        <option  data-country="IT" value="280">Italy||16 711</option>
                                                                                                        <option  data-country="VN" value="281">Vietnam||154 047</option>
                                                                                                        <option  data-country="FR" value="283">Marseille, France||39 664</option>
                                                                                                        <option  data-country="FR" value="287">Paris, France||39 664</option>
                                                                                                        <option  data-country="US" value="1957">United States||70 686</option>
                                                                                                        <option  data-country="US" value="275">New York City, United States||3 560</option>
                                                                                                    </select>
                                                                                                    <div class="option-wrapper"></div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class=" col-md-6 col-lg-6 col-sm-12 col-xs-12 ">
                                                                                        <div class="row">
                                                                                            <div class="col-md-6">
                                                                                                <div  class="form-group form-group- form-group-icon-left"  data-date-format="mm/dd/yyyy">
                                                                                                    <label for="field-car-pickup-date">Pick-up Date </label>
                                                                                                    <i class="fa fa-calendar input-icon input-icon-highlight"></i>
                                                                                                    <input id="field-car-pickup-date" placeholder="mm/dd/yyyy" value=""  class="form-control pick-up-date off" name="pick-up-date" type="text" />
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-6">
                                                                                                <div class="form-group form-group- form-group-icon-left">
                                                                                                    <label for="field-car-pickup-time">Pick-up Time</label>
                                                                                                    <i class="fa fa-clock-o input-icon input-icon-highlight"></i>
                                                                                                    <input id="field-car-pickup-time" name="pick-up-time" class="time-pick form-control off" value="" type="text" />
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class=" col-md-6 col-lg-6 col-sm-12 col-xs-12 ">
                                                                                        <div class="row" >
                                                                                            <div class="col-md-6">
                                                                                                <div  class="form-group form-group- form-group-icon-left">
                                                                                                    <label for="field-st-dropoff-date">Drop-off Date </label>
                                                                                                    <i class="fa fa-calendar input-icon input-icon-highlight"></i>
                                                                                                    <input id="field-st-dropoff-date" placeholder="mm/dd/yyyy" value=""  class="form-control drop-off-date off" name="drop-off-date" type="text" />
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-6">
                                                                                                <div class="form-group form-group- form-group-icon-left">
                                                                                                    <label for="field-st-dropoff-time">Drop-off Time</label>
                                                                                                    <i class="fa fa-clock-o input-icon input-icon-highlight"></i>
                                                                                                    <input id="field-st-dropoff-time" name="drop-off-time"  class="time-pick form-control off" value="" type="text" />
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="search_advance">
                                                                                <div class="expand_search_box form-group form-group-">
                                                                                    <span class="expand_search_box-more"> <i class="btn btn-primary fa fa-plus mr10"></i>Advanced Search</span>
                                                                                    <span class="expand_search_box-less"> <i class="btn btn-primary fa fa-minus mr10"></i>Advanced Search</span>
                                                                                </div>
                                                                                <div class="view_more_content_box">
                                                                                    <div class="row">
                                                                                        <div class=" col-md-12 col-lg-12 col-sm-12 col-xs-12 ">
                                                                                            <div class="form-custom-taxonomy form-group form-group-" taxonomy="st_category_cars">
                                                                                                <label >Car Features</label>
                                                                                                <div class="row">
                                                                                                    <div  style='clear:both' class="checkbox col-xs-12 col-sm-4">
                                                                                                        <label>
                                                                                                            <input class="i-check item_tanoxomy"   type="checkbox" value="35" />Compact</label>
                                                                                                    </div>
                                                                                                    <div  class="checkbox col-xs-12 col-sm-4">
                                                                                                        <label>
                                                                                                            <input class="i-check item_tanoxomy"   type="checkbox" value="122" />Full-Size</label>
                                                                                                    </div>
                                                                                                    <div  class="checkbox col-xs-12 col-sm-4">
                                                                                                        <label>
                                                                                                            <input class="i-check item_tanoxomy"   type="checkbox" value="127" />Full-Size SUV</label>
                                                                                                    </div>
                                                                                                    <div  style='clear:both' class="checkbox col-xs-12 col-sm-4">
                                                                                                        <label>
                                                                                                            <input class="i-check item_tanoxomy"   type="checkbox" value="129" />Full-Size Van</label>
                                                                                                    </div>
                                                                                                    <div  class="checkbox col-xs-12 col-sm-4">
                                                                                                        <label>
                                                                                                            <input class="i-check item_tanoxomy"   type="checkbox" value="124" />Luxury Car</label>
                                                                                                    </div>
                                                                                                    <div  class="checkbox col-xs-12 col-sm-4">
                                                                                                        <label>
                                                                                                            <input class="i-check item_tanoxomy"   type="checkbox" value="120" />Mid-Size</label>
                                                                                                    </div>
                                                                                                    <div  style='clear:both' class="checkbox col-xs-12 col-sm-4">
                                                                                                        <label>
                                                                                                            <input class="i-check item_tanoxomy"   type="checkbox" value="125" />Mid-Size SUV</label>
                                                                                                    </div>
                                                                                                    <div  class="checkbox col-xs-12 col-sm-4">
                                                                                                        <label>
                                                                                                            <input class="i-check item_tanoxomy"   type="checkbox" value="128" />Mini Van</label>
                                                                                                    </div>
                                                                                                    <div  class="checkbox col-xs-12 col-sm-4">
                                                                                                        <label>
                                                                                                            <input class="i-check item_tanoxomy"   type="checkbox" value="123" />Premium</label>
                                                                                                    </div>
                                                                                                    <div  style='clear:both' class="checkbox col-xs-12 col-sm-4">
                                                                                                        <label>
                                                                                                            <input class="i-check item_tanoxomy"   type="checkbox" value="121" />Standard</label>
                                                                                                    </div>
                                                                                                    <div  class="checkbox col-xs-12 col-sm-4">
                                                                                                        <label>
                                                                                                            <input class="i-check item_tanoxomy"   type="checkbox" value="126" />Standard SUV</label>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <input type="hidden" class="data_taxonomy" name="taxonomy[st_category_cars]" value="">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class=" col-md-6 col-lg-6 col-sm-12 col-xs-12 ">
                                                                                            <div class="form-group form-group- form-group-icon-left">
                                                                                                <label for="field-car-item-name">Car Name</label>
                                                                                                <i class="fa fa-sort-amount-asc input-icon"></i>
                                                                                                <input id="field-car-item-name" name="item_name" value="" class="form-control off" placeholder="Enter a car name" type="text" />
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class=" col-md-6 col-lg-6 col-sm-12 col-xs-12 ">
                                                                                            <div class=" form-group form-group- ">    <label>Filter Price</label><input name="price_range" type="text" value="45;600" class="price-slider" data-symbol="$" data-min="45" data-max="600" data-step="0">     </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <button class="btn btn-primary btn-lg" type="submit">Search for Cars</button>
                                                                        </form>
                                                                    </div>
                                                                    <div class="tab-pane fade " id="tab-tour2">
                                                                        <h2 class='mb20'>Tours</h2>
                                                                        <form role="search" method="get" class="search main-search" action="http://travelerdemo.wpengine.com/tour-search-result/">
                                                                            <input type="hidden" name="lang" value="en">
                                                                            <div class="row">
                                                                                <div class=" col-md-6 col-lg-6 col-sm-12 col-xs-12 ">
                                                                                    <div class="form-group form-group- form-group-icon-left">
                                                                                        <label for="field-tour-address">Address</label>
                                                                                        <i class="fa fa-map-marker input-icon"></i>
                                                                                        <div class="st-select-wrapper">
                                                                                            <input id="field-tour-address" autocomplete="off" type="text" name="location_name" value="" class="form-control st-location-name required" placeholder="Destination; Zip Code">
                                                                                            <select  name="location_id" class="st-location-id st-hidden" placeholder="Destination; Zip Code" tabindex="-1">
                                                                                                <option value=""></option>
                                                                                                <option  value="277">Russia||87144</option>
                                                                                                <option  value="5410">Japan||363564</option>
                                                                                                <option  value="283">Marseille, France||39 664</option>
                                                                                                <option  value="287">Paris, France||39 664</option>
                                                                                            </select>
                                                                                            <div class="option-wrapper"></div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class=" col-md-3 col-lg-3 col-sm-12 col-xs-12 ">
                                                                                    <div data-date-format="mm/dd/yyyy" class="form-group input-daterange  form-group- form-group-icon-left">
                                                                                        <label for="field-tour-checkin">Departure date</label>
                                                                                        <i class="fa fa-calendar input-icon input-icon-highlight"></i>
                                                                                        <input id="field-tour-checkin" class="form-control off"  name="start" type="text" placeholder="mm/dd/yyyy" value="" />
                                                                                    </div>
                                                                                </div>
                                                                                <div class=" col-md-3 col-lg-3 col-sm-12 col-xs-12 ">
                                                                                    <div data-date-format="mm/dd/yyyy" class="form-group input-daterange form-group- form-group-icon-left">
                                                                                        <label for="field-tour-checkout">Arrive date</label>
                                                                                        <i class="fa fa-calendar input-icon input-icon-highlight"></i>
                                                                                        <input id="field-tour-checkout" class="form-control off" name="end" type="text" value=""  placeholder="mm/dd/yyyy" />
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="search_advance">
                                                                                <div class="expand_search_box form-group form-group-">
                                                                                    <span class="expand_search_box-more"> <i class="btn btn-primary fa fa-plus mr10"></i>Advanced Search</span>
                                                                                    <span class="expand_search_box-less"> <i class="btn btn-primary fa fa-minus mr10"></i>Advanced Search</span>
                                                                                </div>
                                                                                <div class="view_more_content_box">
                                                                                    <div class="row">
                                                                                        <div class=" col-md-12 col-lg-12 col-sm-12 col-xs-12 ">
                                                                                            <div class="form-custom-taxonomy form-group form-group-" taxonomy="st_tour_type">
                                                                                                <label>Categories</label>
                                                                                                <div class="row ">
                                                                                                    <div  style='clear:both' class="checkbox col-xs-12 col-sm-4">
                                                                                                        <label>
                                                                                                            <input class="i-check item_tanoxomy"   type="checkbox" value="223" />Air Tour</label>
                                                                                                    </div>
                                                                                                    <div  class="checkbox col-xs-12 col-sm-4">
                                                                                                        <label>
                                                                                                            <input class="i-check item_tanoxomy"   type="checkbox" value="206" />Air, Helicopter &amp; Balloon Tours</label>
                                                                                                    </div>
                                                                                                    <div  class="checkbox col-xs-12 col-sm-4">
                                                                                                        <label>
                                                                                                            <input class="i-check item_tanoxomy"   type="checkbox" value="252" />Airport &amp; Ground Transfers</label>
                                                                                                    </div>
                                                                                                    <div  style='clear:both' class="checkbox col-xs-12 col-sm-4">
                                                                                                        <label>
                                                                                                            <input class="i-check item_tanoxomy"   type="checkbox" value="245" />Attraction Tickets</label>
                                                                                                    </div>
                                                                                                    <div  class="checkbox col-xs-12 col-sm-4">
                                                                                                        <label>
                                                                                                            <input class="i-check item_tanoxomy"   type="checkbox" value="232" />Bar, Club &amp; Pub Tours</label>
                                                                                                    </div>
                                                                                                    <div  class="checkbox col-xs-12 col-sm-4">
                                                                                                        <label>
                                                                                                            <input class="i-check item_tanoxomy"   type="checkbox" value="233" />Beer &amp; Brewery Tours</label>
                                                                                                    </div>
                                                                                                    <div  style='clear:both' class="checkbox col-xs-12 col-sm-4">
                                                                                                        <label>
                                                                                                            <input class="i-check item_tanoxomy"   type="checkbox" value="258" />Bike &amp; Mountain Bike Tours</label>
                                                                                                    </div>
                                                                                                    <div  class="checkbox col-xs-12 col-sm-4">
                                                                                                        <label>
                                                                                                            <input class="i-check item_tanoxomy"   type="checkbox" value="218" />City Packages</label>
                                                                                                    </div>
                                                                                                    <div  class="checkbox col-xs-12 col-sm-4">
                                                                                                        <label>
                                                                                                            <input class="i-check item_tanoxomy"   type="checkbox" value="219" />City Tours</label>
                                                                                                    </div>
                                                                                                    <div  style='clear:both' class="checkbox col-xs-12 col-sm-4">
                                                                                                        <label>
                                                                                                            <input class="i-check item_tanoxomy"   type="checkbox" value="68" />City trips</label>
                                                                                                    </div>
                                                                                                    <div  class="checkbox col-xs-12 col-sm-4">
                                                                                                        <label>
                                                                                                            <input class="i-check item_tanoxomy"   type="checkbox" value="234" />Cooking Classes</label>
                                                                                                    </div>
                                                                                                    <div  class="checkbox col-xs-12 col-sm-4">
                                                                                                        <label>
                                                                                                            <input class="i-check item_tanoxomy"   type="checkbox" value="207" />Cruises, Sailing &amp; Water Tours</label>
                                                                                                    </div>
                                                                                                    <div  style='clear:both' class="checkbox col-xs-12 col-sm-4">
                                                                                                        <label>
                                                                                                            <input class="i-check item_tanoxomy"   type="checkbox" value="208" />Cultural &amp; Theme Tours</label>
                                                                                                    </div>
                                                                                                    <div  class="checkbox col-xs-12 col-sm-4">
                                                                                                        <label>
                                                                                                            <input class="i-check item_tanoxomy"   type="checkbox" value="227" />Cultural Tour</label>
                                                                                                    </div>
                                                                                                    <div  class="checkbox col-xs-12 col-sm-4">
                                                                                                        <label>
                                                                                                            <input class="i-check item_tanoxomy"   type="checkbox" value="240" />Custom Private Tours</label>
                                                                                                    </div>
                                                                                                    <div  style='clear:both' class="checkbox col-xs-12 col-sm-4">
                                                                                                        <label>
                                                                                                            <input class="i-check item_tanoxomy"   type="checkbox" value="224" />Day Cruises</label>
                                                                                                    </div>
                                                                                                    <div  class="checkbox col-xs-12 col-sm-4">
                                                                                                        <label>
                                                                                                            <input class="i-check item_tanoxomy"   type="checkbox" value="230" />Day Trips</label>
                                                                                                    </div>
                                                                                                    <div  class="checkbox col-xs-12 col-sm-4">
                                                                                                        <label>
                                                                                                            <input class="i-check item_tanoxomy"   type="checkbox" value="209" />Day Trips &amp; Excursions</label>
                                                                                                    </div>
                                                                                                    <div  style='clear:both' class="checkbox col-xs-12 col-sm-4">
                                                                                                        <label>
                                                                                                            <input class="i-check item_tanoxomy"   type="checkbox" value="235" />Dining Experiences</label>
                                                                                                    </div>
                                                                                                    <div  class="checkbox col-xs-12 col-sm-4">
                                                                                                        <label>
                                                                                                            <input class="i-check item_tanoxomy"   type="checkbox" value="238" />Eco Tours</label>
                                                                                                    </div>
                                                                                                    <div  class="checkbox col-xs-12 col-sm-4">
                                                                                                        <label>
                                                                                                            <input class="i-check item_tanoxomy"   type="checkbox" value="70" />Ecotourism</label>
                                                                                                    </div>
                                                                                                    <div  style='clear:both' class="checkbox col-xs-12 col-sm-4">
                                                                                                        <label>
                                                                                                            <input class="i-check item_tanoxomy"   type="checkbox" value="69" />Escorted Tour</label>
                                                                                                    </div>
                                                                                                    <div  class="checkbox col-xs-12 col-sm-4">
                                                                                                        <label>
                                                                                                            <input class="i-check item_tanoxomy"   type="checkbox" value="236" />Food Tours</label>
                                                                                                    </div>
                                                                                                    <div  class="checkbox col-xs-12 col-sm-4">
                                                                                                        <label>
                                                                                                            <input class="i-check item_tanoxomy"   type="checkbox" value="210" />Food, Wine &amp; Nightlife</label>
                                                                                                    </div>
                                                                                                    <div  style='clear:both' class="checkbox col-xs-12 col-sm-4">
                                                                                                        <label>
                                                                                                            <input class="i-check item_tanoxomy"   type="checkbox" value="72" />Group Tour</label>
                                                                                                    </div>
                                                                                                    <div  class="checkbox col-xs-12 col-sm-4">
                                                                                                        <label>
                                                                                                            <input class="i-check item_tanoxomy"   type="checkbox" value="220" />Half-day Tours</label>
                                                                                                    </div>
                                                                                                    <div  class="checkbox col-xs-12 col-sm-4">
                                                                                                        <label>
                                                                                                            <input class="i-check item_tanoxomy"   type="checkbox" value="228" />Historical &amp; Heritage Tours</label>
                                                                                                    </div>
                                                                                                    <div  style='clear:both' class="checkbox col-xs-12 col-sm-4">
                                                                                                        <label>
                                                                                                            <input class="i-check item_tanoxomy"   type="checkbox" value="221" />Hop-on Hop-off Tours</label>
                                                                                                    </div>
                                                                                                    <div  class="checkbox col-xs-12 col-sm-4">
                                                                                                        <label>
                                                                                                            <input class="i-check item_tanoxomy"   type="checkbox" value="71" />Hosted tours</label>
                                                                                                    </div>
                                                                                                    <div  class="checkbox col-xs-12 col-sm-4">
                                                                                                        <label>
                                                                                                            <input class="i-check item_tanoxomy"   type="checkbox" value="261" />Kayaking &amp; Canoeing</label>
                                                                                                    </div>
                                                                                                    <div  style='clear:both' class="checkbox col-xs-12 col-sm-4">
                                                                                                        <label>
                                                                                                            <input class="i-check item_tanoxomy"   type="checkbox" value="48" />Ligula</label>
                                                                                                    </div>
                                                                                                    <div  class="checkbox col-xs-12 col-sm-4">
                                                                                                        <label>
                                                                                                            <input class="i-check item_tanoxomy"   type="checkbox" value="229" />Literary, Art &amp; Music Tours</label>
                                                                                                    </div>
                                                                                                    <div  class="checkbox col-xs-12 col-sm-4">
                                                                                                        <label>
                                                                                                            <input class="i-check item_tanoxomy"   type="checkbox" value="246" />Museum Tickets &amp; Passes</label>
                                                                                                    </div>
                                                                                                    <div  style='clear:both' class="checkbox col-xs-12 col-sm-4">
                                                                                                        <label>
                                                                                                            <input class="i-check item_tanoxomy"   type="checkbox" value="239" />Nature &amp; Wildlife</label>
                                                                                                    </div>
                                                                                                    <div  class="checkbox col-xs-12 col-sm-4">
                                                                                                        <label>
                                                                                                            <input class="i-check item_tanoxomy"   type="checkbox" value="225" />Night Cruises</label>
                                                                                                    </div>
                                                                                                    <div  class="checkbox col-xs-12 col-sm-4">
                                                                                                        <label>
                                                                                                            <input class="i-check item_tanoxomy"   type="checkbox" value="247" />Nightclub Passes</label>
                                                                                                    </div>
                                                                                                    <div  style='clear:both' class="checkbox col-xs-12 col-sm-4">
                                                                                                        <label>
                                                                                                            <input class="i-check item_tanoxomy"   type="checkbox" value="237" />Nightlife</label>
                                                                                                    </div>
                                                                                                    <div  class="checkbox col-xs-12 col-sm-4">
                                                                                                        <label>
                                                                                                            <input class="i-check item_tanoxomy"   type="checkbox" value="211" />Outdoor Activities</label>
                                                                                                    </div>
                                                                                                    <div  class="checkbox col-xs-12 col-sm-4">
                                                                                                        <label>
                                                                                                            <input class="i-check item_tanoxomy"   type="checkbox" value="253" />Port Transfers</label>
                                                                                                    </div>
                                                                                                    <div  style='clear:both' class="checkbox col-xs-12 col-sm-4">
                                                                                                        <label>
                                                                                                            <input class="i-check item_tanoxomy"   type="checkbox" value="243" />Ports of Call Tours</label>
                                                                                                    </div>
                                                                                                    <div  class="checkbox col-xs-12 col-sm-4">
                                                                                                        <label>
                                                                                                            <input class="i-check item_tanoxomy"   type="checkbox" value="212" />Private &amp; Custom Tours</label>
                                                                                                    </div>
                                                                                                    <div  class="checkbox col-xs-12 col-sm-4">
                                                                                                        <label>
                                                                                                            <input class="i-check item_tanoxomy"   type="checkbox" value="231" />Private Day Trips</label>
                                                                                                    </div>
                                                                                                    <div  style='clear:both' class="checkbox col-xs-12 col-sm-4">
                                                                                                        <label>
                                                                                                            <input class="i-check item_tanoxomy"   type="checkbox" value="222" />Private Tours</label>
                                                                                                    </div>
                                                                                                    <div  class="checkbox col-xs-12 col-sm-4">
                                                                                                        <label>
                                                                                                            <input class="i-check item_tanoxomy"   type="checkbox" value="241" />Private Tours</label>
                                                                                                    </div>
                                                                                                    <div  class="checkbox col-xs-12 col-sm-4">
                                                                                                        <label>
                                                                                                            <input class="i-check item_tanoxomy"   type="checkbox" value="254" />Private Transfers</label>
                                                                                                    </div>
                                                                                                    <div  style='clear:both' class="checkbox col-xs-12 col-sm-4">
                                                                                                        <label>
                                                                                                            <input class="i-check item_tanoxomy"   type="checkbox" value="226" />Sailing Trips</label>
                                                                                                    </div>
                                                                                                    <div  class="checkbox col-xs-12 col-sm-4">
                                                                                                        <label>
                                                                                                            <input class="i-check item_tanoxomy"   type="checkbox" value="213" />Shore Excursions</label>
                                                                                                    </div>
                                                                                                    <div  class="checkbox col-xs-12 col-sm-4">
                                                                                                        <label>
                                                                                                            <input class="i-check item_tanoxomy"   type="checkbox" value="214" />Shows, Concerts &amp; Sports</label>
                                                                                                    </div>
                                                                                                    <div  style='clear:both' class="checkbox col-xs-12 col-sm-4">
                                                                                                        <label>
                                                                                                            <input class="i-check item_tanoxomy"   type="checkbox" value="248" />Sightseeing &amp; City Passes</label>
                                                                                                    </div>
                                                                                                    <div  class="checkbox col-xs-12 col-sm-4">
                                                                                                        <label>
                                                                                                            <input class="i-check item_tanoxomy"   type="checkbox" value="249" />Sightseeing Packages</label>
                                                                                                    </div>
                                                                                                    <div  class="checkbox col-xs-12 col-sm-4">
                                                                                                        <label>
                                                                                                            <input class="i-check item_tanoxomy"   type="checkbox" value="215" />Sightseeing Tickets &amp; Passes</label>
                                                                                                    </div>
                                                                                                    <div  style='clear:both' class="checkbox col-xs-12 col-sm-4">
                                                                                                        <label>
                                                                                                            <input class="i-check item_tanoxomy"   type="checkbox" value="244" />Theater, Shows &amp; Musicals</label>
                                                                                                    </div>
                                                                                                    <div  class="checkbox col-xs-12 col-sm-4">
                                                                                                        <label>
                                                                                                            <input class="i-check item_tanoxomy"   type="checkbox" value="250" />Theme Park Tickets &amp; Tours</label>
                                                                                                    </div>
                                                                                                    <div  class="checkbox col-xs-12 col-sm-4">
                                                                                                        <label>
                                                                                                            <input class="i-check item_tanoxomy"   type="checkbox" value="216" />Theme Parks</label>
                                                                                                    </div>
                                                                                                    <div  style='clear:both' class="checkbox col-xs-12 col-sm-4">
                                                                                                        <label>
                                                                                                            <input class="i-check item_tanoxomy"   type="checkbox" value="217" />Tours &amp; Sightseeing</label>
                                                                                                    </div>
                                                                                                    <div  class="checkbox col-xs-12 col-sm-4">
                                                                                                        <label>
                                                                                                            <input class="i-check item_tanoxomy"   type="checkbox" value="251" />Transfers &amp; Ground Transport</label>
                                                                                                    </div>
                                                                                                    <div  class="checkbox col-xs-12 col-sm-4">
                                                                                                        <label>
                                                                                                            <input class="i-check item_tanoxomy"   type="checkbox" value="256" />Viator Exclusive Tours</label>
                                                                                                    </div>
                                                                                                    <div  style='clear:both' class="checkbox col-xs-12 col-sm-4">
                                                                                                        <label>
                                                                                                            <input class="i-check item_tanoxomy"   type="checkbox" value="242" />Viator Private Guides</label>
                                                                                                    </div>
                                                                                                    <div  class="checkbox col-xs-12 col-sm-4">
                                                                                                        <label>
                                                                                                            <input class="i-check item_tanoxomy"   type="checkbox" value="255" />Viator VIP &amp; Exclusive Tours</label>
                                                                                                    </div>
                                                                                                    <div  class="checkbox col-xs-12 col-sm-4">
                                                                                                        <label>
                                                                                                            <input class="i-check item_tanoxomy"   type="checkbox" value="257" />Walking &amp; Biking Tours</label>
                                                                                                    </div>
                                                                                                    <div  style='clear:both' class="checkbox col-xs-12 col-sm-4">
                                                                                                        <label>
                                                                                                            <input class="i-check item_tanoxomy"   type="checkbox" value="259" />Walking Tours</label>
                                                                                                    </div>
                                                                                                    <div  class="checkbox col-xs-12 col-sm-4">
                                                                                                        <label>
                                                                                                            <input class="i-check item_tanoxomy"   type="checkbox" value="260" />Water Sports</label>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <input type="hidden" class="data_taxonomy" name="taxonomy[st_tour_type]" value="">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class=" col-md-6 col-lg-6 col-sm-12 col-xs-12 ">
                                                                                            <div class="form-group form-group- form-group-icon-left ">
                                                                                                <label for="field-tour-item-name">Tour Name</label>
                                                                                                <i class="fa fa-sort-amount-asc input-icon"></i>
                                                                                                <input id="field-tour-item-name" name="item_name" off value="" class=" form-control off" placeholder="" type="text" />
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class=" col-md-6 col-lg-6 col-sm-12 col-xs-12 ">
                                                                                            <div class=" form-group form-group- ">    <label>Filter Price </label><input name="price_range" type="text" value="30;1082" class="price-slider" data-symbol="$" data-min="30" data-max="1082" data-step="0">     </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <button class="btn btn-primary btn-lg" type="submit">Search for Tour</button>
                                                                        </form>
                                                                    </div>
                                                                    <div class="tab-pane fade " id="tab-rental3">
                                                                        <h2 class='mb20'>Find Your Perfect Home</h2>
                                                                        <form role="search" method="get" class="search main-search" action="http://travelerdemo.wpengine.com/">
                                                                            <input type="hidden" name="post_type" value="st_rental">
                                                                            <input type="hidden" name="s" value="">
                                                                            <input type="hidden" name="lang" value="en">
                                                                            <div class="row">
                                                                                <div class=" col-md-12 col-lg-12 col-sm-12 col-xs-12 ">
                                                                                    <div class="form-group form-group- form-group-icon-left">
                                                                                        <label for="field-rental-locationid">Where</label>
                                                                                        <i class="fa fa-map-marker input-icon"></i>
                                                                                        <div class="st-select-wrapper">
                                                                                            <input id="field-rental-locationid" autocomplete="off" type="text" name="location_name" value="" class="form-control st-location-name required" placeholder="">
                                                                                            <select name="location_id" class="st-location-id st-hidden" placeholder="" tabindex="-1">
                                                                                                <option value=""></option>
                                                                                                <option  value="277">Russia||87144</option>
                                                                                                <option  value="285">Australia||16 192</option>
                                                                                                <option  value="276">Sydney, Australia||16 192</option>
                                                                                                <option  value="287">Paris, France||39 664</option>
                                                                                                <option  value="1957">United States||70 686</option>
                                                                                                <option  value="275">New York City, United States||3 560</option>
                                                                                                <option  value="1944">California State, United States||3017</option>
                                                                                                <option  value="1945">Los Angeles, California State, United States||70 686</option>
                                                                                                <option  value="1946">San Francisco, California State, United States||90001–90068, 90070–90084, 90086–90089, 90091, 90093–90097, 90099</option>
                                                                                                <option  value="1947">Nevada State, United States||417</option>
                                                                                            </select>
                                                                                            <div class="option-wrapper"></div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class=" col-md-3 col-lg-3 col-sm-12 col-xs-12 ">
                                                                                    <div data-date-format="mm/dd/yyyy" class="form-group input-daterange  form-group- form-group-icon-left">
                                                                                        <label for="field-rental-checkin">Check in</label>
                                                                                        <i class="fa fa-calendar input-icon input-icon-highlight"></i>
                                                                                        <input id="field-rental-checkin" placeholder="mm/dd/yyyy" class="form-control required" value="" name="start" type="text" />
                                                                                    </div>
                                                                                </div>
                                                                                <div class=" col-md-3 col-lg-3 col-sm-12 col-xs-12 ">
                                                                                    <div data-date-format="mm/dd/yyyy" class="form-group input-daterange form-group- form-group-icon-left">
                                                                                        <label for="field-rental-checkout">Check out</label>
                                                                                        <i class="fa fa-calendar input-icon input-icon-highlight"></i>
                                                                                        <input id="field-rental-checkout" placeholder="mm/dd/yyyy" class="form-control required" value="" name="end" type="text" />
                                                                                    </div>
                                                                                </div>
                                                                                <div class=" col-md-3 col-lg-3 col-sm-12 col-xs-12 ">
                                                                                    <div class="form-group form-group- form-group-select-plus">
                                                                                        <label for="field-rental-adult">Adults</label>
                                                                                        <div class="btn-group btn-group-select-num " data-toggle="buttons">
                                                                                            <label class="btn btn-primary active">
                                                                                                <input type="radio" value="1"  />1</label>
                                                                                            <label class="btn btn-primary ">
                                                                                                <input type="radio" value="2"  />2</label>
                                                                                            <label class="btn btn-primary ">
                                                                                                <input type="radio" value="3"  />3</label>
                                                                                            <label class="btn btn-primary ">
                                                                                                <input type="radio" value="4"  />3+</label>
                                                                                        </div>
                                                                                        <select id="field-rental-adult" class="form-control hidden" name="adult_number">
                                                                                            @for($i=1; $i<=14; $i++)
                                                                                            <option  value='{{ $i }}'>{{ $i }}</option>
                                                                                            @endfor
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                                <div class=" col-md-3 col-lg-3 col-sm-12 col-xs-12 ">
                                                                                    <div class="form-group form-group- form-group-select-plus">
                                                                                        <label for="field-rental-children">Children</label>
                                                                                        <div class="btn-group btn-group-select-num " data-toggle="buttons">
                                                                                            <label class="btn btn-primary active">
                                                                                                <input type="radio" value="0"  />0</label>
                                                                                            <label class="btn btn-primary ">
                                                                                                <input type="radio" value="1"  />1</label>
                                                                                            <label class="btn btn-primary ">
                                                                                                <input type="radio" value="2"  />2</label>
                                                                                            <label class="btn btn-primary ">
                                                                                                <input type="radio" value="3"  />2+</label>
                                                                                        </div>
                                                                                        <select id="field-rental-children" class="form-control hidden" name="child_number">
                                                                                            @for($i=1; $i<=14; $i++)
                                                                                            <option  value='{{ $i }}'>{{ $i }}</option>
                                                                                            @endfor
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="search_advance">
                                                                                <div class="expand_search_box form-group form-group-">
                                                                                    <span class="expand_search_box-more"> <i class="btn btn-primary fa fa-plus mr10"></i>Advanced Search</span>
                                                                                    <span class="expand_search_box-less"> <i class="btn btn-primary fa fa-minus mr10"></i>Advanced Search</span>
                                                                                </div>
                                                                                <div class="view_more_content_box">
                                                                                    <div class="row">
                                                                                        <div class=" col-md-12 col-lg-12 col-sm-12 col-xs-12 ">
                                                                                            <div class="form-custom-taxonomy form-group form-group-" taxonomy="">
                                                                                                <label for="field-rental-tax-">Amenities</label>
                                                                                                <div class='row'>
                                                                                                </div>
                                                                                                <input type="hidden" class="data_taxonomy" name="taxonomy[]" value="">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class=" col-md-12 col-lg-12 col-sm-12 col-xs-12 ">
                                                                                            <div class="form-custom-taxonomy form-group form-group-" taxonomy="">
                                                                                                <label for="field-rental-tax-">Suitabilities</label>
                                                                                                <div class='row'>
                                                                                                </div>
                                                                                                <input type="hidden" class="data_taxonomy" name="taxonomy[]" value="">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class=" col-md-6 col-lg-6 col-sm-12 col-xs-12 ">
                                                                                            <div class="form-group form-group- form-group-icon-left">
                                                                                                <label for="field-rental-itemname">Rental Name </label>
                                                                                                <i class="fa fa-sort-amount-asc input-icon"></i>
                                                                                                <input id="field-rental-itemname" name="item_name" off value="" class="typeahead_location form-control off" placeholder="" type="text" />
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class=" col-md-6 col-lg-6 col-sm-12 col-xs-12 ">
                                                                                            <div class=" form-group form-group- ">    <label>Filter Price </label><input name="price_range" type="text" value="50;499" class="price-slider" data-symbol="$" data-min="50" data-max="499" data-step="0">     </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <button class="btn btn-primary btn-lg" type="submit">Search for rental</button>
                                                                        </form>
                                                                    </div>
                                                                    <div class="tab-pane fade " id="tab-activities4">
                                                                        <h2 class='mb20'>Find Your Perfect Activities</h2>
                                                                        <form role="search" method="get" class="search main-search" action="http://travelerdemo.wpengine.com/activity-search-result/">
                                                                            <input type="hidden" name="lang" value="en">
                                                                            <div class="row">
                                                                                <div class=" col-md-3 col-lg-3 col-sm-12 col-xs-12 ">
                                                                                    <div class="form-group form-group-md form-group-icon-left">
                                                                                        <label for="field-st-address">Address</label>
                                                                                        <i class="fa fa-map-marker input-icon"></i>
                                                                                        <div class="st-select-wrapper">
                                                                                            <input id="field-st-address" autocomplete="off" type="text" name="location_name" value="" class="form-control st-location-name required" placeholder="Destination; Zip Code">
                                                                                            <select  name="location_id" class="st-location-id st-hidden" placeholder="Destination; Zip Code" tabindex="-1">
                                                                                                <option value=""></option>
                                                                                                <option  value="5410">Japan||363564</option>
                                                                                                <option  value="287">Paris, France||39 664</option>
                                                                                                <option  value="275">New York City, United States||3 560</option>
                                                                                            </select>
                                                                                            <div class="option-wrapper"></div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class=" col-md-3 col-lg-3 col-sm-12 col-xs-12 ">
                                                                                    <div data-date-format="mm/dd/yyyy" class="form-group input-daterange  form-group-md form-group-icon-left">
                                                                                        <label for="field-st-checkin">From</label>
                                                                                        <i class="fa fa-calendar input-icon input-icon-highlight"></i>
                                                                                        <input id="field-st-checkin" class="form-control off" name="start" type="text" placeholder="mm/dd/yyyy" value="" />
                                                                                    </div>
                                                                                </div>
                                                                                <div class=" col-md-3 col-lg-3 col-sm-12 col-xs-12 ">
                                                                                    <div data-date-format="mm/dd/yyyy" class="form-group input-daterange form-group-md form-group-icon-left">
                                                                                        <label for="field-st-checkout">To</label>
                                                                                        <i class="fa fa-calendar input-icon input-icon-highlight"></i>
                                                                                        <input id="field-st-checkout" class="form-control off" name="end" type="text" value=""  placeholder="mm/dd/yyyy" />
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="search_advance">
                                                                                <div class="expand_search_box form-group form-group-md">
                                                                                    <span class="expand_search_box-more"> <i class="btn btn-primary fa fa-plus mr10"></i>Advanced Search</span>
                                                                                    <span class="expand_search_box-less"> <i class="btn btn-primary fa fa-minus mr10"></i>Advanced Search</span>
                                                                                </div>
                                                                                <div class="view_more_content_box">
                                                                                    <div class="row">
                                                                                        <div class=" col-md-12 col-lg-12 col-sm-12 col-xs-12 ">
                                                                                            <div class="form-custom-taxonomy form-group form-group-md" taxonomy="">
                                                                                                <label for="field-taxonomy-">Attractions</label>
                                                                                                <div class='row'>
                                                                                                </div>
                                                                                                <input type="hidden" class="data_taxonomy" name="taxonomy[]" value="">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class=" col-md-6 col-lg-6 col-sm-12 col-xs-12 ">
                                                                                            <div class="form-group form-group-md form-group-icon-left">
                                                                                                <label for="field-st-name">Activity Name </label>
                                                                                                <i class="fa fa-sort-amount-asc input-icon"></i>
                                                                                                <input id="field-st-name" name="item_name" off value="" class="form-control off" placeholder="" type="text" />
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class=" col-md-6 col-lg-6 col-sm-12 col-xs-12 ">
                                                                                            <div class=" form-group form-group-md ">    <label>Price Filter</label><input name="price_range" type="text" value="45;120" class="price-slider" data-symbol="$" data-min="45" data-max="120" data-step="0">     </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <button class="btn btn-primary btn-lg" type="submit">Search for Activity</button>
                                                                        </form>
                                                                    </div>
                                                                    <div class="tab-pane fade " id="tab-custom_flight6">
                                                                        <h2 class='mb20'>Search and Save on Flight</h2>
                                                                        <form role="search" method="get" class="search main-search" action="http://whitelabel.dohop.com/w/travelerwhitelabel/" target="_blank">
                                                                            <div class="row">
                                                                                <div class=" col-md-6 col-lg-6 col-sm-12 col-xs-12 ">
                                                                                    <div class="form-group form-group- form-group-icon-left">
                                                                                        <label for="location_from">From</label>
                                                                                        <i class="fa fa-map-marker input-icon"></i>
                                                                                        <div class="st-select-wrapper st-flight-wrapper" >
                                                                                            <input required id="location_from" type="text" class="form-control custom-flight-location st-location-name" autocomplete="off" data-name="a1" value="" placeholder="Location">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class=" col-md-6 col-lg-6 col-sm-12 col-xs-12 ">
                                                                                    <div class="form-group form-group- form-group-icon-left">
                                                                                        <label for="location_to">To</label>
                                                                                        <i class="fa fa-map-marker input-icon"></i>
                                                                                        <div class="st-select-wrapper st-flight-wrapper" >
                                                                                            <input required id="location_to" type="text" class="form-control custom-flight-location st-location-name" autocomplete="off" data-name="a2" value="" placeholder="Location">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class=" col-md-3 col-lg-3 col-sm-12 col-xs-12 ">
                                                                                    <div data-date-format="mm/dd/yyyy" class="form-group input-daterange form-group- form-group-icon-left">
                                                                                        <label for="field-hotel-checkin">Depart</label>
                                                                                        <i class="fa fa-calendar input-icon input-icon-highlight"></i>
                                                                                        <input id="field-hotel-checkin" placeholder="mm/dd/yyyy" class="form-control checkin_hotel required" value="" name="dd1" type="text" />
                                                                                        <input type="hidden" name="d1" class="st-flight-from" value="">
                                                                                    </div>
                                                                                </div>
                                                                                <div class=" col-md-3 col-lg-3 col-sm-12 col-xs-12 ">
                                                                                    <div data-date-format="mm/dd/yyyy" class="form-group input-daterange  st-flight-to-field form-group- form-group-icon-left">
                                                                                        <label for="field-hotel-checkout">Return</label>
                                                                                        <i class="fa fa-calendar input-icon input-icon-highlight"></i>
                                                                                        <input id="field-hotel-checkout" placeholder="mm/dd/yyyy" class="form-control required checkout_hotel" value="" name="dd2" type="text" />
                                                                                        <input type="hidden" name="d2" class="st-flight-to" value="">
                                                                                    </div>
                                                                                </div>
                                                                                <div class=" col-md-3 col-lg-3 col-sm-12 col-xs-12 ">
                                                                                    <div class="form-group form-group- form-group-select-plus">
                                                                                        <label for="">Trip</label>
                                                                                        <select class="form-control select-flight-trip" on>
                                                                                            <option value="1">Return</option>
                                                                                            <option value="0">One Way</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <button class="btn btn-primary btn-lg" type="submit">Search for Flight</button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="owl-carousel owl-slider owl-carousel-area" id="owl-carousel-slider" data-nav="false">
                                            <div class="bg-holder full">
                                                <div class="bg-mask st_1487265575"></div>
                                                <div class="bg-img" style="background-image:url({{ asset('/assets/images/slider-99.jpg') }});"></div>
                                            </div>
                                            <div class="bg-holder full">
                                                <div class="bg-mask st_1487265575"></div>
                                                <div class="bg-img" style="background-image:url({{ asset('/assets/images/bridge_1280x848.jpg') }});"></div>
                                            </div>
                                            <div class="bg-holder full">
                                                <div class="bg-mask st_1487265575"></div>
                                                <div class="bg-img" style="background-image:url({{ asset('/assets/images/gaviota_en_el_top_2048x1365.jpg') }});"></div>
                                            </div>
                                            <div class="bg-holder full">
                                                <div class="bg-mask st_1487265575"></div>
                                                <div class="bg-img" style="background-image:url({{ asset('/assets/images/viva_las_vegas_2048x1365.jpg') }});"></div>
                                            </div>
                                            <div class="bg-holder full">
                                                <div class="bg-mask st_1487265575"></div>
                                                <div class="bg-img" style="background-image:url({{ asset('/assets/images/el_inevitable_paso_del_tiempo_2048x2048.jpg') }});"></div>
                                            </div>
                                            <div class="bg-holder full">
                                                <div class="bg-mask st_1487265575"></div>
                                                <div class="bg-img" style="background-image:url({{ asset('/assets/images/196_365_800x6001.jpg') }});"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End .row-->
                </div>
                <!--End .container-->
            </div>
            <div class="vc_row wpb_row st bg-holder vc_custom_1422239553047">
                <div class='container '>
                    <div class='row'>
                        <div class="wpb_column column_container col-md-4 vc_custom_1422239559712">
                            <div class="vc_column-inner wpb_wrapper">
                                <div class="thumb text-left">
                                    <header class="thumb-header pull-top st-thumb-header">
                                        <i class="fa fa-briefcase box-icon-big box-icon-top  round st_1487265576 animate-icon-top-to-bottom   box-icon-to-black "></i>
                                    </header>
                                    <div class="thumb-caption pull-top st-thumb-caption">
                                        <h5 class="thumb-title">
                                            <a href="#" class="text-darken">Combine &amp; Save</a>
                                        </h5>
                                        <p class="thumb-desc">Faucibus tristique felis potenti ultrices ornare rhoncus semper hac facilisi</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="wpb_column column_container col-md-4 vc_custom_1422239566268">
                            <div class="vc_column-inner wpb_wrapper">
                                <div class="thumb text-left">
                                    <header class="thumb-header pull-top st-thumb-header">
                                        <i class="fa fa-dollar box-icon-big box-icon-top  round st_1487265577 animate-icon-top-to-bottom   box-icon-to-black "></i>
                                    </header>
                                    <div class="thumb-caption pull-top st-thumb-caption">
                                        <h5 class="thumb-title">
                                            <a href="#" class="text-darken">Combine &amp; Save</a>
                                        </h5>
                                        <p class="thumb-desc">Rutrum tellus lorem sem velit nisi non pharetra in dui</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="wpb_column column_container col-md-4 vc_custom_1422239573876">
                            <div class="vc_column-inner wpb_wrapper">
                                <div class="thumb text-left">
                                    <header class="thumb-header pull-top st-thumb-header">
                                        <i class="fa fa-lock box-icon-big box-icon-top  round st_1487265578 animate-icon-top-to-bottom   box-icon-to-black "></i>
                                    </header>
                                    <div class="thumb-caption pull-top st-thumb-caption">
                                        <h5 class="thumb-title">
                                            <a href="#" class="text-darken">Trust &amp; Safety</a>
                                        </h5>
                                        <p class="thumb-desc">Nostra sodales pharetra lacus sit sapien tristique luctus class magnis</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End .row-->
                </div>
                <!--End .container-->
            </div>
            <div class="vc_row wpb_row st bg-holder vc_custom_1427261023966 vc_row-has-fill bg-parallax">
                <div class="bg-mask"></div>
                <div class='container '>
                    <div class='row'>
                        <div class="wpb_column column_container col-md-12">
                            <div class="vc_column-inner wpb_wrapper">
                                <div class="text-center text-white">
                                    <h2 class="text-uc mb20">Last Minute Deal</h2>
                                    <ul class="icon-list list-inline-block mb0 last-minute-rating">
                                        <li><i class="fa  fa-star"></i></li>
                                        <li><i class="fa  fa-star-o"></i></li>
                                        <li><i class="fa  fa-star-o"></i></li>
                                        <li><i class="fa  fa-star-o"></i></li>
                                        <li><i class="fa  fa-star-o"></i></li>
                                    </ul>
                                    <h5 class="last-minute-title">InterContinental New York Barclay -  Double Room With Town View </h5>
                                    <p class="last-minute-date">02/16/2017</p>
                                    <p class="mb20">
                                        <b>
                                            from $150,00 / night                </b>
                                    </p>
                                    <a class="btn btn-lg btn-white btn-ghost" href="$">
                                        Book now        <i class="fa fa-angle-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End .row-->
                </div>
                <!--End .container-->
            </div>
            <div class="vc_row wpb_row st bg-holder">
                <div class='container '>
                    <div class='row'>
                        <div class="wpb_column column_container col-md-12">
                            <div class="vc_column-inner wpb_wrapper">
                                <div class="wpb_text_column wpb_content_element  vc_custom_1417684129972">
                                    <div class="wpb_wrapper">
                                        <h2 class="text-center">Top Destinations</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End .row-->
                </div>
                <!--End .container-->
            </div>
            <div class="vc_row wpb_row st bg-holder vc_custom_1417684088770">
                <div class='container '>
                    <div class='row'>
                        <div class="wpb_column column_container col-md-12">
                            <div class="vc_column-inner wpb_wrapper">
                                <div class=" st_top_location">
                                    <div class="row row-wrap">
                                        <div class="col-md-3 col-sm-6 col-xs-12 loop-curved ">
                                            <div class="thumb">
                                                <header class="thumb-header">
                                                    <a href="#" class="hover-img curved">
                                                        <img width="263" height="197" src="{{ asset('/assets/images/gaviota_en_el_top_800x6001-263x197.jpg') }}" class="attachment-263x197x1 size-263x197x1 wp-post-image" alt="" srcset="{{ asset('/assets/images/gaviota_en_el_top_800x6001-263x197.jpg') }}" sizes="(max-width: 263px) 100vw, 263px" />
                                                        <i class="fa fa-plus box-icon-white box-icon-border hover-icon-top-right round"></i>
                                                    </a>
                                                </header>
                                                <div class="thumb-caption">
                                                    <h4 class="thumb-title">New York City</h4>
                                                    <p class="thumb-desc">Cursus faucibus egestas rutrum mauris vulputate consequat ante</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-6 col-xs-12 loop-curved ">
                                            <div class="thumb">
                                                <header class="thumb-header">
                                                    <a href="#">
                                                        <img width="263" height="197" src="{{ asset('/assets/images/sydney_harbour_800x600-263x197.jpg') }}" class="attachment-263x197x1 size-263x197x1 wp-post-image" alt="" srcset="{{ asset('/assets/images/sydney_harbour_800x600-263x197.jpg') }}" sizes="(max-width: 263px) 100vw, 263px" />
                                                        <i class="fa fa-plus box-icon-white box-icon-border hover-icon-top-right round"></i>
                                                    </a>
                                                </header>
                                                <div class="thumb-caption">
                                                    <h4 class="thumb-title">Sydney</h4>
                                                    <p class="thumb-desc">faucibus egestas rutrum mauris vulputate consequat ante</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-6 col-xs-12 loop-curved ">
                                            <div class="thumb">
                                                <header class="thumb-header">
                                                    <a href="#" class="hover-img curved">
                                                        <img width="263" height="197" src="{{ asset('/assets/images/Cruise-demo-2-263x197.jpg') }}" class="attachment-263x197x1 size-263x197x1 wp-post-image" alt="" srcset="{{ asset('/assets/images/Cruise-demo-2-263x197.jpg') }}" sizes="(max-width: 263px) 100vw, 263px" />
                                                        <i class="fa fa-plus box-icon-white box-icon-border hover-icon-top-right round"></i>
                                                    </a>
                                                </header>
                                                <div class="thumb-caption">
                                                    <h4 class="thumb-title">Russia</h4>
                                                    <p class="thumb-desc">Cursus faucibus egestas rutrum mauris vulputate consequat ante</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-6 col-xs-12 loop-curved ">
                                            <div class="thumb">
                                                <header class="thumb-header">
                                                    <a href="#" class="hover-img curved">
                                                        <img width="263" height="197" src="{{ asset('/assets/images/taxi-263x197.jpg') }}" class="attachment-263x197x1 size-263x197x1 wp-post-image" alt="" srcset="{{ asset('/assets/images/taxi-263x197.jpg') }}" sizes="(max-width: 263px) 100vw, 263px" />
                                                        <i class="fa fa-plus box-icon-white box-icon-border hover-icon-top-right round"></i>
                                                    </a>
                                                </header>
                                                <div class="thumb-caption">
                                                    <h4 class="thumb-title">Germany</h4>
                                                    <p class="thumb-desc">Cursus faucibus egestas rutrum mauris vulputate consequat ante</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End .row-->
                </div>
                <!--End .container-->
            </div>
        </div>
    </div>
    <!-- end row -->
</div>
@endsection

@section('pageTitle')
Welcome to Hey Stranger
@endsection

@section('addtional_css')
@endsection

@section('jscript')
@endsection