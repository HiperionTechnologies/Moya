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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('sede','SedeController');

Route::resource('category','CategoryController');

Route::resource('event','EventController');
//Route::get('ajax','EventController@ajax');

Route::prefix('event/{id}')->group(function(){
	Route::get('dates','EventController@getDates')->name('dates');
	Route::get('ubication','EventController@getUbication')->name('ubication');
	Route::get('gallery','EventController@getGallery');//->name('gallery');
	Route::get('comments','EventController@getComments')->name('comments');

	Route::resource('gallery','GalleryController',['except'=>['index','show']]);

	Route::resource('ubication','UbicationController',['only'=>['edit','update']]);

	Route::resource('comment','CommentController',['only'=>['destroy']]);

	Route::resource('date','DateController',['except'=>['index','show']]);
	Route::prefix('date/{idDate}')->group(function(){
		Route::get('schedules','DateController@getSchedules')->name('schedules');

		Route::resource('schedule','ScheduleController');
		Route::prefix('schedule/{idShedule}')->group(function(){
			Route::get('itineraries','ScheduleController@getItineraries')->name('itineraries');
			
			Route::resource('itinerary','ItineraryController');
		});
	});
});

Route::resource('announcement','AnnouncementController');
Route::get('announcement/{id}/photos', 'AnnouncementController@getPhotos')->name('announcement.photos');
Route::get('announcement/{id}/social-networks','AnnouncementController@getNetworks');

Route::resource('statistic','StatisticController');
Route::get('statistic/{id}/images', 'StatisticController@getImages')->name('statistic.images');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
