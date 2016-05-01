<link href="css/bootstrap.min.css" rel="stylesheet">

<!-- Custom CSS -->
<link href="css/landing-page.css" rel="stylesheet">

<!-- Custom Fonts -->
<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

<script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="http://code.jquery.com/jquery-2.2.3.min.js" integrity="sha256-a23g1Nt4dtEYOj7bR+vTu7+T8VP13humZFBJNIYoEJo=" crossorigin="anonymous"></script>
<script src="http://cdn.oesmith.co.uk/morris-0.4.1.min.js"></script>


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
                    <a href="../viewPollPage">View Live Polls</a>
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
            <h2>Create a Poll</h2>
            <form role="form">
                <div class="form-group">
                    <label for="sel1">Create a Poll and Find out what others think!</label><br>
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
                    <form action="../poll/createPoll" method="post" role="form">
                        <div class="form-group">
                            <label for="title">Poll Title:</label>
                            <input type="text" name="title" class="form-control" id="title">
                        </div>
                        <div class="form-group">
                            <label for="answer_one">Answer One:</label>
                            <input type="text" name="answer_one" class="form-control" id="answer_one">
                        </div>
                        <div class="form-group">
                            <label for="answer_two">Answer Two:</label>
                            <input type="text" name="answer_two" class="form-control" id="answer_two">
                        </div>
                        <div class="form-group">
                            <label for="answer_three">Answer Three:</label>
                            <input type="text" name="answer_three" class="form-control" id="answer_three">
                        </div>
                        <div class="form-group">
                            <label for="answer_four">Answer Four:</label>
                            <input type="text" name="answer_four" class="form-control" id="answer_four">
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                <div class="col-lg-5 col-lg-offset-2 col-sm-6">
                    <hr class="section-heading-spacer">
                    <div class="clearfix"></div>
                    <img class="img-responsive" src="img/graph.jpg" alt="">
                </div>
            </div>

        </div>
        <!-- /.container -->
    </div>
    <!-- /.content-section-a -->


@endsection