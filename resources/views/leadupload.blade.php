<html>
<head>

      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


  <script src="https://cdnjs.cloudf'lare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
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
    <div class="panel panel-default">
      <div class="panel-heading">Panel Heading</div>
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
                       <script src="{{asset('js/app.js') }}"></script>
                       <script>
function goBack() {
  window.history.back();
}
</script>

                                                                                  </body>
                                                                                  </html>
