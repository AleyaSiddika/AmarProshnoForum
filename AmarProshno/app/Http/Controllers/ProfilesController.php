<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;

class ProfilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userid = Auth::user()->id;
        $getData=DB::table('profiles')
            ->where('user_id',$userid)
            ->get();
        $profileImg = DB::table('profiles')
            ->where('user_id',$userid)
            ->get();

        return view('profiles')->with(['data'=>$getData, 'image'=>$profileImg]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $userid = Auth::user()->id;
        $data = $request->all();
        DB::table('profiles')
            ->where('user_id', $userid)
            ->update([
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'gender' => $data['gender'],
                'dob' => $data['dob'],
                'hobby' => $data['hobby'],
                'interest' => $data['interest'],
                'updated_at' => date('Y-m-d h:m:s'),

            ]);
        $getData = DB::table('profiles')
            ->where('user_id',$userid)
            ->get();
        $profileImg = DB::table('profiles')
            ->where('user_id', $userid)
            ->get();
        return view('profiles')->with(['data'=>$getData, 'image' => $profileImg]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }
    public function ChangeImage(Request $request)
    {
        $userid = Auth::user()->id;
        $image = Input::file('image');
        if(!isset($image)){
            return back()->with('destroy','Please select your picture');
        }
        else{
            if($request->hasFile('image')) {
                $user_image = Input::file('image');
                $basename = time().'.'.$user_image->getClientOriginalExtension();
                $path=public_path()."/profile_pic/". $basename;
                $data2= Image::make($user_image->getRealPath())->save($path);
                }
            DB::table('profiles')
                ->where('user_id', $userid)
                ->update(['image' => "/profile_pic/" . $basename]);
            return back()->with('message','Your profile picture uploaded successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function Contact()
    {
        $userid = Auth::user()->id;
        $profileImg = DB::table('profiles')
            ->where('user_id', $userid)
            ->get();
        $tenQue = DB::table('questions')
            ->join('users','questions.user_id','=','users.id' )
            ->orderBy('questions.id' , 'DESC')
            ->select('questions.*','users.name')
            ->limit(10)
            ->get();
        $topQue= DB::table('questions')
            ->where('questions.top','>=',5)
            ->limit(10)
            ->orderBy('questions.id','DESC')
            ->get();
        return view('ContactPage')->with(['image' => $profileImg,'tenQue' => $tenQue,'topQue' => $topQue]);
    }
    public function PContact()
    {

        $tenQue = DB::table('questions')
            ->join('users','questions.user_id','=','users.id' )
            ->orderBy('questions.id' , 'DESC')
            ->select('questions.*','users.name')
            ->limit(10)
            ->get();
        $topQue= DB::table('questions')
            ->where('questions.top','>=',5)
            ->limit(10)
            ->orderBy('questions.id','DESC')
            ->get();
        return view('PublicContact')->with(['tenQue' => $tenQue,'topQue' => $topQue]);
    }
}
