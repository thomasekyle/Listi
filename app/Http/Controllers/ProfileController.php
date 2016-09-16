<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Hash;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function getProfile()
    {
        if (\Auth::check()) //Check to see if the user is logged in.
        {
          $user = \Auth::user();
          $sitesettings = \App\SiteSettings::find(1);
          return view('dashboard.profile', compact('user'));
        }
        else
        {
          return view('errors.autherror');
        }
    }

    public function update(Request $request)
    {
      if (\Auth::check())
    {
        $errors = false;
        $data = $request;

        //Input Rules for processing the HTML Form data
        $rules = [
        //'password'      => 'required|min:8|'
        //'new_password'  => 'required|confirmed|min:8'
        'fname'         => 'required|alpha',
        'lname'         => 'required|alpha',
        'birthday'      => 'date',
        'phone_number'  => 'digits_between:10,11',
        'fax_number'    => 'digits_between:10,11',
        'active'        => 'required',
        'description'   => 'max:255',
        'file'          => 'mimes:png,jpg,jpeg'
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

        $edituser = \Auth::user();
        //Profile Picture Upload logic
        if ($request->file != null)
        {
            $file = $request->file('file');
            $filetype = $request->file('file')->getClientOriginalExtension();
            $newfilename = 'profile_pic.' . $filetype;
            $edituser->pic_id = $newfilename;
            $file->move(public_path().'/uploads/user/'. $edituser->id .'/' , $newfilename);
        }


        $edituser->fname= $request['fname'];
        $edituser->lname = $request['lname'];
        $edituser->birthday = $request['birthday'];
        $edituser->phone_number = $request['phone_number'];
        $edituser->fax_number = $request['fax_number'];
        $edituser->description = $request['description'];
        $edituser->active = $request['active'];
        //$edituser->privilege = $request['privilege'];
        //$user->type = $request['type'];
        //$user->bedrooms = $request['bedrooms'];
        //$user->bathrooms = $request['bathrooms'];
        //$user->description = $request['description'];
        $edituser->save();
        return redirect()->action('DashboardController@getDashboard');
    }
    else
    {
        return view('errors.autherror');
    }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
