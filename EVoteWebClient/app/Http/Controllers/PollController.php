<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use App\Http\Requests;
use App\Http\Requests\PollRequest;

class PollController extends Controller
{
    public function serviceUri()
    {
        return env('APP_URL');
    }

    public function CreatePoll(PollRequest $request)
    {
        $url = str_replace(" ", "%20", $this->serviceUri());
        $postdata = json_encode(
            array(
                'Title' => $request->input('title'),
                'UserId' => $request->input('id'),
                'AnswerOne' => $request->input('answer_one'),
                'AnswerTwo' => $request->input('answer_two'),
                'AnswerThree' => $request->input('answer_three'),
                'AnswerFour' => $request->input('answer_four')
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

        $result = file_get_contents($url.'/poll/create', false, $context);

        if($result == true)
        {
            return redirect('../addPoll');
        }

    }

    public function GetAllPollByUserId()
    {
        //s = Input::get('id');
        //$respone = \Guzzle::get($this->url().'alerts/findUserAlerts/'.$ID);
    }

    public function GetAllPoll()
    {
        $allPoll = file_get_contents($this->serviceUri().'/poll/findPoll');
        return $allPoll;
    }

    public  function  GetAnswerByPoll($id)
    {
        $answers = file_get_contents($this->serviceUri().'/poll/getAnswerByPoll/'.$id);
        return $answers;
    }
}
