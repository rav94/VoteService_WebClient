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
            <a class="navbar-brand topnav" href="#">E-Vote</a>
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
                    <a href="../user/login">Login</a>
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

                    <form role="form" method="post" action="#">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 id="pollText" class="panel-title">Please Select a Poll</h3>
                        </div>
                        <div class="panel-body">
                            <ul class="list-group">
                                <li class="list-group-item" id="option1">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="option" value="" id="answer1"> Excellent
                                        </label>
                                    </div>
                                </li>
                                <li class="list-group-item" id="option2">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="option" value="" id="answer2"> Good
                                        </label>
                                    </div>
                                </li>
                                <li class="list-group-item" id="option3">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="option" value="" id="answer3"> Satisfactory
                                        </label>
                                    </div>
                                </li>
                                <li class="list-group-item" id="option4">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="option" value="" id="answer4"> Needs Improvement
                                        </label>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="panel-footer text-center">
                            <input type="submit" class="btn btn-primary btn-block btn-sm" name="vote-submit" id="vote-submit" value="Vote">
                            <a href="#" class="small">View Result</a>
                        </div>
                    </div>
                    </form>
                </div>
                <div class="col-lg-5 col-lg-offset-2 col-sm-6">
                    <hr class="section-heading-spacer">
                    <div class="clearfix"></div>
                    <div id="bar-example"></div>
                </div>
            </div>

        </div>
        <!-- /.container -->
    </div>
    <!-- /.content-section-a -->

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
            pollText.innerHTML = selectedText;
        }

    </script>

    <!-- Morris Charts -->
    <script src="js/stats.js"></script>
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