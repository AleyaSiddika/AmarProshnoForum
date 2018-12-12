<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class TagesController extends Controller
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
    public function DeleteHtml(Request $request,$id)
    {
        DB::table('questions')
            ->where('id',$id)
            ->update(['html'=>0]);
        return redirect('/User');
    }

    public function DeleteCss(Request $request,$id)
    {
        DB::table('questions')
            ->where('id',$id)
            ->update(['css'=>0]);
        return redirect('/User');
    }

    public function DeletePhp(Request $request,$id)
    {
        DB::table('questions')
            ->where('id',$id)
            ->update(['php'=>0]);
        return redirect('/User');
    }

    public function DeleteOop(Request $request,$id)
    {
        DB::table('questions')
            ->where('id',$id)
            ->update(['oop'=>0]);
        return redirect('/User');
    }

    public function DeleteMysql(Request $request,$id)
    {
        DB::table('questions')
            ->where('id',$id)
            ->update(['mysql'=>0]);
        return redirect('/User');
    }
    public function DeleteJavascript(Request $request,$id)
    {
        DB::table('questions')
            ->where('id',$id)
            ->update(['javascript'=>0]);
        return redirect('/User');
    }

    public function DeleteAjax(Request $request,$id)
    {
        DB::table('questions')
            ->where('id',$id)
            ->update(['ajax'=>0]);
        return redirect('/User');
    }
    public function DeleteJquery(Request $request,$id)
    {
        DB::table('questions')
            ->where('id',$id)
            ->update(['jquery'=>0]);
        return redirect('/User');
    }

    public function MyDeleteHtml(Request $request,$id)
    {
        DB::table('questions')
            ->where('id',$id)
            ->update(['html'=>0]);
        return redirect('/My-Questions');
    }
    public function MyDeleteCss(Request $request,$id)
    {
        DB::table('questions')
            ->where('id',$id)
            ->update(['css'=>0]);
        return redirect('/My-Questions');
    }
    public function MyDeletePhp(Request $request,$id)
    {
        DB::table('questions')
            ->where('id',$id)
            ->update(['php'=>0]);
        return redirect('/My-Questions');
    }
    public function MyDeleteOop(Request $request,$id)
    {
        DB::table('questions')
            ->where('id',$id)
            ->update(['oop'=>0]);
        return redirect('/My-Questions');
    }
    public function MyDeleteMysql(Request $request,$id)
    {
        DB::table('questions')
            ->where('id',$id)
            ->update(['mysql'=>0]);
        return redirect('/My-Questions');
    }
    public function MyDeleteJavascript(Request $request,$id)
    {
        DB::table('questions')
            ->where('id',$id)
            ->update(['javascript'=>0]);
        return redirect('/My-Questions');
    }
    public function MyDeleteAjax(Request $request,$id)
    {
        DB::table('questions')
            ->where('id',$id)
            ->update(['ajax'=>0]);
        return redirect('/My-Questions');
    }
    public function MyDeleteJquery(Request $request,$id)
    {
        DB::table('questions')
            ->where('id',$id)
            ->update(['jquery'=>0]);
        return redirect('/My-Questions');
    }
   public function RmDeleteHtml(Request $request,$id)
    {
        DB::table('questions')
            ->where('id',$id)
            ->update(['html'=>0]);
        return redirect('/Read-More/'.$id);
    }
    public function RmDeleteCss(Request $request,$id)
    {
        DB::table('questions')
            ->where('id',$id)
            ->update(['css'=>0]);
        return redirect('/Read-More/'.$id);
    }
    public function RmDeletePhp(Request $request,$id)
    {
        DB::table('questions')
            ->where('id',$id)
            ->update(['php'=>0]);
        return redirect('/Read-More/'.$id);
    }
    public function RmDeleteOop(Request $request,$id)
    {
        DB::table('questions')
            ->where('id',$id)
            ->update(['oop'=>0]);
        return redirect('/Read-More/'.$id);
    }
    public function RmDeleteMysql(Request $request,$id)
    {
        DB::table('questions')
            ->where('id',$id)
            ->update(['mysql'=>0]);
        return redirect('/Read-More/'.$id);
    }
    public function RmDeleteJavascript(Request $request,$id)
    {
        DB::table('questions')
            ->where('id',$id)
            ->update(['javascript'=>0]);
        return redirect('/Read-More/'.$id);
    }
  public function RmDeleteAjax(Request $request,$id)
    {
        DB::table('questions')
            ->where('id',$id)
            ->update(['ajax'=>0]);
        return redirect('/Read-More/'.$id);
    }

  public function RmDeleteJquery(Request $request,$id)
    {
        DB::table('questions')
            ->where('id',$id)
            ->update(['jquery'=>0]);
        return redirect('/Read-More/'.$id);
    }
  public function RateQue(Request $request,$id,$user_id)
    {
      $in = Input::get('rate');
      $Up = Input::get('showUp');
      $qid = $id;
      $userid = $user_id;
      DB::table('questions')
          ->where('questions.id',$id)
          ->update([
              'rate' => $in,
          ]);
      DB::table('rattings')
          ->insert([
              'user_id' => $userid,
              'que_id' => $qid,
              'showUp' => $Up,
          ]);
      return back();
    }
  public function RateAns(Request $request,$id,$user_id)
    {
      $in = Input::get('rate');
      $Up = Input::get('showUp');
      $qid = $id;
      $userid = $user_id;
      DB::table('answers')
          ->where('answers.id',$id)
          ->update([
              'rate' => $in,
          ]);
      DB::table('rattings')
          ->insert([
              'user_id' => $userid,
              'que_id' => $qid,
              'showUp' => $Up,
          ]);
      return back();
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
        //
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
}
