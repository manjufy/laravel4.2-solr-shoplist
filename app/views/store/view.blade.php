@extends('layouts.master')
@section('content')
    <h3>Store : {{$shop->name}}</h3>
    <div class="row">
        <div class="col-md-2">
            <img src="http://upload.wikimedia.org/wikipedia/commons/a/ac/No_image_available.svg" width="100" height="100" class="img-rounded">
        </div>
        <div class="col-md-10">

        <div class="row">
            <div class="col-md-4">
            <dl class="dl-vertical">
              <dt>Category</dt>
              <dd class="text-left">{{$shop->category}}</dd>
            </dl>
            <dl class="dl-vertical">
                <dt>Name</dt>
                <dd class="text-left">{{$shop->name}}</dd>
            </dl>

            <dl class="dl-vertical">
                <dt>State</dt>
                <dd class="text-left">{{$shop->state}}</dd>
            </dl>


            <dl class="dl-vertical">
                <dt>Town</dt>
                <dd class="text-left">{{$shop->town}}</dd>
            </dl>

            <dl class="dl-vertical">
                <dt>Address</dt>
                <dd class="text-left">{{$shop->address}}</dd>
            </dl>
            <dl class="dl-vertical">
                <dt>Description</dt>
                <dd class="text-left">{{$shop->description}}</dd>
            </dl>
            </div>
            <div class="col-md-4">
             <dl class="dl-vertical">
                <dt>Mobile</dt>
                <dd class="text-left">{{$shop->mobile}}</dd>
            </dl>

            <dl class="dl-vertical">
                <dt>Telephone</dt>
                <dd class="text-left">{{$shop->tel}}</dd>
            </dl>

            <dl class="dl-vertical">
                <dt>Fax</dt>
                <dd class="text-left">{{$shop->fax}}</dd>
            </dl>

            <dl class="dl-vertical">
                <dt>Contact Person</dt>
                <dd class="text-left">{{$shop->cperson}}</dd>
            </dl>

            <dl class="dl-vertical">
                <dt>Email</dt>
                <dd class="text-left">{{$shop->email}}</dd>
            </dl>
            </div>
            <div class="col-md-4">
             <dl class="dl-vertical">
                <dt>Url</dt>
                <dd class="text-left">{{$shop->urlcom}}</dd>
            </dl>

             <dl class="dl-vertical">
                 <dt>Url Adv</dt>
                 <dd class="text-left">{{$shop->urladv}}</dd>
             </dl>

             <dl class="dl-vertical">
                 <dt>Latitude</dt>
                 <dd class="text-left">{{$shop->latitude}}</dd>
             </dl>

             <dl class="dl-vertical">
                 <dt>Longitude</dt>
                 <dd class="text-left">{{$shop->longitude}}</dd>
             </dl>
            </div>
        </div>
     </div>
    </div>
@stop
