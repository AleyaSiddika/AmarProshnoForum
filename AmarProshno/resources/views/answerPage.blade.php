@extends('layouts.public.master_public')
@section('section')
    @include('layouts.public.partials.rightContent')
    <div class="answer">
        <div class="queText" style="width: 30%; margin-bottom: 10px; ">
            <p>Questions</p>
        </div>
        <div class="mesg" style="width: 70%; height: 55px; border-bottom: 1px dotted #e3207b; margin-bottom: 10px;">
            <div style="width: 240px; text-align: center;">
                @if(Session::has('message'))
                    <div class="alert alert-success"> {{Session::get('message')}} </div>
                @elseif(Session::has('destroy'))
                    <div class="alert alert-danger"> {{Session::get('destroy')}} </div>
                @endif
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
                            @if(isset($data->html) == $data->html)<span class="tag">{{ $data->html }}</span>@endif
                            @if(isset($data->css) == $data->css)<span class="tag">{{ $data->css }}</span>@endif
                            @if(isset($data->php) == $data->php)<span class="tag">{{ $data->php }}</span>@endif
                            @if(isset($data->oop) == $data->oop)<span class="tag">{{ $data->oop }}</span>@endif
                            @if(isset($data->mysql)== $data->mysql)<span class="tag">{{ $data->mysql }}</span>@endif
                            @if(isset($data->javascript)== $data->javascript)<span class="tag">{{ $data->javascript }}</span>@endif
                            @if(isset($data->ajax) == $data->ajax)<span class="tag">{{ $data->ajax }}</span>@endif
                            @if(isset($data->jquery) == $data->jquery)<span class="tag">{{ $data->jquery }}</span>@endif
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
                    <div class="totalImgNameBox">
                        <div class="ansImageNameBox">
                            <div class="ansNameText" style="font-weight: bold;">
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
                    </div>
                    <div class="AllansShow">
                        <div class="ansDesc">
                            <p class="ansDisTxt">
                                {{ $ans->description}}
                            </p>
                            <span style="padding-right: 10px; font-size: 11px; color: #ca87a5; " class="dateTime">
                                <i aria-hidden="true" style="color: #0c8b22;" class="fa fa-clock-o"></i>
                                {{ date('j-F-Y', strtotime($ans->created_at)) }} at
                                {{ date('H: i', strtotime($ans->created_at)) }}
                    </span>

                        </div>
                    </div>
                </div>
            @endif
        @endforeach


        <div class="GiveAnss">
            <p>Write your answers</p>
        </div>
        <form action="{{ url('/Signin') }}" method="post">
            {{ csrf_field() }}
            <div class="Answerstabless">

                <div class="textArea">
                    <textarea class="areaBox" name="description"  placeholder="Write your answer here"></textarea>
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