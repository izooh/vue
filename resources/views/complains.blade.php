@extends('layouts.custom')
@section('content')
<div class="container">
  <br>
 
    </button>
               <table class="table table-striped">
                            <thead>
                              <tr>
                               
                                <th scope="col">Complain</th>
                                <th scope="col">Date of Complain</th>
                                <th scope="col">agent name</th>
                                <th scope="col">Operations</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach($complain_unreviewed as $unreviewed)
                              <tr>
                               
                                <td>{{$unreviewed->complain}}</td>
                              <td>{{$unreviewed->complain_date}}</td>
                                <td>{{$unreviewed->agent_name}}</td>
                              <td><button type="button" class="btn btn-primary btn-sm"><a href="{{route('get_review',['id'=>$unreviewed->id])}}" class="text-warning">Review</a></button>||<button type="button" class="btn btn-danger btn-sm">Delete</button></td> 
                              </tr>
                              @endforeach
                            </tbody>
                          </table>
            {{$complain_unreviewed->links()}}
            @if (session('status'))
            <div class="alert alert-info">
                <a class="close" data-dismiss="alert">×</a>
                <p>{{ session('status') }}</p>
            </div>
            @endif
</div>

@endsection