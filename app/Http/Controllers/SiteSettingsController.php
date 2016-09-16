<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\View\Middleware\ErrorBinder;

class SiteSettingsController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //Set errors to false until all input is validated.
        $errors = false;

        $data = $request;
        if (\Auth::check())
        {
             //Input Rules for processing the HTML Form data
            $rules = [
                'company_name'              => 'required',
                'company_phone_number'      => 'required|digits_between:10,11',
                'company_fax_number'        => 'required|digits_between:10,11',
                'company_street_number'     => 'required|digits_between:1,10',
                'company_street_name'       => 'required',
                'company_city'              => 'required',
                'company_state'             => 'required',
                'company_zip'               => 'required|digits_between:5,5',
                'http_link'                 => 'url',
                'http_link_2'                => 'url',
                'http_link_3'                => 'url'
            ];

            $this->validate($data, $rules);
            if ($errors != false) {
                if ($errors->fails())
                {
                    //return \Redirect::back()->withInput()->withErrors($validator);
                    return redirect()->back()->withInput()->withErrors($errors);
                }
            }
            $sitesettings = \App\SiteSettings::find($id);
            $sitesettings->website_name = $request['website_name'];
            $sitesettings->website_details = $request['website_details'];
            $sitesettings->company_name = $request['company_name'];
            $sitesettings->company_phone_number = $request['company_phone_number'];
            $sitesettings->company_email = $request['company_email'];
            $sitesettings->company_fax_number = $request['company_fax_number'];
            $sitesettings->company_street_number = $request['company_street_number'];
            $sitesettings->company_street_name = $request['company_street_name'];
            $sitesettings->company_city = $request['company_city'];
            $sitesettings->company_state = $request['company_state'];
            $sitesettings->company_zip = $request['company_zip'];
            $sitesettings->http_link = $request['http_link'];
            $sitesettings->http_link_2 = $request['http_link_2'];
            $sitesettings->http_link_3 = $request['http_link_3'];
            $sitesettings->front_page_html = $request['front_page_html'];
            $sitesettings->header_image = $request['header_image'];
            $sitesettings->header_title = $request['header_title'];
            $sitesettings->header_text = $request['header_text'];
            $sitesettings->save();
            return redirect()->action('DashboardController@getSiteSettings');
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
    public function destroy($id)
    {
        //TYou should never call this function
    }
}
