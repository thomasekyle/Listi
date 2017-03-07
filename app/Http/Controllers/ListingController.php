<?php

namespace App\Http\Controllers;

use App\Listing;
use App\ListingPic;
use App\Services\ListingServices;
use Illuminate\Http\Request;
use Requests;
use App\Http\Requests\ListingRequest;
use App\Http\Controllers\Controller;

class ListingController extends Controller
{

  protected $lservice;

  public function __construct()
  {
    $this->lservice = new ListingServices();
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    $user = \Auth::user();
    $sitesettings = \App\SiteSettings::find(1);
    return view('dashboard.listing.create' ,compact('sitesettings', 'user'));
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(ListingRequest $request)
  {

    //Check to make sure the picture limit isn't surpassed
    if ($this->lservice->checkPicLimit(0, count($request->file)))
    {
        $errors = 'You can have a maximum of eight pictures.';
        return redirect()->back()->withErrors($errors)->withInput();
    }

    $this->lservice->buildListing($request);

    $message = 'Listing was successfully created.';
    return redirect()->action('DashboardController@getDashboard')->with('message', 'Listing was successfully created.');
  }

  /**
  * Display the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function show($id)
  {

  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function edit($id)
  {
    $user = \Auth::user();
    $listing = Listing::find($id);
    $listingpics = ListingPic::where('listing_id', $id)->get();
    return view('dashboard.listing.edit' ,compact('listing', 'listingpics', 'user'));
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function update(ListingRequest $request, $id)
  {
    $listing = Listing::findOrFail($id);

    if ($this->lservice->checkPicLimit($listing->num_pics, count($request->file)))
    {
        $errors = 'You can have a maximum of eight pictures.';
        return redirect()->back()->withErrors($errors)->withInput();
    }

    $this->lservice->updateListing($request, $listing);
    return redirect()->action('DashboardController@getDashboard')->with('message', 'Listing was successfully updated.');
  }

  ////
  //
  ////
  public function updateFeaturedPic($id, $file_id)
  {
    $listing = Listing::findOrFail($id);
    $listingservice->updateFeaturedPic($listing, $file_id);
    return redirect()->action('DashboardController@editListing')->with('message', 'Featured picture updated.')->with($id);
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function destroy($id)
  {
    $this->lservice->destroyListing($id);
    return redirect()->action('DashboardController@getDashboard')->with('message', 'Listing was successfully deleted.');
  }

}
