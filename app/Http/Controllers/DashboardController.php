<?php

namespace App\Http\Controllers;

use App\Listing;
use App\User;
use App\SiteSettings;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;


class DashboardController extends Controller
{
    ///////////////////////////////////////////////////////////
    //
    // User Dashboard Routes. Any user of the System can see these.
    //
    /////////////////////////////////////////////



    //The main page of the dashboard
    public function getDashboard()
    {
     if (\Auth::check()) //Check to see if the user is logged in.
    {
        $user = \Auth::user();
        $uid = \Auth::user()->id;
        $sitesettings = SiteSettings::find(1);
        $search = '';
        $listings = Listing::where('user_id', '=', $uid)->paginate(10);
        $totallistings = count(Listing::where('user_id', '=', $uid)->get());
        $activelistings = count(Listing::where('user_id', '=', $uid)->where('type', '!=', 'Unavailable')->get());
        return view('dashboard.home', compact('sitesettings', 'totallistings', 'activelistings', 'user', 'listings', 'search'));
    }
    else
    {
        return view('errors.autherror');
    }
    }

    //The Page for the currently logged in user's profile
    public function getProfile()
    {
        if (\Auth::check()) //Check to see if the user is logged in.
    {
        $user = \Auth::user();
        return view('dashboard.profile', compact('user'));
    }
    else
    {
        return view('errors.autherror');
    }
    }




    ///////////////////////////////////////////////////////////
    //
    // Admin Dashboard Routes. Only Admins of the System can see these.
    //
    /////////////////////////////////////////////

    //Page to change or update the site settings
    public function getSiteSettings()
    {
        if (\Auth::check())
        {
            $validator;
            $user = \Auth::user();
             $sitesettings = SiteSettings::find(1);
            return view('dashboard.sitesettings' ,compact('sitesettings', 'user', 'validator'));
        }
        else
        {
            return view('errors.autherror');
        }
    }

    //Users page. Admins may add or update user profiles and passwords
    public function getUsers()
    {
        if (\Auth::check())
    {
        $search = '';
        $user = \Auth::user();
         $sitesettings = SiteSettings::find(1);
         $userlist = User::paginate(10);
        return view('dashboard.users' ,compact('sitesettings', 'userlist', 'user', 'search'));
    }
    else
    {
        return view('errors.autherror');
    }
    }


}
