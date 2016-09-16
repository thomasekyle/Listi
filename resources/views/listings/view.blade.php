@extends('layouts.base')
@section('content')
<div class="container">
<div class="row">
<div class="col-md-12">
<h3>{{ $listing-> house_num }} {{ $listing-> street_name }} 
              {{ $listing-> city }} {{ $listing-> state }}, {{ $listing-> zip }}</h3><hr></div>

  <div class="col-md-6">

  <div class="row">
  @if ($listing->featured_pic != 0)
  <div class="col-md-12">
  	<div class="thumbnail">
  		<img src="/uploads/listings/{{$listing->id}}/{{$listing->featured_filename}}" alt="Generic placeholder image">
  	</div>
  </div>
  @else
  <div class="col-md-12">
    <div class="thumbnail">
      <img src="/img/house.png" alt="Generic placeholder image">
    </div>
  </div>
  @endif
  <div class="col-md-12">
  <div class="row">

  @foreach ($listingpics as $listingpic)
  	<div class="col-md-2 col-xs-4">
	  	
	  		<div class="thumbnail">
        <img src="/uploads/listings/{{$listing->id}}/{{$listingpic->filename}}" alt="Generic placeholder image">
      </div>
	  	

      </div>
      @endforeach
	  	
  </div>
 

        
        </div>
 </div>
 </div>
 
<div class="col-md-6">
          <div class="panel panel-default">
          <div class="panel-heading">Listing Information</div>
        
    <div class="panel-body">
          <p>{{ $listing-> description }}</p>
          <p>{{ $listing-> type }}: ${{ $listing-> price }}</p>
        
    

        <div class="row">
           <div class="col-md-4">
           <p>Bedrooms: {{ $listing -> bedrooms}}</p>
           </div>
           <div class="col-md-4">
           <p>Bathroom: {{ $listing -> bathrooms}}</p>
           </div>
           <div class="col-md-4">
           </div>
        </div>
        
        </div>
</div>
</div>

 </div>
 <hr>  
@foreach ($rlistings as $rl)
<div class="row">
@if ($rl->featured_pic != 0)
<div class="col-md-2  col-xs-4">
<div class="thumbnail">
      <img src="/uploads/listings/{{$rl->id}}/{{$rl->featured_filename}}" alt="...">
      </div>
      </div>
      @else
      <div class="col-md-2  col-xs-4">
<div class="thumbnail">
      <img src="/img/house.png" alt="...">
      </div>
      </div>
  @endif
    <div class="col-md-10 col-xs-8">

    
     <div class="panel panel-default">
     <div class="panel-heading"><b><a href="/listings/view/{{ $rl->id }}">{{ $rl-> house_num }} {{ $rl->street_name }} {{ $rl-> city }} {{ $rl-> state }}, {{ $rl-> zip }}</a></b></div>
        <div class="panel-body">
        <p>{{ $rl->description }}</p>
        <p>{{ $rl-> type }}: ${{ $rl-> price }}</p>
        <p>Bedrooms: {{ $rl-> bedrooms}}</p>
        <p>Bathroom: {{ $rl-> bathrooms}}</p>
        
      </div>
    </div>
<div class="col-md-offset-10">
<p><a href="/listings/view/{{ $rl->id }}" class="btn btn-primary" role="button">View Details &raquo;</a></p>
  </div>
  
      
</div>



</div>
@endforeach
@stop