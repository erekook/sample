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

Route::get('/', 'StaticPagesController@home');
Route::get('/help', 'StaticPagesController@help')->name('help');
Route::get('/contact', 'StaticPagesController@contact')->name('contact');
Route::get('/signup','UsersController@create')->name('signup');
Route::resource('users','UsersController');

Route::get('login','SessionsController@create')->name('login');
Route::post('login','SessionsController@store')->name('login');
Route::delete('logout', 'SessionsController@destroy')->name('logout');

Route::get('signup/confirm/{token}','UsersController@confirmEmail')->name('confirm_email');

Route::get('password/email', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.reset');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.edit');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

Route::group(['middleware' => 'auth', 'namespace' => 'Admin', 'prefix' => 'admin'], function() {
    //Route::get('/', 'HomeController@index');
    Route::resource('/forum', 'ForumController');
});

Route::post('comment', 'CommentController@store');
//function(){return view('monitor.city');}

Route::group(['middleware'=>'auth'],function(){
	Route::get('/monitor','MonitorController@index')->name('monitor');
	Route::get('/monitor/city','MonitorController@city')->name('monitor_city');
  Route::get('/monitor/county','MonitorController@county')->name('monitor_county');
});

Route::get('/secret', function()
{
    //Auth::loginUsingId(1);

    //$user = Auth::user();
    $user=User::find(1);
    if ($user->hasRole('Admin'))
    {
        return 'you are admin';
    }

    return 'you are a normal person';
});
