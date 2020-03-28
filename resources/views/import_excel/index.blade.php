@extends('layouts.custom')
@section('content')
<div class="card mt-4">
        <div class="card-header">
          import leads into the database
        </div>
            @if ($errors->any())
        <div class="alert alert-danger">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
   @if($message = Session::get('success'))
   <div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
           <strong>{{ $message }}</strong>
   </div>
   @endif
        <div class="card-body">
            <form action="{{ url('import-excel') }}" method="POST" name="importform" enctype="multipart/form-data">
                @csrf
                <input type="file" name="import_file" class="form-control">
                <br>
                <button class="btn btn-success mr-5">Import File</button><a class="btn btn-primary ml-5" href="javascript:history.back()">Go Back</a>
            </form>
        </div>
    </div>
    <div class="panel panel-default">
    <div class="panel-heading">
     <h3 class="panel-title">Leads History</h3>
    </div>
    <div class="panel-body">
     <div class="table-responsive">
      <table class="table table-bordered table-striped">
       <tr>
        <th>User id</th>
        <th>Cfid</th>
        <th>Phone</th>
        <th>Last name</th>
               </tr>
       @foreach($contacts as $c)
       <tr>
        <td>{{ $c->user_id }}</td>
        <td>{{ $c->cfid }}</td>
        <td>{{ $c->contact }}</td>
        <td>{{ $c->last_name }}</td>
       </tr>
       @endforeach
      </table>
     </div>
    </div>
</div>
@endsection
