@extends('manager.layouts.master')
@section('content')
<div class="row">
  <div class="col-md-6"><strong>Town List</strong></div>
  <div class="col-md-6">
  <a class="btn btn-primary" href="{{ URL::to('manager/town/add') }}">Add New Town</a>
  </div>
</div>
<hr class="divider">
<table class="table table-bordered table-striped ">
  <tr>
    <th>Town</th>
    <th>State</th>
    <th>Country</th>
    <th>Actions</th>
  </tr>
  @foreach ($towns AS $town)
      <tr>
        <td>{{$town->name}}</td>
        <td>{{$town->state}}</td>
        <td>{{$town->country}}</td>
        <td>{{HTML::linkRoute('manager/town/edit', 'Edit', $town->id)}} | {{HTML::linkRoute('manager/town/delete', 'Delete', $town->id)}}</td>
      </tr>
  @endforeach
</table>
{{ $towns->links(); }}
@stop