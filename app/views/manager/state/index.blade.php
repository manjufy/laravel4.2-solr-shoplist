@extends('manager.layouts.master')
@section('content')
<div class="row">
  <div class="col-md-6"><strong>State List</strong></div>
  <div class="col-md-6">
  <a class="btn btn-primary" href="{{ URL::to('manager/state/add') }}">Add New State</a>
  </div>
</div>
<hr class="divider">
<table class="table table-bordered">
  <tr>
    <th>State</th>
    <th>Country</th>
    <th>Actions</th>
  </tr>
  @foreach ($states AS $state)
      <tr>
        <td>{{$state->name}}</td>
        <td>{{$state->country}}</td>
        <td>{{HTML::linkRoute('manager/state/edit', 'Edit', $state->id)}} | {{HTML::linkRoute('manager/state/delete', 'Delete', $state->id)}}</td>
      </tr>
  @endforeach
</table>
{{ $states->links(); }}
@stop