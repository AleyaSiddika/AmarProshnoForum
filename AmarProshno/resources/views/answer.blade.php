@extends('layouts.admin.master_admin')

@section('section')
    @include('layouts.admin.partials.rightContent')

    <style>
        .inputfile {
            width: 0.1px;
            height: 0.1px;
            opacity: 0;
            overflow: hidden;
            position: absolute;
            z-index: -1;
        }

        .iconnn {
            height: 20px;
            width: 20px;
        }
        #more li{
            list-style: none;
        }
    </style>
    <div class="answer">
        <div style="width: 100%; height: 55px;">
            <div class="queText" style="width: 30%; margin-bottom: 10px; border-bottom: 1px solid #e3207b; ">
                <p>Questions</p>
            </div>
            <div class="mesg">
                <div style="width: 240px; text-align: center;">
                    @if(Session::has('message'))
                        <div class="alert alert-success"> {{Session::get('message')}} </div>
                    @elseif(Session::has('destroy'))
                        <div class="alert alert-danger"> {{Session::get('destroy')}} </div>
                    @endif
                </div>
            </div>
        </div>
        @foreach($info as $data)
            <div class="queTable">
                <div class="totalImgNameBox">
                    <div class="queImageNameBox">
                        <div class="queNameText" style="font-weight: bold;">
                            <p>{{$data->name}}  </p>
                        </div>
                        <div class="queImageBoxss">

                            @if(isset($data->image))
                                <img src="{{ $data->image }}"height="70" width="70"class="img-circle queImages " />
                            @else
                                <img src="{{ asset('assets/images/man-icon-2x.png') }}" class="img-circle queImages" height="70" width="70">
                            @endif

                        </div>
                    </div>

                    <?php
                    $rateP = $data->rate;
                    $rPp = $rateP + 1;
                    $rP = $rPp;

                    $rateM = $data->rate;
                    $rM = $rateM - 1;
                    ?>
                    <div  class="ratting">
                        <div class="rateTxt">Ratting Que</div>

                        <div class="upper">
                            <form method="post" action="{{ url('/rateQue/'.$data->id.'/'.Auth::user()->id) }}">
                                <input type="hidden" name="rate" value="{{ $rP }}">
                                <input type="hidden" name="showUp" value="0">
                                {{ csrf_field() }}

                                <?php
                                $check = DB::table('rattings')
                                    ->where('que_id', '=', $data->id)
                                    ->where('showUp', '=', 0)
                                    ->where('user_id', '=', Auth::user()->id)
                                    ->first();
                                if($check =='')
                                {
                                ?>
                                <input type="submit" name="rateQueP" id="rateQueP" class="inputfile"/>
                                <label for="rateQueP"><span class="glyphicon glyphicon-triangle-top "></span></label>
                                <?php } else { ?>
                                <input type="button" name="hide" id="hide" class="inputfile"/>
                                <label for="hide" style="color: #d6e0e6;"><span class="glyphicon glyphicon-triangle-top "></span></label>
                                <?php  }?>
                            </form>
                        </div>

                        <div class="NumberRate"><span class="numberRate">{{ $data->rate }}</span></div>

                        <div class="lower">
                            <form method="post" action="{{ url('/rateQue/'.$data->id.'/'.Auth::user()->id) }}">
                                {{ csrf_field() }}
                                <?php
                                $check = DB::table('rattings')
                                    ->where('que_id', '=', $data->id)
                                    ->where('showUp', '=', 1)
                                    ->where('user_id', '=', Auth::user()->id)
                                    ->first();
                                if($check =='')
                                {
                                ?>
                                <input type="submit" name="rateQueM" id="rateQueM" class="inputfile"/>
                                <label for="rateQueM"> <span class="glyphicon glyphicon-triangle-bottom "></span></label>
                                <input type="hidden" name="rate" value="{{ $rM }}">
                                <input type="hidden" name="showUp" value="1">
                                <?php } else { ?>
                                <input type="button" name="hideh" id="hideh" class="inputfile"/>
                                <label for="hideh" style="color: #d6e0e6;"><span class="glyphicon glyphicon-triangle-bottom "></span></label>
                                <?php  }?>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="AllqueShow">
                    <div class="queTitleBoxs">
                        <div class="queTitle">{{$data->title}}</div>
                    </div>
                    <div class="QueDesc">
                        <p class="queDisTxt">
                            {{ $data->description}}
                        </p>
                        <p class="Quetag">
                     <span style="padding-right: 10px; font-size: 11px; color: #ca87a5; " class="dateTime">
                                <i aria-hidden="true" style="color: #0c8b22;" class="fa fa-clock-o"></i>
                         {{ date('j-F-Y', strtotime($data->created_at)) }} at
                         {{ date('H: i', strtotime($data->created_at)) }}
                      </span>
                            @if(isset($data->html) == $data->html )
                                <span class="tag">{{ $data->html }}
                                    @if( Auth::user()->id == $data->user_id)
                                        <a href="{{ url('/RmDeleteHtml/'.$data->id) }}" style="color:#e16b85;"><i class="fa fa-times"></i></a>
                                    @endif
                                </span>
                            @endif
                            @if(isset($data->css) == $data->css)
                                <span class="tag">{{ $data->css }}
                                    @if( Auth::user()->id == $data->user_id )
                                        <a href="{{ url('/RmDeleteCss/'.$data->id) }}" style="color:#e16b85;"><i class="fa fa-times"></i></a>
                                    @endif
                                </span>
                            @endif
                            @if(isset($data->php) == $data->php)
                                <span class="tag">{{ $data->php }}
                                    @if( Auth::user()->id == $data->user_id)
                                        <a href="{{ url('/RmDeletePhp/'.$data->id) }}" style="color:#e16b85;"><i class="fa fa-times"></i></a>
                                    @endif
                                </span>
                            @endif
                            @if(isset($data->oop) == $data->oop)
                                <span class="tag">{{ $data->oop }}
                                    @if( Auth::user()->id == $data->user_id)
                                        <a href="{{ url('/RmDeleteOop/'.$data->id) }}" style="color:#e16b85;"><i class="fa fa-times"></i></a>
                                    @endif
                                </span>
                            @endif
                            @if(isset($data->mysql) == $data->mysql)
                                <span class="tag">{{ $data->mysql }}
                                    @if( Auth::user()->id == $data->user_id)
                                        <a href="{{ url('/RmDeleteMysql/'.$data->id) }}" style="color:#e16b85;"><i class="fa fa-times"></i></a>
                                    @endif
                                </span>
                            @endif
                            @if(isset($data->javascript) == $data->javascript)
                                <span class="tag">{{ $data->javascript }}
                                    @if( Auth::user()->id == $data->user_id)
                                        <a href="{{ url('/RmDeleteJavascript/'.$data->id) }}" style="color:#e16b85;"><i class="fa fa-times"></i></a>
                                    @endif
                                </span>
                            @endif
                            @if(isset($data->ajax) == $data->ajax)
                                <span class="tag">{{ $data->ajax }}
                                    @if( Auth::user()->id == $data->user_id)
                                        <a href="{{ url('/RmDeleteAjax/'.$data->id) }}" style="color:#e16b85;"><i class="fa fa-times"></i></a>
                                    @endif
                                </span>
                            @endif
                            @if(isset($data->jquery) == $data->jquery)
                                <span class="tag">{{ $data->jquery }}
                                    @if( Auth::user()->id == $data->user_id)
                                        <a href="{{ url('/RmDeleteJquery/'.$data->id) }}" style="color:#e16b85;"><i class="fa fa-times"></i></a>
                                    @endif
                                </span>
                            @endif
                        </p>
                    </div>
                </div>
            </div>
        @endforeach

        <div class="ansText" style="margin-bottom: 10px;">
            <p>Answers - <span class="top">({{ $data->top }})</span> </p>
        </div>
        {{--@foreach($asnwer as $anns) @endforeach--}}
        @foreach($asnwers as $ans)
            @if(isset($ans))
                <div class="ansTable">
                    <div class="totalAnsImgNameBox">
                        <div class="ansImageNameBox">
                            <div class="ansNameText"  style="font-weight: bold;">
                                <p>{{ $ans->name }} </p>
                            </div>
                            <div class="ansImageBoxss">
                                @if(isset($ans->image))
                                    <img src="{{ $ans->image }}"height="70" width="70"class="img-circle queImages " />
                                @else
                                    <img src="{{ asset('assets/images/man-icon-2x.png') }}" class="img-circle queImages" height="70" width="70">
                                @endif
                            </div>
                        </div>
                        <?php
                        $ratePA = $ans->rate;
                        $rpa = $ratePA + 1;
                        $rPA = $rpa;

                        $rateMA = $ans->rate;
                        $rMA = $rateMA - 1;
                        ?>
                        <div  class="ratting">
                            <div class="rateTxt">Ratting Ans</div>

                            <div class="upper">
                                <form method="post" action="{{ url('/rateAns/'.$ans->id.'/'.Auth::user()->id) }}">
                                    <input type="hidden" name="rate" value="{{ $rPA }}">
                                    <input type="hidden" name="showUp" value="0">
                                    {{ csrf_field() }}

                                    <?php
                                    $check = DB::table('rattingans')
                                        ->where('que_id', '=', $ans->id)
                                        ->where('showUp', '=', 0)
                                        ->where('user_id', '=', Auth::user()->id)
                                        ->first();
                                    if($check =='')
                                    {
                                    ?>
                                    <input type="submit" name="rateAnsP" id="rateAnsP" class="inputfile"/>
                                    <label for="rateAnsP"><span class="glyphicon glyphicon-triangle-top "></span></label>
                                    <?php } else { ?>
                                    <input type="button" name="hide" id="hide" class="inputfile"/>
                                    <label for="hide" style="color: #d6e0e6;"><span class="glyphicon glyphicon-triangle-top "></span></label>
                                    <?php  }?>
                                </form>
                            </div>

                            <div class="NumberRate"><span class="numberRate">{{ $ans->rate }}</span></div>

                            <div class="lower">
                                <form method="post" action="{{ url('/rateAns/'.$ans->id.'/'.Auth::user()->id) }}">
                                    {{ csrf_field() }}
                                    <?php
                                    $check = DB::table('rattingans')
                                        ->where('que_id', '=', $ans->id)
                                        ->where('showUp', '=', 1)
                                        ->where('user_id', '=', Auth::user()->id)
                                        ->first();
                                    if($check =='')
                                    {
                                    ?>
                                    <input type="submit" name="rateAnsM" id="rateAnsM" class="inputfile"/>
                                    <label for="rateAnsM"> <span class="glyphicon glyphicon-triangle-bottom "></span></label>
                                    <input type="hidden" name="rate" value="{{ $rMA }}">

                                    <input type="hidden" name="showUp" value="1">
                                    <?php } else { ?>
                                    <input type="button" name="hideh" id="hideh" class="inputfile"/>
                                    <label for="hideh" style="color: #d6e0e6;"><span class="glyphicon glyphicon-triangle-bottom "></span></label>
                                    <?php  }?>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="AllansShow">
                        @if( Auth::user()->id == $ans->user_id)
                            <div class="moreOpt">
                                <ul class="nav navbar-nav navbar-right main-menuOpt">
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle txtMore" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" >More <span><img src="{{ asset('assets/images/down-arrow.png')}}" alt="" /></span></a>
                                        <ul class="dropdown-menu newsfeed-home" id="more">
                                            <li><a href="{{ url('/Edit-ans/'.$ans->id.'/edit/'.$ans->que_id) }} ">Edit Answer</a></li>
                                            <li><a href="{{ url('/Delete-ans/'.$ans->id.'/'.$data->top.'/'.$data->id) }}">Delete Answer</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        @endif

                        <div class="ansDesc">
                            <p class="ansDisTxt">
                                {{ $ans->description}}
                                <br>
                                <span style="padding-right: 10px; font-size: 11px; color: #ca87a5; " class="dateTime">
                                <i aria-hidden="true" style="color: #0c8b22;" class="fa fa-clock-o"></i>
                                    {{ date('j-F-Y', strtotime($ans->created_at)) }} at
                                    {{ date('H: i', strtotime($ans->created_at)) }}
                      </span>
                            </p>

                        </div>
                    </div>
                </div>
            @endif
        @endforeach


        <div class="GiveAnss">
            <p>Write your answers</p>
        </div>
        <?php
        $din = $data->top;
        $in = $din + 1;
        ?>
        <form action="{{ url('/PostAns/'.$data->id) }}" method="post">
            {{ csrf_field() }}
            <div class="Answerstabless">
                <input type="hidden" name="que_id" value="{{ $data->id }}">
                <input type="hidden" name="top" value="{{ $in }}">
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                <div class="textArea">

                    <textarea class="areaBox" name="description" placeholder="Write your answer here" required></textarea>

                </div>
                <div class="BtnTextarea">
                    <p class="button">
                        <input type="submit" name="submit" class="btn btn-primary btnnn" value="Post Answer">
                    </p>
                </div>
            </div>
        </form>
    </div>
@endsection