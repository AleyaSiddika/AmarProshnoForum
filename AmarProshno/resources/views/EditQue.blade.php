@extends('layouts.admin.master_admin')
@section('section')
    @include('layouts.admin.partials.rightContent')
    <div class="leftContent">
        <div class="AskQue">
            <p>Update Your Questions</p>
        </div>
        <form action="{{ url('/UpdateQuestion/'.$data->id) }}" method="post" >
              {{ csrf_field() }}
            <div class="Answerstable">
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                <div class="InputBox">
                    <input type="text" name="title" value="{{ $data->title }}" class="form-control queInputBox"  required="required">
                </div>
                <div class="textArea">
                    <textarea class="areaBox" name="description">{{ $data->description }}</textarea>
                </div>
                <div class="CheckBox"> <b>Select Tages : </b>
                    @if(isset($data->html)== $data->html)
                        <input type="checkbox" checked name="html" value="Html"> Html, &nbsp;
                    @else
                        <input type="checkbox" name="html" value="Html"> Html, &nbsp;
                    @endif

                        @if(isset($data->css)== $data->css)
                            <input type="checkbox" checked name="css" value="Css"> Css, &nbsp;
                        @else
                            <input type="checkbox" name="css" value="Css"> Css, &nbsp;
                        @endif

                        @if(isset($data->php) == $data->php)
                            <input type="checkbox" checked name="php" value="Php"> Php, &nbsp;
                        @else
                            <input type="checkbox" name="php" value="Php"> Php, &nbsp;
                        @endif

                        @if(isset($data->oop) == $data->oop)
                            <input type="checkbox" checked name="oop" value="OOP"> OOP, &nbsp;
                        @else
                            <input type="checkbox" name="oop" value="OOP"> OOP, &nbsp;
                        @endif

                        @if(isset($data->mysql) == $data->mysql)
                            <input type="checkbox" checked name="mysql" value="Mysql"> Mysql, &nbsp;
                        @else
                            <input type="checkbox" name="mysql" value="Mysql"> Mysql, &nbsp;
                        @endif

                        @if(isset($data->javascript) == $data->javascript)
                            <input type="checkbox" checked name="javascript" value="Javascript"> Javascript, &nbsp;
                        @else
                            <input type="checkbox" name="javascript" value="Javascript"> Javascript, &nbsp;
                        @endif

                        @if(isset($data->ajax)== $data->ajax)
                            <input type="checkbox" checked name="ajax" value="Ajax"> Ajax, &nbsp;
                        @else
                            <input type="checkbox" name="ajax" value="Ajax"> Ajax, &nbsp;
                        @endif

                        @if(isset($data->jquery)== $data->jquery)
                            <input type="checkbox" checked name="jquery" value="JQuery"> JQuery &nbsp;
                        @else
                            <input type="checkbox" name="jquery" value="JQuery"> JQuery &nbsp;
                        @endif
                </div>
                <div class="BtnTextarea">
                    <p class="button">
                        <a href="{{ url('/User') }}" class="btn btn-primary">Back</a>
                        <input type="submit" name="submit" class="btn btn-success btnnn" value="Update Question">
                    </p>
                </div>
            </div>
        </form>
    </div>
@endsection