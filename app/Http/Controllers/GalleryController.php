<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\Gallery;
use Storage;

class GalleryController extends Controller
{
    public function __construct(){

    }

    public function create($idEvent){
    	$event = Event::findOrFail($idEvent);
    	return view('gallery.create',["event"=>$event]);
    }

    public function store($event){
    	$event = Event::findOrFail($event);
        /*foreach($event->gallery as $image){
            //Storage::disk('event')->delete($event->name.'/'.$image->route);
            unlink(public_path().'/events/'.$image->route);
        }*/
        foreach(request()->gallery as $img){
            $img = Gallery::create([
                'route' => Storage::disk('event')->put($event->name, $img),
                'idEvent' => $event->id
            ]);
        }
        return redirect()->action('EventController@getGallery',$event->id);
    }
}
