<?php

namespace App\Http\Controllers;

use App\Suggestion;
use Illuminate\Http\Request;
use App\Http\Resources\articleresource;

class SuggestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
return articleresource::collection(Suggestion::with('user')->latest()->paginate(25));

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
      $this->validate($request,[
          'title'=>'required',
          'body'=>'required'
      ]);

      $suggestion=new Suggestion;
      $suggestion->user_id=$request->input('user_id');
      $suggestion->title=$request->input('title');
      $suggestion->body=$request->input('body');
      if($suggestion->save())
      {
       return new articleresource($suggestion);
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Suggestion  $suggestion
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $suggestion=Suggestion::where('user_id','=',$id)->latest()->get();
  return articleresource::collection($suggestion);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Suggestion  $suggestion
     * @return \Illuminate\Http\Response
     */
    public function edit(Suggestion $suggestion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Suggestion  $suggestion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Suggestion $suggestion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Suggestion  $suggestion
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

              $suggestion=Suggestion::FindOrFail($id);
              $logged_user=auth('api')->user()->id;
              $del_article=$suggestion->user_id;
              if($logged_user==$del_article){
                if($suggestion->delete())
                {
                return 'deletion successfully';
              }
              }else{
                return "you dont have enough permission contact your system administrator";
              }
    }
}
