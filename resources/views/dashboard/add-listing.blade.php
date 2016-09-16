@extends('layouts.base-admin')
@section('content')
<div id="container">
  <div id="row">
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
       <form class="form-horizontal" role="form" method="POST" action="/store/listing">
<fieldset>

<!-- Form Name -->

<input type="hidden" name="_token" value="{{ csrf_token() }}"

<!-- File Button --> 
<div class="form-group">
  <label class="col-md-4 control-label" for="filPicture">Pictures (10 Max):</label>
  <div class="col-md-4">
    <form id="form-upload">
    <input type="file" name="upload" id="upload" multiple>
</form>
  </div>
</div>


<!-- <div style="background-color: #9d9d9d"> 
<div id="dropzone">
      <form action="/upload" class="dropzone" id="my-dropzone">
      </form>
    </div>
    </div> ->> -->

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="unit_name">Unit Name:</label>  
  <div class="col-md-4">
  <input id="unit_name" name="unit_name" placeholder="" class="form-control input-md" type="text">
    
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="type">Bedrooms:</label>
  <div class="col-md-4">
    <select id="type" name="type" class="form-control">
      <option value="For Rent">For Rent</option>
      <option value="Sale">For Sale</option>
      <option value="Unavailable">Unavailable</option>
    </select>
  </div>
</div>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="house_num">Street Number:</label>  
  <div class="col-md-4">
  <input id="house_num" name="house_num" placeholder="" class="form-control input-md" type="text">
    
  </div>
</div>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="street_name">Street Name:</label>  
  <div class="col-md-4">
  <input id="street_name" name="street_name" placeholder="" class="form-control input-md" type="text">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="apt_num">Apt/Suite:</label>  
  <div class="col-md-4">
  <input id="apt_num" name="apt_num" placeholder="" class="form-control input-md" type="text">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="city">City:</label>  
  <div class="col-md-4">
  <input id="city" name="city" placeholder="" class="form-control input-md" type="text">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="state">State:</label>  
  <div class="col-md-4">
  <input id="state" name="state" placeholder="" class="form-control input-md" type="text">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="zip">Zip:</label>  
  <div class="col-md-4">
  <input id="zip" name="zip" placeholder="" class="form-control input-md" type="text">
    
  </div>
</div>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="price">Price:</label>  
  <div class="col-md-4">
  <input id="price" name="price" placeholder="" class="form-control input-md" type="text">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="sq_feet">Square Feet:</label>  
  <div class="col-md-4">
  <input id="sq_ft" name="sq_ft" placeholder="" class="form-control input-md" type="text">
    
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="bedrooms">Bedrooms:</label>
  <div class="col-md-4">
    <select id="bedrooms" name="bedrooms" class="form-control">
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
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="bathrooms">Bathrooms:</label>
  <div class="col-md-4">
    <select id="bathrooms" name="bathrooms" class="form-control">
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
<div class="form-group">
  <label class="col-md-4 control-label" for="description">Description:</label>
  <div class="col-md-4">                     
    <textarea class="form-control" id="description" name="description"></textarea>
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="btnSubmit"></label>
  <div class="col-md-4">
    <button id="btnSubmit" name="btnSubmit" class="btn btn-primary">Submit</button>
    <a href="/dashboard/home" class="btn btn-danger" role="button">Cancel</a>
  </div>
</div>

</fieldset>
</form>


<hr>
           
  </div><!-- End row -->
</div><!-- End container -->
@stop