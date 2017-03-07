<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Hash;
use Storage;
use App\Services\UserServices;
use App\Http\Requests;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserEmailUpdateRequest;
use App\Http\Requests\UserPasswordUpdateRequest;
use App\Http\Requests\NoCheckPassUpdateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Controllers\Controller;

class UserController extends Controller
{

    protected $userservice;

    ////
    // Default constructor
    ////
    public function __construct()
    {
      $this->userservice = new UserServices();
    }

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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
            $user = \Auth::user();
            return view('dashboard.users.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserCreateRequest $request)
    {
      $this->userservice->build($request);
      return redirect()->action('DashboardController@getUsers')->with('message', 'User successully created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
      $edituser = \App\User::find($id);
      $sitesettings = \App\SiteSettings::find(1);
      return view('dashboard.users.edit', compact('sitesettings', 'user', 'edituser'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, $id)
    {
      $this->userservice->change($request, $id);
      return redirect()->action('DashboardController@getUsers')->with('message', 'Success! User has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $this->userservice->destroy($id, $request->tid);
        if ($request->tid == 0)
          return redirect()->action('DashboardController@getUsers')->with('User deleted.');
        else
          return redirect()->action('DashboardController@getUsers')->with('User deleted and listings tranfered.');
    }


    public function transfer($id) {
      $user = \Auth::user();
      $userlist = \App\User::all();
      $sitesettings = \App\SiteSettings::find(1);
      return view('dashboard.users.transfer', compact('user', 'id', 'userlist', 'sitesettings'));
    }

    ////
    // Requires the user to enter their current password if logged in.
    ////
    public function updatePassword(UserPasswordUpdateRequest $request, $id) {
        if ($this->userservice->checkPassword($request->password, $id)) {
          $this->userservice->changePassword($request->password, $id);
          return redirect()->back()->with('message', 'Password updated.');
        }
        else
          return redirect()->back()->withErrors('errors', 'Current password does not match.')->withInput();
    }

    ////
    // When editing a user from the admin interface this method is used.
    ////
    public function updatePassNoCheck(NoCheckPassUpdateRequest $request, $id) {
        $this->userservice->changePassword($request->password, $id);
        return redirect()->back()->with('message', 'Password updated.');
    }

    ////
    // Requires the user to enter their current password if logged in.
    ////
    public function updateEmail(UserEmailUpdateRequest $request, $id)
    {
      if ($this->userservice->checkPassword($request->password, $id)) {
        $this->userservice->changeEmail($request->password, $id);
        return redirect()->back()->with('message', 'Email address updated.');
      }
      else
        return redirect()->back()->withErrors('errors', 'Current password does not match.')->withInput();
    }

}
