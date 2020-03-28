@extends('layouts.custom')
@section('content')
<br>
<div class="container">
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    Add Complain
  </button>
  <table class="table table-striped">
    <thead>
      <tr>
       
        <th scope="col">Complain</th>
        <th scope="col">Date of Complain</th>
        <th scope="col">Phone Number</th>
        <th scope="col">Resolution</th>
        <th scope="col">Date of Review</th>
        <th scope="col">Reviewer</th>
      </tr>
    </thead>
    <tbody>
        @foreach($complain_reviewed as $complain)
      <tr>
       
        <td>{{$complain->complain}}</td>
      <td>{{$complain->complain_date}}</td>
      <td>{{$complain->phone}}</td>
        <td>{{$complain->resolution}}</td>
        <td>{{$complain->resolution_date}}</td>
        <td>{{$complain->reviewer}}</td>
       
      </tr>
      @endforeach
    </tbody>
  </table> 
  {{$complain_reviewed->links()}}   
</div>
   <!-- Modal -->
   <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Complain log</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
          <form method="POST" action="{{route('addnew')}}">
            @csrf
            <div class="form-group">
              <label>Phone number</label>
              <input type="text" class="form-control"  placeholder="Enter phone number" name="phone">
             
            </div>
            <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <label class="input-group-text" for="inputGroupSelect01">Options</label>
                    </div>
                    <select class="custom-select" id="inputGroupSelect01" name="complain">
                      <option selected>Complain Categories</option>
                      <option value="Excessive Calls">Excessive Calls </option>
                      <option value="Rude Agent">Rude Agent</option>
                      <option value="Excessive SMS">Excessive SMS</option>
                      <option value="Verbal Abuse">Verbal Abuse</option>
                      <option value="SMS Abuse">SMS Abuse</option>
                      <option value="Legal">Legal</option>
                      <option value="Regulatory">Regulatory</option>
                      <option value="Credit Reporting">Credit Reporting</option>
                      <option value="Payment not received">Payment not received</option>
                      <option value="Not happy with fees or non approval">Not happy with fees or non approval</option>
    
                    </select>
                  </div>
                 
                 
            
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
           
          </div>
        </div>
      </div>
    </div>
    @if (session('status'))
    <div class="alert alert-info">
        <a class="close" data-dismiss="alert">×</a>
        <p>{{ session('status') }}</p>
    </div>
   
@endif
@endsection
