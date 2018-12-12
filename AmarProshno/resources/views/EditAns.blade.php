@extends('layouts.admin.master_admin')
@section('section')
    @include('layouts.admin.partials.rightContent')
    <div class="leftContent">
        <div class="AskQue">
            <p>Update Your Answer</p>
        </div>
        <form action="{{ url('/UpdateAns/'.$data->id.'/'.$id) }}" method="post" >
            {{ csrf_field() }}
            <div class="Answerstable">
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                <div class="textArea">
                    <textarea class="areaBox" name="description">{{ $data->description }}</textarea>
                </div>
                <div class="BtnTextarea">
                    <p class="button">
                        <a href="{{ url('/Read-More/'.$id) }}" class="btn btn-primary">Back</a>
                        <input type="submit" name="submit" class="btn btn-success btnnn" value="Update Answer">
                    </p>
                </div>
            </div>
        </form>
    </div>
@endsection