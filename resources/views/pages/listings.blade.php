@extends('layouts.base-sites')
@section('content')
<div class="container">


@foreach ($listings as $listing)
<div class="row">

  @if ($listing->featured_pic !=0)
  <div class="col-md-2">
    <div class="thumbnail">
      <img src="/uploads/listings/{{$listing->id}}/{{$listing->featured_filename}}" class="img-responsive" width="144" height="144" alt="...">
      </div>
    </div>
  @else
    <div class="col-md-2">
    <div class="thumbnail">
      <img src="/img/house.png" class="img-responsive" width="144" height="144" alt="...">
      </div>
    </div>
  @endif
    <div class="col-sm-6 col-md-10">
    <div class="panel panel-default">
    <div class="panel-heading">
    <div class="row">
    <div class="col-md-10">
    <b><a href="/listings/view/{{ $listing->id }}" >{{ $listing-> house_num }} {{ $listing->street_name }} {{ $listing->city }}, {{$listing->state}}, {{$listing->zip}}</a></b>
    </div>
    <div class="col-md-2">
      @if ($listing->type == 'For Sale')
          <button type="button" class="btn btn-success btn-xs">For Sale</button>
        @endif
        @if ($listing->type == 'For Rent')
          <button type="button" class="btn btn-warning btn-xs">For Rent</button>
        @endif
        @if ($listing->type == 'Unavailable')
          <button type="button" class="btn btn-danger btn-xs">Unavailable</button>
        @endif
        </div>
        </div>
    </div>
    <div class="panel-body">
        <div class="row">
        <div class="col-md-6">

            <p><b>{{ $listing-> type }}</b>: ${{ $listing-> price }}</p>



          <p><b>Bedrooms:</b> {{ $listing-> bedrooms}}</p>


          <p><b>Bathroom:</b> {{ $listing-> bathrooms}}</p>

        </div>
        <div class="col-md-6">
        <p><b>Animals Allowed:</b>{{$listing->pets}}</p>
        <p><b>Square Feet: </b>{{$listing->sq_ft}}</p>
        <p><b>Type: </b>{{$listing->building_type}}</p>
        </div>
        </div>



        </div>
        </div>
        <div class="col-md-2 col-md-offset-10">
        <p><a href="/listings/view/{{ $listing->id }}" class="btn btn-default" role="button">View Details &raquo;</a></p>
        </div>
  </div>



</div>
<hr>
@endforeach

<div class="container">
<div class="row">
<div class="col-md-6 col-md-offset-5">
 {!! $listings->render() !!}
 </div>
 </div>
 </div>
</div>
@stop
