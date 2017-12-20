<?php

/*
  |--------------------------------------------------------------------------
  | Web Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register web routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | contains the "web" middleware group. Now create something great!
  |
 */

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

/* Route::get('admin', [
  'as' => 'admin',
  'uses' => 'Admin\LoginController@index'
  ]
  );

  Route::post('login', [
  'as' => 'admin_login',
  'uses' => 'Admin\LoginController@login'
  ]
  );

  Route::get('forgot-password', [
  'as' => 'forgot_password',
  'uses' => 'Admin\LoginController@forgotPassword'
  ]
  );

  Route::get('dashboard', [
  'as' => 'admin_dashboard',
  'uses' => 'Admin\DashboardController@index'
  ]
  );

  Route::resource('accomodation', 'AccommodationController'); */

/////////////routes for admin user////////////
Route::get('dashboard', 'AdminController@index')->name('dashboard');
Route::get('admin', 'Admin\LoginController@showLoginForm')->name('admin.login');
Route::post('admin', 'Admin\LoginController@login');
Route::post('admin-password/email', 'Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.login');
Route::get('admin-password/reset', 'Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
Route::post('admin-password/reset', 'Admin\ResetPasswordController@reset');
Route::get('admin-password/reset{token}', 'Admin\ResetPasswordController@showRequestForm')->name('admin.password.reset');
Route::post('logouts', 'Admin\LoginController@logout')->name('admin.logout');
Route::resource('accommlist', 'Admin\AccommListController');
Route::resource('amenitylist', 'Admin\AmenityListController');
Route::resource('activitylist', 'Admin\ActivityListController');
Route::resource('roomlist', 'Admin\RoomListController');
Route::resource('paymentmodelist', 'Admin\PaymentModeListController');
Route::resource('surroundinglist', 'Admin\SurroundingListController');

/////////////routes for user////////////
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

/////////////routes for Partner////////////
Route::get('partner', 'PartnerController@index')->name('partner');
Route::get('accommodations', 'PartnerController@index');
Route::resource('accomodation', 'Partner\AccommodationController');
Route::post('room_detail', 'Partner\AccommodationController@roomDetail')->name('room-detail');
Route::post('activity_detail', 'Partner\AccommodationController@activityDetail')->name('activity-detail');
Route::post('policy-detail', 'Partner\AccommodationController@policyDetail')->name('policy-detail');


/////////////Routes for Ajax////////////

Route::prefix('ajax')->group(function () {
    
    //Route::get('getState', 'AjaxController@getState');
        
});


Route::group(['prefix' => 'ajax', 'middleware' => 'web'], function() {
    Route::get('getState', [
        'as' => 'get_state',
        'uses' => 'AjaxController@getState'
            ]
    );
    
    Route::get('getCity', [
        'as' => 'get_city',
        'uses' => 'AjaxController@getCity'
            ]
    );
});
