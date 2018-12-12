<?php

namespace App\Http\Controllers;

use App\Answers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AnswersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request,$id)
    {
        $userid=Auth::user()->id;
        $data = $request->all();
        Answers::create($data);
        $profileImg = DB::table('profiles')
            ->where('user_id', $userid)
            ->get();
        $answer = DB::table('answers')
            ->leftJoin('users','users.id','=','answers.user_id')
            ->orderBy('que_id','DESC')
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
        return redirect('Read-More/'.$id)->with('message','Answer post successfully',['tenQue'=>$tenQue,'topQue'=>$topQue,'asnwers'=>$answer,'image' => $profileImg]);

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
    public function edit($id,$q_id)
    {
        $userid = Auth::user()->id;
        $que_id = $q_id;
        $data = Answers::find($id);
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
        return view('EditAns')->with(['tenQue'=>$tenQue,'topQue'=>$topQue,'data'=>$data,'id'=> $que_id,'image' => $profileImg]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id,$q_id)
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
        $up = Answers::find($id);
        $data = $request->all();
        $up->update($data);
        return redirect('/Read-More/'.$q_id)->with('message','Answer update successfully',['tenQue' => $tenQue,'topQue' => $topQue,'image' => $profileImg]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,$top,$q_id)
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
        $in = $top;
        $delete = $in -1;
        DB::table('questions')
            ->where('questions.id',$q_id)
            ->update(['top' => $delete]);
        $data = Answers::find($id);
        $data->delete();
        return back()->with('destroy','Answer delete successfully',['tenQue' => $tenQue,'topQue' => $topQue,'image' => $profileImg]);

    }
}
