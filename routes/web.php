<?php
use App\Models\User;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

//static-pages routes
Route::get('/', 'StaticPagesController@home')->name('home');
Route::get('/help', 'StaticPagesController@help')->name('help');
Route::get('/contact', 'StaticPagesController@contact')->name('contact');

//login & logout routes  and  the management of users
Route::get('/signup','UsersController@create')->name('signup');
Route::resource('users','UsersController',['except'=>'index']);
Route::get('/users',['middleware'=>['role:Admin'],'uses'=>'UsersController@index'])->name('users.index');

Route::get('login','SessionsController@create')->name('login');
Route::post('login','SessionsController@store')->name('login');
Route::delete('logout', 'SessionsController@destroy')->name('logout');

Route::get('signup/confirm/{token}','UsersController@confirmEmail')->name('confirm_email');

Route::get('password/email', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.reset');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.edit');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

//forum routes
Route::group(['middleware' => 'auth', 'namespace' => 'Admin', 'prefix' => 'admin'], function() {
    //Route::get('/', 'HomeController@index');
    Route::resource('/forum', 'ForumController');
});

Route::post('comment', 'CommentController@store');

//add some filters

Route::group(['middleware'=>'auth'],function(){
	Route::get('/monitor','MonitorController@index')->name('monitor');
	Route::get('/monitor/city',
    ['middleware'=>['permission:city_visit'],'uses'=>'MonitorController@city']
    )->name('monitor_city');
  Route::get('/monitor/county',
    ['middleware' => ['permission:county_visit'],'uses'=>'MonitorController@county']
    )->name('monitor_county');
});



//upload module
// 在这一行下面
Route::get('admin/upload', 'Admin\UploadController@index')->name('uploads');

// 添加如下路由
Route::post('admin/upload/file', 'Admin\UploadController@uploadFile');
Route::delete('admin/upload/file', 'Admin\UploadController@deleteFile');
Route::post('admin/upload/folder', 'Admin\UploadController@createFolder');
Route::delete('admin/upload/folder', 'Admin\UploadController@deleteFolder');
