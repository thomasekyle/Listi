<?php

namespace App\Services;

use App\File;
use Illuminate\Http\Request;
use Requests;
use App\Http\Controllers\Controller;

class FileServices extends Service
{
  protected static $default_upload_path = '/uploads/base/';
  protected static $user_upload_path = '/uploads/users/';
  protected static $listing_upload_path = '/uploads/listings/';


  public static function getDefaultUploadPath()
  {
    return public_path() . self::$default_upload_path;
  }

  //Returns the upload path for files of the specified listing
  public static function getListingUploadPath($id)
  {
    return public_path() . self::$listing_upload_path . $id . '/';
  }

  //Returns the upload path for files of the specified profile
  public static function getUserUploadPath($id)
  {
    return public_path() . self::$user_upload_path . $id . '/';
  }

  //
  public static function findListingPicFile($id)
  {
    $listingpic = \App\ListingPic::findOrFail($id);
    return self::$listing_upload_path . $listingpic->listing_id . '/' . $listingpic->filename;
  }

  public static function findUserFile($id)
  {
    $userfile = \App\UserFile::findOrFail($id);
    return self::$user_upload_path . $userfile->user_id . '/' . $userfile->filename;
  }

  public static function findProfileFile($id)
  {
    return public_path() . '/uploads/listings/' . $id . '/profile_pic.jpg';
  }

  ////
  // Creates a file from a POST request and returns the filename of the newly
  // created file.
  ////
  public static function uploadFile($path, $file)
  {
        $names = $file->getClientOriginalName();
        $filetype = $file->getClientOriginalExtension();
        $newfilename = time() . $names;
        $file->move($path, $newfilename);
        return $newfilename;
  }

  ////
  // Upload picture files to the listing.
  ////
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
