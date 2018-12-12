@extends('layouts.admin.master_admin')
@section('section')
    @include('layouts.admin.partials.rightContent')
    <div class="leftContent">
        <div class="AskQue">
            <p>Ask Your Questions</p>
        </div>
        <form action="{{ url('/PostQuestion') }}" method="post" >
            {{ csrf_field() }}
            <div class="Answerstable">
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                <div class="InputBox">
                    <input type="text" name="title"  class="form-control queInputBox"  required="required" placeholder="Please write your question title">
                </div>
                <div class="textArea">
                    <textarea class="areaBox" id="description" name="description" placeholder="Write your question discription"></textarea>
                </div>
                <div class="CheckBox"> <b>Select Tages : </b>
                    <input type="checkbox" name="html" value="Html"> Html, &nbsp;
                    <input type="checkbox" name="css" value="Css"> Css, &nbsp;
                    <input type="checkbox" name="php" value="Php"> Php, &nbsp;
                    <input type="checkbox" name="oop" value="OOP"> OOP, &nbsp;
                    <input type="checkbox" name="mysql" value="Mysql"> Mysql, &nbsp;
                    <input type="checkbox" name="javascript" value="Javascript"> Javascript, &nbsp;
                    <input type="checkbox" name="ajax" value="Ajax"> Ajax, &nbsp;
                    <input type="checkbox" name="jquery" value="JQuery"> JQuery &nbsp;
                </div>
                <div class="BtnTextarea">
                    <p class="button"><input type="submit" name="submit" class="btn btn-primary btnnn" value="Post Question"></p>
                </div>
            </div>
        </form>
    </div>
@endsection

