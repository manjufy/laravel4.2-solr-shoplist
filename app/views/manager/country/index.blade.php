@extends('manager.layouts.master')
@section('content')
<div class="row">
  <div class="col-md-6"><strong>Country List</strong></div>
  <div class="col-md-6">
  <a class="btn btn-primary" href="{{ URL::to('manager/country/add') }}">Add New Country</a>
  </div>
</div>
<hr class="divider">
<table class="table table-bordered">
  <tr>
    <th>Name</th>
    <th>Code</th>
    <th>Actions</th>
  </tr>
  @foreach ($countries AS $country)
      <tr>
        <td>{{$country->name}}</td>
        <td>{{$country->code}}</td>
        <td>{{HTML::linkRoute('manager/country/edit', 'Edit', $country->id)}} | {{HTML::linkRoute('manager/country/delete', 'Delete', $country->id)}}</td>
      </tr>
  @endforeach
</table>
@stop