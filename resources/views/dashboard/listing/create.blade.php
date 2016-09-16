@extends('layouts.base-admin')
@section('content')
<div class="container">
  <div class="row">
    <h1> Add a Listing </h1>
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
       <form class="form-horizontal" enctype="multipart/form-data" role="form" method="POST" action="/dashboard/listing/store">
<fieldset>




<!-- Form Name -->

<input type="hidden" name="_token" value="{{ csrf_token() }}">
<div class="row">
<div class="col-md-12">
<div class="panel panel-default">
<div class="panel-heading">Pictures</div>
<div class="panel-body">
<div class="row">
<div class="col-md-12">
            <b>You may upload a maximum of 6 pictures.</b>
              </div>
<hr>
<!-- File Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="file">Pictures (6 Max):</label>
  <div class="col-md-4">
    <form id="form-upload">
    <input type="file" name="file[]" class="input-file" id="file[]" multiple="true">
</form>

  </div>
</div>


</div>
</div>
</div>
</div>

<!-- <div style="background-color: #9d9d9d">
<div id="dropzone">
      <form action="/upload" class="dropzone" id="my-dropzone">
      </form>
    </div>
    </div> ->> -->

<!-- Text input-->
<div class="col-md-12">
<div class="panel panel-default">
<div class="panel-heading">Listing Information</div>
<div class="panel-body">
<div class="form-group">

  <div class="col-md-4">
    <label class="control-label" for="unit_name">Unit Name:</label>
  <input id="unit_name" name="unit_name" value="{{ old('unit_name') }}" class="form-control input-md" type="text">

  </div>


  <div class="col-md-4">
    <label class="control-label" for="type">Available:</label>
    <select id="type" name="type" class="form-control">
    <option selected="selected">{{ old('type') }}</option>
      <option value="For Rent">For Rent</option>
      <option value="For Sale">For Sale</option>
      <option value="Unavailable">Unavailable</option>
    </select>
  </div>

  <div class="col-md-4">
    <label class="control-label" for="subdivision">Type:</label>
    <select id="subdivision" name="subdivision" class="form-control">
    <option selected="selected">{{ old('type') }}</option>
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
  <input id="house_num" name="house_num" value="{{ old('house_num') }}" class="form-control input-md" type="text">

  </div>


  <div class="col-md-8">
    <label class="control-label" for="street_name">Street Name:</label>
  <input id="street_name" name="street_name" value="{{ old('street_name') }}" class="form-control input-md" type="text">

  </div>


  <div class="col-md-2">
    <label class="control-label" for="apt_num">Apt/Suite:</label>
  <input id="apt_num" name="apt_num" value="{{ old('apt_num') }}" class="form-control input-md" type="text">

  </div>
</div>

<!-- Text input-->
<div class="form-group">

  <div class="col-md-6">
    <label class="control-label" for="city">City:</label>
  <input id="city" name="city" value="{{ old('city') }}" class="form-control input-md" type="text">

  </div>


  <div class="col-md-4">
    <label class=" control-label" for="state">State:</label>
  <input id="state" name="state" value="{{ old('state') }}" class="form-control input-md" type="text">

  </div>


  <div class="col-md-2">
    <label class="control-label" for="zip">Zip:</label>
  <input id="zip" name="zip" value="{{ old('zip') }}" class="form-control input-md" type="text">

  </div>
</div>


<!-- Text input-->
<div class="form-group">

  <div class="col-md-3">
    <label class="control-label" for="price">Price:</label>
  <input id="price" name="price" value="{{ old('price') }}" class="form-control input-md" type="text">

  </div>


  <div class="col-md-3">
    <label class="control-label" for="sq_feet">Square Feet:</label>
  <input id="sq_ft" name="sq_ft" value="{{ old('sq_ft') }}" class="form-control input-md" type="text">

  </div>


  <div class="col-md-3">
    <label class="control-label" for="bedrooms">Bedrooms:</label>
    <select id="bedrooms" name="bedrooms" class="form-control">
    <option selected="selected">{{ old('bedrooms') }}</option>
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
    <label class="control-label" for="bathrooms">Bathrooms:</label>
    <select id="bathrooms" name="bathrooms" class="form-control">
    <option selected="selected">{{ old('bathrooms') }}</option>
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

<!-- Textarea -->


</div>
</div>
</div>

<div class="col-md-12">
<div class="panel panel-default">
<div class="panel-heading">Listing Description</div>
<div class="panel-body">
<div class="form-group">

  <div class="col-md-12">
    <textarea class="form-control" id="description" name="description">{{ old('description') }}</textarea>
  </div>
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
