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
    return view('Home.index'); //Return to index page
});

Route::get('/viewPoll', function () {

    $allPoll [] = file_get_contents(env('APP_URL').'/poll/findPoll');

    return view('Home.viewPoll', ['polls' => $allPoll]); //Poll Viewing Functionality
});

Route::get('/login', function()
{
    return view('Home.login'); //User Login Page
});

Route::get('/viewPollPage', function(){
    return view('Home.viewPoll');
});



//UserController
Route::post('user/createUser', 'UserController@Create'); //User Sign Up Function
Route::post('user/log', 'UserController@Log'); 


//PollController
Route::get('addPoll', function()
{
    return view('Home.addPoll'); //Addition of Poll Page
});
Route::post('poll/createPoll', 'PollController@CreatePoll'); //Poll Creation
Route::get('findPolls', 'PollController@GetAllPoll'); //Obtaining All Available Polls and Answers
Route::get('findPollAnswer/{id}', 'PollController@GetAnswerByPoll'); //Obtaining Poll Details By Id, plus the answers


//Stat Controller
Route::get('poll/createPollStat', 'StatController@CreatePollStat'); //Create Poll Statistics
Route::get('poll/updatePollStat', 'StatController@UpdatePollStat'); //Update Poll Statistics
Route::get('findStats', 'StatController@GetAllStat'); //Obtaining All Available Statistics
Route::get('findStatsById/{id}', 'StatController@GetStatById'); //Obtain Stat Based on Id
Route::get('findStatByPoll/{id}', 'StatController@GetStatByPoll'); //Obtaining Stat Details By Poll Id.


