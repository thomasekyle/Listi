<div class="col-md-12">
  <div class="panel panel-default">
    <div class="panel-body">

      <div class="row">

        <!-- FEATURED PICTURE -->
        @if ($listing->featured_pic != 0)
        <div class="col-md-3 col-xs-6 col-sm-height" >
          <div class="thumbnail">
            <img src="{{\App\ListingPic::getFilePath($listing->featured_pic)}}" class="img-responsive" style="height:200px" alt="...">
            <div class="caption">
              <a href="/dashboard/listing/picture/delete/{{$listing->featured_pic}}" class="btn btn-danger btn-sm" role="button">Delete</a>
              <button  class="btn btn-info btn-sm" role="button" disabled="disabled">Featured</button>
            </div>
          </div>
        </div>
        @endif

        <!-- NON-FEATURED PICTURES -->
        @foreach ($listingpics as $i=>$listingpic)
        @if ($listingpic->id != $listing->featured_pic)
        <div class="col-md-3 col-xs-6 col-sm-height" >
          <div class="thumbnail">
            <img src="{{\App\ListingPic::getFilePath($listingpic->id)}}" class="img-responsive" style="height:200px" alt="...">

            <div class="caption">
              <a href="/dashboard/listing/picture/delete/{{$listingpic->id}}" class="btn btn-danger btn-sm" role="button">Delete</a>
              <a href="/dashboard/listing/{{$listing->id}}/updatefeatured/{{$listingpic->id}}" class="btn btn-info btn-sm" role="button">Make Featured</a>
            </div>
          </div>
        </div>
        @endif
        @endforeach

      </div>

      <hr>
      <div class="form-group">
        <label class="col-md-4 control-label" for="file">Pictures (8 Max):</label>
        <div class="col-md-4">
          <form id="form-upload">
            <input type="file" name="file[]" class="input-file" id="file[]" multiple="true">
          </form>

        </div>
      </div>

      </div>
    </div>
</div>
