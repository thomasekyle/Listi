@extends('layouts.base')
@section('content')
    <!-- 1st row verticaly centered text in the square columns -->
 <div class="container">
      <!-- Example row of columns -->
      <div class="row">
      @foreach ($users as $user)
      <div class="col-md-6">
        <div class="row">
        @if ($user->pic_id != '')
          <div class="col-md-4">
          <div class="thumbnail">
            <img src="/uploads/user/{{$user->id}}/{{$user->pic_id}}" width="144" height="144" alt="...">
          </div>
          </div>
          @else
          <div class="col-md-4">
          <div class="thumbnail">
            <img src="/img/user.png" width="144" height="144" alt="...">
          </div>
          </div>
          @endif
          <div class="col-md-8">
            <div class="panel panel-default">
              <div class="panel-heading">{{ $user-> fname }} {{ $user-> lname }}</div>
              <div class="panel-body">
                <p><b>Phone: </b>{{ $user-> phone_number }}</p>

              </div>
            </div>
            <p><a class="btn btn-default btn-sm" href="mailto:{{$user->email}}" role="button">Send Email &raquo;</a></p>
          </div>
        </div>



    </div>
      @endforeach
          <div class="container">
          <div class="col-md-6 col-md-offset-5">
        {!! $users->render() !!}
        </div>
        </div>
      </div>
      </div>
@stop
