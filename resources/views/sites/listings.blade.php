@extends('layouts.base-sites')
@section('content')
<br><br><br><br><br><br>
<div class="container">
@foreach ($listings as $listing)
<div class="row">
  @if ($listing->featured_pic !=0)
  <div class="col-sm-2 col-md-3">
    <div class="thumbnail">
      <img src="/uploads/listings/{{$listing->id}}/{{\App\ListingPic::find($listing->featured_pic)->filename}}" class="img-responsive" alt="...">
      </div>
    </div>
  @else
    <div class="col-sm-2 col-md-3">
    <div class="thumbnail">
      <img src="/img/house.png" class="img-responsive"alt="...">
      </div>
    </div>
  @endif
    <div class="col-sm-10 col-md-9">

    <div class="row">
    <div class="col-md-12">

      <h2>{{ $listing-> house_num }} {{ $listing->street_name }} {{ $listing->city }}, {{$listing->state}}, {{$listing->zip}}</h2>

    </div>
        </div>


        <div class="row">
        <div class="col-sm-6 col-md-6">
            <h3><b>${{ $listing-> price }}</b>
              @if ($listing->type == 'For Rent')
              /per month
              @endif
            </h3>
          <h3><b>Bed:</b> {{ $listing-> bedrooms}} / <b>Bath:</b> {{ $listing-> bathrooms}}</h3>

        </div>
        <div class="col-sm-6 col-md-6">

        <h3><b>Square Feet: </b>{{$listing->sq_ft}}ft</h3>

        </div>
        </div>

        <div class="col-md-4 col-md-offset-6">
        <a class="btn btn-lg btn-default" href="mailto:{{\App\User::find($listing->user_id)->email}}">Contact</a>
        <a href="/listings/view/{{ $listing->id }}" class="btn btn-lg btn-info" role="button">View Details &raquo;</a>
        <p></p>
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
