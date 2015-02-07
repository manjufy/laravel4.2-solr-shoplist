@extends('manager.layouts.master')
@section('content')
<div class="row">
  <div class="col-md-6"><strong>Add New Town</strong></div>
  <div class="col-md-6">
  <a class="btn btn-primary" href="{{ URL::to('manager/town') }}">Town List</a>
  </div>
</div>
<hr class="divider">
{{ Form::open(array('url' => 'manager/town/add', 'class' => 'form-horizontal')) }}
    <input type="hidden" name="baseUrl" id="baseUrl" value="{{ url() }}"/>
    <div class="form-group">
     <div class="col-xs-offset-1 col-xs-10">
        @if(count($errors) >= 1)
            <div class="alert alert-danger col-xs-offset-2 col-xs-5">{{ $errors->first('name') }}</div>
            <!-- <div class="alert alert-danger col-xs-offset-2 col-xs-5">{{ $errors->first('state') }}</div> -->
        @endif
     </div>
    </div>
        <div class="form-group">
            {{ Form::label('country', 'Country', array('class' => 'control-label col-xs-2')) }}
            <div class="col-xs-5">
                {{ Form::select('country', $country_list, array_values($country_list), array('class' => 'form-control selectpicker')) }}
            </div>
        </div>
    <div class="form-group">
        {{ Form::label('state', 'State', array('class' => 'control-label col-xs-2')) }}
        <div class="col-xs-5">
        <select id="state" name="state" class="form-control selectpicker">
            <option></option>
        </select>
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('name', 'Name', array('class' => 'control-label col-xs-2')) }}
        <div class="col-xs-5">
            {{ Form::text('name', '', array('class' => 'form-control')) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('latitude', 'Latitude', array('class' => 'control-label col-xs-2')) }}
        <div class="col-xs-5">
            {{ Form::text('latitude', '', array('class' => 'form-control')) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('longitude', 'Longitude', array('class' => 'control-label col-xs-2')) }}
        <div class="col-xs-5">
            {{ Form::text('longitude', '', array('class' => 'form-control')) }}
        </div>
    </div>
    <div class="form-group">
        <div class="col-xs-offset-2 col-xs-10">
           <button type="submit" class="btn btn-primary">Add</button>
        </div>
    </div>
{{ Form::close() }}

<!-- States Ajax Call to fill the drop down -->
{{ HTML::script('js/states.js'); }}
@stop