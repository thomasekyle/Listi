@extends('layouts.base-admin')
@section('content')
<div id="container">
  <div id="row">
    <h1> Site Settings </h1>
    <hr>

    <!-- If any errors are found in input -->
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

    <ul class="nav nav-tabs">
      <li class="active"><a data-toggle="tab" href="#sitesettings">Site Settings</a></li>
      <li><a data-toggle="tab" href="#companysettings">Company Settings</a></li>
      <li><a data-toggle="tab" href="#frontpagesettings">Front Page Settings</a></li>
      <li><a data-toggle="tab" href="#headersettings">Header Settings</a></li>
    </ul>
    <form class="form-horizontal" role="form" method="POST" action="/dashboard/sitesettings/update/{{$sitesettings->id}}">

      <div class="row">


        <!-- Form Name -->

        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <div class="tab-content">
          <!-- FIRST TAB FOR WEBSITE SETTINGS -->
          <div id="sitesettings" class="tab-pane fade in active">
            <div class="col-md-12">
              <div class="panel panel-default">

                <div class="panel-body">

                  <fieldset>


                    <!-- Text input-->
                    <div class="form-group">
                      <div class="col-md-12">
                        <label class="control-label" for="website_name">Website Name:</label>
                        <input id="website_name" name="website_name" value="{{$sitesettings -> website_name}}" class="form-control input-md" type="text">

                      </div>

                      <div class="col-md-12">
                        <label class="control-label" for="website_details">Website Details:</label>
                        <textarea class="form-control" id="website_details" value="{{ $sitesettings-> website_details}}" name="website_details">{{ $sitesettings-> website_details}}</textarea>

                      </div>
                    </div>
                  </fieldset>
                </div>
              </div>
            </div>
          </div>

          <!-- SECOND TAB FOR COMPANY SETTINGS-->
          <div id="companysettings" class="tab-pane fade">
            <div class="col-md-12">
              <div class="panel panel-default">

                <div class="panel-body">

                  <fieldset>


                    <!-- Text input-->
                    <div class="form-group">
                      <div class="col-md-8">
                        <label class="control-label" for="company_name">Company Name:</label>
                        <input id="company_name" name="company_name" value="{{$sitesettings -> company_name}}" class="form-control input-md" type="text">

                      </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                      <div class="col-md-2">
                        <label class="control-label" for="company_street_number">Street Number:</label>
                        <input id="company_street_number" name="company_street_number" value="{{$sitesettings -> company_street_number}}" class="form-control input-md" type="text">

                      </div>

                      <div class="col-md-8">
                        <label class="control-label" for="company_street_name">Street Name:</label>
                        <input id="company_street_name" name="company_street_name" value="{{$sitesettings -> company_street_name}}" class="form-control input-md" type="text">

                      </div>

                      <div class="col-md-2">
                        <label class="control-label" for="company_suite_name">Suite:</label>
                        <input id="company_suite_name" name="company_suite_number" value="{{$sitesettings -> company_suite_number}}" class="form-control input-md" type="text">

                      </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                      <div class="col-md-5">
                        <label class="control-label" for="company_city">City:</label>
                        <input id="company_city" name="company_city" value="{{$sitesettings -> company_city}}" class="form-control input-md" type="text">

                      </div>

                      <div class="col-md-5">
                        <label class="control-label" for="company_state">State:</label>
                        <input id="company_state" name="company_state" value="{{$sitesettings -> company_state}}" class="form-control input-md" type="text">

                      </div>

                      <div class="col-md-2">
                        <label class="control-label" for="company_zip">Zip Code:</label>
                        <input id="company_zip" name="company_zip" value="{{$sitesettings -> company_zip}}" class="form-control input-md" type="text">
                      </div>

                    </div>

                    <div class="form-group">
                      <div class="col-md-4">
                        <label class="control-label" for="company_phone_number">Phone Number</label>
                        <input id="company_phone_number" name="company_phone_number" value="{{$sitesettings -> company_phone_number}}" class="form-control input-md" type="text">

                      </div>

                      <div class="col-md-4">
                        <label class="control-label" for="company_fax_number">Fax Number:</label>
                        <input id="company_fax_number" name="company_fax_number" value="{{$sitesettings -> company_fax_number}}" class="form-control input-md" type="text">

                      </div>

                      <div class="col-md-4">
                        <label class="control-label" for="company_email">Email Address</label>
                        <input id="company_email" name="company_email" value="{{$sitesettings -> email}}" class="form-control input-md" type="text">
                      </div>

                    </div>

                    <div class="form-group">
                      <div class="col-md-4">
                        <label class="control-label" for="http_link">Facebook Link:</label>
                        <input id="http_link" name="http_link" value="{{$sitesettings -> http_link}}" class="form-control input-md" type="text">

                      </div>

                      <div class="col-md-4">
                        <label class="control-label" for="http_link_2">Twitter Link</label>
                        <input id="http_link_2" name="http_link_2" value="{{$sitesettings -> http_link_2}}" class="form-control input-md" type="text">

                      </div>

                      <div class="col-md-4">
                        <label class="control-label" for="http_link_3">LinkedIn Link</label>
                        <input id="http_link_3" name="http_link_3" value="{{$sitesettings -> http_link_3}}" class="form-control input-md" type="text">

                      </div>
                    </div>

                  </div>
                </fieldset>
              </div>

            </div>
          </div>


          <!-- THIRD TAB FOR FRONT PAGE SETTINGS-->
          <div id="frontpagesettings" class="tab-pane fade">
            <div class="col-md-12">
              <div class="panel panel-default">

                <div class="panel-body">

                  <fieldset>


                    <!-- Text input-->
                    <div class="form-group">
                      <div class="col-md-12">
                        <label class="control-label" for="front_page_html">Front Page:</label>
                        You may add custom HTML code to your front page if necessary*
                        <textarea class="form-control" value="{{ $sitesettings->front_page_html}}" name="front_page_html" id="front_page_html">{{ $sitesettings->front_page_html}}</textarea>

                      </div>
                    </div>

                  </div>
                </fieldset>
              </div>

            </div>
          </div>

          <!-- FOURTH TAB FOR HEADER SETTINGS-->
          <div id="headersettings" class="tab-pane fade">
            <div class="col-md-12">
              <div class="panel panel-default">

                <div class="panel-body">

                  <fieldset>


                    <!-- Text input-->
                    <div class="form-group">

                        <div class="col-md-12">
                          <label class="control-label" for="email">Header:</label>
                         <center>
                           @if($sitesettings->site_header == '')
                           <img class="thumbnail" src="/img/default-header.png" alt="..." width="100%" height="300px">
                           @else

                           @endif
                         </center>

                         <div class="col-md-2">
                           <label class="control-label" for="email">Upload Header:</label>
                           <input id="file" name="file" class="input-file" type="file">
                         </div>
                       </div>

                     </div>

                     <div class="form-group">
                       <div class="col-md-12">
                         <label class="control-label" for="header_title">Header Title</label>
                         <input id="header_title" name="header_title" value="{{$sitesettings ->header_title}}" class="form-control input-md" type="text">

                       </div>
                        <div class="col-md-12">
                        <label class="control-label" for="header_text">Header text:</label>
                        You may add custom HTML code to your header if necessary*
                        <textarea class="form-control" value="{{ $sitesettings-> header_text}}" name="header_text">{{ $sitesettings-> header_text}}</textarea>

                      </div>
                    </div>

                  </div>
                </fieldset>
              </div>

            </div>
          </div>

        </div>


      </div>





    </div>

    <div class="form-group">
      <label class="col-md-4 control-label" for="btnSubmit"></label>
      <div class="col-md-2 col-md-offset-10">
        <a href="/dashboard/home">Back</a>
        <button id="btnSubmit" name="btnSubmit" class="btn btn-default">Submit</button>
      </div>
    </div>
  </form>
</div><!-- End row -->
</div><!-- End container -->
@stop
