@extends('layouts.public.master_public')
@section('section')
    <div class="row">
        <div class="col-md-12">
            <div class="logSign">
                <ul id="select">
                    <li class="active"><a href="{{ url('/Signin') }}">Log in</a> </li>|
                    <li><a href="{{ url('/Signup') }}">Sign up</a> </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="CreateTitle">
                <p ><span class="Amar">Amar</span><span class="Proshno">Proshno</span> is part of the <span class="Proshno">Proshno</span><span class="Exchange">Exchange</span> network of Q&A communities.</p>
            </div>
        </div>
    </div>
    <div class="signUpForm">
        @if ($errors->has('password') or $errors->has('email'))
            <span class="help-block">
            <div class="alert alert-danger"> <strong>  Opps!! </strong>  {{'Wrong email or password' }}</div>
                {{--<div class="alert alert-danger">{{ $errors->first('email') }} <br> {{ $errors->first('password') }}</div>--}}
        </span>
        @endif

        @if(Session::has('message'))
            <div class="alert alert-danger"> {{Session::get('message')}} </div>
        @endif
        <form method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}
            <div class="SignTable">
                <br>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="you@example.com" value="{{ old('email') }}" required autofocus>
                </div>
                <div class="form-group">
                    <label for="pwd">Password</label>
                    <input type="password" name="password" class="form-control" id="password" required placeholder="************">
                </div>
                <div class="btnn">
                    <input type="submit" class="btn btn-primary" value="Log In">
                </div> <br>
            </div>
        </form>
    </div>
    <div class="ALreadyLoged">
        <br><p> Don't have an account? <a href="{{ url('/Signup') }}" class="AlrdyLog">Sign up</a></p> <br>
    </div>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
@endsection

<style>
    .Amar{
        font-size: 18px;
        color: #0c8b22;
        font-weight: bold ;
    }
    .Proshno{
        font-weight: bold ;
        color: #c51c32;
        font-size: 18px;
    }
</style>