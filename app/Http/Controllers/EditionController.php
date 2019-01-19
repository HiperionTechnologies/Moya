<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\EditionGalleryController;
use App\Event;
use App\Edition;
use App\EditionGallery;
use Image;

class EditionController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){

    }

    public function create($event){
    	$event = Event::findOrFail($event);
    	return view('edition.create',["event"=>$event]);
    }
    
    public function store($event){
    	$edition = Edition::create([
    		'name' => request()->name,
    		'description' => request()->description,
    		'idEvent' => $event,
    	]);
    	return redirect()->action('EventController@getEditions',$event);
    }

    public function show($event, $id){
    	$data["event"] = Event::findOrFail($event);
    	$data["edition"] = Edition::findOrFail($id);
    	$data["path"] = '/editions/';
    	return view('edition.show',$data);
    }
    
    public function edit($event, $id){
    	$data["event"] = Event::findOrFail($event);
    	$data["edition"] = Edition::findOrFail($id);
    	return view('edition.edit',$data);
    }

    public function update($event, $id){
    	$edition = Edition::findOrFail($id);
    	$edition->fill(request()->all());
    	$edition->update();
    	return redirect()->action('EventController@getEditions',$event);
    }

    public static function destroy($event ,$id){
        $edition = Edition::findOrFail($id);
        if(count($edition->gallery) > 0){
            foreach($edition->gallery as $image){
                EditionGalleryController::destroy($event, $id, $image->id);
                //unlink(public_path().'/editions/'.$image->route);
            }
        }

    	//Edition::destroy($id);
    	return back();	
    }
}
