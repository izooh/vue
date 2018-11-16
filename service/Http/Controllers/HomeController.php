<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Article;
use View;

class HomeController extends Controller
{
	public function vue(){
		return view('vue');
	}

	//Returning a specific user profile
   public function prof($username){
		$user=User::where('$username',$username)->with('article')->firstOrFail();
		print_r($user);
		//return View::make('profile')->with('user',$user);

}
//returning all article model with relations
   public function art()
 {
	    //return view('welcome');
	    $articles= Article::all();

	    return view('articles',['articles'=>$articles]);
	   //

}
public function update(){
	return View::make('update');
}
}
