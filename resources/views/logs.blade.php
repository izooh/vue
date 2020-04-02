@extends('layouts.custom')
@section('content')
<table class='table table-dark'>
<thead>
<tr>
<td>Log name</td>
<td>Action </td>
<td>Properties</td>
</tr>
</thead>
<tbody>
@foreach($activities as $activity)
<tr>
<td>{{$activity->log_name}}</td>
<td>{{$activity->description}}</td>
<td>{{$activity->properties}}</td>
</tr>
@endforeach
</tbody>
</table>
@endsection