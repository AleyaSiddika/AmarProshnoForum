<div class="rightContent">
    <div class="askQue">
        <p class="AskBtn"><a href="{{ url('/AskQuestion') }}"><button type="submit" class="btn btn-primary btnnn" name="submit">Ask Question </button></a></p>
    </div>

    <div class="lastTopTenQue">
        <div class="titleTopten">
            <p> Top Ten Question</p>
        </div>
        <div class="TopQueTen">
            @foreach($topQue as $que)
                <a href="{{ url('/Read-More/'.$que->id) }}" style="text-decoration: none;">
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
                <a href="{{ url('/Read-More/'.$que->id) }}" style="text-decoration: none;">
                    <li class="AddLastQue"><span class="text">{{$que->title}}</span></li>
                </a>
            @endforeach
        </div>
    </div>


    <div class="Advertise">

    </div>
</div>