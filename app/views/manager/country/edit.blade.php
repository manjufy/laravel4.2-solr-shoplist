@extends('manager.layouts.master')
@section('content')
<div class="row">
  <div class="col-md-6"><strong>Edit New Country</strong></div>
  <div class="col-md-6">
  <a class="btn btn-primary" href="{{ URL::to('manager/country') }}">Country List</a>
  </div>
</div>
<hr class="divider">
{{ Form::open(array('route' => ['manager/country/edit', $country->id], 'class' => 'form-horizontal')) }}
    <div class="form-group">
     <div class="col-xs-offset-1 col-xs-10">
        @if(count($errors) > 1)
            <div class="alert alert-danger col-xs-offset-2 col-xs-5">{{ $errors->first('name') }}</div>
            <div class="alert alert-danger col-xs-offset-2 col-xs-5">{{ $errors->first('code') }}</div>
        @endif
     </div>
    </div>
    <div class="form-group">
        {{ Form::label('name', 'Name', array('class' => 'control-label col-xs-2')) }}
        <div class="col-xs-5">
            {{ Form::text('name', $country->name, array('class' => 'form-control')) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('code', 'Description', array('class' => 'control-label col-xs-2')) }}
        <div class="col-xs-5">
            {{ Form::text('code', $country->code, array('class' => 'form-control')) }}
        </div>
    </div>
    <div class="form-group">
        <div class="col-xs-offset-2 col-xs-10">
           <button type="submit" class="btn btn-primary">Edit</button>
        </div>
    </div>
{{ Form::close() }}
@stop