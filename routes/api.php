<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('ajax/serial', 'Api\AjaxController@serial')->name('ajax.serial');
Route::post('ajax/edit-column', 'Api\AjaxController@editColumn')->name('ajax.edit-column');
Route::post('ajax/upload-image', 'Api\AjaxController@uploadImage')->name('ajax.upload-image');
Route::post('ajax/delete-image', 'Api\AjaxController@deleteImage')->name('ajax.delete-image');
Route::post('ajax/enable-column', 'Api\AjaxController@enableColumn')->name('ajax.enable-column');
Route::post('ajax/show-district', 'Api\AjaxController@showDistrict')->name('ajax.show-district');
Route::post('ajax/get-custom-field', 'Api\AjaxController@getCustomField')->name('ajax.get-custom-field');
Route::post('ajax/save-custom-fields', 'Api\AjaxController@saveCustomFields')->name('ajax.save-custom-fields');
Route::post('ajax/update-content-custom-field', 'Api\AjaxController@updateContentCustomField')->name('ajax.update-content-custom-field');
Route::post('ajax/submit-setting-theme', 'Api\AjaxController@submitSettingTheme')->name('ajax.submit-setting-theme');
