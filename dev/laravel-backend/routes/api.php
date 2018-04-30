<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

// Route::group(['middleware' => ['jwt.auth']], function() {
//     Route::post('auth', 'AuthenticateController@authAPI');
// });

// API User Registration Route
Route::post('register', 'RegisterController@register');

// API User Registration Route
Route::post('registration', 'RegisterController@registerAPI');

// API Authentication Route
Route::post('auth', 'AuthenticateController@authAPI');

// API Authentication Route Test
Route::post('authtest', 'RegisterController@APIRegTest');

// API Authentication Token Refresh Route
Route::get('token', 'AuthenticateController@tokenRefresh');

// API BranchOffice Route
Route::get('branchoffice', 'BranchOfficeController@index');

// API Cultivation Route
Route::resource('cultivation', 'CultivationController');

// API File Route
Route::resource('file', 'LoadFileController');

// API CreditRequest Route
Route::resource('creditrequest', 'CreditRequestController');

// API Credit Route
Route::resource('credit', 'CreditController');

// API Base64 Route
Route::post('base64', 'LoadFileController@storeBase64');

// API Credit Balance Route
Route::resource('balance', 'BalanceController');

// API Credits Ministry Route
Route::resource('creditministry', 'CreditMinistryController');

// API Credits Ministry Route By userid and ministryId
Route::get('creditministry/{userid}/{ministryid}', 'CreditMinistryController@show');

// API Ministry Cash Request
Route::resource('ministrycashrequest', 'MinistryCashRequestController');

// API Ministry Supplies Request
Route::resource('ministrysupplyrequest', 'MinistrySuppliesRequestController');

// API Ministry Orders
Route::resource('ministryorders', 'MinistryOrderController');

// API Banner Route
Route::post('banner/{order}', 'BannerController@store');
Route::get('banner/{id}', 'BannerController@show');

// API SendInfo advertising
Route::resource('sendinfo', 'SendInfoController');

// API Transactions Routes
Route::resource('transaction', 'TransactionController');
