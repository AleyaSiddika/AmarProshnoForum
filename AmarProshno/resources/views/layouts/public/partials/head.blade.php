
<!DOCTYPE html>

<html>
<head>
    <title>AmarProshno</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href=" {{ asset('assets/css/bootstrap.min.css') }}">
    {{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">--}}
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700,700i" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/css/ionicons.min.css')}}" />

    <link rel="stylesheet" href=" {{ asset('assets/css/signUp.css') }}">
    <link rel="stylesheet" href=" {{ asset('assets/css/login.css') }}">

    <link rel="stylesheet" href=" {{ asset('assets/css/styles.css') }}">
    <link rel="stylesheet" href=" {{ asset('assets/css/admin_user.css') }}">

    <link rel="stylesheet" href=" {{ asset('assets/css/question.css') }}">
    <link rel="stylesheet" href=" {{ asset('assets/css/answer.css') }}">
</head>
<body>
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div style=" height: 50px; width: 1070px;">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('assets/images/red.png') }}" class="titleimage" height="50" width="60">
                    <span class="titleAmar">Amar</span><span class="titleProshno">Proshno</span>
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    {{--<li><a href="{{ url('/Signin') }}">Question</a></li>--}}
                    <li><a href="{{ url('/P-Contact') }}">Contact</a></li>
                </ul>
                <form action="{{ url('/PublicSearch') }}" method="post" role="search" class="navbar-form navbar-left">
                    {{ csrf_field() }}
                    <div class="form-group">
                        {{--<i class="icon ion-android-search" style="left: 30px;"></i>--}}
                        <div style="background-color: #333; border-radius: 5px;">
                            <div style="float: right;">
                                <input type="text" name="q" style="background-color: #333; color: #ddd; border: #333;" autofocus class="form-control" required  placeholder="Search here">
                            </div>
                            <button type="submit" style="background-color: #333; color: #ddd; border: 1px solid #333;"class="btn btn-default" ><span class="glyphicon glyphicon-search"></span></button>
                        </div>
                    </div>
                </form>

                <ul class="nav navbar-nav navbar-right ">
                    <li><a href="{{ url('/Signin') }}">
                            <button type="button" class="btn btn-primary btn-sm">Log In</button></a></li>
                    <li><a href="{{ url('/Signup') }}">
                            <button type="button" class="btn btn-primary btn-sm">Sign Up</button></a>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </div>
</nav>