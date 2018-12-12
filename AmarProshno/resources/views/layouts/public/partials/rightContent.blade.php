<div class="rightContent">
    <div class="askQue">
        <p class="AskBtn">
            <a href="{{ url('/AskSignin') }}">
                <button type="submit" class="btn btn-primary btnnn" name="submit">Ask Question </button>
            </a>
        </p>
    </div>

    <div class="RightLogin">
        <div class="titleLogin">
            <p> User Login</p>
        </div>
        @if ($errors->has('password') or $errors->has('email'))
            <span class="help-block">
            <div class="alert alert-danger"> <strong>  Opps!! </strong>  {{'Wrong email or password' }}</div>
                {{--<div class="alert alert-danger">{{ $errors->first('email') }} <br> {{ $errors->first('password') }}</div>--}}
        </span>
        @endif
        <div class="formLOGIN">
            <form method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}
                <div class="RightLogin">
                    <br>
                    <div class="form-group">
                        <input type="email" class="form-control" name="email" id="email" placeholder="you@example.com" value="{{ old('email') }}" required autofocus>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" id="password" required placeholder="************">
                    </div>
                    <div class="btnn">
                        <input type="submit" class="btn btn-primary" value="Log In">
                    </div> <br>
                </div>
            </form>
        </div>
    </div><br>

    <div class="lastTopTenQue">
        <div class="titleTopten">
            <p> Top Ten Question</p>
        </div>
        <div class="TopQueTen">
            @foreach($topQue as $que)
                <a href="{{ url('/Show-Read-More/'.$que->id) }}" style="text-decoration: none;">
                    <li class="TenQue"><span class="text">{{ $que->title }}</span></li>
                </a>
            @endforeach
        </div>
    </div>
    <br>

    <div class="lastAddTenQue">
        <div class="titleAddten">
            <p> Last Ten Question</p>
        </div>

        <div class="AddQueTen">
            @foreach($tenQue as $que)
                <a href="{{ url('/Show-Read-More/'.$que->id) }}" style="text-decoration: none;">
                    <li class="AddLastQue"><span class="text">{{$que->title}}</span></li>
                </a>
            @endforeach
        </div>
    </div>


    <div class="Advertise">

    </div>
</div>