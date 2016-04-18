<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>EVote - Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    {!! HTML::style('css/bootstrap.min.css')!!}
    {!! HTML::style('css/login-page.css')!!}
</head>
<body>

<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar navbar-inverse">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="../">&nbsp;&nbsp;EVote Login</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

            {{--<ul class="nav navbar-nav navbar-right">--}}
            {{--<a href="user/logout" class="btn btn-danger" role="button">LogOut</a>--}}

            {{--</ul>--}}
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3" style="margin-top: 50px;">
            <div class="panel panel-login">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-6">
                            <a href="#" class="active" id="login-form-link">LogIn</a>
                        </div>
                        <div class="col-xs-6">
                            <a href="#" id="register-form-link">Sign Up</a>
                        </div>
                    </div>
                    <hr>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form id="login-form" action="../user/log" method="post" role="form" style="display: block;">
                                <div class="form-group">
                                    <input  autocomplete="off" type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Email" value="" required>
                                </div>
                                <div class="form-group">
                                    <input autocomplete="off" type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password" required>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-6 col-sm-offset-3">
                                            <input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <form id="register-form" action="../user/createUser" method="post" role="form" style="display: none;">
                                <div class="form-group">
                                    <input type="text" name="name" id="name" tabindex="1" class="form-control" placeholder="Username" value="" required>
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Email Address" value="" required>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password" required>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="confirm-password" id="confirm-password" tabindex="2" class="form-control" placeholder="Confirm Password" required>
                                </div>
                                {{--<input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />--}}
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-6 col-sm-offset-3">
                                            <input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Sign Up">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{--@if($error!=null)--}}
            {{--<div class="col-md-6 col-md-offset-3">--}}
                {{--<div class="{{$alert}}" style="text-align: center">--}}
                    {{--<button type="button" class="close" data-dismiss="alert" aria-label="Close">--}}
                        {{--<span aria-hidden="true">&times;</span>--}}
                    {{--</button>--}}
                    {{--{{$error}}--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--@endif--}}
    </div>
</div>
{!! HTML::script('js/vendor/jquery.min.js')!!}
{!! HTML::script('js/bootstrap.min.js')!!}
<script>
    $(function() {
        $('#login-form-link').click(function(e) {
            $("#login-form").delay(100).fadeIn(100);
            $("#register-form").fadeOut(100);
            $('#register-form-link').removeClass('active');
            $(this).addClass('active');
            e.preventDefault();
        });
        $('#register-form-link').click(function(e) {
            $("#register-form").delay(100).fadeIn(100);
            $("#login-form").fadeOut(100);
            $('#login-form-link').removeClass('active');
            $(this).addClass('active');
            e.preventDefault();
        });
    });
</script>
</body>
</html>