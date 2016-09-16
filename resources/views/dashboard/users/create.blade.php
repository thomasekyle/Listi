@extends('layouts.base-admin')
@section('content')
<div id="container">
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
  <div class="row">
    <div class="col-md-12">
    <h1>Create User</h1>
    <hr>
   </div>






<div class="row">
<form class="form-horizontal" enctype="multipart/form-data" role="form" method="POST" action="/dashboard/users/store">
<fieldset>
<!-- Form Name -->
<input type="hidden" name="_token" value="{{ csrf_token() }}">

<div class="col-md-12">
<div class="panel panel-default">
<div class="panel-heading">User Information</div>


<div class="panel-body">
<!-- Select Basic -->




<!-- Select Basic -->




<!-- Text input-->

<!-- Password input-->
<div class="form-group">
  <div class="col-md-12">
  </div>


</div>


<div class="form-group">
 <div class="col-md-3">
  <center>
    <img class="thumbnail" src="/img/user.png" alt="..." width="175px" height="100%">

  </center>

  <div class="col-md-2">
    <label class="control-label" for="email">Picture:</label>
    <input id="file" name="file" class="input-file" type="file">
  </div>
</div>
<div class="col-md-9">
  <div class="col-md-4">
    <label class="control-label" for="email">Email Address:</label><br>
      <input id="email" name="email" value="" class="form-control input-md" type="text">

  </div>
  <div class="col-md-4">
    <label class="control-label" for="password">Password:</label><br>

    <input id="password" name="password" value="" class="form-control input-md" type="password" autocomplete="off">
  </div>

  <div class="col-md-4">
    <label class="control-label" for="password_confirmation">Password(Repeated):</label><br>

    <input id="password_confirmation" name="password_confirmation" value="" class="form-control input-md" type="password" autocomplete="off">
  </div>


  <div class="col-md-4">
    <label class="control-label" for="privilege">Type of User:</label>
    <select id="privilege" name="privilege" class="form-control">
        <option selected="selected"></option>
      <option value="Normal User">Normal User</option>
      <option value="Administrator">Administrator</option>
    </select>
  </div>

  <div class="col-md-4">
    <label class="control-label" for="fname">First Name:</label>
    <input id="fname" name="fname" value="" class="form-control input-md" type="text">

  </div>

  <div class="col-md-4">
    <label class="control-label" for="lname">Last Name:</label>
    <input id="lname" name="lname" value="" class="form-control input-md" type="text">

  </div>

  <div class="col-md-4">
    <label class="control-label" for="active">Active:</label>
    <select id="active" name="active" class="form-control">
      <option value="Active">Active</option>
      <option value="Not Active">Not Active</option>
    </select>
  </div>



  <div class="col-md-4">
    <label class="control-label" for="phone_number">Phone Number:</label>
  <input id="phone_number" name="phone_number" value="" class="form-control input-md" type="text">

  </div>

  <div class="col-md-4">
    <label class="control-label" for="fax_number">Fax Number</label>
  <input id="fax_number" name="fax_number" value="" class="form-control input-md" type="text">

  </div>
</div>
</div>
<!-- Textarea -->
<div class="form-group">
  <div class="col-md-12">
    <label class="control-label" for="description">Profile Information:</label>
    <textarea class="form-control" id="description" name="description"></textarea>
  </div>
</div>




</div>
</div>
</div>
<hr>
<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="btnSubmit"></label>
  <div class="col-md-2 col-md-offset-10 col-xs-offset-6">
    <a href="/dashboard/home" class="btn btn-default" role="button">Cancel</a>
    <button id="btnSubmit" name="btnSubmit" class="btn btn-default">Submit</button>
  </div>
</div>
</fieldset>
</form>
</div>



  </div><!-- End row -->
</div><!-- End container -->


@stop
