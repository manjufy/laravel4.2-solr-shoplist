@extends('manager.layouts.master')
@section('content')
<div class="row">
  <div class="col-md-6"><strong>Shop List</strong></div>
  <div class="col-md-6">
  <a class="btn btn-primary" href="{{ URL::to('manager/shop/add') }}">Add New Shop</a>
  </div>
</div>
<hr class="divider">
<table class="table table-bordered table-striped">
  <tr>
    <th>Name</th>
    <th>Category</th>
    <th>Town</th>
    <th>State</th>
    <th>Tel</th>
    <th>Email</th>
    <th>Contact Person</th>
    <th>Rank</th>
    <th>Actions</th>
  </tr>
  @if(count($shops) >=1 )
      @foreach ($shops AS $shop)
          <tr>
            <td>{{$shop->name}}</td>
            <td>{{$shop->category}}</td>
            <td>{{$shop->town}}</td>
            <td>{{$shop->state}}</td>
            <td>{{$shop->tel}}</td>
            <td>{{$shop->email}}</td>
            <td>{{$shop->cperson}}</td>
            <td>{{$shop->rank}}</td>
            <td>{{HTML::linkRoute('manager/shop/edit', 'Edit', $shop->id)}} | {{HTML::linkRoute('manager/shop/delete', 'Delete', $shop->id)}}</td>
          </tr>
      @endforeach
  @else
    <tr>
        <td colspan="9"><centerd>No shops</centered></td>
    </tr>
  @endif
</table>
{{ $shops->links(); }}
@stop