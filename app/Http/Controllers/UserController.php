<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Hash;
use Storage;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (\Auth::check()) //Check to see if the user is logged in.
        {
            $user = \Auth::user();
            return view('dashboard.users.create', compact('user'));
        }
        else
        {
            return view('errors.autherror');
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (\Auth::check()) //Check to see if the user is logged in.
        {
            $errors = false;
            $data = $request;
            //Input Rules for processing the HTML Form data
            $rules = [
                'email'         => 'required|email|unique:users',
                'password'      => 'required|confirmed|min:8',
                'fname'         => 'required|alpha',
                'lname'         => 'required|alpha',
                'birthday'      => 'date',
                'phone_number'  => 'digits_between:10,11',
                'fax_number'    => 'digits_between:10,11',
                'active'        => 'required',
                'description'   => 'max:255'
            ];

            //Validate the input for all of the fields.
                $this->validate($data, $rules);

            //If there are no error skip, returning them
            //If errors are found return the infomation as well as the information
            //filled out to the previous form.
                if ($errors != false) {
                    if ($errors->fails())
                    {
                        return redirect()->back()->withInput()->withErrors($errors);
                    }
                }
            $sq = $request->email . ' ' . $request->fname . ' ' . $request->lname;
            \App\User::create([
                'name'          => $request['name'],
                'email'         => $request['email'],
                'privilege'    => $request['privilege'],
                'password'      => bcrypt($request['password']),
                'fname'         => $request['fname'],
                'lname'         => $request['lname'],
                'birthday'      => $request['birthday'],
                'phone_number'  => $request['phone_number'],
                'fax_number'    => $request['fax_number'],
                'description'   => $request['description'],
                'pics_id'       => bcrypt($request['email']),
                'active'        => $request['active'],
                'search_query'  => $sq
            ]);
            return redirect()->action('DashboardController@getUsers');
        }
        else
        {
            return view('errors.autherror');
        }

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
        if (\Auth::check()) //Check to see if the user is logged in.
        {
            $user = \Auth::user();
            $edituser = \App\User::find($id);
            $sitesettings = \App\SiteSettings::find(1);
            return view('dashboard.users.edit', compact('sitesettings', 'user', 'edituser'));
        }
        else
        {
            return view('errors.autherror');
        }
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

          if (\Auth::check())
        {
            $errors = false;
            $data = $request;

            //Input Rules for processing the HTML Form data
            $rules = [
            'email'                 => 'email',
            'password_confirm'      => 'same:password',
            'fname'                 => 'alpha',
            'lname'                 => 'alpha',
            'birthday'              => 'date',
            'phone_number'          => 'digits_between:10,11',
            'fax_number'            => 'digits_between:10,11',
            'active'                => 'required',
            'description'           => 'max:255',
            'file'                  => 'mimes:png,jpg,jpeg'
            ];

            //Validate the input for all of the fields.
            $this->validate($data, $rules);

            //If there are no error skip, returning them
            //If errors are found return the infomation as well as the information
            //filled out to the previous form.
            if ($errors != false) {
                if ($errors->fails())
                {
                    return redirect()->back()->withInput()->withErrors($errors);
                }
            }

            $edituser = \App\User::find($id);
            //Profile Picture Upload logic
            if ($request->file != null)
            {
                $file = $request->file('file');
                $filetype = $request->file('file')->getClientOriginalExtension();
                $newfilename = 'profile_pic.' . $filetype;
                $edituser->pic_id = $newfilename;
                $file->move(public_path().'/uploads/user/'. $edituser->id .'/' , $newfilename);
            }


            if (isset($request['email'])) $edituser->email = $request['email'];
            if ($request['password_confirm'] != '') $edituser->password = bcrypt($request['password']);
            if (isset($request['fname'])) $edituser->fname= $request['fname'];
            if (isset($request['lanme'])) $edituser->lname = $request['lname'];
            if (isset($request['birthday'])) $edituser->birthday = $request['birthday'];
            if (isset($request['phone_number'])) $edituser->phone_number = $request['phone_number'];
            if (isset($request['fax_number'])) $edituser->fax_number = $request['fax_number'];
            if (isset($request['description'])) $edituser->description = $request['description'];
            $edituser->active = $request['active'];
            //$edituser->privilege = $request['privilege'];
            //$user->type = $request['type'];
            //$user->bedrooms = $request['bedrooms'];
            //$user->bathrooms = $request['bathrooms'];
            //$user->description = $request['description'];
            $edituser->search_query = $edituser->email . ' ' . $edituser->fname . ' ' . $edituser->lname;
            $edituser->save();
            return redirect()->action('DashboardController@getUsers');
        }
        else
        {
            return view('errors.autherror');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        //Delete the user with the specified id.
        //If the user has any properties that are in their name you will be able to transfer
        //to another user or delete them.
        $user = \App\User::find($request->tid);
        $duser = \App\User::find($request->id);
        $ulistings = \App\Listing::where('user_id', $id)->get();

        if ($request->tid != 0)
        {
            //transfer other listing to another user
            foreach ($ulistings as $ul)
            {
                $ul->user_id = $request->tid;
                $ul->save();
            }
        }
        else
        {
            //Delete all the listing that this user made.
            foreach ($ulistings as $ul)
            {
                $listingpictures = \App\ListingPic::where('listing_id', $ul->id)->get();
                //Delete all the picture for the listing if it has any
                foreach ($listingpictures as $lp)
                {
                  unlink(public_path() . '/uploads/listings/' . $ul->id . '/' . $lp->filename);
                  $lp->delete();
                }

                //Delete the listing from the database.
                $ul->delete();
            }
        }


        $duser->delete();
        return redirect()->action('DashboardController@getUsers');
    }


    public function transfer($id)
    {
      $user = \Auth::user();
      $userlist = \App\User::all();
      $sitesettings = \App\SiteSettings::find(1);
      return view('dashboard.users.transfer', compact('user', 'id', 'userlist', 'sitesettings'));
    }


    public function updatePassword(Request $request)
    {
        $user = \Auth::user();
        if (Hash::check($request->current_password, $user->password))
        {
          $errors = false;
          $validator = \App\User::getPasswordValidator($request);
          if ($validator->fails())
          {
            return redirect()->back()->withErrors($validator)->withInput();
          }
          $user->password = bcrypt($request->password);
          $user->save();
          return redirect()->back();
        }
        else
        {
          $errors = "Current password does not match.";
          return redirect()->back()->withErrors($errors)->withInput();
        }

    }

    public function updateEmail(Request $request)
    {
      $user = \Auth::user();

        if (Hash::check($request->current_password, $user->password))
        {
          $errors = false;
          $validator = \App\User::getEmailValidator($request);
          if ($validator->fails())
          {
            return redirect()->back()->withErrors($validator)->withInput();
          }
          $user->email = $request->email;
          $user->save();
          return redirect()->back();
        }
        else
        {
          $errors = "Current password does not match.";
          return redirect()->back()->withErrors($errors)->withInput();
        }


    }

}
