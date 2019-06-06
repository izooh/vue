<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Rating;
use App\Http\Resources\RatingResource;


class RatingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)

    {
      $status=$request->input('status');
      $ranks = Rating::query()->with('user')
          ->select('user_id', DB::raw('count(*) as total'))->selectRaw('SUM('.$status.') TotalPoints')
          ->groupBy('user_id')
          ->orderByDesc('TotalPoints')
          ->get();

   return RatingResource::collection($ranks);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

    $ranks = Rating::query()->whereDate('created_at', '=', date('2019-04-12'))->with('user')
          ->select('user_id', DB::raw('count(*) as total'))->selectRaw('SUM(`Totals`) TotalPoints')
        ->groupBy('user_id')
        ->orderByDesc('TotalPoints')
        ->get();


     return RatingResource::collection($ranks);
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
        $ratings=new Rating;
        $ratings->user_id=$request->input('user_id');
        $ratings->Opening=$request->input('Opening');
        $ratings->Verification=$request->input('Verification');
        $ratings->Closing=$request->input('Closing');
        $ratings->Understanding=$request->input('Understanding');
        $ratings->Probing=$request->input('Probing');
        $ratings->Negotiation=$request->input('Negotiation');
        $ratings->Product_Knowledge=$request->input('Product_Knowledge');
        $ratings->Urgency=$request->input('Urgency');
        $ratings->Commitment=$request->input('Commitment');
        $ratings->Handling_Efficiency=$request->input('Handling_Efficiency');
        $ratings->Empathy=$request->input('Empathy');
        $ratings->Language=$request->input('Language');
        $ratings->Tone_Manner=$request->input('Tone_Manner');
        $ratings->Timeliness=$request->input('Timeliness');
        $ratings->Listening=$request->input('Listening');
        $ratings->First_Contact_Resolution=$request->input('First_Contact_Resolution');
        $ratings->Call_Controlling=$request->input('Call_Controlling');
        $ratings->Totals=$request->input('Opening')+$request->input('Closing')+
        $request->input('Verification')+$request->input('Understanding')+
        $request->input('Probing')+$request->input('Negotiation')+
        $request->input('Product_Knowledge')+$request->input('Urgency')+
        $request->input('Handling_Efficiency')+$request->input('Empathy')+
        $request->input('Language')+$request->input('Tone_Manner')+
        $request->input('Timeliness')+$request->input('Listening')+
        $request->input('First_Contact_Resolution')+$request->input('Call_Controlling');
        if($ratings->save())
        {
         return new RatingResource($ratings);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sum=Rating::where('user_id',$id)->sum('Opening');
      $avg=Rating::where('user_id',$id)->avg('Opening');
      $data=collect(['sum'=>$sum,'average'=>$avg]);
           return new RatingResource($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }
}
