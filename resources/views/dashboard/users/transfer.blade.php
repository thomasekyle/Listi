@extends('layouts.base-admin')
@section('content')
<div id="container">

  <div id="row">
    <form class="form-horizontal" enctype="multipart/form-data" role="form" method="POST" action="/dashboard/users/delete/{{$id}}">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="panel panel-default">
        <div class="panel-heading">
          Please select a user to transfer your listings to.
        </div>

        <div class="panel-body">
          <div class="col-md-4">
            <label class="control-label" for="tid">User:</label>
            <select id="tid" name="tid" class="form-control">
              <option value="0">Do not transfer. Delete listings</option>
              @foreach ($userlist as $u)
              <option value="{{$u->id}}">{{$u->fname}} {{$u->lname}}</option>
              @endforeach
            </select>
          </div>
        </div>

</div>
<div class="pull-right">
  <a href="javascript:history.back()">back</a>
  <button class="btn btn-default" id="submit" name="submit" type="submit" onclick="javascript.alert("Are you sure?")">Submit</button>
</div>
</form>
  </div>

</div>
@stop
