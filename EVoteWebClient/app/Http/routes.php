<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Client Side Routes
Route::get('/', function () {
    return view('Home.index');
});

Route::get('/viewPoll', function () {

    $allPoll [] = file_get_contents(env('APP_URL').'/poll/findPoll');

    return view('Home.viewPoll', ['polls' => $allPoll]);
});


//User Routes --> Admin Side
Route::get('user', 'UserController@index');
Route::post('user/create','UserController@Create');
Route::post('user/log','UserController@Log');
Route::get('user/login','UserController@Login');
Route::get('user/logout','UserController@Logout');
Route::get('user/viewMyPoll', function() {
    return view('Home.viewMyPolls');
});

//Poll Routes --> Client Side/ Admin Side
Route::post('poll/createPoll', 'PollController@CreatePoll');
Route::get('findPollById', 'PollController@GetAllPollById');
Route::get('findPolls', 'PollController@GetAllPoll');
