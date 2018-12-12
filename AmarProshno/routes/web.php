<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','QuestionsController@PublicUser');

Route::get('/Signup',function(){
    return view('auth.signups');
});

Route::get('/Signin',function(){
    return view('auth.login');
});
Route::post('/Signin','QuestionsController@signIn');
Route::get('/AskSignin','QuestionsController@AskSignin');
Route::any('/PublicSearch','QuestionsController@PublicSearch');

Route::get('/Show-Read-More/{id}','QuestionsController@ShowReadMore');
Route::get('/Show-Read-More', 'SecureController@ShowReadMore');
Route::get('/Read-More', 'SecureController@ReadMore');
Route::get('/P-Contact','ProfilesController@PContact');

Route::get('/Profile','ProfilesController@index');

Auth::routes();

Route::get('/home', 'QuestionsController@index')->name('home');


Route::group(['middleware' => 'auth'],function (){
    Route::get('/AskQuestion','QuestionsController@AskQuestion');
    Route::post('/changeProfile', 'ProfilesController@ChangeImage');
    Route::post('/ProfileUp','ProfilesController@store');
    Route::post('/PostQuestion','QuestionsController@store');
    Route::get('/User','QuestionsController@index');

    Route::get('/Delete-post/{id}','QuestionsController@destroy');
    Route::get('/Edit-post/{id}/edit','QuestionsController@edit');

    Route::get('/DeleteHtml/{id}','TagesController@DeleteHtml');
    Route::get('/DeleteCss/{id}','TagesController@DeleteCss');
    Route::get('/DeletePhp/{id}','TagesController@DeletePhp');
    Route::get('/DeleteOop/{id}','TagesController@DeleteOop');
    Route::get('/DeleteMysql/{id}','TagesController@DeleteMysql');
    Route::get('/DeleteJavascript/{id}','TagesController@DeleteJavascript');
    Route::get('/DeleteAjax/{id}','TagesController@DeleteAjax');
    Route::get('/DeleteJquery/{id}','TagesController@DeleteJquery');

    Route::get('/My-Questions','QuestionsController@MyQuestions');
    Route::get('/MyDeleteHtml/{id}','TagesController@MyDeleteHtml');
    Route::get('/MyDeleteCss/{id}','TagesController@MyDeleteCss');
    Route::get('/MyDeletePhp/{id}','TagesController@MyDeletePhp');
    Route::get('/MyDeleteOop/{id}','TagesController@MyDeleteOop');
    Route::get('/MyDeleteMysql/{id}','TagesController@MyDeleteMysql');
    Route::get('/MyDeleteJavascript/{id}','TagesController@MyDeleteJavascript');
    Route::get('/MyDeleteAjax/{id}','TagesController@MyDeleteAjax');
    Route::get('/MyDeleteJquery/{id}','TagesController@MyDeleteJquery');

    Route::post('/PostAns/{id}','AnswersController@store');

    Route::get('/Contact','ProfilesController@Contact');
    Route::post('/Send_message',function (){
        return view('send_message');
    });

    Route::get('/Edit-ans/{q_id}/edit/{qu_id}','AnswersController@edit');
    Route::post('/UpdateAns/{id}/{q_id}','AnswersController@update');
    Route::get('/Delete-ans/{id}/{top}/{q_id}','AnswersController@destroy');
    Route::post('/UpdateQuestion/{id}','QuestionsController@update');


    Route::get('/Read-More/{id}','QuestionsController@show');
    Route::get('/RmDeleteHtml/{id}','TagesController@RmDeleteHtml');
    Route::get('/RmDeleteCss/{id}','TagesController@RmDeleteCss');
    Route::get('/RmDeletePhp/{id}','TagesController@RmDeletePhp');
    Route::get('/RmDeleteOop/{id}','TagesController@RmDeleteOop');
    Route::get('/RmDeleteMysql/{id}','TagesController@RmDeleteMysql');
    Route::get('/RmDeleteJavascript/{id}','TagesController@RmDeleteJavascript');
    Route::get('/RmDeleteAjax/{id}','TagesController@RmDeleteAjax');
    Route::get('/RmDeleteJquery/{id}','TagesController@RmDeleteJquery');

    Route::post('/rateQue/{id}/{user_id}','TagesController@RateQue');
    Route::post('/rateAns/{id}/{user_id}','TagesController@RateAns');




});
