@extends('layouts.base-admin')
@section('content')
<div id="container">
  <div id="row">
    <h1> Edit a Listing </h1>
    <hr>
    <!-- If any errors are found in input -->
@if (count($errors))
@foreach($errors->all() as $err)
<div class="alert alert-danger" role="alert">
  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  <span class="sr-only">Error:</span>
  {{$err}}
</div>
@endforeach
<hr>
@endif
       <form class="form-horizontal" enctype="multipart/form-data" role="form" method="POST" action="/dashboard/listing/update/{{$listing->id}}">
<fieldset>

<!-- Form Name -->

<input type="hidden" name="_token" value="{{ csrf_token() }}">


<div class="row">

<div class="col-md-12">


<div class="panel panel-default">
<div class="panel-heading">Pictures</div>
<div class="panel-body">
<!-- File Button -->
<div class="row">
@foreach ($listingpics as $i=>$listingpic)
<div class="col-md-3 col-xs-6 col-sm-height" >
          <div class="thumbnail">
            <img src="{{\App\ListingPic::getFilePath($listingpic->id)}}" class="img-responsive" style="height:200px" alt="...">

            <div class="caption">
              <a href="/dashboard/listing/picture/delete/{{$listingpic->id}}" class="btn btn-danger btn-sm" role="button">Delete</a>
                <a href="/dashboard/listing/picture/updatefeatured/{{$listingpic->id}}" class="btn btn-info btn-sm" role="button">Make Featured</a>
            </div>
          </div>
          </div>

@endforeach
              </div>

              <hr>
<div class="form-group">
  <label class="col-md-4 control-label" for="file">Pictures (8 Max):</label>
  <div class="col-md-4">
    <form id="form-upload">
    <input type="file" name="file[]" class="input-file" id="file[]" multiple="true">
</form>

  </div>
</div>


<!-- <div style="background-color: #9d9d9d">
<div id="dropzone">
      <form action="/upload" class="dropzone" id="my-dropzone">
      </form>
    </div>
    </div> ->> -->

</div>
</div>

</div>

<div class="col-md-12">
<div class="panel panel-default">
<div class="panel-heading">Listing Information</div>
<div class="panel-body">

<!-- Text input-->
<div class="form-group">
  <div class="col-md-4">
    <label class="control-label" for="unit_name">Unit Name:</label>
  <input id="unit_name" name="unit_name" value="{{ $listing-> unit_name}}" class="form-control input-md" type="text">

  </div>

  <div class="col-md-4">
    <label class="control-label" for="type">Available:</label>
    <select id="type" name="type" class="form-control">
        <option selected="selected">{{$listing->type}}</option>
      <option value="For Rent">For Rent</option>
      <option value="For Sale">For Sale</option>
      <option value="Unavailable">Unavailable</option>
    </select>
  </div>

  <div class="col-md-4">
    <label class="control-label" for="type">Type:</label>
    <select id="type" name="type" class="form-control">
        <option selected="selected">{{$listing->type}}</option>
      <option value="For Rent">For Rent</option>
      <option value="For Sale">For Sale</option>
      <option value="Unavailable">Unavailable</option>
    </select>
  </div>
</div>


<!-- Text input-->
<div class="form-group">
  <div class="col-md-2">
    <label class="control-label" for="house_num">Street Number:</label>
  <input id="house_num" name="house_num" value="{{ $listing-> house_num }}" class="form-control input-md" type="text">

  </div>

  <div class="col-md-8">
    <label class="control-label" for="street_name">Street Name:</label>
  <input id="street_name" name="street_name" value="{{ $listing-> street_name }}" class="form-control input-md" type="text">

  </div>

  <div class="col-md-2">
    <label class="control-label" for="apt_num">Apt/Suite:</label>
  <input id="apt_num" name="apt_num" value="{{ $listing-> apt_num }}" class="form-control input-md" type="text">

  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <div class="col-md-6">
    <label class="control-label" for="city">City:</label>
  <input id="city" name="city" value="{{ $listing-> city }}" class="form-control input-md" type="text">

  </div>

  <div class="col-md-4">
    <label class="control-label" for="state">State:</label>
  <input id="state" name="state" value="{{ $listing-> state }}" class="form-control input-md" type="text">

  </div>

  <div class="col-md-2">
    <label class="control-label" for="zip">Zip:</label>
  <input id="zip" name="zip" value="{{ $listing-> zip }}" class="form-control input-md" type="text">

  </div>
</div>


<!-- Text input-->
<div class="form-group">
  <div class="col-md-3">
    <label class="control-label" for="price">Price:</label>
  <input id="price" name="price" value="{{ $listing-> price }}" class="form-control input-md" type="text">

  </div>

  <div class="col-md-3">
    <label class="control-label" for="sq_ft">Square Feet:</label>
  <input id="sq_ft" name="sq_ft" value="{{ $listing-> sq_ft }}" class="form-control input-md" type="text">

  </div>

  <div class="col-md-3">
    <label class="control-label" for="bedrooms">Bedrooms:</label>
    <select id="bedrooms" name="bedrooms" class="form-control">
    <option selected="selected">{{$listing->bedrooms}}</option>
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      <option value="5">5</option>
      <option value="6">6</option>
      <option value="7">7</option>
      <option value="8">8</option>
      <option value="9">9</option>
      <option value="10">10+</option>
    </select>
  </div>

  <div class="col-md-3">
    <label class="control-label" for="bathrooms" >Bathrooms:</label>
    <select id="bathrooms" name="bathrooms" class="form-control">
    <option selected="selected">{{$listing->bathrooms}}</option>
      <option value="1">1</option>
      <option value="1.5">1.5</option>
      <option value="2">2</option>
      <option value="2.5">2.5</option>
      <option value="3">3</option>
      <option value="3.5">3.5</option>
      <option value="4">4</option>
      <option value="4.5">4.5</option>
      <option value="5">5</option>
      <option value="5.5">5.5</option>
      <option value="6">6</option>
      <option value="6.5">6.5</option>
      <option value="7">7</option>
      <option value="7.5">7.5</option>
      <option value="8">8</option>
      <option value="8.5">8.5</option>
      <option value="9">9</option>
      <option value="9.5">9.5</option>
      <option value="10+">10+</option>
    </select>
  </div>

</div>

</div>
</div>
</div>

<div class="col-md-12">
<div class="panel panel-default">
<div class="panel-heading">Listing Description</div>
<div class="panel-body">

<div class="col-md-12">
  <textarea class="form-control" id="description"  name="description">{{ $listing-> description }}</textarea>
</div>

</div>
</div>
</div>

</div>

  <!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="btnSubmit"></label>
  <div class="col-md-2 col-md-offset-10">
    <a href="/dashboard/home">Back</a>
    <button id="btnSubmit" name="btnSubmit" class="btn btn-default">Submit</button>
  </div>
</div>

</fieldset>
</form>
  </div><!-- End row -->
</div><!-- End container -->
@stop
