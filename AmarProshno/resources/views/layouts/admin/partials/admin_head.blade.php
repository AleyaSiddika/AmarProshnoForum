
<!DOCTYPE html>

<html>
<head>
    <title>AmarProshno</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href=" {{ asset('assets/css/bootstrap.min.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700,700i" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/css/ionicons.min.css')}}" />

    <link rel="stylesheet" href=" {{ asset('assets/css/styles.css') }}">
    {{--<link rel="stylesheet" href=" {{ asset('assets/css/users.css') }}">--}}

    <link rel="stylesheet" href=" {{ asset('assets/css/question.css') }}">
    <link rel="stylesheet" href=" {{ asset('assets/css/admin_user.css') }}">
    <link rel="stylesheet" href=" {{ asset('assets/css/answer.css') }}">
    <link rel="stylesheet" href=" {{ asset('assets/css/profiles.css') }}">
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

                <a class="navbar-brand" href="{{ url('/User') }}">
                    <img src="{{ asset('assets/images/red.png') }}" class="titleimage" height="50" width="60">
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav ">
                    <li><a href="{{ url('/User') }}">Home</a></li>
                    <li><a href="{{ url('/My-Questions') }}">My Question</a></li>
                    <li><a href="{{ url('/Contact') }}">Contact</a></li>
                </ul>
                <form action="{{ url('/Search') }}" method="post" role="search" class="navbar-form navbar-left">
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
                    {{--<button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>--}}
                </form>

                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            @foreach($image as $img)
                                @if(isset($img->image))
                                    <img src="{{ $img->image }}"class="img-circle" style="height: 30px; width: 30px;" title="{{ Auth::user()->name }}"  />
                                @else
                                    <img src="{{ asset('assets/images/man-icon-2x.png') }}" class="img-rounded" style="height: 30px; width: 30px;" />
                                @endif
                            @endforeach
                            {{ Auth::user()->name }}
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu login">
                            <li><a href="{{ url('/Profile') }}">Edit Profile</a></li>
                            <li>
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </div>
</nav>
