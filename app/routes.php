<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
//admin views namespace
View::addNamespace('admin', __DIR__.'/views/admin');

Route::group(array('before' => 'auth', 'prefix' => 'admin'), function(){
    Route::get("/", 'DashboardController@index');
    Route::get('users/group/detach/{group_id}/{user_id}', 'UsersController@removeGroup');
    Route::resource('users', 'UsersController');
    Route::resource('groups', 'GroupsController');
});

Route::get("/login", function(){
    return View::make('login');
});

Route::post("/login", function(){
    $credentials = Input::only("username","password");
    if(Auth::attempt($credentials)){
        return Redirect::intended("/")->with('success', 'Logged in successfully!')->with('user', Auth::user());
    }else{
        return Redirect::to("/login")->with('error', 'Login faild!')->withInput();
    }
});

Route::get('/logout', function(){
    Auth::logout();
    return Redirect::to('/')->with('flash_notice', 'You are successfully logged out.');
});

Route::any("{path?}", "PageController@index")->where('path', '.+');;
