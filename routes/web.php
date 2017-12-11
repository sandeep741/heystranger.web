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
Route::GET('dashboard', 'AdminController@index')->name('dashboard');
Route::GET('admin', 'Admin\LoginController@showLoginForm')->name('admin.login');
Route::POST('admin', 'Admin\LoginController@login');
Route::POST('admin-password/email', 'Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.login');
Route::GET('admin-password/reset', 'Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
Route::POST('admin-password/reset', 'Admin\ResetPasswordController@reset');
Route::GET('admin-password/reset{token}', 'Admin\ResetPasswordController@showRequestForm')->name('admin.password.reset');
Route::post('logouts', 'Admin\LoginController@logout')->name('admin.logout');
Route::resource('accommlist', 'Admin\AccommListController');

/////////////routes for user////////////
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

/////////////routes for Partner////////////
Route::GET('partner', 'PartnerController@index')->name('partner');
Route::GET('accommodations', 'PartnerController@index');
Route::resource('accomodation', 'Partner\AccommodationController');
