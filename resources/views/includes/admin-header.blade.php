 <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"><i class="fa fa-home"></i>Listi</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="/dashboard/home">Dashboard</a></li>

          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
          <span class="glyphicon glyphicon-user fa-lg" aria-hidden="true"></span> {{$user->first_name}} {{$user->last_name}} <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="/main">Go to Site</a></li>
            <li><a href="/dashboard/profile">Profile</a></li>
             @if ($user->privilege == 'Administrator')
             <li role="separator" class="divider"></li>
            <li><a href="/dashboard/users">Users</a></li>
            <li><a href="/dashboard/sitesettings">Website Settings</a></li>
            @endif
            <li><a href="/auth/logout">Logout</a></li>


          </ul>
        </li>
        <form class="navbar-form navbar-right" role="form" method="GET" action="/dashboard/search">
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

          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
    </br>
    </br>
    </br>
    </br>
