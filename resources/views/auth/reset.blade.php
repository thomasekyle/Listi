@extends('layouts.base-login')
@section('content')

<!-- resources/views/auth/reset.blade.php -->




<hr>
<div class="container">
    <div class="row">
    <form role="form" method="POST" action="/password/reset">
    <input type="hidden" name="token" value="{{ $token }}">
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
        <div class="panel-heading">Reset Password</div>
        
            
    <div class="panel-body">
        
                    <div class="form-group">
                        <label for="InputName">Email:</label>
                        <div class="input-group">
                            <input type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                            <span class="input-group-addon"><i class="glyphicon glyphicon-ok form-control-feedback"></i></span>
                        </div>
                    </div>
                    <div>
                    <div class="form-group">
                        <label for="InputName">Password:</label>
                        <div class="input-group">
                            <input type="password" class="form-control" name="password" required>
                            <span class="input-group-addon"><i class="glyphicon glyphicon-ok form-control-feedback"></i></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="InputName">Confirm Password:</label>
                        <div class="input-group">
                            <input type="password" class="form-control" name="password_confirmation" required>
                            <span class="input-group-addon"><i class="glyphicon glyphicon-ok form-control-feedback"></i></span>
                        </div>
                    </div>
     
        
    </div>

    
</div>
                    
</div>
<div class="row">

            <div class="col-md-8 col-md-offset-4">
                <button class="btn btn-default" type="submit">Reset Password</button>
            </div>
            </div>
            </div>
            
        </div>
        <div class="col-md-4"></div>
</form>
    </div><hr>
</div>
@stop