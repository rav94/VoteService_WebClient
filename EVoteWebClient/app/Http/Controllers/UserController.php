<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    public function serviceUri()
    {
        return env('APP_URL');
    }
    
    public function CreateUser(UserRequest $request)
    {
//        $url = str_replace(" ", "%20", $this->serviceUri());
//        $postdata = json_encode(
//            array(
//                'UserName' => $request->input('name'),
//                'UserEmail' => $request->input('email'),
//                'UserPassword' => $request->input('password')
//            )
//        );
//
//        $opts = array('http' =>
//            array(
//                'method'  => 'POST',
//                'header'  => 'Content-type: application/json',
//                'content' => $postdata
//            )
//        );
//
//        $context = stream_context_create($opts);
//
//        $result = file_get_contents($url.'user/create', false, $context);

    }

    public function a(UserRequest $request)
   {
//                $url = str_replace(" ", "%20", $this->serviceUri());
//        $postdata = json_encode(
//            array(
//                'UserName' => $request->input('name'),
//                'UserEmail' => $request->input('email'),
//                'UserPassword' => $request->input('password')
//            )
//        );
//
//        $opts = array('http' =>
//            array(
//                'method'  => 'POST',
//                'header'  => 'Content-type: application/json',
//                'content' => $postdata
//            )
//        );
//
//        $context = stream_context_create($opts);
//
//        $result = file_get_contents($url.'user/create', false, $context);
// return $request;
    }

//    public function getAllUsers()
//    {
//        $userDetails = file_get_contents($this->serviceUri().'user/findUser');
//        return $userDetails;
//    }
//
    public function Log(UserRequest $request)
    {
//        //session_destroy();
//        $email =  $request->input('email');
//        $password = $request->input('password');
//
//        $userDetails = file_get_contents($this->serviceUri().'/user/findUser/'.$email);
//
//        $userData = json_decode($userDetails);
//
//        session_start();
//
//        $_SESSION['email'] = $userData->UserEmail;
//        $_SESSION['id'] = $userData->UserId;

        return view('Home.addPoll');
    }

    public function  Create(UserRequest $req)
    {
        $url = str_replace(" ", "%20", $this->serviceUri());
        $postdata = json_encode(
            array(
              'UserName' => $req->input('name'),
                'UserEmail' => $req->input('email'),
                'UserPassword' => $req->input('password')
            )
        );

        $opts = array('http' =>
            array(
                'method'  => 'POST',
                'header'  => 'Content-type: application/json',
                'content' => $postdata
           )
        );

        $context = stream_context_create($opts);

        $result = file_get_contents($url.'/user/create', false, $context);
    }


        
}
