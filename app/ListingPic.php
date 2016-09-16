<?php

namespace App;

use App\Services\FileServices;
use Illuminate\Database\Eloquent\Model;

class ListingPic extends Model
{
	protected $table = 'listing_pictures';
    //
    protected $fillable = ['listing_id', 'pic_id', 'filename'];

		public static function getFilePath($id)
		{
			return FileServices::findListingPicFile($id);
		}
}
