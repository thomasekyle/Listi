@extends('layouts.base-admin')
@section('content')
<div id="container">
  <div id="row">
    <h1> Edit a Listing </h1>
    <form class="form-horizontal" enctype="multipart/form-data" role="form" method="POST" action="/dashboard/listing/update/{{$listing->id}}">
      <fieldset>
        @include('forms.listing')
      </fieldset>
    </form>
  </div><!-- End row -->
</div><!-- End container -->
@stop
