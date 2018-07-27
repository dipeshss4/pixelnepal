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

Route::get('login-admin','AdminLoginController@adminLogin')->name('admin.login');
Route::post('login-admin','AdminLoginController@login');
Auth::routes();
Route::get('auth/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('dashboard/{provider}/callback', 'Auth\LoginController@handleProviderCallback');
Route::get('dashbaord/{provider}/callback', 'Auth\LoginController@handleProviderCallback');



Route::group(
    [
        'middleware'    => 'Admin',
        'namespace'     => 'Admin',
        'prefix'        => 'admin'
    ],
    function ()
    {
       Route::get('/','AdminController@dashboard')->name('admin');
       Route::resource('category','CategoryController');
       Route::resource('product','ProductController');
       Route::Resource('slider','SliderController');
       Route::Resource('gallery','GalleryController');


    }
);

Route::group(
    [    'middleware'    => 'auth',
        'namespace' => 'Front'
    ],
    function (){
       Route::get('dashboard','FrontendController@dashboard')->name('dashboard');
    });






