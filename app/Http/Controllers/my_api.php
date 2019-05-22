<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Http\Resources\articleresource;

class my_api extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

         return articleresource::collection(Article::with('user')->paginate(25));
        //$articles=Article::paginate(15);
        //print_r($articles);

      // return articleresource::collection($articles);

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

        $articles=new Article;
        $articles->user_id=$request->input('user_id');
        $articles->title=$request->input('title');
        $articles->body=$request->input('body');
        if($articles->save())
        {
         return new articleresource($articles);
        }
        /*inserting and updating data into articles table
        $article=$request->isMethod('put') ? Article::FindOrFail
        ($request->article_id):new Article;
        $article->id=$request->input('$article_id');
        $article->user_id=$request->input('$user_id');
        $article->title=$request->input('$title');
        $article->body=$request->input('$body');
        if($article->save())
        {
            return new articleresource($article);
        }
        */

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

        $article=Article::FindOrFail($id);
        return new articleresource($article);
    }



    public function edit(Request $request, $id)
        //
        {
        $this->validate($request,[
            'title'=>'required',
            'body'=>'required'
        ]);

    $data=array(
'user_id'=>$request->input('user_id'),
'title'=>$request->input('title'),
'body'=>$request->input('body'));
Article::where('id',$id)->update($data);



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
        //dleting from article table

        $article=Article::FindOrFail($id);
        $logged_user=auth('api')->user()->id;
        $del_article=$article->user_id;
        if($logged_user==$del_article){
          if($article->delete())
          {
          return 'deletion successfully';
        }
        }else{
          return "you dont have enough permission contact your system administrator";
        }

    }
}
