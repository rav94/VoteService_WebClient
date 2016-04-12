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
    
    public function Create(UserRequest $request)
    {
        $url = str_replace(" ", "%20", $this->serviceUri());
        $postdata = json_encode(
            array(
                'UserName' => $request->input('name'),
                'UserEmail' => $request->input('email'),
                'UserPassword' => $request->input('password')
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

        if ($result == true)
        {
            return view('Home.login');
        }
        else
        {
            echo ('Error in Creating the user!');
        }
    }

    public function getAllUsers()
    {
        $userDetails = file_get_contents($this->serviceUri().'user/findUser');
        return $userDetails;
    }

    public function Log()
    {
        $userDetails = file_get_contents($this->serviceUri().'/user/findUser');
        return $userDetails;
    }

    public function LogIn()
    {
        return view ('Home.login');
    }
        
}
