@extends('layouts.base-login')
@section('content')
<br>
<div class="container">
    <div class="row">
    <form role="form" method="POST" action="/auth/login">
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
<br><br>
@endif
            
    <div class="col-md-4"></div>

    
    
        <div class="col-md-4 ">
        <p></p>
        <div class="panel panel-default">
        <div class="panel-heading">Log In</div>
        
            
    <div class="panel-body">
        
                    <div class="form-group">
                        <label for="InputName">Email:</label>
                        <div class="input-group">
                            <input type="email" class="form-control" name="email" placeholder="Enter Email Address" value="{{ old('email') }}" required>
                            <span class="input-group-addon"><i class="glyphicon glyphicon-ok form-control-feedback"></i></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="InputPassword">Password:</label>
                        <div class="input-group">
                            <input type="password" class="form-control" name="password" id="password" placeholder="Enter Password" required>
                            <span class="input-group-addon"><i class="glyphicon glyphicon-ok form-control-feedback"></i></span>
                        </div>
                        <p><a href="/password/email">Forgot Password</a></p>
                    </div>
            
                    <div>
                        <div>
                            <input type="checkbox" name="remember"> Remember Me

                        </div>

                        <div>
                            
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="row">
            <div class"col-md-4"></div>

            <div class="col-md-2">
             </div>

            <div class="col-md-6 col-md-offset-4">
                <a href="/" class="btn btn-default">Back</a>
                <button class="btn btn-default" type="submit">Login</button>
            </div>
            </div>
            
        </div>
        <div class="col-md-4"></div>
</form>
    </div>
</div>
@stop