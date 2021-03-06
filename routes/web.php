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
    $threads=App\Thread::paginate(15);
    return view('welcome',compact('threads'));
});

Auth::routes();

Route::resource('/thread', 'ThreadController');
Route::resource('comment', 'CommentController',['only'=>['update','destroy']]);
Route::get('/stats', 'HomeController@index')->name('stats');
Route::post('comment/create/{thread}','CommentController@addThreadComment')->name('threadcomment.store');

Route::get('login/github', 'Auth\LoginController@redirectToProvider');
Route::get('login/github/callback', 'Auth\LoginController@handleProviderCallback');

Route::get('/user/profile/{user}', 'UserProfileController@index')->name('user_profile');