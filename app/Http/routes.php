<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
use App\User;
use App\SiteSettings;
use App\Listing;
use Http\Controllers\AuthController;
use Http\Controllers\PasswordController;


//////////////////////////////////////////////////////
//  Login and Restration Routes
/////////////////////////////////////////////////////


// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');


// Password reset link request routes...
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');


// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

Route::controllers([
   'password' => 'Auth\PasswordController',
]);

///////////////////////////////////////////////////////////////////
//	Site and Lisitings
/////////////////////////////////////////////////////////////////
Route::get('listings/view/{id}', 'SiteController@showListing');
Route::get('listings', 'SiteController@listingIndex');
Route::get('/main', 'SiteController@getMain');
Route::get('/search', 'SiteController@searchListings');
Route::get('/', function()
{
    $sitesettings = SiteSettings::find(1);
    return redirect('/main');
});


//////////////////////////////////////////////////////////////////
//	Dashboard Routes
////////////////////////////////////////////////////////////////

Route::group(['middleware' => 'auth'], function () {
    // Only authenticated users may enter...

Route::get('/dashboard/home','DashboardController@getDashboard');

//Search Routes
Route::get('/dashboard/search', 'SearchController@searchListings');
Route::get('/dashboard/users/search', 'SearchController@searchUsers');

//Profile Routes
Route::get('/dashboard/profile', 'ProfileController@getProfile');
Route::post('/dashboard/profile/update', 'ProfileController@update');
Route::post('/dashboard/profile/password/update', 'ProfileController@updatePassword');
Route::post('/dashboard/profile/email/update', 'ProfileController@updateEmail');

//Users Routes
Route::get('/dashboard/users', 'DashboardController@getUsers');
Route::get('/dashboard/users/create', 'UserController@create');
Route::post('/dashboard/users/store', 'UserController@store');
Route::get('/dashboard/users/edit/{id}','UserController@edit');
Route::post('/dashboard/users/update/{id}', 'UserController@update');
Route::get('/dashboard/users/transfer/{id}', 'UserController@transfer');
Route::post('/dashboard/users/delete/{id}', 'UserController@destroy');

//Site Setting Routes
Route::get('/dashboard/sitesettings', 'DashboardController@getSiteSettings');
Route::post('/dashboard/sitesettings/update/{id}', 'SiteSettingsController@update');

//Email Setting Routes
Route::get('/dashboard/emailsettings', 'DashboardController@getEmailSettings');

//Listing Routers
Route::get('/dashboard/add-listing', 'DashboardController@addListing');

//Listing Update/Creation/Edit Routes
Route::get('/dashboard/listing/create', 'ListingController@create');
Route::post('/dashboard/listing/store', 'ListingController@store');
Route::get('/dashboard/listing/edit/{id}', 'ListingController@edit');
Route::post('/dashboard/listing/update/{id}', 'ListingController@update');
Route::get('/dashboard/listing/delete/{id}', 'ListingController@destroy');

//Listing Picture control Routes
Route::post('/dashboard/listing/picture/update', 'ListingPicController@update');
Route::get('/dashboard/listing/picture/delete/{id}', 'ListingPicController@destroy');

Route::get('/create/listing', 'ListingController@create');

});



Route::get('contact', function()
{
    $sitesettings = SiteSettings::find(1);
    return View::make('pages.contact' ,compact('sitesettings'));
});
