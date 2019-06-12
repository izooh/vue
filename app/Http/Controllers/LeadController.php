<?php

namespace App\Http\Controllers;

use App\lead;
use App\Http\Resources\RatingResource;
use Illuminate\Http\Request;
use DB;
use Session;
class LeadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lead = lead::doesntHave('remains')->get();

        return new RatingResource($lead);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request ){
      $user_id= array(641,556);
      $dp36=$request->input('dp36');
      $dp43=$request->input('dp43');
      session()->put('new',$dp36);
      session()->put('old',$dp43);
      $user_id = array_map(function($value){
     $dp36=session('new');
     $dp43=session('old');
      if($dp36 and $dp43){
        //this will excecute when you pass both $36 And $43 Values
    $users1 = DB::table('leads')
    ->where('user_id', '=',$value)
   ->where('last_name', '=', 'Taladpd36.')
   ->limit($dp36)
   ->get();

     $users2 = DB::table('leads')
     ->where('user_id', '=',$value)
    ->where('last_name', '=', 'Taladpd43.')
    ->limit($dp43)
    ->get();
     echo $users1,$users2;
   }elseif ($dp36) {

     $users1 = DB::table('leads')
     ->where('user_id', '=',$value)
    ->where('last_name', '=', 'Taladpd36.')
    ->limit($dp36)
    ->get();
    echo $users1;
  }else {
   // will excecute if you pass $43 only
    $users2 = DB::table('leads')
    ->where('user_id', '=',$value)
   ->where('last_name', '=', 'Taladpd43.')
   ->limit($dp43)
   ->get();
   echo $users2;
  }
}, $user_id);





}
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\lead  $lead
     * @return \Illuminate\Http\Response
     */
    public function show(lead $lead)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\lead  $lead
     * @return \Illuminate\Http\Response
     */
    public function edit(lead $lead)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\lead  $lead
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, lead $lead)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\lead  $lead
     * @return \Illuminate\Http\Response
     */
    public function destroy(lead $lead)
    {
        //
    }
}
