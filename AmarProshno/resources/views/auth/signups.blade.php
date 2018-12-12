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
                <p >Create your <span class="Amar">Amar</span><span class="Proshno">Proshno</span> account. It's free and only takes a minute.</p>
            </div>
        </div>
    </div>
    <div class="signUpForm">
        @if ($errors->has('password') or $errors->has('email'))
            <span class="help-block">
            {{--<div class="alert alert-danger"> <strong>  Opps!! </strong>  {{'Wrong email or password' }}</div>--}}
                <div class="alert alert-danger">{{ $errors->first('email') }} <br> {{ $errors->first('password') }}</div>
        </span>
        @endif
        <div class="SignTable">
            <br>
            <form action="{{ route('register') }}" method="post" id="myForm" >
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name" >Display Name</label>
                    <input type="text" class="form-control" name="name" id="name" required placeholder="Enter Name"  autofocus>
                </div>
                <div class="form-group" >
                    <label for="email" >Email</label>
                    <input type="email" class="form-control" id="email" name="email" required placeholder="you@example.com" >
                </div>
                <div class="form-group" >
                    <label for="password " >Password</label>
                    <input type="password" class="form-control" id="password" name="password" required placeholder="************" >
                </div>
                <div class="form-group">
                    <label for="password_confirmation" >Confirm Password</label>
                    <input type="password" class="form-control" id="password_confirmation" required name="password_confirmation" placeholder="************" >
                </div>
                <div class="btnn">
                    <button type="submit" class="btn btn-primary">Sign Up</button>
                    <p class="regTxt">By registering, you agree to the <sapn class="privacy">privacy policy</sapn> and <sapn class="privacy">terms of service</sapn>.</p>
                </div> <br>
            </form>
        </div>
    </div>
    <div class="ALreadyLoged">
        <br><p> Already have an account? <a href="{{ url('/Signin') }}" class="AlrdyLog">Log in</a></p> <br>
    </div>
    <br><br><br><br><br><br><br><br><br>


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
@endsection