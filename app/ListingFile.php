<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListingFile extends Model
{
    //
    protected $table = 'listing_files';
      //
      protected $fillable = ['listing_id', 'pic_id', 'filename'];

      public static function getFilePath($id)
      {
        return FileServices::findListingPicFile($id);
      }
}
