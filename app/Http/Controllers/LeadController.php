<?php

namespace App\Http\Controllers;

use App\lead;
use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Resources\LeadResource;
use Illuminate\Support\Arr;
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
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $user_id= array(641,602);
       $dp36=$request->input('dp36');
       $dp43=$request->input('dp43');
foreach ($user_id as $value) {
  if($dp36 and $dp43){
    //this will excecute when you pass both $36 And $43 Values
 $users1 = DB::table('leads')
 ->where('user_id', '=',$value)
 ->where('last_name', '=', 'TAladpd36.')
 ->where('status', '=', 'New')
 ->limit($dp36)
 ->get();
 $users2 = DB::table('leads')
 ->where('user_id', '=',$value)
 ->where('last_name', '=', 'TAladpd43.')
 ->where('status', '=', 'New')
 ->limit($dp43)
 ->get();
 $users1=$users1->merge($users2);
$final[]=$users1;
 }elseif ($dp36) {
 $users1 = DB::table('leads')
 ->where('user_id', '=',$value)
 ->where('last_name', '=', 'TAladpd36.')
 ->where('status', '=', 'New')
 ->limit($dp36)
 ->get();
  $final[]=$users1;
 //dd($users1);
 }elseif($dp43){
 // will excecute if you pass $43 only
 $users2 = DB::table('leads')
 ->where('user_id', '=',$value)
 ->where('last_name', '=', 'TAladpd43.')
 ->where('status', '=', 'New')
 ->limit($dp43)
 ->get();
 $final[]=$users2;
 }
}
//collapse to obtain a single array
$final=Arr::collapse($final);


//obtain the id values to be updated
  $id_update= Arr::pluck($final, 'id');
  //call the update Statement
  if(DB::table('leads')->whereIn('id', $id_update)->update(array('status' =>'called')))
  {
    return $final;

  }
  else{
    return 'Update failed';
  }

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
