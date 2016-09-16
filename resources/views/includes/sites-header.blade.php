 <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>

          <a class="navbar-brand" href="#">
            <i class="fa fa-home"></i>
            {{ $sitesettings -> company_name }}
          </a>

        </div>


        <div id="navbar" class="navbar-collapse collapse">

          <ul class="nav navbar-nav navbar-left">
            <li><a href="/main" class="active">Home</a></li>
            <li><a href="/listings">Listings</a></li>

            </ul>






                    <ul class="nav navbar-nav navbar-right">
                      <form class="navbar-form navbar-right" role="form" method="GET" action="/search">
                        <div class="col-md-12" style="padding-bottom:10px;">
                        <!-- Form Name -->
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="input-group">
                                @if (isset($search))
                                  <input type="text" class="form-control" name="search" id="search" value="{{$search}}" placeholder="Search for a listing...">
                                 @else
                                  <input type="text" class="form-control" name="search" id="search" value="" placeholder="Search for a listing...">
                                 @endif
                                  <span class="input-group-btn">
                                    <button id="btnSubmit" name="btnSubmit"  class="btn btn-default">Search</button>
                                  </span>
                                </div>

                              </div>
                            </form>

                      @if (Auth::check())
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                      <span class="glyphicon glyphicon-user fa-lg" aria-hidden="true"></span> {{$user->fname}} {{$user->lname}} <span class="caret"></span></a>
                      <ul class="dropdown-menu">

                    <li><a href="/dashboard/home">Go to Dashboard</a></li>
                    <li><a href="/dashboard/users/edit/{{$user->id}}">Profile</a></li>
                     @if ($user->privilege == 'Administrator')
                     <li role="separator" class="divider"></li>
                    <li><a href="/dashboard/users">Users</a></li>
                    <li><a href="/dashboard/sitesettings">Website Settings</a></li>
                    <li><a href="/auth/logout">Logout</a></li>
                    @endif
                    @else
                    <li><a href="/auth/login">Log In</a></li>
                    @endif
                  </ul>
                  </li>

            </ul>
    </div>


        </div><!--/.nav-collapse -->

    </nav>
