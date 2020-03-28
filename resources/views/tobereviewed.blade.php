@extends('layouts.custom')
@section('content')
<br>


 @foreach($tobereviewed as $thevalue)
<form method="POST" action="{{route('review',['id'=>$thevalue->id])}}">
@csrf
    <div class="form-group">
      <label for="agent name">Agent Name</label>
      <input type="text" class="form-control" id="agent name" value="{{$thevalue->agent_name}}" readonly>
    </div>
    <div class="form-group">
            <label for="agent name">Complaner phone</label>
            <input type="text" class="form-control" id="agent name" value="{{$thevalue->phone}}" readonly>
          </div>
    <div class="form-group">
        <label for="agent name">Complain description</label>
        <input type="text" class="form-control" id="agent name" value="{{$thevalue->complain}}" readonly>
    </div>
    <div class="form-group">
            <label for="agent name">Complain date</label>
            <input type="text" class="form-control" id="agent name" value="{{$thevalue->complain_date}}" readonly>
        </div>
      <div class="form-group">
        <label for="exampleFormControlTextarea1">Enter Review</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="resolution"></textarea>
      </div>
    
    <button type="submit" class="btn btn-primary">Review</button>
  </form> 
 
  @endforeach
@endsection