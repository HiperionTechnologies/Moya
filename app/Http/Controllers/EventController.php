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
use Image;

class EventController extends Controller
{
    
	public function __construct(){
	}

    public function index(){
		$events = Event::all();
		return view('event.index',["events"=>$events]);
    }

    public function create(){
    	$ubications = Ubication::pluck('name','id');
    	return view('event.create',["ubications"=>$ubications]);
    }

    public function store(EventFormRequest $request){
        $path = Storage::disk('event')->getDriver()->getAdapter()->getPathPrefix();
        $image = Image::make(request()->image);
        $name = request()->name.$this->random_string().'.jpg';
        if($image->height() > 1500){
            $image->resize(1500, null, function ($constraint) {
                $constraint->aspectRatio();
            });
        }
        $image->save($path.$name, 70);
        $image->destroy();
        
    	$event = Event::create([
    		'name' => request()->name,
    		'description' => request()->description,
    		'idUbication' => request()->idUbication,
            'image' => $name,
        ]);
            //'image' => Storage::disk('event')->put(request()->name, request()->image),

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

        /*if(request()->has('gallery')){
            foreach(request()->gallery as $img){
                $img = Gallery::create([
                    'route' => Storage::disk('event')->put($event->name, $img),
                    'idEvent' => $event->id
                ]);
            }
        }*/

    	return Redirect::to('event');
    }

    public function show($id){
    	$data["event"] = Event::findOrFail($id);
        $data["path"] = '/events/';
    	return view('event.show',$data);
    }

    public function edit($id){
    	$data["event"] = Event::findOrFail($id);
        $data["ubications"] = Ubication::pluck('name','id');
    	return view('event.edit',$data);
    }

    public function update($id){
    	$event = Event::findOrFail($id);
        $event->name = request()->name;
        $event->description = request()->description;
        if(request()->image){
            $path = Storage::disk('event')->getDriver()->getAdapter()->getPathPrefix();
            $img = Image::make(request()->image);
            $name = $event->name.$this->random_string().'.jpg';
            if($img->height() > 1500){
                $img->resize(1500, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
            }
            $img->save($path.$name, 70);
            $img->destroy();
            unlink(public_path().'/events/'.$event->image);
            $event->image = $name;
        }
        $event->idUbication = request()->idUbication;
    	//$event->fill(request()->all());
    	$event->update();
    	return Redirect::to('event');
    }

    public function destroy($id){
        $event = Event::findOrFail($id);
        unlink(public_path().'/events/'.$event->image);
    	Event::destroy($id);
    	return back();//Redirect::to('event');
    }

    /*public function getDates($id){
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

    public function edition($id){
        $event = Event::findOrFail($id);
        return view('edition.create',["event"=>$event]);
    }*/

    protected function random_string(){
        $key = '';
        $keys = array_merge(range('a','z'),range(0,9));
        for($i=0; $i<10; $i++){
            $key .= $keys[array_rand($keys)];
        }    
        return $key;
    }
}
