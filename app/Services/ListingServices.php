<?php

namespace App\Services;

use Validator;
use App\Listing;
use App\ListingPic;
use Illuminate\Http\Request;
use Requests;
use App\Http\Controllers\Controller;

class ListingServices
{
  protected $pic_limit = 8;
  protected $fileservices;
  protected $searchservices;

////
// Base constructor method.
////
 public function __construct()
 {
   $this->fileservices = new FileServices();
   $this->searchservices = new SearchServices();
 }

////
//Create a new listing from a POST request.
////
 public function buildListing($request)
 {
   $newlisting = new Listing;
   $newlisting->user_id = \Auth::user()->id;
   $newlisting->fill($request->all());
   $newlisting->search_query = $this->buildQueryString($request);
   $newlisting->save();
   if (isset($request->file[0]))
     $newlisting->num_pics = $this->storePictures($newlisting->id, $request->file);
 }

////
//Uses the SearchServices class to build an acceptable query strings for a record
////
 public function buildQueryString($request)
 {
   $search_words = Listing::getSearchables($request);
   return $this->searchservices->constructQueryString($search_words);
 }

////
//Updates the specified Listing with data from the POST request.
////
 public function updateListing($request, $listing)
 {
   $listing->fill($request->all());
   if ($request->file[0] != null)
   {
     $listing->num_pics = $this->storePictures($listing->id, $request->file);
   }

   $listing->search_query = $this->buildQueryString($request);
   $listing->save();
 }

////
// Deletes the listing with the specified id and any pictures associated with it
///
public function destroy($id)
{
  $listing = Listing::findOrFail($id);
  $listingpic = ListingPic::where('listing_id', $id);

  foreach ($listingpic as $lp)
  {
    $this->destroyPicture($lp->id);
  }

  $listing->delete();
}

 ////
 //Check the number of pictures being uploaded to the listing against
 //the maximum amount allow minus the current amount of pictures already
 //uploaded.
 ////
 public function checkPicLimit($current, $incoming)
 {
   if (($this->pic_limit-$current) < $incoming)
   {
     return true;
   }
   else
   {
     return false;
   }
 }

/////
//Uses the File Services class to store the pictures uploaded to the listing.
//return the number of pictures stored
////
 public function storePictures($id, $files)
 {
   foreach ($files as $file)
   {
     $path = $this->fileservices->getListingUploadPath($id);
     $newfilename = $this->fileservices->uploadFile($path, $file);
     $newlistingpic = \App\ListingPic::create([
       'listing_id'         => $id,
       'filename'           => $newfilename
       ]);
   }
   return count($files);
 }

////
// Update the featured picture for a listing
///
public function updateFeatured($listing, $file_id)
{
  $listing->featured_pic = $file_id;
  $listing->save();
}

////
//User the File Services Class to delete the given listing picture specified
//by the user.
////
 public function destroyPicture($id)
 {
      $listingpic = \App\ListingPic::findOrFail($id);
      FileServices::deleteFile($listingpic);
      $listingpic->delete();
 }


}
