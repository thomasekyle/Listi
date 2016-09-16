@extends('layouts.base')
@section('content')
<div class="container">
  		<div class="col-md-12">
  		<legend class="text-center header">Contact us</legend>
  			
    		<div class="col-md-4">
	  		<address>
		    	<h3>Office Location</h3>
		    	<p class="lead"><a href="https://www.google.com/maps/preview?ie=UTF-8&q=The+Pentagon&fb=1&gl=us&hq=1400+Defense+Pentagon+Washington,+DC+20301-1400&cid=12647181945379443503&ei=qmYfU4H8LoL2oATa0IHIBg&ved=0CKwBEPwSMAo&safe=on">{{ $sitesettings -> company_street_number}} {{ $sitesettings -> company_street_name}}<br>
				{{ $sitesettings -> company_city }}, {{ $sitesettings -> company_state}} {{ $sitesettings -> company_zip}}</a><br>
		      	Phone: {{ $sitesettings -> company_phone_number}}<br>
		      	Fax: {{ $sitesettings -> company_fax_number}}</p>
	    	</address>
  			</div>
			<form role="form" action="" method="post">
		    	<div class="col-md-8">
		     		<div class="form-group">
		        		<label for="InputName">Your Name</label>
		        		<div class="input-group">
		          			<input type="text" class="form-control" name="InputName" id="InputName" placeholder="Enter Name" required>
		          			<span class="input-group-addon"><i class="glyphicon glyphicon-ok form-control-feedback"></i></span>
		          		</div>
		      		</div>
		      		<div class="form-group">
		        		<label for="InputEmail">Your Email</label>
		        		<div class="input-group">
		         			<input type="email" class="form-control" id="InputEmail" name="InputEmail" placeholder="Enter Email" required  >
		          			<span class="input-group-addon"><i class="glyphicon glyphicon-ok form-control-feedback"></i></span>
		          		</div>
		      		</div>
		      		<div class="form-group">
		        		<label for="InputMessage">Message</label>
		        		<div class="input-group">
		          			<textarea name="InputMessage" id="InputMessage" class="form-control" rows="5" required></textarea>
		          			<span class="input-group-addon"><i class="glyphicon glyphicon-ok form-control-feedback"></i></span>
		          		</div>
		      		</div>
		      		<div class="form-group">
		        		<label for="InputReal">What is 4+3? (Simple Spam Checker)</label>
		        		<div class="input-group">
		          			<input type="text" class="form-control" name="InputReal" id="InputReal" required>
		          			<span class="input-group-addon"><i class="glyphicon glyphicon-ok form-control-feedback"></i></span>
		          		</div>
		      		</div>
		      		<input type="submit" name="submit" id="submit" value="Submit" class="btn btn-info pull-right">
		    	</div>
	  		</form>
  			
  			
		</div>
	</div>

@stop