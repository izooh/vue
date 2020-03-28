<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Complain;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class ComplainsController extends Controller
{
    public function Addcomplain(Request $request)
    {
    
 //adding a new complain to the system
 $complains= new Complain;
 $complains->phone=$request->input('phone');
 $complains->agent_name=auth()->user()->name;
 $complains->complain=$request->input('complain');
 $complains->complain_date=date("Y-m-d");
 if ( $complains->save()) {
  Session::flash('status','complain added successfully');
   return redirect()->route('display');
 }
 return 'failed';

    }
    public function Displayall()
    {
  
     $complain_reviewed=DB::table('Complains')->where('agent_name',auth()->user()->name)->where('status','=','reviewed') 
     ->orderBy('complain_date','desc')
     ->paginate(10);
     Return view('agent',['complain_reviewed'=>$complain_reviewed]);

     
    }
    public function Displayunreviewed()
    {
  
     $complain_unreviewed=DB::table('Complains')->where('status','=','open')
     ->orderBy('complain_date','desc')
     ->paginate(5);
     Return view('complains',['complain_unreviewed'=>$complain_unreviewed]);

     
    }
    public function GetReview($id){
      $tobereviewed=DB::table('complains')->where('id',$id)
      ->get();
      return view('tobereviewed',['tobereviewed'=>$tobereviewed]);
    }
    public function Review(Request $request,$id)
    {
    
  $record=DB::table('complains')->where('id',$id)->update(array(
    'reviewer'=>auth()->user()->name,
    'resolution'=>$request->input('resolution'),
    'resolution_date'=>date("Y-m-d"),
    'status'=>'reviewed'
));
Session::flash('status','Reviewed successfully');
return redirect()->route('display_unreviewed');

    }


}

