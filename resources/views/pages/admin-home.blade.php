@extends('layouts.base-admin')
@section('content')
<div id="container">
<div id="row">

          <div class="col-md-6">
          		<div style="margin: 0 auto; width:50%; text-align: center;">
          			
            			<button type="button" class="btn btn-default btn-lg">
  							<span class="glyphicon glyphicon-home" aria-hidden="true"> 4</span>
						</button>
					
              		<h4 style="text-align: center;">Properties</h4>
              		<span class="text-muted">Number of Properties Listed</span>
            	</div>
            <p>&nbsp;</p>	
          </div>
          <div class="col-md-6">
          		<div style="margin: 0 auto; width:50%; text-align: center;">
          			
            			<button type="button" class="btn btn-default btn-lg">
  							<span class="glyphicon glyphicon-user" aria-hidden="true">{{$user->fname}} {{$user->lname}}</span>
						</button>
					
              		<h4 style="text-align: center;">Welcome Back!</h4>
              		<span class="text-muted">Your last login was at [Time].</span>
            	</div>
            	<p>&nbsp;</p>
          </div>
          
           <h1> Listings</h1>
           <hr>
           <div class="row">
          <div class="col-md-2">
          	<div class="checkbox">
    			<label>
      				<input type="checkbox">
    			</label>
 			 </div>
          </div>
          <div class="col-md-2">
          <button type="button" class="btn btn-danger btn-sm">
  			Unavailable
  			</button>
          </div>
          <div class="col-md-4">
          1234 Easy Lane
          </div>
          <div class="col-md-4">
          <button type="button" class="btn btn-default btn-sm">
  							<span class="glyphicon glyphicon-pencil" aria-hidden="true">Edit</span>
						</button>
					<button type="button" class="btn btn-default btn-sm">
  							<span class="glyphicon glyphicon-floppy-remove" aria-hidden="true">Delete</span>
						</button>
					<button type="button" class="btn btn-default btn-sm">
  							<span class="glyphicon glyphicon-eye-open" aria-hidden="true">View</span>
						</button>
          </div>
          </div>
          <div class="row" style="background-color:#f4f4f4;">
          <div class="col-md-2">
          	<div class="checkbox">
    			<label>
      				<input type="checkbox">
    			</label>
 			 </div>
          </div>
          <div class="col-md-2">
          <button type="button" class="btn btn-danger btn-sm">
  			Unavailable
  			</button>
          </div>
          <div class="col-md-4">
          1234 Easy Lane
          </div>
          <div class="col-md-4">
          <button type="button" class="btn btn-default btn-sm">
  							<span class="glyphicon glyphicon-pencil" aria-hidden="true">Edit</span>
						</button>
					<button type="button" class="btn btn-default btn-sm">
  							<span class="glyphicon glyphicon-floppy-remove" aria-hidden="true">Delete</span>
						</button>
					<button type="button" class="btn btn-default btn-sm">
  							<span class="glyphicon glyphicon-eye-open" aria-hidden="true">View</span>
						</button>
          </div>
          </div>
          <div class="row">
          <div class="col-md-2">
          	<div class="checkbox">
    			<label>
      				<input type="checkbox">
    			</label>
 			 </div>
          </div>
          <div class="col-md-2">
          <button type="button" class="btn btn-success btn-sm">
  			Available
  			</button>
          </div>
          <div class="col-md-4">
          1234 Easy Lane
          </div>
          <div class="col-md-4">
          <button type="button" class="btn btn-default btn-sm">
  							<span class="glyphicon glyphicon-pencil" aria-hidden="true">Edit</span>
						</button>
					<button type="button" class="btn btn-default btn-sm">
  							<span class="glyphicon glyphicon-floppy-remove" aria-hidden="true">Delete</span>
						</button>
					<button type="button" class="btn btn-default btn-sm">
  							<span class="glyphicon glyphicon-eye-open" aria-hidden="true">View</span>
						</button>
          </div>
         </div>
         <div class="row" style="background-color:#f4f4f4;">
          <div class="col-md-2">
          	<div class="checkbox">
    			<label>
      				<input type="checkbox">
    			</label>
 			 </div>
          </div>
          <div class="col-md-2">
          <button type="button" class="btn btn-success btn-sm">
  			Available
  			</button>
          </div>
          <div class="col-md-4">
          1234 Easy Lane
          </div>
          <div class="col-md-4">
          <button type="button" class="btn btn-default btn-sm">
  							<span class="glyphicon glyphicon-pencil" aria-hidden="true">Edit</span>
						</button>
					<button type="button" class="btn btn-default btn-sm">
  							<span class="glyphicon glyphicon-floppy-remove" aria-hidden="true">Delete</span>
						</button>
					<button type="button" class="btn btn-default btn-sm">
  							<span class="glyphicon glyphicon-eye-open" aria-hidden="true">View</span>
						</button>
          </div>
          </div>
        
           
</div>
</div>
</div>
@stop