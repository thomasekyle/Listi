@extends('layouts.base-sites')
@section('content')


  <a id="top"></a>
  <div  style="height:100%;">
  <div class="jumbotron" style="background-image:url(/img/default-header.png);">
  <div class="contianer">
  <div class="row">
  <br><br><br><br><br>
  <div class="col-md-8 col-md-offset-2 text-center" style="background-color:#fff; opacity: 0.7;">
  <div class="col-md-12" style="color:#000;">
  <h1>{{$sitesettings->header_title}}</h1>
  <p>{!! $sitesettings->header_text !!}</p>
    </div>
  </div>
  <div class="col-md-12">
  <br><br><br><br><br><br><br><br>
  </div>
  </div>
  </div>
  </div>
  </div>




  {!! $sitesettings->front_page_html !!}



@stop
