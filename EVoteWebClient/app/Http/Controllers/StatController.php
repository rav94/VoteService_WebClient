<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StatRequest;

use App\Http\Requests;

class StatController extends Controller
{
    public function serviceUri()
    {
        return env('APP_URL');
    }

    public function CreatePollStat(StatRequest $request)
    {
        $url = str_replace(" ", "%20", $this->serviceUri());
        $postdata = json_encode(
            array(
                'PollId' => $request->input('id'),
                'AnswerOneId' => $request->input('option'),
                'AnswerOneId' => $request->input('option'),
                'AnswerOneId' => $request->input('option'),
                'AnswerOneId' => $request->input('option'),
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

        $result = file_get_contents($url.'/stat/create', false, $context);

        if($result == true)
        {
            return redirect('../viewPollPage');
        }
    }

    public function GetAllStat()
    {
        $allStat = file_get_contents($this->serviceUri().'/stat/findStat');
        return $allStat;
    }

    public function GetStatById($id)
    {
        $allStatById = file_get_contents($this->serviceUri().'/stat/findStat'.$id);
        return $allStatById;
    }
    
    public function GetStatByPoll($id)
    {
        $stats = file_get_contents($this->serviceUri().'/stat/getStatByPoll/'.$id);
        return $stat;
    }
}
