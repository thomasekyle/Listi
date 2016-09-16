@extends('layouts.base-admin')
@section('content')
<div id="container">
  <div class="row">
    <div class="col-md-12">
    <h1>Edit User</h1>
    <hr>
   </div>


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
<form class="form-horizontal" enctype="multipart/form-data" role="form" method="POST" action="/dashboard/users/update/{{$edituser->id}}">
<fieldset>
<!-- Form Name -->
<input type="hidden" name="_token" value="{{ csrf_token() }}">

<div class="col-md-12">
<div class="panel panel-default">
<div class="panel-heading">User Information</div>


<div class="panel-body">
<!-- Select Basic -->




<!-- Select Basic -->
<!--
<div class="form-group">
  <label class="col-md-4 control-label" for="privilege">Type of User:</label>
  <div class="col-md-8">
    <select id="privilege" name="privilege" class="form-control">
        <option selected="selected">{{$edituser->privilege}}</option>
      <option value="Normal User">Normal User</option>
      <option value="Administrator">Administrator</option>
    </select>
  </div>
</div> -->


<!-- Text input-->

<!-- Password input-->
<div class="form-group">
  <div class="col-md-12">
  </div>


</div>


<div class="form-group">


  <div class="col-md-4">
    <label class="control-label" for="password">Current Password:</label>
  <input id="password" name="password" value="" class="form-control input-md" type="password">

  </div>
  <div class="col-md-4">
    <label class="control-label" for="newpassword">New Password:</label>
  <input id="newpassword" name="newpassword" value="{{$edituser -> fname}}" class="form-control input-md" type="password">

  </div>
  <div class="col-md-4">
    <label class="control-label" for="newpassword_confirmed">New Password(Repeated):</label>
  <input id="newpassword_confirmed" name="newpassword_confirmed" value="{{$edituser -> fname}}" class="form-control input-md" type="password">

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
