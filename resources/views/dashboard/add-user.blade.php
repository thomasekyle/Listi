@extends('layouts.base-admin')
@section('content')
<div id="container">
  <div id="row">
    <h1> Add New User </h1>
    <hr>
       <form class="form-horizontal">
<fieldset>

<!-- Form Name -->

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="txtPicture">Picture:</label>  
  <div class="col-md-4">
  <input id="txtPicture" name="txtPicture" placeholder="" class="form-control input-md" type="text">
    
  </div>
</div>

<!-- File Button --> 
<div class="form-group">
  <label class="col-md-4 control-label" for="filPicture"></label>
  <div class="col-md-4">
    <input id="filPicture" name="filPicture" class="input-file" type="file">
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="txtNewEmail">Email Address:</label>  
  <div class="col-md-4">
  <input id="txtNewEmail" name="txtNewEmail" value="example@gmail.com" class="form-control input-md" type="text">
    
  </div>
</div>

<!-- Password input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="psdNewChange1">Password:</label>
  <div class="col-md-4">
    <input id="psdNewChange1" name="psdNewChange1" value="" class="form-control input-md" type="password">
    
  </div>
</div>

<!-- Password input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="psdNewChange2">Password:</label>
  <div class="col-md-4">
    <input id="psdNewChange2" name="psdNewChange2" value="" class="form-control input-md" type="password">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="txtFname">Firsrt Name:</label>  
  <div class="col-md-4">
  <input id="txtFname" name="txtFname" placeholder="" class="form-control input-md" type="text">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="txtLname">Last Name:</label>  
  <div class="col-md-4">
  <input id="txtLname" name="txtLname" placeholder="" class="form-control input-md" type="text">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="txtLname">Date of Birth:</label>  
  <div class="col-md-4">
  <input id="txtLname" name="txtLname" placeholder="MM/DD/YYYY" class="form-control input-md" type="text">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="txtPnumer">Phone  Number:</label>  
  <div class="col-md-4">
  <input id="txtPnumer" name="txtPnumer" placeholder="" class="form-control input-md" type="text">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="txtFnumber">Fax Number</label>  
  <div class="col-md-4">
  <input id="txtFnumber" name="txtFnumber" placeholder="" class="form-control input-md" type="text">
    
  </div>
</div>

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="Profile Info:">Profile Information:</label>
  <div class="col-md-4">                     
    <textarea class="form-control" id="Profile Info:" name="Profile Info:"></textarea>
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="btnSubmit"></label>
  <div class="col-md-4">
    <button id="btnSubmit" name="btnSubmit" class="btn btn-primary">Submit</button>
    <a href="/dashboard/users" class="btn btn-danger" role="button">Cancel</a>
  </div>
</div>

</fieldset>
</form>


<hr>
           
  </div><!-- End row -->
</div><!-- End container -->
@stop