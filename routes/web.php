<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $bottombanner = DB::select(
        DB::raw("select b_name,b_link,b_img_path from hb_banner where b_startdate <= now() and b_enddate >= now() and b_type = 0 and status = 1 order by RAND() LIMIT 3")
    );  
    $topbanner = DB::select(
        DB::raw("select b_name,b_link,b_img_path from hb_banner where b_startdate <= now() and b_enddate >= now() and b_type = 1 and status = 1 order by RAND() LIMIT 3")
    );    
    $mapProvince = DB::select(
        DB::raw("select distinct province from hb_map where status = 1 order by province asc")
    );
    return view('welcome')->with('data',['bottombanner' => $bottombanner,'topbanner' => $topbanner,'mapProvince' => $mapProvince]);
});


Route::get('/privacy', function () {
    return view('privacy');
});

Route::get('/disclaimer', function () {
    return view('disclaimer');
});


Route::get('/terms', function () {
    return view('terms');
});


Auth::routes();

Route::get('/home/{date?}', 'HomeController@index')->name('home');
Route::get('/subscription', 'SubscriptionController@index')->name('subscription');
Route::get('/dazocoin', 'CoinController@index')->name('dazocoin');

Route::get('/jockey', 'JockeyController@index')->name('jockey');
Route::get('/jockeydetails/{id?}', 'JockeyController@getDetails')->name('jockeydetails');
Route::post('/jockeyseason', 'JockeyController@filterList')->name('jockeyseason');
Route::get('/jockeyfilteryear', 'JockeyController@filterYear')->name('jockeyfilteryear');

Route::get('/horsedetails/{id?}','HorsesController@getDetails')->name('horsedetails');
Route::get('/horses','HorsesController@index')->name('horses');
Route::post('/horsesearch','HorsesController@filterList')->name('horsesearch');
Route::get('/horseracefilter','HorsesController@filterrace')->name('horseracefilter');


Route::get('/forum','ForumController@index')->name('forum');

Route::get('/owner', 'OwnerController@index')->name('owner');
Route::get('/ownerdetails/{id?}', 'OwnerController@getDetails')->name('ownerdetails');

Route::get('/trainer', 'TrainerController@index')->name('trainer');
Route::get('/trainerdetails/{id?}', 'TrainerController@getDetails')->name('trainerdetails');

Route::post('/program','RaceController@getSelected')->name('program');
Route::get('/racehorses','RaceController@raceHorses')->name('racehorses');
Route::post('/lastfive/{what}','RaceController@lastFiverace')->name('lastfiverace');
Route::post('/getallresult','RaceController@getAllresult')->name('getallresult');
Route::post('/checkhasrace','RaceController@checkHasrace')->name('checkhasrace');

/*Checkout*/
Route::get('/checkout/{type}/{amount}/{status?}','CheckoutController@checkout')->name('checkout');
Route::post('/dotransaction','CheckoutController@doTransaction')->name('dotransaction');
Route::post('/gettransstatus','CheckoutController@getTransStatus')->name('gettransstatus');
Route::post('/subscribe','CheckoutController@subscribe')->name('subscribe');
Route::post('/checkdailysub','CheckoutController@checkDailysub')->name('checkdailysub');
Route::post('/checkprosub','CheckoutController@checkProsub')->name('checkprosub');

/*TRACK PULL*/
Route::post('/gettrack','RaceController@getTrack')->name('gettrack');


/*Facebook API*/
Route::get('/auth/redirect/{provider}', 'SocialController@redirect');
Route::get('/callback/{provider}', 'SocialController@callback');

/*Google API*/
Route::get('auth/google', 'Auth\GoogleController@redirectToGoogle');
Route::get('auth/google/callback', 'Auth\GoogleController@handleGoogleCallback');

/*Twillo API*/
	Route::post('/userregister', 'AuthController@create')->name('register');
	/*Verification*/
	Route::post('/verify', 'AuthController@verify')->name('verify');
	
	


/*Email Sending*/
Route::get('/send/email', 'AuthController@mail');

/*Profile Route*/
Route::post('/complete', 'AuthController@complete')->name('complete');
Route::any('/profile', 'ProfileController@index')->name('profile');
Route::post('/passwordchecker', 'ProfileController@passwordchecker')->name('passwordchecker');
Route::get('/changepass', 'ProfileController@changepass')->name('changepass');
Route::post('/emailchange', 'ProfileController@emailchange')->name('emailchange');
Route::get('/verifyemailchange/{email?}/{token?}', 'ProfileController@verifyemailchange')->name('verifyemailchange');
Route::post('/editprofile', 'ProfileController@editProfile')->name('editprofile');
Route::post('/addeditMobileNumber', 'ProfileController@addeditMobileNumber')->name('addeditMobileNumber');


Route::get('/logout', 'AuthController@logout');


/* OTB */
Route::get('/otb', 'OtbController@index')->name('otb');
Route::get('/getMapCity', 'OtbController@getMapCity')->name('getMapCity');
Route::get('/getAddress', 'OtbController@getAddress')->name('getAddress');



//Clear Cache facade value:
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    return '<h1>Cache facade value cleared</h1>';
});

//Reoptimized class loader:
Route::get('/optimize', function() {
    $exitCode = Artisan::call('optimize');
    return '<h1>Reoptimized class loader</h1>';
});

//Route cache:
Route::get('/route-cache', function() {
    $exitCode = Artisan::call('route:cache');
    return '<h1>Routes cached</h1>';
});

//Clear Route cache:
Route::get('/route-clear', function() {
    $exitCode = Artisan::call('route:clear');
    return '<h1>Route cache cleared</h1>';
});

//Clear View cache:
Route::get('/view-clear', function() {
    $exitCode = Artisan::call('view:clear');
    return '<h1>View cache cleared</h1>';
});

//Clear Config cache:
Route::get('/config-cache', function() {
    $exitCode = Artisan::call('config:cache');
    return '<h1>Clear Config cleared</h1>';
});
