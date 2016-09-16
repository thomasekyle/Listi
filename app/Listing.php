<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Listing extends Model
{
  //The database table used by this module
  protected $table = 'listings';

  /**
  * The attributes that are mass assignable.
  *
  * @var array
  */
  protected $fillable = ['user_id', 'unit_name', 'type', 'house_num', 'street_name',
  'city', 'state',  'zip', 'subdivision', 'sq_ft', 'type', 'price', 'bedrooms',
  'bathrooms', 'pics_id', 'description'];



  public static function getSearchables($request)
  {
    $searchable = ['unit_name', 'type', 'house_num', 'street_name', 'city',
    'state', 'zip', 'subdivision', 'sq_ft', 'type', 'price'];
    $searhes[] = array();
    foreach ($searchable as $s)
    {
      $searches[] = $request[$s];
    }
    return $searches;
  }

  public static function getValidator($request)
  {
    //Input Rules for processing the HTML Form data. Will return errors
    //if the rules are not satisfied.
    $rules = [
      'unit_name'     => 'required',
      'house_num'     => 'required|digits_between:1,10',
      'street_name'   => 'required',
      'apt_num'       => 'alpha_num',
      'city'          => 'required',
      'state'         => 'required|alpha',
      'zip'           => 'required|digits_between:5,5',
      'sq_ft'         => 'required|digits_between:1,20',
      'price'         => 'required|digits_between:1,20',
      'type'          => 'required',
      'bedrooms'      => 'required',
      'bathrooms'     => 'required'
    ];

    return Validator::make($request->all(), $rules);
  }

  public static function getAgentContact($listing, $id)
  {
    $user = User::find($listing->user_id);
    return $user->email;
  }

  public static function getFeaturedPic($listing)
  {
    if ($listing->featured_pic != 0)
    {
      $featurepic = \App\ListingPic::find($listing->featured_pic);
      return $featurepic->filename;
    }
    else
    {
      return 0;
    }
  }

  public static function getSearchTerms($request)
  {
    $sq = $request['unit_name'] . ' ' .
    $request['house_num'] . ' ' .
    $request['street_name'] . ' ' .
    $request['apt_num'] . ' ' .
    $request['city'] . ' ' .
    $request['state'] . ' ' .
    $request['zip'] . ' ' .
    $request['subdivision'] . ' ' .
    $request['type'];
    return $sq;
  }


}
