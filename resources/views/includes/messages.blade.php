<!-- ERROR MESSAGES -->
@if (count($errors))
<div class="alert alert-danger fade in" role="alert">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  <b>Error: There was a problem with your input.</b>
  <ul>
  @foreach($errors->all() as $err)
    <li>
      {{$err}}
    </li>
  @endforeach
</ul>
</div>
@endif

<!-- SUCCESS MESSAGES -->
@if ( session()->has('message') )
  <div class="alert alert-success alert-dismissable">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
  <b>Success</b>
    {{ session()->get('message') }}
  </div>
@endif


<!-- SUCCESS MESSAGES -->
@if (isset($message) )
<div class="alert alert-success alert-dismissable fade in">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<strong>Success!</strong> {{$message}}
</div>
@endif
