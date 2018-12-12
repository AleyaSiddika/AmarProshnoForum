@extends('layouts.admin.master_admin')
@section('section')

    <style>
        .inputfile {
            width: 0.1px;
            height: 0.1px;
            opacity: 0;
            overflow: hidden;
            position: absolute;
            z-index: -1;
        }
        .changeTxt{
            width: 250px;
        }
        .iconnn {
            height: 20px;
            width: 20px;
        }
        #more li{
            list-style: none;
        }
    </style>
    @foreach($data as $info)
        <div class="profiless">
            <div class="profileImage">
                <div class="imgBorder">
                    @foreach($image as $img)
                        @if(isset($img->image))
                            <img src="{{ $img->image }}" height="160" width="152"  class="imgSize img-rounded " />
                        @else
                            <img src="{{ asset('assets/images/man-icon-2x.png') }}"height="160" width="152"  class="imgSize img-rounded " />
                        @endif
                    @endforeach
                </div>
                <div class="">
                    {!! Form::open(['url' => '/changeProfile' , 'method' => 'POST', 'enctype'=>'multipart/form-data','file'=>true ]) !!}
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    <input type="file" name="image" id="image" class="inputfile  "/>
                    <label for="image" class="btn btn-success changeTxt">Change profile picture</label> <br>
                    <input type="submit" class="btn btn-primary btnnnnnn" value="Upload">
                    {!! Form::close() !!}
                </div>
                <div class="editPro">
                    <input type="submit" id="btn" class="btn btn-success btnnnnnn" value="Edit Profile">
                </div>
            </div>

            <form name="" method="post" action="{{ url('/ProfileUp') }}">
                {{ csrf_field() }}
                <div id="EditProfile" style="height: auto; margin-left: 15px;  border-radius: 10px; width: 840px; float: left; display: none;">
                    <table class="table table-bordered" style="background-color:#e0ecf1; border-radius: 10px; color: #333;">

                        <tbody>
                        <tr>
                            <td>First Name :</td>
                            <td><input type="text" name="first_name" placeholder="Frist Name" class="form-control inputBox" size="35"></td>
                        </tr>
                        <tr>
                            <td>Last Name :</td>
                            <td><input type="text" name="last_name" placeholder="Last Name" class="form-control inputBox" size="35"></td>
                        </tr>
                        <tr>
                            <td>Gender :</td>
                            <td>
                                <input type="radio" name="gender" checked value="Male" size="35">   Male   &nbsp;&nbsp;&nbsp;
                                <input type="radio" name="gender" value="Female" size="35">   Female
                            </td>
                        </tr>
                        <tr>
                            <td>Date Of Birth :</td>
                            <td><input type="date" name="dob" placeholder="Date Of Birth"  class="form-control inputBox" size="35"></td>
                        </tr>
                        <tr>
                            <td>Hobby :</td>
                            <td><input type="text" name="hobby"  placeholder="Hobby" class="form-control inputBox" size="35"></td>
                        </tr>
                        <tr>
                            <td>Interest :</td>
                            <td><input type="text" name="interest" placeholder="Interest"  class="form-control inputBox" size="35"></td>
                        </tr>
                        {{--<tr>--}}
                        {{--<td>Image :</td>--}}
                        {{--<td><input type="file" name="image" size="35"></td>--}}
                        {{--</tr>--}}
                        <tr>
                            <td colspan="2">
                                <a href="{{ url('/Profile') }}" class="btn btn-primary" style="float:left;">Back</a>
                                <input type="submit" value="Update profile" class="btn btn-success" style="float: right; margin-top: 0px;">
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </form>

            <div class="profileDetails" id="profileDetails">

                <table class="table table-bordered" style=" border-radius: 10px;">
                    @if(Session::has('message'))
                        <div class="alert alert-success"> {{Session::get('message')}} </div>
                    @elseif(Session::has('destroy'))
                        <div class="alert alert-danger"> {{Session::get('destroy')}} </div>
                    @endif

                    <tbody>
                    <tr>
                        <td>Full Name :</td>
                        <td>{{ $info->first_name  }}  {{ $info->last_name  }}</td>
                    </tr>
                    <tr>
                        <td>Gender :</td>
                        <td>{{$info->gender}}</td>
                    </tr>
                    <tr>
                        <td>Date Of Birth :</td>
                        <td>{{$info->dob}}</td>
                    </tr>
                    <tr>
                        <td>Hobby :</td>
                        <td>{{$info->hobby}}</td>
                    </tr>
                    <tr>
                        <td>Interest :</td>
                        <td>{{ $info->interest }}</td>
                    </tr>
                    </tbody>
                </table>

            </div>
        </div>
    @endforeach
@endsection


