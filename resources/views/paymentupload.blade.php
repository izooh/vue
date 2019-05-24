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
      <form class="form-horizontal" method="POST" action="{{ route('import_process') }}">
    {{ csrf_field() }}
    <input type="hidden" name="csv_data_file_id" value="{{ $csv_data_file->id }}" />

    <table class="table">
    @if (isset($csv_header_fields))
    <tr>
    @foreach ($csv_header_fields as $csv_header_field)
    <th>{{ $csv_header_field }}</th>
    @endforeach
    </tr>
    @endif
    @foreach ($csv_data as $row)
    <tr>
    @foreach ($row as $key => $value)
    <td>{{ $value }}</td>
    @endforeach
    </tr>
    @endforeach
    <tr>
    @foreach ($csv_data[0] as $key => $value)
    <td>
    <select name="fields[{{ $key }}]">
    @foreach (config('app.db_fields') as $db_field)
    <option value="{{ (\Request::has('header')) ? $db_field : $loop->index }}"
    @if ($key === $db_field) selected @endif>{{ $db_field }}</option>
    @endforeach
    </select>
    </td>
    @endforeach
    </tr>
    </table>

    <button type="submit" class="btn btn-primary">
    Import Data
    </button>
    </form>
                     </div>
                   </div>

                       <script src="{{asset('js/app.js') }}"></script>
                                                                                  </body>
                                                                                  </html>
