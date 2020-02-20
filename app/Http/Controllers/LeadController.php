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
     $called_22 = DB::table('leads')->where('status', '=', 'called')->where('last_name', '=', 'Taladpd22.')->select(DB::raw('count(*) as Called_22'))->get();
     $new_22=DB::table('leads')->where('status', '=', 'New')->where('last_name', '=', 'Taladpd22.')->select(DB::raw('count(*) as New_22'))->get();
     $called_36 = DB::table('leads')->where('status', '=', 'called')->where('last_name', '=', 'Taladpd36.')->select(DB::raw('count(*) as Called_36'))->get();
     $new_36=DB::table('leads')->where('status', '=', 'New')->where('last_name', '=', 'Taladpd36.')->select(DB::raw('count(*) as New_36'))->get();
     $called_52 = DB::table('leads')->where('status', '=', 'called')->where('last_name', '=', 'Taladpd52.')->select(DB::raw('count(*) as Called_52'))->get();
     $new_52=DB::table('leads')->where('status', '=', 'New')->where('last_name', '=', 'Taladpd52.')->select(DB::raw('count(*) as New_52'))->get();
     $called_112 = DB::table('leads')->where('status', '=', 'called')->where('last_name', '=', 'Taladpd112.')->select(DB::raw('count(*) as Called_112'))->get();
     $new_112=DB::table('leads')->where('status', '=', 'New')->where('last_name', '=', 'Taladpd112.')->select(DB::raw('count(*) as New_112'))->get();
     $called_232 = DB::table('leads')->where('status', '=', 'called')->where('last_name', '=', 'Taladpd232.')->select(DB::raw('count(*) as Called_232'))->get();
     $new_232=DB::table('leads')->where('status', '=', 'New')->where('last_name', '=', 'Taladpd232.')->select(DB::raw('count(*) as New_232'))->get();
     $called_172 = DB::table('leads')->where('status', '=', 'called')->where('last_name', '=', 'Taladpd172.')->select(DB::raw('count(*) as Called_172'))->get();
     $new_172=DB::table('leads')->where('status', '=', 'New')->where('last_name', '=', 'Taladpd172.')->select(DB::raw('count(*) as New_172'))->get();
     $collection = collect([$called,$new,$called_22,$new_22,$called_36,$new_36,$called_52,$new_52,$called_112,$new_112,$called_232,$new_232,$called_172,$new_172]);
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
      ini_set('max_execution_time', -1);
        //return $request->all();

               $request->validate([
        //'dp36'=>'numeric|min:50|max:500',
        //'dp52'=>'numeric|min:50|max:500',

      ]);

       $user_id= $request->input('selected');
       $dp22=$request->input('dp22');
       $dp36=$request->input('dp36');
       $dp52=$request->input('dp52');
       $dp112=$request->input('dp112');
       $dp232=$request->input('dp232');
       $dp172=$request->input('dp172');


