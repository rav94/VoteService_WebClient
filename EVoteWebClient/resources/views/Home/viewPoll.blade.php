@extends('Home.layout')

        <!-- Navigation -->
<nav class="navbar navbar-default navbar-fixed-top topnav" role="navigation">
    <div class="container topnav">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand topnav" href="../">E-Vote</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="../">Home</a>
                </li>
                <li>
                    <a href="../viewPoll">View Live Polls</a>
                </li>
                <li>
                    <a href="../login">Login</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>

@section('content')
    <div class="intro-header">
        <div class="container">
            <br>
            <p>Please Select a Poll to Vote:</p>
            <form role="form">
                <div class="form-group">
                    <label for="sel1">Available Polls</label><br>
                    <select class="form-control" id="poll" onchange="GetTitle(this)">
                        {{--//Obtain Data from JS--}}
                    </select>
                </div>
            </form>
        </div>
    </div>

    <div class="content-section-a">

        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-sm-6">
                    <hr class="section-heading-spacer">
                    <div class="clearfix"></div>

                    <form role="form" id="frm" enctype="application/json" >
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 id="pollText" class="panel-title">Please Select a Poll</h3>
                        </div>
                        <div class="panel-body">
                            <?php $i = 1; ?>

                            <ul class="list-group" id="list">
                                <p>Please Select a Poll to View Answers!</p>

                            </ul>

                            <ul>
                                <input type="hidden" id="pollIdHidden" name="pollids"  >
                                <input type="hidden" id="Answer1" name="Answer1"  >
                                <input type="hidden" id="Answer2" name="Answer2"  >
                                <input type="hidden" id="Answer3" name="Answer3"  >
                                <input type="hidden" id="Answer4" name="Answer4"  >
                            </ul>
                        </div>


                        <div class="panel-footer text-center">
                            <input type="submit" class="btn btn-primary btn-block btn-sm" name="vote-submit" id="vote-submit" value="Vote">
                        </div>
                    </div>
                    </form>
                </div>
                <div class="col-lg-5 col-lg-offset-2 col-sm-6 barseter">
                    <hr class="section-heading-spacer">
                    <div class="clearfix"></div>
                    <div id="bar-example"></div>
                </div>
            </div>

        </div>
        <!-- /.container -->
    </div>
    <!-- /.content-section-a -->

    <?php
        $selectedValueId; //Global Variable to set the poll id
        $selected_value; //Global Variable
    ?>

    <script>
        $(document).ready(function(){
            $('#list').change(function(){
                $selected_value = $("input[name='option']:checked").val();
//                console.log($selected_value);
            });
        });
    </script>

    <script>
//
    </script>
    <script>

        $(document).ready(function () {
            $.ajax({
                dataType: 'json',
                url: "../findPolls",
                type: "get",
                success: function (json) {
                    $("#poll").html("");
                    $("#poll").append("<option value= >Please Select a Poll</option>");
                    for(key in json)
                        $("#poll").append("<option value= '"+ json[key].Id +"'>"+json[key].Title+"</option>");

                }
            });
        });

        function GetTitle(info) {
            var selectedText = info.options[info.selectedIndex].innerHTML;
            var selectedValue = info.value;
            $selectedValueId = selectedValue;
            pollText.innerHTML = selectedText;
            $('#pollIdHidden').val(selectedValue);

            $.ajax({
                dataType: 'json',
                url: "../findPollAnswer/"+selectedValue,
                type: "get",
                success: function (json) {
                    $("#list").html("");
                    for (key in json) {
                        console.log(json);
                        $("#list").append("<li class='list-group-item' id='option1'><div class='radio'><label><input type='radio' name='option' value='1' id='answer1'> " + json[key].AnswerOne + " </label> </div> </li>");
                        $("#list").append("<li class='list-group-item' id='option2'><div class='radio'><label><input type='radio' name='option' value='2' id='answer2'> " + json[key].AnswerTwo + " </label> </div> </li>");
                        $("#list").append("<li class='list-group-item' id='option3'><div class='radio'><label><input type='radio' name='option' value='3' id='answer3'> " + json[key].AnswerThree + " </label> </div> </li>");
                        $("#list").append("<li class='list-group-item' id='option4'><div class='radio'><label><input type='radio' name='option' value='4' id='answer4'> " + json[key].AnswerFour + " </label> </div> </li>");

                    }
                }
            });


        }

    </script>

    <script>
        $( '#frm' ).on( 'submit', function(e) {
            e.preventDefault();

            var pid = $selectedValueId;
            console.log(pid);
            var aid1, aid2, aid3, aid4;
            var column;
            var selectedValue = $selected_value;

            if (selectedValue == 1) {
                //                    $("#Answer1").val(1);
                aid1 = 1;
                column = "Answer1";
                console.log(aid1);
            }
            if (selectedValue == 2) {
                //                    $("#Answer2").val(2)
                aid2 = 2;
                column = "Answer2";
                console.log(aid2);
            }
            if (selectedValue == 3) {
                //$("#Answer3").val(3);
                aid3 = 3;
                column = "Answer3";
                console.log(aid3);
            }
            if (selectedValue == 4) {
                //$("#Answer4").val(4);
                aid4 = 4;
                column = "Answer4";
                console.log(aid4);
            }

            $.ajax({
                dataType: 'json',
                url: "../findStatByPoll/"+pid,
                type: "get",
                success: function (jman) {
                    console.log(jman);
                    var checkId;
                    for(key in jman)
                    {
                        checkId = jman[key].PollId;
                    }
                    if(checkId == null)
                    {
                        console.log(checkId);
                        $.ajax({
                            url: "../poll/createPollStat",
                            type: "get",
                            data: {pollids: pid, Answer1: aid1, Answer2: aid2, Answer3: aid3, Answer4: aid4},
                            success: function (e) {
                                console.log("pass");
                            },

                        })
                    }
                    else
                    {
                        console.log("Update");
                        $.ajax({
                            url: "../poll/updatePollStat",
                            type: "get",
                            data: {pollids: pid, AnswerType:column},
                            success: function (e) {
                                console.log("pass");
                            },

                        })
                    }

                }
            });

            poolid($selectedValueId);

        });
        </script>

        <!-- Morris Charts -->
        <script >
            function poolid(pid){
            $.ajax({
                dataType: 'json',
                url: "../findStatByPoll/"+pid,
                type: "get",
                success: function (json) {
                    //var ans1,ans2,ans3,ans4 = "";
                console.log(json);
                   // for(table in json){
                      /*  if(json[table].AnswerOneId)
                            tmp['Answer1'] = data[table].datacount;

                        if(json[table].AnswerTwoId)
                            tmp['Answer2'] = data[table].datacount;

                        if(json[table].AnswerThreeId)
                            tmp['Answer3'] = data[table].datacount;

                        if(json[table].AnswerFourId)
                            tmp['Answer4'] = data[table].datacount;*/
                   // }
                    console.log("id"+json[0]   );
//                    console.log("id"+json[0].AnswerTwoId);
//                    console.log("id"+json[0].AnswerThreeId);
//                    console.log("id"+json[0].AnswerFourId);
                    $('#bar-example').remove();
                    $('.barseter').append("<div id='bar-example'></div>")
                    setChart(json[0].AnswerOneId,json[0].AnswerTwoId,json[0].AnswerThreeId,json[0].AnswerFourId)
                }
            });}
        </script>
        <script>
            function setChart(ans1,ans2,ans3,ans4) {

                Morris.Bar({
                    element: 'bar-example',
                    data: [
                        { y: 'Answer1', a: ans1 },
                        { y: 'Answer2', a: ans2 },
                        { y: 'Answer3', a: ans3 },
                        { y: 'Answer4', a: ans4 },
                    ],
                    xkey: 'y',
                    ykeys: ['a'],
                    labels: ['Answer Count']
                });
            }

        </script>
    <div class="cha">

    </div>
    @endsection


    {{--//                    var $el = $("#poll").html("");--}}
{{--//                    $el.empty();--}}
{{--//                    $el.append($("<option></option>")--}}
{{--//                            .attr("value", '').text('Please Select'));--}}
{{--////                    $each(json, function (value, key) {--}}
{{--////                       $el.append($("<option></option>")--}}
{{--//                    });}--}}
{{--//        });--}}
{{--//--}}
{{--////                    $.each(e, function (e, t) {--}}
{{--////                        console.log(t.Title);--}}
{{--////                        $("#data").append('<option>+t.Title+</option>');--}}
{{--////--}}
{{--//////                    $("#btn").append('<a class="btn btn-default" href="../../admin/access/approve/'+t.S_id+'" role="button">Approve</a>');--}}
{{--////                    })--}}
{{--////                }, error: function (e) {--}}
{{--////                    console.log("error_sub_load!", e.responseJSON)--}}
{{--////                }--}}
{{--////            })--}}
{{--//        })--}}


{{--<li class="list-group-item" id="option1">--}}
    {{--<div class="radio">--}}
        {{--<label>--}}
            {{--<input type="radio" name="option" value="" id="answer1"> Excellent--}}
        {{--</label>--}}
    {{--</div>--}}
{{--</li>--}}
{{--<li class="list-group-item" id="option2">--}}
    {{--<div class="radio">--}}
        {{--<label>--}}
            {{--<input type="radio" name="option" value="" id="answer2"> Good--}}
        {{--</label>--}}
    {{--</div>--}}
{{--</li>--}}
{{--<li class="list-group-item" id="option3">--}}
    {{--<div class="radio">--}}
        {{--<label>--}}
            {{--<input type="radio" name="option" value="" id="answer3"> Satisfactory--}}
        {{--</label>--}}
    {{--</div>--}}
{{--</li>--}}
{{--<li class="list-group-item" id="option4">--}}
    {{--<div class="radio">--}}
        {{--<label>--}}
            {{--<input type="radio" name="option" value="" id="answer4"> Needs Improvement--}}
        {{--</label>--}}
    {{--</div>--}}
{{--</li>--}}



{{--$(document).ready(function(){--}}
{{--//            $("#frm").on('submit',function (){--}}
{{--//                var selectedValue = $selected_value;--}}
{{--//                var pid = $selectedValueId;--}}
{{--//                var aid;--}}
{{--//                console.log(selectedValue);--}}
{{--//                var column; //To changes the column of th data parsing object--}}
{{--////                alert('Radio Box has been changed!');--}}
{{--//--}}
{{--//--}}
{{--//                if(selectedValue==1)--}}
{{--//                {--}}
{{--////                    $("#Answer1").val(1);--}}
{{--//                    aid = 1;--}}
{{--//                    column = "Answer1";--}}
{{--//                }--}}
{{--//                if(selectedValue==2)--}}
{{--//                {--}}
{{--////                    $("#Answer2").val(2)--}}
{{--//                    aid = 2;--}}
{{--//                    column = "Answer2";--}}
{{--//                }--}}
{{--//                if(selectedValue==3)--}}
{{--//                {--}}
{{--//                    //$("#Answer3").val(3);--}}
{{--//                    aid = 3;--}}
{{--//                    column = "Answer3";--}}
{{--//                }--}}
{{--//                if(selectedValue==4)--}}
{{--//                {--}}
{{--//                    //$("#Answer4").val(4);--}}
{{--//                    aid = 4;--}}
{{--//                    column = "Answer4";--}}
{{--//                }--}}
{{--//--}}
{{--//--}}
{{--//                $.ajax({--}}
{{--//                    dataType: 'json',--}}
{{--//                    url: "../findStatByPoll/"+pid,--}}
{{--//                    type: "get",--}}
{{--//                    success: function (json) {--}}
{{--//                        if(json != null)--}}
{{--//                        {--}}
{{--//                            var JSONObject= {"PollId":pid, "Answer1":1, "Answer2":2, "Answer3":3, "Answer4":4 };--}}
{{--//                            var jsonData = JSON.parse( JSONObject );--}}
{{--//                            $.ajax({--}}
{{--//                                dataType: 'json',--}}
{{--//                                url: "../poll/createPollStat/"+jsonData,--}}
{{--//                                async: false,--}}
{{--//--}}
{{--//                                type: "get",--}}
{{--//                                success: function (json) {--}}
{{--//                                    console.log('Done');--}}
{{--//                                }--}}
{{--//                            });--}}
{{--//                        }--}}
{{--//                        else--}}
{{--//                        {--}}
{{--//                            var JSONObject= {"PollId":pid, "Answer1":aid };--}}
{{--//                            var jsonData = JSON.parse( JSONObject );--}}
{{--//                            $.ajax({--}}
{{--//                                dataType: 'json',--}}
{{--//                                url: "../poll/updatePollStat",--}}
{{--//                                data: jsonData,--}}
{{--//                                type: "post",--}}
{{--//                                success: function (json) {--}}
{{--//                                    console.log('Done Update');--}}
{{--//                                }--}}
{{--//                            });--}}
{{--//                        }--}}
{{--//                    }--}}
{{--//                });--}}
{{--//            });--}}
{{--//        })--}}