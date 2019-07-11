<?php

namespace App\Http\Controllers;

use App\Promise;
use Illuminate\Http\Request;

class PromiseController extends Controller
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
        $promise= new Promise;
        $promise->user_id=$request->input('user_id');
        $promise->contact=$request->input('contact');
        $promise->ptp_date=$request->input('ptp_date');
        if($promise->save()){
          return 'details updated successfully';
        }else{
           return 'details not saved';
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Promise  $promise
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
      //inputs from front end
      //
      $date1=$request->input('date1');
      $date2=$request->input('date2');
      if($date1 and $date2){
        $ptps=Promise::query()
        ->whereBetween('ptp_date', [$date1, $date2])
        ->with('lead')
        ->select('contact')
         ->get();
         return $ptps;
      }elseif ($date1) {
        // code...
        $ptps=Promise::query()
        ->whereDate('ptp_date',[$date1])
        ->with('lead')
        ->select('contact')
         ->get();
         return $ptps;
      }else {
        return 'select a specific date';
      }




    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Promise  $promise
     * @return \Illuminate\Http\Response
     */
    public function edit(Promise $promise)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Promise  $promise
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Promise $promise)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Promise  $promise
     * @return \Illuminate\Http\Response
     */
    public function destroy(Promise $promise)
    {
        //
    }
}
