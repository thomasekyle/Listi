<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class RealtorController extends Controller
{
    //
    public function index() 
    {
        $users = User::paginate(3);

        return view('pages.realtors', compact('users'));
    }

    public function showListing($id)
    {
        $user = User::find($id);
        return view('pages.realtors')->withListing($users);
    }
}
