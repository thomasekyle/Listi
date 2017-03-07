<?php

namespace App\Services;

use Validator;
use App\User;
use App\UserFile;
use App\Listing;
use App\ListingPic;
use Illuminate\Http\Request;
use Requests;
use App\Http\Controllers\Controller;

class UserServices
{
  protected $fileservice;
  protected $searchservice;

  public function __construct() {
    $this->fileservice = new FileServices();
    $this->searchservice = new SearchServices();
  }

  public function build($request) {
    $user = new User;
    $user->fill($request->all());
    $user->password = bcrypt($request->password);
    $user->search_query = $this->buildQueryString($request);
    if (isset($request->file))
      $user->pic_id = storeUserFile($request->file);
    $user->save();
  }

  ////
  // Uses the SearchServices class to build an acceptable query strings for a record
  // we only use one column when we search this way.
  ////
  public function buildQueryString($request) {
    $search_words = User::getSearchables($request);
    return $this->searchservice->constructQueryString($search_words);
  }

  ////
  // Ignore file upload if there is none.
  ////
  public function change($request, $id) {
    $user = User::findOrFail($id);
    $user->fill($request->all());
    $user->search_query = $this->buildQueryString($request);
    if (isset($request->file))
      $user->pic_id = $this->storeUserFile($request->file, $user->id);
    $user->save();
  }

  ////
  // Uses FileServives to store a file in the user's directory
  ////
  public function storeUserFile($file, $id) {
      $path = $this->fileservice->getUserUploadPath($id);
      $newfile = $this->fileservice->uploadFile($path, $file);
      $userfile = new UserFile();
      $userfile->user_id = $id;
      $userfile->filename = $newfile;
      $userfile->save();
      return $userfile->id;
  }


  public function changePassword($password, $id)
  {
      $user = User::findOrFail($id);
      $user->password = bcrypt($password);
      $user->save();
  }

  public function checkPassword($password, $id) {
      $user = User::findOrFail($id);
      return (Hash::check($password, $user->password));
  }

  public function changeEmail($request, $id) {
      $user = User::findOrFail($id);
      $user->email = $request->email;
      $user->save();
  }

  ////
  // If the transfer id ($tid) of the incoming POST has a non zero value swtich the listings to that user.
  ////
  public function destroy($id, $tid) {
    $user = User::findOrFail($id);
    $userfiles = UserFile::where('user_id', $user->id);
    foreach ($userfiles as $uf)
    {
      $fileservices->deleteUserFile($uf);
      $uf->delete();
    }
    if ($tid == 0)
      self::destroyListings($id);
    else
      self::transferListings($id, $tid);
    $user->delete();
  }

  public function destroyListings($id) {
    $userlistings = Listing::where('user_id', $id)->get();
    $listingservice = new ListingServices();
    foreach ($userlistings as $ul)
    {
      $listingservice->destroy($ul->id);
    }
  }

  public function transferListings($id, $tid) {
    $userlistings = Listing::where('user_id', $id)->get();
      foreach ($userlistings as $ul) {
        $ul->user_id = $tid;
        $ul->save();
      }
  }

}
