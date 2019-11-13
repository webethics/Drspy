<?php

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group([ 'prefix' => 'admin','middleware' => 'admin'], function () {

	/*Route for the base functions*/
	Route::get('/','admin\AdminController@index');
	Route::get('logout', 'admin\AdminController@logout');
	Route::post('/import-excel/import', 'admin\ImportExcelController@import');
	Route::get('/change-password', 'admin\AdminController@changepassword');
	Route::post('/changePassword','admin\AdminController@password_change');

	/*Routes for ali express sites*/
	Route::get('/aebestseller', 'admin\AliexpressController@Aebestseller');
	Route::get('/aedropshipping', 'admin\AliexpressController@Aedropshipping');
	Route::get('/aemostwished', 'admin\AliexpressController@Aemostwished');
	Route::get('/aehandpicked', 'admin\AliexpressController@Aehandpicked');
	Route::get('/aeuploadaecsv', 'admin\AliexpressController@uploadaecsv');
	Route::get('/category-edit/{mid}/{id}', 'admin\AliexpressController@aecategory_edit');
	Route::post('/savecategoryedit', 'admin\AliexpressController@savecategorydata');
	Route::get('/category_delete/{id}', 'admin\AliexpressController@deletecategory');
	/*Routes to get ali expres functionalities end*/

	/*Routes for wish sites start*/
	Route::get('/wish_bestseller', 'admin\WishController@wishBestSeller');
	Route::get('/upload-wish-csv', 'admin\WishController@uploadwishcsv');
	Route::get('/wish_category_delete/{id}', 'admin\WishController@wishcategorydelete');
	Route::get('/wish-category-edit/{mid}/{id}', 'admin\WishController@wishcategoryedit');
	Route::post('/savewishcategoryedit', 'admin\WishController@savewishcategoryedit');
	/*Wish routes end*/

	/*Route for the Users controller*/
	Route::get('/users-details', 'admin\UsersController@usersdetails');
	Route::get('/user/edit/{id}', 'admin\UsersController@editUser');
	Route::get('/user/adduser', 'admin\UsersController@adduser');
	Route::post('/user/admin-user-edit', 'admin\UsersController@saveuser');
	Route::post('/user/admin-save-user', 'admin\UsersController@admin_save_user');
	Route::get('/deleteuser/{id}', 'admin\UsersController@deleteuser');
	Route::post('/user/enableuser/{id}', 'admin\UsersController@enable_disableuser');
	Route::post('/user/disableuser/{id}', 'admin\UsersController@enable_disableuser');
	/*Route end for the Users controller*/

	/*Manage Plan routes*/
	Route::get('/plan/manage-plan', 'admin\PlanController@index');
	Route::get('/plan/add-plan', 'admin\PlanController@addplan');
	Route::post('/plan/create-plan', 'admin\PlanController@create_plan');
	Route::get('/plan/edit/{id}', 'admin\PlanController@editplan');
	Route::post('/plan/edit-submit-plan', 'admin\PlanController@editplansubmit');
	/*Manage Plan routes ends*/

	/*Cron file routes*/
	Route::get('/upadte_data_csv', 'admin\ImportExcelController@Updatecsvdata');

	/*Test route*/
	Route::post('/import-excel/import1', 'admin\ImportWishController@Updatecsvdata');
	Route::get('/download_json', 'admin\WishController@download_json_data');

});

Route::group(['prefix' => 'admin'], function () {
	Route::post('checklogin','admin\AdminController@checklogin');
	Route::get('login', 'admin\AdminController@login');
});

Route::fallback(function () {
    return view('welcome');
});
