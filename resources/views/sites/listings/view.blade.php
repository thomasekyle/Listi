@extends('layouts.base-sites')
@section('content')
<div class="container">
<div class="row">
<div class="col-md-12">
<br><br><br><br>

<a href="javascript:history.back()"> << back </a>
<h1>
  {{ $listing-> house_num }} {{ $listing-> street_name }} {{ $listing-> city }} {{ $listing-> state }}, {{ $listing-> zip }}</h1>

<hr>
</div>

  <div class="col-md-6">

    <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      @foreach ($listingpics as $key=>$listingpic)
      @if ($key == 0)
      <li data-target="#myCarousel" data-slide-to="{{$key}}" class="active"></li>
      @else
      <li data-target="#myCarousel" data-slide-to="{{$key}}"></li>
      @endif
      @endforeach
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      @if (isset($listingpics))
      @foreach ($listingpics as $key=>$listingpic)
      @if ($key == 0)
      <div class="item active">
        <img class="img-responsive" width="100%" src="/uploads/listings/{{$listing->id}}/{{$listingpic->filename}}" alt="">
      </div>
      @else
      <div class="item">
        <img class="img-responsive" width="1005" style="max-height:370px;" src="/uploads/listings/{{$listing->id}}/{{$listingpic->filename}}" alt="">
      </div>
      @endif
      @endforeach
      @else
      <div class="item active">
        <img class="img-responsive" src="/img/house.png" alt="">
      </div>
      @endif
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>






 </div>

<div class="col-md-6 col-xs-12">
<div class="col-md-6 col-xs-12" >
  <div class="col-md-12"><p><h2>Price: ${{ $listing-> price }}</h2> </p></div>
  <div class="col-md-6 col-xs-6">
          <p><h3>Bathroom:</h3> {{ $listing -> bathrooms}}</p>
          <p><h3>Bedrooms:</h3> {{ $listing -> bedrooms}}</p>
          <h3>Sqaure Feet:</h3> {{$listing -> sq_ft}}ft.
        </div>
          <div class="col-md-6 col-xs-6">
            <p><h3>Pets:</h3> {{ $listing -> bathrooms}}</p>
            <p><h3>Type:</h3> {{ $listing -> bedrooms}}</p>
          </div>
</div>


<div class="col-md-6 col-xs-12">
  <center>
    <a class="btn btn-lg btn-info" href="">Apply Online</a>
    <a class="btn btn-lg btn-default" href="mailto:{{$listing::getAgentContact($listing, $listing->id)}}">Contact</a>
  </center>
  <h3>Map:</h3>
  <iframe sroll="no" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3254.954248998484!2d-80.73954798521001!3d35.33195758027728!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x88541c65e82662ff%3A0x18cb1d749e33a487!2s9610+Puddle+Duck+Rd%2C+Charlotte%2C+NC+28262!5e0!3m2!1sen!2sus!4v1463806811555" frameborder="1" height="300px" style="border:1px" allowfullscreen></iframe>
</div>
</div>

</div>
</div>
<hr>
<div style="background-color: #eee;">
<div class="container">

  <div class="col-md-10 col-md-offset-1">
<h3>Description</h3>
  <p>{!! $listing->description !!}</p>

</div>
</div>
</div>

<hr>
<div class="container">
  <h2>Other Listings</h2>
<div class="row">
  <div class="col-md-6">
</div>
</div>
<hr>


@foreach ($rlistings as $listing)
<div class="row">

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
        <a class="btn btn-lg btn-default" href="mailto:{{$listing::getAgentContact($listing, $listing->id)}}">Contact</a>
        <a href="/listings/view/{{ $listing->id }}" class="btn btn-lg btn-info" role="button">View Details &raquo;</a>
        <p></p>
        </div>
  </div>
  @if ($listing->featured_pic !=0)
  <div class="col-sm-2 col-md-3">
    <div class="thumbnail">
      <img src="/uploads/listings/{{$listing->id}}/{{$listing::getFeaturedPic($listing)}}" class="img-responsive" alt="...">
      </div>
    </div>
  @else
    <div class="col-sm-2 col-md-3">
    <div class="thumbnail">
      <img src="/img/house.png" class="img-responsive"alt="...">
      </div>
    </div>
  @endif
</div>
<hr>
@endforeach
</div>
@stop
