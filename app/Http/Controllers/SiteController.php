<?php

namespace App\Http\Controllers;

use App\User;
use App\Listing;
use App\SiteSettings;
use App\Services\SearchServices;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class SiteController extends Controller
{
  ////////////////////////////////////////////////////////////////
  //
  //	Realtors (If this section grows larger it will be moved to
  //	a different controller in the future)
  //
  /////////////////////////////////////////////////////////


  //Returns all realtors(users) and site settings
  public function realtorIndex() {
    $users = User::paginate(6);
    $sitesettings = SiteSettings::find(1);
    return view('pages.realtors', compact('users', 'sitesettings'));
  }

  //Returns the user with the specified id.
  public function showUsers($id) {
    $user = User::find($id);
    return view('pages.realtors')->withUser($user);
  }

  /////////////////////////////////////////////////////////////////
  //
  //	Listings (If this section grows to larger it will be moved to
  //	a different controller in the future)
  //
  ///////////////////////////////////////////////////////


  public function getMain()
  {
    $user = SiteController::checkAuth();
    $sitesettings = SiteSettings::find(1);
    return view('sites.main', compact('user', 'listings', 'sitesettings'));
  }



  //Returns all listings and site settings.
  public function listingIndex()
  {
    $user = SiteController::checkAuth();
    $listings = Listing::paginate(15);
    $sitesettings = SiteSettings::find(1);
    return view('sites.listings', compact('user', 'listings', 'sitesettings'));
  }

  //Returns a single listing from it's id
  public function showListing($id)
  {
    $user = SiteController::checkAuth();
    $listing = Listing::find($id);
    $listingpics = \App\ListingPic::where('listing_id', $id)->get();
    $fpic = \App\ListingPic::find($listing->featured_pic);
    $rlistings = \App\Listing::all()->random(3);
    $sitesettings = SiteSettings::find(1);
    return view('sites.listings.view', compact('user', 'listing', 'sitesettings', 'listingpics', 'fpic', 'rlistings'));
  }


  /**
  *  Search the listings in the database for keywords in the search query record column
  *
  * @return \Illuminate\Http\Response
  */
  public function searchListings(Request $request)
  {
    //Use the search service to return listing that match search criteria
    $user = \Auth::user();
    $search_list = \App\Listing::all();
    $merge = SearchServices::search($request, $search_list);

    //Get the listings with the list of matched ids
    $listings = \App\Listing::whereIn('id', $merge)->paginate(25);
    $search = $request->search;
    $sitesettings = SiteSettings::find(1);
    return view('sites.listings', compact('sitesettings', 'listings', 'user', 'search'));
  }

  /**
  *  Search the listings in the database for keywords in the search query record column
  *
  * @return \Illuminate\Http\Response
  */
  public function searchDashboardListings(Request $request)
  {
    //Use the search service to return listing that match search criteria
    $user = \Auth::user();
    $search_list = \App\Listing::all();
    $merge = SearchServices::search($request, $search_list);

    //Get the listings with the list of matched ids
    $listings = \App\Listing::whereIn('id', $merge)->paginate(25);
    $search = $request->search;
    $sitesettings = SiteSettings::find(1);
    return view('sites.listings', compact('sitesettings', 'listings', 'user', 'search'));
  }

  public function checkAuth()
  {
    if (\Auth::check()) //Check to see if the user is logged in.
    {
      $user = \Auth::user();
      return $user;
    }
    else {
      return null;
    }
  }

}
