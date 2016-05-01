<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StatRequest;


use App\Http\Requests;
use Illuminate\Support\Facades\Input;

class StatController extends Controller
{
    public function serviceUri()
    {
        return env('APP_URL');
    }

    public function CreatePollStat(Request $request)
    {
        $value1 = 0;
        $value2 = 0;
        $value3 = 0;
        $value4 = 0;

        if($request->input('Answer1') != null)
        {
            $value1 = 1;

        }
        if($request->input('Answer2') != null)
        {
            $value2 = 1;

        }
        if($request->input('Answer3') != null)
        {
            $value3 = 1;

        }
        if($request->input('Answer4') != null)
        {
            $value4 = 1;
        }
        //return $request->input('Answer1');
        $url = str_replace(" ", "%20", $this->serviceUri());
        $postdata = json_encode(
            array(
               'PollId' => $request['pollids'],
                'AnswerOneId' => $value1,
                'AnswerTwoId' => $value2,
                'AnswerThreeId' => $value3,
                'AnswerFourId' => $value4,
//                'PollId' => $request->input('pollids'),
//                'AnswerOneId' => $request->input('Answer1'),
//                'AnswerOneId' => $request->input('Answer2'),
//                'AnswerOneId' => $request->input('Answer3'),
//                'AnswerOneId' => $request->input('Answer4'),
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
        return $stats;
    }
    
    public function UpdatePollStat()
    {
        $value = "";
        $poll = Input::get('pollids');

        if(Input::get('AnswerType') == "Answer1")
        {
            $value = 'Answer1';

        }
        if(Input::get('Answer2') == "Answer2")
        {
            $value = 'Answer2';

        }
        if(Input::get('Answer3') == "Answer3")
        {
            $value = 'Answer3';

        }
        if(Input::get('Answer4') == "Answer4")
        {
            $value = 'Answer4';
        }

        $url = str_replace(" ", "%20", $this->serviceUri());
//        $postdata = json_encode(
//            array(
//                'PollId' => $request['pollids'],
//                'AnswerOneId' => $value,
//                'AnswerTwoId' => $value,
//                'AnswerThreeId' => $value,
//                'AnswerFourId' => $value,
////                'PollId' => $request->input('pollids'),
////                'AnswerOneId' => $request->input('Answer1'),
////                'AnswerOneId' => $request->input('Answer2'),
////                'AnswerOneId' => $request->input('Answer3'),
////                'AnswerOneId' => $request->input('Answer4'),
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

//        $context = stream_context_create($opts);

        $result = file_get_contents($url.'/stat/update/'.$poll.'/'.$value);

        if($result == true)
        {
            return redirect('../viewPollPage');
        }
    }
}