foreach ($user_id as $value) {
  if($dp22 and $dp36 and $dp52 and $dp112 and $dp232 and $dp172){
    //this will excecute when you pass both $36 And $43 Values
    $users0 = DB::table('leads')
    ->where('user_id', '=',$value)
    ->where('last_name', '=', 'Taladpd22.')
    ->where('status', '=', 'New')
    ->limit($dp22)
    ->get();
 $users1 = DB::table('leads')
 ->where('user_id', '=',$value)
 ->where('last_name', '=', 'Taladpd36.')
 ->where('status', '=', 'New')
 ->limit($dp36)
 ->get();
 $users2 = DB::table('leads')
 ->where('user_id', '=',$value)
 ->where('last_name', '=', 'Taladpd52.')
 ->where('status', '=', 'New')
 ->limit($dp52)
 ->get();
 $users3 = DB::table('leads')
 ->where('user_id', '=',$value)
 ->where('last_name', '=', 'Taladpd112.')
 ->where('status', '=', 'New')
 ->limit($dp112)
 ->get();
 $users4 = DB::table('leads')
 ->where('user_id', '=',$value)
 ->where('last_name', '=', 'Taladpd172.')
 ->where('status', '=', 'New')
 ->limit($dp172)
 ->get();
 $users5 = DB::table('leads')
 ->where('user_id', '=',$value)
 ->where('last_name', '=', 'Taladpd232.')
 ->where('status', '=', 'New')
 ->limit($dp232)
 ->get();
 $users1=$users1->merge($users0)->merge($users2)->merge($users3)->merge($users4)->merge($users5);
$final[]=$users1;
 }elseif ($dp36) {
 $users1 = DB::table('leads')
 ->where('user_id', '=',$value)
 ->where('last_name', '=', 'Taladpd36.')
 ->where('status', '=', 'New')
 ->limit($dp36)
 ->get();
  $final[]=$users1;
 //dd($users1);
}elseif($dp52){
 // will excecute if you pass $43 only
 $users2 = DB::table('leads')
 ->where('user_id', '=',$value)
 ->where('last_name', '=', 'Taladpd52.')
 ->where('status', '=', 'New')
 ->limit($dp52)
 ->get();
 $final[]=$users2;
}elseif ($dp112) {
  $users2 = DB::table('leads')
  ->where('user_id', '=',$value)
  ->where('last_name', '=', 'Taladpd112.')
  ->where('status', '=', 'New')
  ->limit($dp112)
  ->get();
  $final[]=$users2;

}elseif ($dp172) {
  $users2 = DB::table('leads')
  ->where('user_id', '=',$value)
  ->where('last_name', '=', 'Taladpd172.')
  ->where('status', '=', 'New')
  ->limit($dp172)
  ->get();
  $final[]=$users2;
}elseif ($dp232) {
  $users2 = DB::table('leads')
  ->where('user_id', '=',$value)
  ->where('last_name', '=', 'Taladpd232.')
  ->where('status', '=', 'New')
  ->limit($dp232)
  ->get();
  $final[]=$users2;
}elseif ($dp22) {
  // code...
  $users2 = DB::table('leads')
  ->where('user_id', '=',$value)
  ->where('last_name', '=', 'Taladpd22.')
  ->where('status', '=', 'New')
  ->limit($dp22)
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
      $Total_Uncontacted_22=$request->input('Total_Uncontacted_22');
      $Total_Contacted_22=$request->input('Total_Contacted_22');
      $Total_Uncontacted_36=$request->input('Total_Uncontacted_36');
      $Total_Contacted_36=$request->input('Total_Contacted_36');
      $Total_Uncontacted_52=$request->input('Total_Uncontacted_52');
      $Total_Contacted_52=$request->input('Total_Contacted_52');
      $Total_Uncontacted_112=$request->input('Total_Uncontacted_112');
      $Total_Contacted_112=$request->input('Total_Contacted_112');
      $Total_Uncontacted_232=$request->input('Total_Uncontacted_232');
      $Total_Contacted_232=$request->input('Total_Contacted_232');
      $Total_Uncontacted_172=$request->input('Total_Uncontacted_172');
      $Total_Contacted_172=$request->input('Total_Contacted_172');
      //check value passed from the frontend to excecute the logics
      if($Total_Uncontacted){

        $remains =lead::query()
        ->where('status', '=', 'New')
        ->with('user')
        ->select('user_id', DB::raw('count(*) as total'))
        ->groupBy('user_id')
        ->orderByDesc('total')
        ->get();
        return $remains;

      }elseif ($Total_Contacted) {
        // code...
          $remains =lead::query()
        ->where('status', '=', 'called')
        ->with('user')
        ->select('user_id', DB::raw('count(*) as total'))
        ->groupBy('user_id')
        ->orderByDesc('total')
        ->get();
        return $remains;
      }elseif ($Total_Uncontacted_36) {
        // code...
        $remains =lead::query()
        ->where('last_name', '=', 'Taladpd36.')
        ->with('user')
        ->where('status', '=', 'New')
        ->select('user_id', DB::raw('count(*) as total'))
        ->groupBy('user_id')
        ->orderByDesc('total')
        ->get();
        return $remains;
      }elseif ($Total_Contacted_36) {
        // code...
          $remains =lead::query()
        ->where('last_name', '=', 'Taladpd36.')
        ->with('user')
        ->where('status', '=', 'called')
        ->select('user_id', DB::raw('count(*) as total'))
        ->groupBy('user_id')
        ->orderByDesc('total')
        ->get();
        return $remains;
      }elseif ($Total_Uncontacted_52) {
        // code...
        $remains =lead::query()
        ->where('last_name', '=', 'Taladpd52.')
        ->with('user')
        ->where('status', '=', 'New')
        ->select('user_id', DB::raw('count(*) as total'))
        ->groupBy('user_id')
        ->orderByDesc('total')
        ->get();
        return $remains;
      }elseif ($Total_Contacted_52) {
        // code...
          $remains =lead::query()
        ->where('last_name', '=', 'Taladpd52.')
        ->with('user')
        ->where('status', '=', 'called')
        ->select('user_id', DB::raw('count(*) as total'))
        ->groupBy('user_id')
        ->orderByDesc('total')
        ->get();
        return $remains;

      }elseif ($Total_Contacted_112) {
        $remains =lead::query()
      ->where('last_name', '=', 'Taladpd112.')
      ->with('user')
      ->where('status', '=', 'called')
      ->select('user_id', DB::raw('count(*) as total'))
      ->groupBy('user_id')
      ->orderByDesc('total')
      ->get();
      return $remains;

      }elseif ($Total_Uncontacted_112) {
        $remains =lead::query()
        ->where('last_name', '=', 'Taladpd112.')
        ->with('user')
        ->where('status', '=', 'New')
        ->select('user_id', DB::raw('count(*) as total'))
        ->groupBy('user_id')
        ->orderByDesc('total')
        ->get();
        return $remains;

      }elseif ($Total_Contacted_232) {
        // code...
        $remains =lead::query()
      ->where('last_name', '=', 'Taladpd232.')
      ->with('user')
      ->where('status', '=', 'called')
      ->select('user_id', DB::raw('count(*) as total'))
      ->groupBy('user_id')
      ->orderByDesc('total')
      ->get();
      return $remains;
      }elseif ($Total_Uncontacted_232) {
        // code...
        $remains =lead::query()
        ->where('last_name', '=', 'Taladpd232.')
        ->with('user')
        ->where('status', '=', 'New')
        ->select('user_id', DB::raw('count(*) as total'))
        ->groupBy('user_id')
        ->orderByDesc('total')
        ->get();
        return $remains;
      }elseif ($Total_Contacted_172) {
        // code...
        $remains =lead::query()
      ->where('last_name', '=', 'Taladpd172.')
      ->with('user')
      ->where('status', '=', 'called')
      ->select('user_id', DB::raw('count(*) as total'))
      ->groupBy('user_id')
      ->orderByDesc('total')
      ->get();
      return $remains;
    }elseif ($Total_Uncontacted_172) {
        // code...
        $remains =lead::query()
        ->where('last_name', '=', 'Taladpd172.')
        ->with('user')
        ->where('status', '=', 'New')
        ->select('user_id', DB::raw('count(*) as total'))
        ->groupBy('user_id')
        ->orderByDesc('total')
        ->get();
        return $remains;
      }elseif ($Total_Contacted_22) {
        // code...
        $remains =lead::query()
      ->where('last_name', '=', 'Taladpd22.')
      ->with('user')
      ->where('status', '=', 'called')
      ->select('user_id', DB::raw('count(*) as total'))
      ->groupBy('user_id')
      ->orderByDesc('total')
      ->get();
      return $remains;

      }elseif ($Total_Uncontacted_22) {
        // code...
        // code...
        $remains =lead::query()
        ->where('last_name', '=', 'Taladpd22.')
        ->with('user')
        ->where('status', '=', 'New')
        ->select('user_id', DB::raw('count(*) as total'))
        ->groupBy('user_id')
        ->orderByDesc('total')
        ->get();
        return $remains;
      }
      else {
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
    public function revert(Request $request)
    {
      $undo=$request->input('undo');
      if(DB::table('leads')->whereIn('id', $undo)->update(array('status' =>'New')))
      {
      return 'you successfully reversed the changes';
      }else {
        return "changes failed";
      }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\lead  $lead
     * @return \Illuminate\Http\Response
     */
    public function revertAll( Request $request)
    {
         //  return $request->all();
        $revert_id=$request->input('revert_id');
        $last_name=$request->input('last_name');

      $reverts= DB::table('leads')->whereIn('user_id', $revert_id)
                                    ->where('last_name','=',$last_name)
                                    ->where('status', '=', 'called')
                                    ->update(array('status' =>'New'));





    }

    public function close( Request $request)
    {
      $closed=$request->input('closed');
      $str_arr = explode ("\n", $closed);
if (DB::table('leads')->whereIn('cfid', $str_arr)->update(array('status' =>'Closed'))) {
  // code...
  return 'Accounts successfully closed';
}
return  'Account Closing failed try again!';
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
