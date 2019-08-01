<html>
<head>
<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <title>company workings</title>

  <meta name="csrf-token" content="{{csrf_token()}}">
  <script>window.Laravel={csrfToken:'{{csrf_token()}}'}</script>
</head>
<body>
  <div id="app">
    <navb></navb>
       </div>

       <br><br><br><br><br>
       <div class="container">
    <div class="panel panel-primary">
      <div class="panel-heading">Upload</div>

  <form class="form-horizontal" method="POST" action="{{ route('lead_import_parse') }}" enctype="multipart/form-data">
 <label for="csv_file" class="col-md-4 control-label">CSV file to import</label>
<div class="col-md-6">
    <input id="csv_file" type="file" class="form-control" name="csv_file" required>
</div>
                             </div>

                             <div class="form-group">
                                 <div class="col-md-6 col-md-offset-4">
                                     <div class="checkbox">
                                         <label>
                                             <input type="checkbox" name="header" checked> File contains header row?
                                         </label>
                                     </div>
                                 </div>
                             </div>

                             <div class="form-group">
                                 <div class="col-md-8 col-md-offset-4">
                                     <button type="submit" class="btn btn-primary">
                                         Parse CSV
                                     </button>
                                     <button onclick="goBack()">Go Back</button>

                                 </div>
                             </div>
                         </form>
                     </div>
</div>
                       <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{asset('js/app.js') }}"></script>
                       <script>
function goBack() {
  window.history.back();
}
</script>

                                                                                  </body>
                                                                                  </html>
