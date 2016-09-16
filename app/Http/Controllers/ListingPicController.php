<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ListingPic;
use App\Services\FileServices;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException;


class ListingPicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
      $listingpics = ListingPic::where('listing_id', $id);
      return $listingpics;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id, $files)
    {
      foreach ($files as $file)
      {
        $newfilename = FileServices::uploadFile(getListingUploadPath(), $file);
        $newlistingpic = \App\ListingPic::create([
          'listing_id'         => $id,
          'filename'           => $newfilename
          ]);
      }
      return count($files);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $path = ListingPic::getFilePath($listingpic->id);
        return $path;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //This method updates the featured picture for the listing.
        $listingpic = \App\ListingPic::find($id);
        $listing = \App\Listing::find($listingpic->listing_id);
        $listing->featured_filname = $listingpic->filename;
        $listing->featured_pic = $listingpic->id;
        $listing->save();
    }


    public function updateFeatured($id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Get the listing picture
         $listingpic = \App\ListingPic::findOrFail($id);

         //Remove the picture from physical storage.
         FileServices::deleteFile($listingpic);

         //Remove the file from the database
         $listingpic->delete();

         $user = \Auth::user();
         $listingpics = \App\ListingPic::where('listing_id', $listing->id)->get();
         return view('dashboard.listing.edit' ,compact('listing', 'listingpics', 'user'));
    }
}
