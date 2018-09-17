





<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

    <title>Dark Art Concepts</title>
  </head>
  <body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  
  <a class="navbar-brand" href="#">Dark Art</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Call Details</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href='{{url("/update")}}'>Update</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Text</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="text" placeholder="Enter Debtor Info">
      <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>

</div>
<div class="container">
	
<div class="panel panel-default">
  <div class="panel-heading"><p class="text-success">PERSONAL DETAILS<span class="glyphicon glyphicon-camera"></span></p></div>
  <div class="panel-body">
  	
<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">Full Name</th>
      <th scope="col">Id Number</th>
      <th scope="col">Phone Number</th>
      <th scope="col">Email Address</th>
    </tr>
  </thead>
  <tbody>
  	
    <tr class="table-active">
      <th scope="row">{{$user->name}}</th>
      <td>{{$user->id_no}}</td>
      <td>{{$user->phone_no}}</td>
      <td>{{$user->email}}</td>
     
    </tr>

    
  </tbody>
</table>

  </div>
</div>

  <div class="panel panel-default">
  <div class="panel-heading"><p class="text-danger">LOAN INFORMATION</p></div>
  <div class="panel-body">
  	<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">Outsourced Amount(Ksh)</th>
      <th scope="col">Outsourced Date</th>
      <th scope="col">Total Paid(Ksh)</th>
      <th scope="col">Balance(Ksh)</th>
      <th scope="col">Account No</th>
      <th scope="col">Debt Category</th>
      <th scope="col">Client</th>

    </tr>
  </thead>
  @foreach($user->loan as $loan)
  <tbody>

    <tr class="table-active">
      <th scope="row">{{$loan->outsource}}</th>
      <td>{{$loan->taken_date}}</td>
      <td>{{$loan->paid}}</td>
      <td>{{$loan->balance}}</td>
      <td>{{$loan->account_name}}</td>
      <td>{{$loan->category}}</td>
      <td>{{$loan->client}}</td>
     
    </tr>
   
    
  </tbody>
      @endforeach
</table> 
 
  </div>
</div>
 <div class="panel panel-default">
  <div class="panel-heading"><p class="text-INFO">DEBTOR CALL RECORD</p></div>
  <div class="panel-body">
  <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">Contact type</th>
      <th scope="col">Status</th>
      <th scope="col">ptp</th>
      <th scope="col">ptp amount</th>
    
      

    </tr>
  </thead>
  @foreach($user->call as $call)
  <tbody>
    <tr class="table-active">
      <th scope="row">{{$call->contact_type}}</th>
      <td>{{$call->contact_status}}</td>
      <td>{{$call->ptp_amount}}</td>
      <td>{{$call->ptp_date}}</td>
     
      
    </tr>
   
    
  </tbody>
  @endforeach
</table> 
 
  </div>
</div>


</div>
 

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>


    
  </body>
</html>