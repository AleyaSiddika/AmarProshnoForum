@extends('layouts.admin.master_admin')

@section('section')
    @include('layouts.admin.partials.rightContent')
    <div class="leftContents" >
        <div class="topQueText" style="width: 30%; margin-bottom: 10px; ">
            <p>My Questions</p>
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
        @foreach($alldata as $data)
            <div class="Table">
                <div class="ImageNameBox">
                    <div class="NameText">
                        <p>{{ $data->name }} </p>
                    </div>
                    <div class="ImageBoxss">
                        @if(isset($data->image))
                            <img src="{{ $data->image }}"height="70" width="70"class="img-circle queImages " />
                        @else
                            <img src="{{ asset('assets/images/man-icon-2x.png') }}" class="img-circle queImages" height="70" width="70">
                        @endif
                    </div>
                </div>
                <div class="Allque">
                    <div class="QueTitleBox">
                        <div class="Title">{{ $data->title}}</div>

                        @if( Auth::user()->id == $data->user_id)
                            <div class="moreQue">
                                <ul class="nav navbar-nav navbar-right main-menuQue">
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle txtMoreQue" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">More <span><img src="{{ asset('assets/images/down-arrow.png')}}" alt="" /></span></a>
                                        <ul class="dropdown-menu newsfeed-home" id="more">
                                            <li><a href="{{ url('/Edit-post/'.$data->id.'/edit') }} ">Edit Question</a></li>
                                            <li><a href="{{ url('/Delete-post/'.$data->id) }}">Delete Question</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        @endif
                    </div>
                    <div class="DiscriptionBox">
                        <p class="QuetionDis">
                            {{ substr($data->description, 0, 240)}}
                            <a href="{{ url('/Read-More/'.$data->id) }}" class="btn btn-primary btn-xs">read more...</a>
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
                                        <a href="{{ url('/MyDeleteHtml/'.$data->id) }}" style="color:#e16b85;"><i class="fa fa-times"></i></a>
                                    @endif
                                </span>
                            @endif
                            @if(isset($data->css) == $data->css)
                                <span class="tag">{{ $data->css }}
                                    @if( Auth::user()->id == $data->user_id )
                                        <a href="{{ url('/MyDeleteCss/'.$data->id) }}" style="color:#e16b85;"><i class="fa fa-times"></i></a>
                                    @endif
                                </span>
                            @endif
                            @if(isset($data->php) == $data->php)
                                <span class="tag">{{ $data->php }}
                                    @if( Auth::user()->id == $data->user_id)
                                        <a href="{{ url('/MyDeletePhp/'.$data->id) }}" style="color:#e16b85;"><i class="fa fa-times"></i></a>
                                    @endif
                                </span>
                            @endif
                            @if(isset($data->oop) == $data->oop)
                                <span class="tag">{{ $data->oop }}
                                    @if( Auth::user()->id == $data->user_id)
                                        <a href="{{ url('/MyDeleteOop/'.$data->id) }}" style="color:#e16b85;"><i class="fa fa-times"></i></a>
                                    @endif
                                </span>
                            @endif
                            @if(isset($data->mysql) == $data->mysql)
                                <span class="tag">{{ $data->mysql }}
                                    @if( Auth::user()->id == $data->user_id)
                                        <a href="{{ url('/MyDeleteMysql/'.$data->id) }}" style="color:#e16b85;"><i class="fa fa-times"></i></a>
                                    @endif
                                </span>
                            @endif
                            @if(isset($data->javascript) == $data->javascript)
                                <span class="tag">{{ $data->javascript }}
                                    @if( Auth::user()->id == $data->user_id)
                                        <a href="{{ url('/MyDeleteJavascript/'.$data->id) }}" style="color:#e16b85;"><i class="fa fa-times"></i></a>
                                    @endif
                                </span>
                            @endif
                            @if(isset($data->ajax) == $data->ajax)
                                <span class="tag">{{ $data->ajax }}
                                    @if( Auth::user()->id == $data->user_id)
                                        <a href="{{ url('/MyDeleteAjax/'.$data->id) }}" style="color:#e16b85;"><i class="fa fa-times"></i></a>
                                    @endif
                                </span>
                            @endif
                            @if(isset($data->jquery) == $data->jquery)
                                <span class="tag">{{ $data->jquery }}
                                    @if( Auth::user()->id == $data->user_id)
                                        <a href="{{ url('/MyDeleteJquery/'.$data->id) }}" style="color:#e16b85;"><i class="fa fa-times"></i></a>
                                    @endif
                                </span>
                            @endif
                        </p>
                    </div>
                </div>
            </div>
        @endforeach


        {{ $alldata->links() }}
    </div>

@endsection
