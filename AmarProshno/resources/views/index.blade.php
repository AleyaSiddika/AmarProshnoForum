@extends('layouts.public.master_public_view')

@section('publicView')
    @include('layouts.public.partials.publicView')
@endsection

@section('section')
    <div class="leftContents">
        <div class="topQueText" style="width: 30%; margin-bottom: 10px; ">
            <p>All Questions</p>
        </div>
        <div class="mesg" style="width: 70%; height: 55px; margin-bottom: 10px; border-bottom: 1px solid #e3207b">
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
                    <div class="NameText"style="font-weight: bold;">
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
                    </div>

                    <div class="DiscriptionBox">
                        <p class="QuetionDis">
                            {{ substr($data->description, 0, 240)}}
                            <a href="{{ url('/Show-Read-More/'.$data->id) }}" class="btn btn-primary btn-xs">read more...</a>
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
        {{ $alldata->links() }}
    </div>

    @include('layouts.public.partials.rightContent')
@endsection