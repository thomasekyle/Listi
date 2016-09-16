@extends('layouts.base-login')
@section('content')

<!-- resources/views/auth/password.blade.php -->
<hr>
<div class="container">
    <div class="row">
    <form role="form" method="POST" action="/password/email">
        {!! csrf_field() !!}
    <div class="col-md-12">
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
            
    <div class="col-md-4"></div>

    
    
        <div class="col-md-4">
        <p></p>
        <div class="panel panel-default">
        <div class="panel-heading">Send Password Reset Link</div>
        
            
    <div class="panel-body">
        
                    <div class="form-group">
                        <label for="InputName">Email:</label>
                        <div class="input-group">
                            <input type="email" class="form-control" name="email" placeholder="Enter Email Address" value="{{ old('email') }}" required>
                            <span class="input-group-addon"><i class="glyphicon glyphicon-ok form-control-feedback"></i></span>
                        </div>
                    </div>
</div>
                    
</div>
<div class="row">

            <div class="col-md-8 col-md-offset-4">
                <a href="/auth/login" class="btn btn-default">Back</a>
                <button class="btn btn-default" type="submit">Send Email</button>
            </div>
            </div>
            </div>
            
        </div>
        <div class="col-md-4"></div>
</form>
    </div><hr>
</div>
@stop
