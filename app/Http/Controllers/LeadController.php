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
      //called numbers and numbers not contacted
     $called = DB::table('leads')->where('status', '=', 'called')->select(DB::raw('count(*) as Called'))->get();
     $new=DB::table('leads')->where('status', '=', 'New')->select(DB::raw('count(*) as New'))->get();
     $called_43 = DB::table('leads')->where('status', '=', 'called')->where('last_name', '=', 'Taladpd43.')->select(DB::raw('count(*) as Called_43'))->get();
     $new_43=DB::table('leads')->where('status', '=', 'New')->where('last_name', '=', 'Taladpd43.')->select(DB::raw('count(*) as New_43'))->get();
     $called_36 = DB::table('leads')->where('status', '=', 'called')->where('last_name', '=', 'Taladpd36.')->select(DB::raw('count(*) as Called_36'))->get();
     $new_36=DB::table('leads')->where('status', '=', 'New')->where('last_name', '=', 'Taladpd36.')->select(DB::raw('count(*) as New_36'))->get();
     $collection = collect([$called,$new,$called_43,$new_43,$called_36,$new_36]);
     $collapsed = $collection->collapse();
      return $collapsed;
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
       $user_id= array(641,602,638,518,523,527,534,537,541,538,543,550,554,559,560,561,562,582,595,596,601,609,619);
       $dp36=$request->input('dp36');
       $dp43=$request->input('dp43');
foreach ($user_id as $value) {
  if($dp36 and $dp43){
    //this will excecute when you pass both $36 And $43 Values
 $users1 = DB::table('leads')
 ->where('user_id', '=',$value)
 ->where('last_name', '=', 'Taladpd36.')
 ->where('status', '=', 'New')
 ->limit($dp36)
 ->get();
 $users2 = DB::table('leads')
 ->where('user_id', '=',$value)
 ->where('last_name', '=', 'Taladpd43.')
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
    public function show(Request $request)
    {
      //values from the frontend
      $Total_Uncontacted=$request->input('Total_Uncontacted');
      $Total_Contacted=$request->input('Total_Contacted');
      $Total_Uncontacted_43=$request->input('Total_Uncontacted_43');
      $Total_Contacted_43=$request->input('Total_Contacted_43');
      $Total_Uncontacted_36=$request->input('Total_Uncontacted_36');
      $Total_Contacted_36=$request->input('Total_Contacted_36');
      //check value passed from the frontend to excecute the logics
      if($Total_Uncontacted){

        $remains = DB::table('leads')
        ->where('status', '=', 'New')
        ->select('user_id', DB::raw('count(*) as total'))
        ->groupBy('user_id')
        ->get();
        return $remains;

      }elseif ($Total_Contacted) {
        // code...
        $remains = DB::table('leads')
        ->where('status', '=', 'called')
        ->select('user_id', DB::raw('count(*) as total'))
        ->groupBy('user_id')
        ->get();
        return $remains;
      }elseif ($Total_Uncontacted_43) {
        // code...
        $remains = DB::table('leads')
        ->where('last_name', '=', 'Taladpd43.')
        ->where('status', '=', 'New')
        ->select('user_id', DB::raw('count(*) as total'))
        ->groupBy('user_id')
        ->get();
        return $remains;
      }elseif ($Total_Contacted_43) {
        // code...
        $remains = DB::table('leads')
        ->where('last_name', '=', 'Taladpd43.')
        ->where('status', '=', 'called')
        ->select('user_id', DB::raw('count(*) as total'))
        ->groupBy('user_id')
        ->get();
        return $remains;
      }elseif ($Total_Uncontacted_36) {
        // code...
        $remains = DB::table('leads')
        ->where('last_name', '=', 'Taladpd36.')
        ->where('status', '=', 'New')
        ->select('user_id', DB::raw('count(*) as total'))
        ->groupBy('user_id')
        ->get();
        return $remains;
      }elseif ($Total_Contacted_36) {
        // code...
        $remains = DB::table('leads')
        ->where('last_name', '=', 'Taladpd36.')
        ->where('status', '=', 'called')
        ->select('user_id', DB::raw('count(*) as total'))
        ->groupBy('user_id')
        ->get();
        return $remains;

      }else {
        // code...
        return 'nothing selected';
      }


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
    public function destroy()
    {
      lead::truncate();

    }
}
