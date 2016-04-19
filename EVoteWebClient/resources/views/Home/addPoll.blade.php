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
                    <a href="#">View My Polls</a>
                </li>
                <li>
                    <a href="../user/login">Login</a>
                </li>
                <li>
                    <a href="#">Logout</a>
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
                            <label for="id">User ID</label>
                            <input type="text" name="id" class="form-control" id="id">
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