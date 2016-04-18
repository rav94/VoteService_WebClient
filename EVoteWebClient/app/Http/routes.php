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

Route::get('login', function()
{
    return view('Home.login');
});


//UserController
Route::post('user/createUser', 'UserController@CreateUser');


//PollController
Route::get('addPoll', function()
{
    return view('Home.addPoll');
});
Route::post('poll/createPoll', 'PollController@CreatePoll');
Route::get('findPolls', 'PollController@GetAllPoll');
Route::get('findPollAnswer/{id}', 'PollController@GetAnswerByPoll');

