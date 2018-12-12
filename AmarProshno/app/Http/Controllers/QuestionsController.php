<?php

namespace App\Http\Controllers;

use App\Questions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class QuestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userid = Auth::user()->id;
        $data = DB::table('questions')
            ->join('users','questions.user_id','=','users.id')
            ->join('profiles','questions.user_id','=','profiles.user_id')
            ->orderBy('questions.id','DESC')
            ->select('questions.*','users.name','profiles.image')
            ->paginate(10);
        $tenQue = DB::table('questions')
            ->join('users','questions.user_id','=','users.id')
            ->orderBy('questions.id','DESC')
            ->select('questions.*','users.name')
            ->limit(10)
            ->get();
        $topQue= DB::table('questions')
            ->where('questions.top','>=',5)
            ->limit(10)
            ->orderBy('questions.id','DESC')
            ->get();

        $profileImg = DB::table('profiles')
            ->where('user_id', $userid)
            ->get();
        return view('users')->with(['alldata' => $data,'tenQue'=>$tenQue,'topQue'=>$topQue, 'image' => $profileImg]);
    }
    public function PublicUser()
    {
        $data = DB::table('questions')
            ->join('users','questions.user_id','=','users.id')
            ->join('profiles','questions.user_id','=','profiles.user_id')
            ->orderBy('questions.id','DESC')
            ->select('questions.*','users.name','profiles.image')
            ->paginate(10);
        $tenQue = DB::table('questions')
            ->join('users','questions.user_id','=','users.id')
            ->orderBy('questions.id','DESC')
            ->select('questions.*','users.name')
            ->limit(10)
            ->get();
        $topQue= DB::table('questions')
            ->where('questions.top','>=',5)
            ->limit(10)
            ->orderBy('questions.id','DESC')
            ->get();
        return view('index')->with(['alldata' => $data,'tenQue'=> $tenQue,'topQue'=> $topQue]);
    }

    public function signIn()
    {
        return redirect('/Signin')->with('message','you must be login first');
    }

    public function AskSignin()
    {
        return redirect('/Signin')->with('message','you must be login first');
    }

    public function AskQuestion()
    {
        $userid = Auth::user()->id;
        $profileImg = DB::table('profiles')
            ->where('user_id', $userid)
            ->get();
        $tenQue = DB::table('questions')
            ->join('users','questions.user_id','=','users.id')
            ->orderBy('questions.id','DESC')
            ->select('questions.*','users.name')
            ->limit(10)
            ->get();
        $topQue= DB::table('questions')
            ->where('questions.top','>=',5)
            ->limit(10)
            ->orderBy('questions.id','DESC')
            ->get();
        return view('QuestionPage')->with(['image' => $profileImg,'tenQue'=>$tenQue,'topQue'=>$topQue]);
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
        $profileImg = DB::table('profiles')
            ->where('user_id', $userid)
            ->get();
        $topQue= DB::table('questions')
            ->where('questions.top','>=',5)
            ->limit(10)
            ->orderBy('questions.id','DESC')
            ->get();
        $tenQue = DB::table('questions')
            ->join('users','questions.user_id','=','users.id')
            ->orderBy('questions.id','DESC')
            ->select('questions.*','users.name')
            ->limit(10)
            ->get();
        $data = $request->all();
        Questions::create($data);
        return redirect('/User')->with('message','Question post successfully',['image' => $profileImg,'tenQue'=>$tenQue,'topQue'=>$topQue]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $userid = Auth::user()->id;
        $profileImg = DB::table('profiles')
            ->where('user_id', $userid)
            ->get();
        $data=  DB::table('questions',$id)
            ->where('questions.id',$id)
            ->join('users','questions.user_id','=','users.id')
            ->join('profiles','profiles.user_id','=','questions.user_id')
            ->select('questions.*','users.name','profiles.image')
            ->get();
        $answer = DB::table('answers')
            ->where('que_id',$id)
            ->join('users','users.id','=','answers.user_id')
            ->join('profiles','profiles.user_id','=','answers.user_id')
            ->select('answers.*','users.name','profiles.image')
            ->get();

        $tenQue = DB::table('questions')
            ->join('users','questions.user_id','=','users.id')
            ->orderBy('questions.id','DESC')
            ->select('questions.*','users.name')
            ->limit(10)
            ->get();
        $topQue= DB::table('questions')
            ->where('questions.top','>=',5)
            ->limit(10)
            ->orderBy('questions.id','DESC')
            ->get();
        return view('answer')->with(['info'=> $data,'tenQue'=>$tenQue,'topQue'=>$topQue, 'asnwers'=>$answer, 'image' => $profileImg]);
    }

    public function ShowReadMore($id)
    {
        $data = DB::table('questions')
            ->where('questions.id', $id)
            ->join('users', 'questions.user_id', '=', 'users.id' )
            ->join('profiles', 'questions.user_id', '=', 'profiles.user_id' )
            ->select('questions.*',  'users.name','profiles.image')
            ->get();

        $answer = DB::table('answers')
            ->where('que_id', $id)
            ->join('users', 'users.id', '=', 'answers.user_id' )
            ->join('profiles', 'answers.user_id', '=', 'profiles.user_id' )
            ->select('answers.*',  'users.name','profiles.image')
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



        return view('answerPage')->with(['info' => $data, 'asnwers' => $answer, 'tenQue' => $tenQue, 'topQue' => $topQue]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $userid = Auth::user()->id;
        $profileImg = DB::table('profiles')
            ->where('user_id', $userid)
            ->get();
        $data = Questions::find($id);
        $tenQue = DB::table('questions')
            ->join('users','questions.user_id','=','users.id')
            ->orderBy('questions.id','DESC')
            ->select('questions.*','users.name')
            ->limit(10)
            ->get();
        $topQue= DB::table('questions')
            ->where('questions.top','>=',5)
            ->limit(10)
            ->orderBy('questions.id','DESC')
            ->get();
        return view('EditQue')->with(['data' => $data,'tenQue'=>$tenQue,'topQue'=>$topQue, 'image' => $profileImg]);
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
        $userid = Auth::user()->id;
        $profileImg = DB::table('profiles')
            ->where('user_id', $userid)
            ->get();
        $tenQue = DB::table('questions')
            ->join('users','questions.user_id','=','users.id')
            ->orderBy('questions.id','DESC')
            ->select('questions.*','users.name')
            ->limit(10)
            ->get();

        $topQue= DB::table('questions')
            ->where('questions.top','>=',5)
            ->limit(10)
            ->orderBy('questions.id','DESC')
            ->get();
        $up = Questions::find($id);
        $data =$request->all();
        $up->update($data);
        return redirect('/User')->with('message','Question update successfully',['tenQue' => $tenQue,'topQue' => $topQue,'image' => $profileImg]);
    }

    public function PublicSearch()
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
        $q = Input::get('q');
        $data = Questions::where('title','LIKE','%'.$q.'%')
            ->orwhere('description','LIKE','%'.$q.'%')
            ->orwhere('html','LIKE','%'.$q.'%')
            ->orwhere('css','LIKE','%'.$q.'%')
            ->orwhere('php','LIKE','%'.$q.'%')
            ->orwhere('oop','LIKE','%'.$q.'%')
            ->orwhere('mysql','LIKE','%'.$q.'%')
            ->orwhere('javascript','LIKE','%'.$q.'%')
            ->orwhere('ajax','LIKE','%'.$q.'%')
            ->orwhere('jquery','LIKE','%'.$q.'%')
            ->join('users','questions.user_id','=','users.id')
            ->join('profiles','questions.user_id','=','profiles.user_id')
            ->select('questions.*','users.name','profiles.image')
            ->get();
        if(count($data)>0)
        {
            return view('PublicSearch')->withDetails($data)->withQuery($q)->with(['tenQue'=>$tenQue,'topQue'=>$topQue]);
        }
        else
        {
            return view('PublicSearch')->withMessage('No results. Try to search again!!!')->with(['tenQue'=>$tenQue]);
        }

    }
    public function MyQuestions()
    {
        $userid = Auth::user()->id;
        $data = DB::table('questions')
            ->where('questions.user_id',$userid)
            ->join('users','questions.user_id','=','users.id')
            ->join('profiles','questions.user_id','=','profiles.user_id')
            ->orderBy('questions.id','DESC')
            ->select('questions.*','users.name','profiles.image')
            ->paginate(8);
        $profileImg = DB::table('profiles')
            ->where('user_id', $userid)
            ->get();
        $tenQue = DB::table('questions')
            ->join('users','questions.user_id','=','users.id')
            ->orderBy('questions.id','DESC')
            ->select('questions.*','users.name')
            ->limit(10)
            ->get();
        $topQue= DB::table('questions')
            ->where('questions.top','>=',5)
            ->limit(10)
            ->orderBy('questions.id','DESC')
            ->get();
        return view('myQuestions')->with(['alldata' => $data, 'tenQue'=>$tenQue,'topQue'=>$topQue, 'image' => $profileImg]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $userid = Auth::user()->id;
        $profileImg = DB::table('profiles')
            ->where('user_id', $userid)
            ->get();
        $data=Questions::find($id);
        $data->delete();
        $topQue= DB::table('questions')
            ->where('questions.top','>=',5)
            ->limit(10)
            ->orderBy('questions.id','DESC')
            ->get();
        $tenQue = DB::table('questions')
            ->join('users','questions.user_id','=','users.id')
            ->orderBy('questions.id','DESC')
            ->select('questions.*','users.name')
            ->limit(10)
            ->get();
        return redirect('/User')->with('destroy','Question delete successfully',['image' => $profileImg , 'tenQue'=>$tenQue,'topQue'=>$topQue]);
    }

}
