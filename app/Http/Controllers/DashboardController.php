<?php

namespace App\Http\Controllers;

use App\Listing;
use App\User;
use App\SiteSettings;
use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;

use App\Http\Requests;
use App\Http\Controllers\Controller;


class DashboardController extends Controller
{

    public function __constuct() {
    }

    ////
    // User Dashboard Routers. All Users can see
    ////

    public function getDashboard() {
        $user = \Auth::user();
        $uid = \Auth::user()->id;
        $sitesettings = SiteSettings::find(1);
        $search = '';
        $listings = Listing::where('user_id', '=', $uid)->paginate(25);
        $totallistings = count(Listing::where('user_id', '=', $uid)->get());
        $activelistings = count(Listing::where('user_id', '=', $uid)->where('type', '!=', 'Unavailable')->get());
        return view('dashboard.home', compact('sitesettings', 'totallistings', 'activelistings', 'user', 'listings', 'search'));
    }

    public function getProfile() {
        $user = \Auth::user();
        return view('dashboard.profile', compact('user'));
    }

    ////
    // Admin Dashboard Routes. Only Admins of the System can see these.
    ////

    public function getSiteSettings() {
        $validator;
        $user = \Auth::user();
        $sitesettings = SiteSettings::find(1);
        return view('dashboard.sitesettings' ,compact('sitesettings', 'user', 'validator'));
    }

    public function getUsers() {
        $search = '';
        $user = \Auth::user();
         $sitesettings = SiteSettings::find(1);
         $userlist = User::paginate(10);
        return view('dashboard.users' ,compact('sitesettings', 'userlist', 'user', 'search'));
    }

}
