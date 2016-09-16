<?php

namespace App\Services;

use App\File;
use Illuminate\Http\Request;
use Requests;
use App\Http\Controllers\Controller;

class SearchServices extends Service
{

  //Construsts a query for a record
  public static function constructQueryString()
  {
    $search_query = '';
    $arg_num = func_num_args();
    $arg_list = func_get_args();
    foreach ($arg_list[0] as $arg)
    {
      $search_query .= $arg . ' ';
    }
    return $search_query;
  }

  //Search all listings on in the DB
  public static function searchListings($request)
  {
      //Variable Declaration
      $temp_q = 0; $merge = array(); $queries = 0; $querylist=0;

      //Remove any commas from the search query and divide the queries information
      //into an array of strings
      $querylist = str_replace(',', '', $request->search);
      $queries = explode(' ', $querylist);

      //only look for queries where the user owns the listing
      $temp_list = \App\Listing::all();

      //For each query see if it is in the search_query field for the record
      //If it add the search queries found, if the value of search confidence
      //is higher than %50 add the record to the result array.
      foreach ($temp_list as $tl)
      {
          $i = 0;

          foreach ($queries as $q)
          {
              if (stripos($tl->search_query, $q) !== false) $i++;
          }
          $conf = $i / count($queries);
          if ($conf >= .5) $merge[] = $tl->id;

      }

          //Paginate the results found by 25
          $listings = \App\Listing::whereIn('id', $merge)->paginate(25);
          return $listings;
  }

  //Search listings belonging to the account logged in
  public static function searchDashboardListings($request, $uid)
  {
      //Variable Declaration
      $temp_q = 0; $merge = array(); $queries = 0; $querylist=0;

      //Remove any commas from the search query and divide the queries information
      //into an array of strings
      $querylist = str_replace(',', '', $request->search);
      $queries = explode(' ', $querylist);

      //only look for queries where the user owns the listing
      $temp_list = \App\Listing::where('user_id', '=', $uid)->get();

      //For each query see if it is in the search_query field for the record
      //If it add the search queries found, if the value of search confidence
      //is higher than %50 add the record to the result array.
      foreach ($temp_list as $tl)
      {
          $i = 0;

          foreach ($queries as $q)
          {
              if (stripos($tl->search_query, $q) !== false) $i++;
          }
          $conf = $i / count($queries);
          if ($conf >= .5) $merge[] = $tl->id;

      }

          //Paginate the results found by 25
          $listings = \App\Listing::whereIn('id', $merge)->paginate(25);
          return $merge;
  }

  /**
   *  Search list provided in the function for keywords in the search query record column
   *
   * @return An array of id's of matching items
   */
  public static function search(Request $request, $search_list)
  {
      //Variable declaration
      $temp_q = 0; $merge = array(); $queries = 0; $querylist=0;

      //Remove any commas from the search query and divide the queries information
      //into an array of strings
      $querylist = str_replace(',', '', $request->search);
      $queries = explode(' ', $querylist);

      //For each query see if it is in the search_query field for the record
      //If it add the search queries found, if the value of search confidence
      //is higher than %50 add the record to the result array.
      foreach ($search_list as $tl)
      {
          $i = 0;
          foreach ($queries as $q)
          {
              if (stripos($tl->search_query, $q) !== false) $i++;
          }
          if (count($queries) == $i) $merge[] = $tl->id;

      }

      //Return an array of id's from the result set
      return $merge;

  }

}
