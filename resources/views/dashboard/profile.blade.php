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
    <h1>Edit User</h1>
    <hr>
   </div>






<div class="row">
<form class="form-horizontal" enctype="multipart/form-data" role="form" method="POST" action="/dashboard/profile/update">
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
        <option selected="selected">{{$user->privilege}}</option>
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
 <div class="col-md-3">
  <center>
    @if($user->pic_id == '')
    <img class="thumbnail" src="/img/user.png" alt="..." width="175px" height="100%">
    @else
    <img class="thumbnail" src="/uploads/user/{{$user->id}}/{{$user->pic_id}}" alt="..." height="175px" width="100%">
    @endif
  </center>

  <div class="col-md-2">
    <label class="control-label" for="email">Picture:</label>
    <input id="file" name="file" class="input-file" type="file">
  </div>
</div>
<div class="col-md-9">
  <div class="col-md-12">
    <label class="control-label" for="email">Email Address:</label> - {{$user->email}}<br>
    <button type="button" class="btn btn-default" data-toggle="modal" data-target=".email-modal">Change Email</button>

  </div>
  <div class="col-md-12">
    <label class="control-label" for="email">Password:</label><br>

    <button type="button" class="btn btn-default" data-toggle="modal" data-target=".password-modal">Change Password</button>
  </div>

  <div class="col-md-4">
    <label class="control-label" for="active">Active:</label>
    <select id="active" name="active" class="form-control">
      <option selected="selected">{{$user->active}}</option>
      <option value="Active">Active</option>
      <option value="Not Active">Not Active</option>
    </select>
  </div>

  <div class="col-md-4">
    <label class="control-label" for="fname">First Name:</label>
  <input id="fname" name="fname" value="{{$user -> fname}}" class="form-control input-md" type="text">

  </div>

  <div class="col-md-4">
    <label class="control-label" for="lname">Last Name:</label>
  <input id="lname" name="lname" value="{{$user -> lname}}" class="form-control input-md" type="text">

  </div>


  <div class="col-md-4">
    <label class="control-label" for="phone_number">Phone Number:</label>
  <input id="phone_number" name="phone_number" value="{{$user -> phone_number}}" class="form-control input-md" type="text">

  </div>

  <div class="col-md-4">
    <label class="control-label" for="fax_number">Fax Number</label>
  <input id="fax_number" name="fax_number" value="{{$user -> fax_number}}" class="form-control input-md" type="text">

  </div>
</div>
</div>
<!-- Textarea -->
<div class="form-group">
  <div class="col-md-12">
    <label class="control-label" for="description">Profile Information:</label>
    <textarea class="form-control" id="description" name="description">{{$user -> description}}</textarea>
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

<!-- Large modal -->


<div class="modal fade email-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4>Change your Email Address</h4>
      </div>
      <div class="modal-body">
      <form class="form-horizontal" enctype="multipart/form-data" role="form" method="POST" action="/dashboard/profile/email/update">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
        <div class="col-md-12">
          <label class="control-label" for="email">Email:</label>
        <input id="email" name="email" value="" class="form-control input-md" type="text">

        </div>
        <div class="col-md-12">
          <label class="control-label" for="email_confirmation">Email(Confirmation):</label>
        <input id="email_confirmation" name="email_confirmation" value="" class="form-control input-md" type="text">

        </div>
        <div class="col-md-12">
          <label class="control-label" for="current_password"> Current Password:</label>
        <input id="current_password" name="current_password" value="" class="form-control input-md" type="password">

        </div>

    </div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      <input class="btn btn-default" type="submit" value="Submit"/>
    </div>
  </form>
    </div>
  </div>
</div>

<div class="modal fade password-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel2">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4>Change your Password</h4>
      </div>
      <div class="modal-body">
      <form class="form-horizontal" enctype="multipart/form-data" role="form" method="POST" action="/dashboard/profile/password/update">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
          <div class="col-md-12">
            <label class="control-label" for="current_password">Current Password:</label>
          <input id="current_password" name="current_password" value="" class="form-control input-md" type="password">

          </div>
          <div class="col-md-12">
            <label class="control-label" for="password">New Password:</label>
          <input id="password" name="password" value="" class="form-control input-md" type="password">

          </div>
        <div class="col-md-12">
          <label class="control-label" for="password_cofirm">New Password(Repeated):</label>
        <input id="password_confirm" name="password_confirm" value="" class="form-control input-md" type="password">

        </div>

      </div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      <input class="btn btn-default" type="submit" value="Submit"/>
    </div>
  </form>
    </div>
  </div>
</div>
@stop
