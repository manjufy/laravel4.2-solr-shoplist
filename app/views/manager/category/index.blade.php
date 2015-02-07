@extends('manager.layouts.master')
@section('content')
<div class="row">
  <div class="col-md-6"><strong>Catgory List</strong></div>
  <div class="col-md-6">
  <a class="btn btn-primary" href="{{ URL::to('manager/category/add') }}">Add New Category</a>
  </div>
</div>
<hr class="divider">
<table class="table table-bordered">
  <tr>
    <th>Name</th>
    <th>Description</th>
    <th>Actions</th>
  </tr>
  @foreach ($categories AS $category)
      <tr>
        <td>{{$category->name}}</td>
        <td>{{$category->description}}</td>
        <td>{{HTML::linkRoute('manager/category/edit', 'Edit', $category->id)}} | {{HTML::linkRoute('manager/category/delete', 'Delete', $category->id)}}</td>
      </tr>
  @endforeach
</table>
@stop