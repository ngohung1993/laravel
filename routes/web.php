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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/{category_slug}/{content_slug?}', 'HomeController@show')->name('show')->where(['category_slug' => '^(?!admin)(?!theme-demo)[a-z0-9-]+$']);
Route::get('/theme', 'HomeController@theme')->name('theme');
Route::get('/theme-demo/{product_slug}', 'HomeController@themeDemo')->name('theme-demo');
Route::post('/send/email', 'HomeController@sendMail')->name('sendmail');
Route::prefix('admin')->group(function () {
    Route::get('/', 'Admin\AdminController@index')->name('admin.index');
    Route::get('login', 'Auth\Admin\LoginController@login')->name('admin.login');
    Route::post('login', 'Auth\Admin\LoginController@store')->name('admin.store');
    Route::get('dashboard', 'Admin\AdminController@index')->name('admin.dashboard');
    Route::post('logout', 'Auth\Admin\LoginController@logout')->name('admin.logout');
    Route::get('themes/editor', 'Admin\ThemesController@editor')->name('admin.theme.editor');
    Route::get('products/realestate', 'Admin\ProductsController@realestate')->name('admin.products.realestate');
    Route::get('products/sell', 'Admin\ProductsController@sell')->name('admin.products.sell');
    Route::resource('pages', 'Admin\PagesController');
    Route::resource('menus', 'Admin\MenusController');
    Route::resource('posts', 'Admin\PostsController');
    Route::resource('orders', 'Admin\OrdersController');
    Route::resource('backups', 'Admin\BackupsController');
    Route::resource('themes', 'Admin\ThemesController');
    Route::resource('library', 'Admin\LibraryController');
    Route::resource('products', 'Admin\ProductsController');
    Route::resource('utilities', 'Admin\UtilitiesController');
    Route::resource('categories', 'Admin\CategoriesController');
    Route::resource('classifieds', 'Admin\ClassifiedsController');
    Route::resource('custom-fields', 'Admin\CustomFieldsController');
    Route::resource('location-menus', 'Admin\LocationMenusController');
});
