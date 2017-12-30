@extends('app')
@section('content')
<div class="global-wrap container-fluid">
    <div class="row">
        <div class="container-fluid">

            <div class="vc_row wpb_row st bg-holder vc_custom_1427261023966 vc_row-has-fill bg-parallax">
                <div class="bg-mask"></div>
                <div class="wpb_column column_container col-md-12">
                    <div class="vc_column-inner wpb_wrapper">
                        <div class="text-center text-white">
                            <h2 class="text-uc mb20">Register with Hey Stranger</h2>
                            <ul class="icon-list list-inline-block mb0 last-minute-rating">
                                <li><i class="fa  fa-star"></i></li>
                                <li><i class="fa  fa-star-o"></i></li>
                                <li><i class="fa  fa-star-o"></i></li>
                                <li><i class="fa  fa-star-o"></i></li>
                                <li><i class="fa  fa-star-o"></i></li>
                            </ul>
                            <h5 class="last-minute-title">List your property and maximize online bookings </h5>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="container">
                    <h3 class="page-title text-center mt60">Packages to Subscribe / Advertise on Hey Stranger</h3>
                </div>

                <div class="gap"></div>
            </div>


            <div class="pricing-wrapper comparison-table clearfix color-blue">

                <div class="col-md-2 pricing-col list-feature">
                    <div class="pricing-card">
                        <div class="pricing-header">
                            <h5>Listing Packages</h5>
                            <p>Compare Package Feature</p>
                        </div>
                        <div class="pricing-feature">
                            @foreach(config('constants.feature') as $val)
                            <li>
                                <p>{{ $val }}</p>
                            </li>
                            @endforeach
                        </div>
                    </div>
                </div>
             @foreach($packages as $package)
                <div class="col-md-2 pricing-col person" style="z-index:1;">				
                    {!!
                    Form::open(
                    array(
                    'name' => 'frm_package',
                    'id' => 'frm_package',
                    'url' => route('listing_detail'),
                    'autocomplete' => 'off',
                    'class' => 'form-horizontal',
                    'files' => false,
                    'method' => 'get'
                    )
                    )
                    !!}
                        <div class="pricing-card">
                            <div class="pricing-header">
                                <h5>{{ (isset($package) && !empty($package) && count($package) > 0 ? $package->name : '') }}</h5>
                                <div class="price-box">
                                    <div class="price">{{ (isset($package) && !empty($package) && count($package) > 0 && $package->package_type == 'P' ? $package->price : $package->commision.'%') }}
                                        <div class="currency">{{ (isset($package) && !empty($package) && count($package) > 0 && $package->package_type == 'P' ? 'R' : '') }}</div>
                                        <div class="plan">+ Vat</div>
                                    </div>
                                </div>
                            </div>
                            <div class="pricing-feature">
                                <li>
                                    <p>
                                        <i class="fa fa-{{ (isset($package) && !empty($package) && count($package) > 0 &&  $package->is_listing1 == 'Y' ? 'check' : 'times') }}"></i>
                                    </p>
                                </li>
                                <li>
                                    <p>
                                        <i class="fa fa-{{ (isset($package) && !empty($package) && count($package) > 0 &&  $package->is_listing2 == 'Y' ? 'check' : 'times') }}"></i>
                                    </p>
                                </li>
                                <li>
                                    <p>
                                        <i class="fa fa-{{ (isset($package) && !empty($package) && count($package) > 0 &&  $package->is_listing3 == 'Y' ? 'check' : 'times') }}"></i>
                                    </p>
                                </li>
                                <li>
                                    <p>
                                        <i class="fa fa-{{ (isset($package) && !empty($package) && count($package) > 0 &&  $package->is_referal == 'Y' ? 'check' : 'times') }}"></i>
                                    </p>
                                </li>
                                <li>
                                    <p>
                                        <i class="fa fa-{{ (isset($package) && !empty($package) && count($package) > 0 &&  $package->is_acco_venu_conf == 'Y' ? 'check' : 'times') }}"></i>
                                    </p>
                                </li>
                                <li>
                                    <p>
                                        <i class="fa fa-{{ (isset($package) && !empty($package) && count($package) > 0 &&  $package->is_transport == 'Y' ? 'check' : 'times') }}"></i>
                                    </p>
                                </li>
                                <li>
                                    <p>
                                        <i class="fa fa-{{ (isset($package) && !empty($package) && count($package) > 0 &&  $package->is_additional == 'Y' ? 'check' : 'times') }}"></i>
                                    </p>
                                </li>

                            </div>
                            <div class="pricing-footer">
                                <br/>
                                {{ Form::input('hidden', 'pkg_id', (isset($package) && !empty($package) && count($package) > 0 ? encrypt($package->id) : ''), ['readonly' => 'readonly']) }}
                                <button type='submit' name='pk1_sub' class="btn btn-act rounded btn-line">
                                    <span>Join</span>
                                    <i class="fa fa-arrow-right"></i>
                                </button>
                            </div>
                        </div>				

                    {!! Form::close() !!}	
                </div>
                @endforeach
            </div>
            <!--<div class="container">
                <h3 class="page-title text-center mt60">Media Packages</h3>
             </div>
           
           <div class="pricing-wrapper comparison-table clearfix color-blue">
                           <div class="col-md-4 pricing-col list-feature">
                             <div class="pricing-card">
                                   <div class="pricing-header">
                                     <h5>Social Banner Packages</h5>
                                     
                                   </div>
                                   <div class="pricing-feature">
                                     <li>
                                           <p>Local</p>
                                     </li>
                                     <li>
                                           <p>Global</p>
                                     </li>
                                     <li>
                                           <p>1000 Ads (40 Ads pd)</p>
                                     </li>
                                     <li>
                                           <p>+50 Free Ads  </p>
                                     </li>
                                     <li>
                                           <p>2000 Ads (80 Ads pd)</p>
                                     </li>
                                     <li>
                                           <p>+125 Free Ads  </p>
                                     </li>
                                     <li>
                                           <p>2500 Ads (100 Ads pd)</p>
                                     </li>
                                      <li>
                                           <p>+175 Free Ads  </p>
                                     </li>
                                      <li>
                                           <p>4000 Ads (160 Ads pd)</p>
                                     </li>
                                      <li>
                                           <p>+375 Free Ads  </p>
                                     </li>
                                    
                                   </div>
                             </div>
                           </div>
                           
                           <div class="col-md-2 pricing-col person">
                             <div class="pricing-card">
                                   <div class="pricing-header">
                                     <h5>Bronze</h5>
                                      <a href="" class="ribbon">
                                           <i class="fa fa-star"></i>
                                           <span>2 Weeks</span>
                                     </a>
                                     <div class="price-box">
                                           <div class="price">R150
                                            
                                             <div class="plan">+ Vat</div>
                                           </div>
                                     </div>
                                   </div>
                                   <div class="pricing-feature">
                                     <li>
                                           <p>
                                             <i class="fa fa-check available"></i>
                                           </p>
                                     </li>
                                     <li>
                                           <p>
                                            <i class="fa fa-times unavailable"></i>
                                           </p>
                                     </li>
                                     <li>
                                           <p>
                                            <i class="fa fa-check available"></i>
                                           </p>
                                     </li>
                                     <li>
                                           <p>
                                            <i class="fa fa-check available"></i>
                                           </p>
                                     </li>
                                     <li>
                                           <p>
                                            <i class="fa fa-times unavailable"></i>
                                           </p>
                                     </li>
                                     <li>
                                           <p>
                                            <i class="fa fa-times unavailable"></i>
                                           </p>
                                     </li>
                                     <li>
                                           <p>
                                            <i class="fa fa-times unavailable"></i>
                                           </p>
                                     </li>
                                      <li>
                                           <p>
                                            <i class="fa fa-times unavailable"></i>
                                           </p>
                                     </li>
                                      <li>
                                           <p>
                                            <i class="fa fa-times unavailable"></i>
                                           </p>
                                     </li>
                                      <li>
                                           <p>
                                            <i class="fa fa-times unavailable"></i>
                                           </p>
                                     </li>
                                    
                                   </div>
                                   <div class="pricing-footer">
                                     <a href="#" class="btn btn-act rounded btn-line">
                                           <span>Join</span>
                                           <i class="fa fa-arrow-right"></i>
                                     </a>
                                   </div>
                             </div>
                           </div>
                           <div class="col-md-2 pricing-col current unlim">
                             <div class="pricing-card">
                                   <div class="pricing-header">
                                     <h5>Silvar</h5>
                                     <a href="" class="ribbon">
                                           <i class="fa fa-star"></i>
                                           <span>Monthly</span>
                                     </a>
                                     <div class="price-box">
                                           <div class="price">R200
                                             
                                             <div class="plan">+ Vat</div>
                                           </div>
                                     </div>
                                   </div>
                                   <div class="pricing-feature">
                                     <li>
                                           <p>
                                             <i class="fa fa-check available"></i>
                                           </p>
                                     </li>
                                     <li>
                                           <p>
                                             <i class="fa fa-times unavailable"></i>
                                           </p>
                                     </li>
                                     <li>
                                           <p>
                                             <i class="fa fa-times unavailable"></i>
                                           </p>
                                     </li>
                                     <li>
                                           <p>
                                             <i class="fa fa-times unavailable"></i>
                                           </p>
                                     </li>
                                     <li>
                                           <p>
                                             <i class="fa fa-check available"></i>
                                           </p>
                                     </li>
                                     <li>
                                           <p>
                                             <i class="fa fa-check available"></i>
                                           </p>
                                     </li>
                                     <li>
                                           <p>
                                            <i class="fa fa-times unavailable"></i>
                                           </p>
                                     </li>
                                    <li>
                                           <p>
                                            <i class="fa fa-times unavailable"></i>
                                           </p>
                                     </li>
                                     <li>
                                           <p>
                                            <i class="fa fa-times unavailable"></i>
                                           </p>
                                     </li>
                                     <li>
                                           <p>
                                            <i class="fa fa-times unavailable"></i>
                                           </p>
                                     </li>
                                   </div>
                                   <div class="pricing-footer">
                                     <a href="#" class="btn btn-act rounded btn-line">
                                           <span>Join</span>
                                           <i class="fa fa-arrow-right"></i>
                                     </a>
                                   </div>
                             </div>
                           </div>
                           <div class="col-md-2 pricing-col business">
                             <div class="pricing-card">
                                   <div class="pricing-header">
                                     <h5>Gold</h5>
                                      <a href="" class="ribbon">
                                           <i class="fa fa-star"></i>
                                           <span>2 Weeks</span>
                                     </a>
                                     <div class="price-box">
                                           <div class="price">R350
                                             
                                             <div class="plan">+ Vat</div>
                                           </div>
                                     </div>
                                   </div>
                                   <div class="pricing-feature">
                                     <li>
                                           <p>
                                             <i class="fa fa-times unavailable"></i>
                                           </p>
                                     </li>
                                     <li>
                                           <p>
                                              <i class="fa fa-check available"></i>
                                           </p>
                                     </li>
                                     <li>
                                           <p>
                                             <i class="fa fa-times unavailable"></i>
                                           </p>
                                     </li>
                                     <li>
                                           <p>
                                            <i class="fa fa-times unavailable"></i>
                                           </p>
                                     </li>
                                     <li>
                                           <p>
                                              <i class="fa fa-times unavailable"></i>
                                           </p>
                                     </li>
                                     <li>
                                           <p>
                                             <i class="fa fa-times unavailable"></i>
                                           </p>
                                     </li>
                                     <li>
                                           <p>
                                           <i class="fa fa-check available"></i>
                                           </p>
                                     </li>
                                     <li>
                                           <p>
                                           <i class="fa fa-check available"></i>
                                           </p>
                                     </li>
                                      <li>
                                           <p>
                                             <i class="fa fa-times unavailable"></i>
                                           </p>
                                     </li>
                                      <li>
                                           <p>
                                             <i class="fa fa-times unavailable"></i>
                                           </p>
                                     </li>
                                   
                                   </div>
                                   
                                   <div class="pricing-footer">
                                     <a href="#" class="btn btn-act rounded btn-line">
                                           <span>Join</span>
                                           <i class="fa fa-arrow-right"></i>
                                     </a>
                                   </div>
                             </div>
                           </div>
                           <div class="col-md-2 pricing-col business">
                             <div class="pricing-card">
                                   <div class="pricing-header">
                                     <h5>Platinum</h5>
                                      <a href="" class="ribbon">
                                           <i class="fa fa-star"></i>
                                           <span>Monthly</span>
                                     </a>
                                     <div class="price-box">
                                           <div class="price">R500
                                            
                                             <div class="plan">+ Vat</div>
                                           </div>
                                     </div>
                                   </div>
                                   <div class="pricing-feature">
                                     <li>
                                           <p>
                                             <i class="fa fa-times unavailable"></i>
                                           </p>
                                     </li>
                                     <li>
                                           <p>
                                            <i class="fa fa-check available"></i>
                                           </p>
                                     </li>
                                     <li>
                                           <p>
                                             <i class="fa fa-times unavailable"></i>
                                           </p>
                                     </li>
                                     <li>
                                           <p>
                                            <i class="fa fa-times unavailable"></i>
                                           </p>
                                     </li>
                                     <li>
                                           <p>
                                              <i class="fa fa-times unavailable"></i>
                                           </p>
                                     </li>
                                     <li>
                                           <p>
                                            <i class="fa fa-times unavailable"></i>
                                           </p>
                                     </li>
                                     <li>
                                           <p>
                                             <i class="fa fa-times unavailable"></i>
                                           </p>
                                     </li>
                                     <li>
                                           <p>
                                             <i class="fa fa-times unavailable"></i>
                                           </p>
                                     </li>
                                     <li>
                                           <p>
                                             <i class="fa fa-check available"></i>
                                           </p>
                                     </li>
                                     <li>
                                           <p>
                                             <i class="fa fa-check available"></i>
                                           </p>
                                     </li>
                                    
                                   </div>
                                   <div class="pricing-footer">
                                     <a href="#" class="btn btn-act rounded btn-line">
                                           <span>Join</span>
                                           <i class="fa fa-arrow-right"></i>
                                     </a>
                                   </div>
                             </div>
                           </div>
                           
                     </div>-->


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