<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\EventFormRequest;
use App\Event;
use App\Sede;
use App\Date;
use App\Gallery;
use App\Ubication;
use Storage;

class EventController extends Controller
{
    
	public function __construct(){
	}

    public function index(){
		$events = Event::all();
		return view('event.index',["events"=>$events]);
    }

    public function create(){
    	$sedes = Sede::pluck('city','id');
    	return view('event.create',["sedes"=>$sedes]);
    }

    public function store(EventFormRequest $request){
    	//return request();
    	$event = Event::create([
    		'name' => request()->name,
    		'description' => request()->description,
    		'idSede' => request()->idSede,
    	]);

    	$num = 1;
        while($num != 0){   
            if(request()->has('date'.$num)){
                Date::create([
                    'date' => $request['date'.$num],
                    'idEvent' => $event->id,
                ]);
                $num = $num+1;
            }
            else{
                $num = 0;
            }
        }

    	foreach(request()->gallery as $img){
            $img = Gallery::create([
                'route' => Storage::disk('event')->put($event->name, $img),
                'idEvent' => $event->id
            ]);
        }

        Ubication::create([
            'street' => request()->street,
            'number' => request()->number,
            'colony' => request()->colony,
            'idSede' => request()->idSede,
        	'latitude' => 100,
        	'longitude' => 100,
        	'idEvent' => $event->id
        ]);

    	return Redirect::to('event');
    }

    public function show($id){
    	$event = Event::findOrFail($id);
    	return view('event.show',["event"=>$event]);
    }

    public function edit($id){
    	$event = Event::findOrFail($id);
    	$sedes = Sede::pluck('city','id');
    	return view('event.edit',["event"=>$event,"sedes"=>$sedes]);
    }

    public function update($id){
    	$event = Event::findOrFail($id);
    	$event->fill(request()->all());
    	$event->update();
    	return Redirect::to('event');
    }

    public function destroy($id){
    	Event::destroy($id);
    	return Redirect::to('event');
    }

    public function getDates($id){
    	$event = Event::findOrFail($id);
    	$dates = $event->dates;
    	return view('event.dates',["event"=>$event,"dates"=>$dates]);
    }

    public function getUbication($id){
    	$event = Event::findOrFail($id);
    	$ubication = $event->ubication;
    	return view('event.ubication',["event"=>$event,"ubication"=>$ubication]);
    }

    public function getGallery($id){
    	$event = Event::findOrFail($id);
    	$gallery = $event->gallery;
    	$path = '/events/';
    	return view('event.gallery',["event"=>$event,"gallery"=>$gallery,"path"=>$path]); 
    }

    public function getComments($id){
    	$event = Event::findOrFail($id);
    	$comments = $event->comments;
    	return view('event.comments',["event"=>$event,"comments"=>$comments]);
    }
}
