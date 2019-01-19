<?php

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

/*Route::get('/', function () {
    //return view('front.index');//redirect()->action('FrontController@index');
    //return view('welcome');
});*/

//Auth::routes();

//linea 1151
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('principal-page','PrincipalPageController@index')->name('principal.index');
Route::get('principal-page/{id}/edit','PrincipalPageController@edit')->name('principal.edit');
Route::patch('principal-page/{id}','PrincipalPageController@update')->name('principal.update');

Route::resource('sede','SedeController');

Route::resource('ubication','UbicationController');

Route::resource('category','CategoryController');

Route::resource('event','EventController');

Route::prefix('event/{id}')->group(function(){
	//Route::get('dates','EventController@getDates');
	Route::get('gallery','EventController@getGallery');
	Route::get('editions','EventController@getEditions')->name('event.editions');

	Route::resource('gallery','GalleryController',['except'=>['index','show']]);

	Route::resource('edition','EditionController');
	Route::prefix('edition/{idEdition}')->group(function(){
		Route::resource('e-gallery','EditionGalleryController');
	});

	Route::resource('date','DateController');
	Route::prefix('date/{idDate}')->group(function(){
		Route::resource('schedule','ScheduleController');
		Route::prefix('schedule/{idShedule}')->group(function(){
			Route::resource('itinerary','ItineraryController');
		});
	});
});
Route::resource('announcement','AnnouncementController');
Route::get('announcement/{id}/photos', 'AnnouncementController@getPhotos')->name('announcement.photos');
Route::get('announcement/{id}/social-networks','AnnouncementController@getNetworks');

Route::resource('statistic','StatisticController');
Route::get('statistic/{id}/images', 'StatisticController@getImages')->name('statistic.images');

Route::get('interesteds','InterestedController@index')->name('interested.index');
Route::delete('interesteds/{id}','InterestedController@destroy')->name('interested.destroy');
//Route::resource('interesteds','InterestedController');

Route::get('/','FrontController@index')->name('front.index');
Route::post('sede-redirect','FrontController@redirect')->name('sede.redirect');
Route::get('{sede}/','FrontController@moya')->name('moya');
Route::prefix('{sede}')->group(function(){
	Route::get('eventos','FrontController@events')->name('eventos');
	Route::get('convocatoria','FrontController@announcement')->name('convocatoria');
	Route::post('convocatoria','FrontController@announcementStore')->name('convocatoria.store');
	Route::get('convocatoria/{id}','FrontController@success')->name('convocatoria.success');
	Route::get('comunidad','FrontController@comunity')->name('comunidad');
});
