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



/*Login Register Controller Here*/
  Route::get('user/account-page/{id}', 'user\dashboardController@account_detail_page');
  Route::get('/pricing', 'user\dashboardController@pricing_page');
  
Route::group([ 'prefix' => '','middleware' => 'user'], function () {

  /*Profile Routes get started*/
  Route::get('/logout', 'user\UserController@logout');
  Route::get('/account-setting', 'user\ManageaccountController@accountsetting');
  Route::get('/account-settings/{id}', 'user\dashboardController@accountsettings');
  Route::post('/account_data_submit', 'user\dashboardController@account_user_update');
  Route::post('/account_change_password', 'user\dashboardController@account_change_password');
 

  /*Profile dashboard routes*/
  Route::get('user/dashboard', 'user\dashboardController@index');
  Route::get('user/detail-page/{sid}/{mid}', 'user\dashboardController@product_detail_page');

  /*profile routes*/
  Route::post('profile-update', 'user\ManageaccountController@profile_update');

  /*Plan section route start*/
  Route::get('/successpayment', 'user\UserController@success_payment');

  /* Dashboard Controller Starts*/
  Route::get('/dashboard/edit/{id}', 'user\dashboardController@user_edit');
  Route::get('/dashboard/delete/{id}', 'user\dashboardController@delete_user');
  Route::post('/edit_submit', 'user\dashboardController@user_update');
  Route::get('/return_theme', 'user\sitewizardController@return_theme');


  /*Route for the Registration pages */
  Route::post('user/submit-account-details', 'user\UserController@submit_ac_details');
  Route::get('user/refer-page', 'user\dashboardController@refer_page');

});

/*Routes that dont require login*/
Route::get('/login','user\UserController@index');
Route::get('register','user\UserController@register');
Route::get('/verify/{id}', 'user\UserController@verify');
Route::post('user/checklogin','user\UserController@check_login');

Route::post('user/checkregister','user\UserController@register_user');
Route::get('/forgot-password', 'user\UserController@forgot_password');
Route::post('/forgot-password-email', 'user\UserController@forgot_password_email');
Route::get('/reset-password/{id}', 'user\UserController@reset_password');
Route::post('/save-reset-password', 'user\UserController@save_reset_password');
Route::post('user/checkemail', 'user\UserController@verifyregistrationemail');

/*Social auth routes*/
Route::get('/redirect/{service}', 'SocialAuthFacebookController@redirect');
Route::get('/callback/{service}', 'SocialAuthFacebookController@callback');

Route::fallback(function () {
    return view('welcome');
});


Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});
