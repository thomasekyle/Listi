<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SearchServices;
use Illuminate\Database\Eloquent\Model;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * This will return the all of listings belonging to a Logged in user.
     *
     * @return \Illuminate\Http\Response
     */
    public function getListings($search)
    {
        if (\Auth::check()) //Check to see if the user is logged in.
    {
        $listings = $request->listings;
        $user = \Auth::user();
        $uid = \Auth::user()->id;
        $listings->paginate(5);
        return view('dashboard.search', compact('user', 'listings', 'search'));
    }
    else
    {
        return view('errors.autherror');
    }
    }

    /**
     *  Search all the listings in the database for keywords in the search query record column
     *
     * @return \Illuminate\Http\Response
     */
    public function searchListings(Request $request)
    {
        //Use the search service to return listing that match search criteria
        $user = \Auth::user();
        $search_list = \App\Listing::where('user_id', '=', $user->id)->get();
        $merge = SearchServices::search($request, $search_list);

        //Get the listings with the list of matched ids
        $listings = \App\Listing::whereIn('id', $merge)->paginate(25);
        $search = $request->search;
        return view('dashboard.search', compact('listings', 'user', 'search'));
    }

    /**
     *  Search the listings belonging to the user logged in for keywords in the search query record column
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

    /**
     *  Search the users in the database for keywords in the search query record column
     *
     * @return \Illuminate\Http\Response
     */
    public function searchUsers(Request $request)
    {
        //User the search service to return users that match search criteria
        $user = \Auth::user();
        $search_list = \App\User::all();
        $merge = SearchServices::search($request, $search_list);

        //Get the users with the list of matched ids
        $userlist = \App\User::whereIn('id', $merge)->paginate(25);
        $search = $request->search;
        return view('dashboard.users.search', compact('userlist', 'user', 'search'));

    }

}
