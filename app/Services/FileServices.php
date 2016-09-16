<?php

namespace App\Services;

use App\File;
use Illuminate\Http\Request;
use Requests;
use App\Http\Controllers\Controller;

class FileServices extends Service
{

  public static function getDefaultUploadPath()
  {
    return public_path() . '/uploads/base/';
  }

  //Returns the upload path for files of the specified listing
  public static function getListingUploadPath($id)
  {
    return public_path() . '/uploads/listings/' . $id . '/';
  }

  //Returns the upload path for files of the specified profile
  public static function getProfileUploadPath($id)
  {
    return public_path . '/uploads/users/' . $id . '/';
  }

  //
  public static function findListingPicFile($id)
  {
    $listingpic = \App\ListingPic::findOrFail($id);
    return '/uploads/listings/' . $listingpic->listing_id . '/' . $listingpic->filename;
  }

  public static function findProfileFile($id)
  {
    return public_path . '/uploads/listings/' . $id . '/profile_pic.jpg';
  }

  //Create Files at the given $path
  public static function uploadFile($path, $file)
  {
        $names = $file->getClientOriginalName();
        $filetype = $file->getClientOriginalExtension();
        $newfilename = time() . $names;
        $file->move($path, $newfilename);
        return $newfilename;
  }

  //Upload picture files to the listing.
  public static function uploadListingFile($listing, $files)
  {

        foreach ($files as $file)
        {
            $names = $file->getClientOriginalName();
            $filetype = $file->getClientOriginalExtension();
            $newfilename = time() . $names;
            $newlistingpic = \App\ListingPic::create([
                'listing_id'         => $listing['id'],
                'filename'           => $newfilename
                ]);

            $file->move(getListingUploadPath($listing->id) , $newfilename);
        }
        return count($files);
  }

  public static function deleteFile($path)
  {
    unlink(public_path() . \App\ListingPic::getFilePath($listingpic->id));
  }

}
