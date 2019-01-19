<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\Gallery;
use Storage;
use Image;

class GalleryController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function create($idEvent){
    	$event = Event::findOrFail($idEvent);
    	return view('gallery.create',["event"=>$event]);
    }

    public function store($event){
    	$event = Event::findOrFail($event);
        $path = 'events/';

        foreach(request()->gallery as $img){
            $image = Image::make($img);
            $name = $event->name.$this->random_string().'.jpg';
            if($image->width() > 1500){
                $image->resize(1500, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
            }
            else if($image->height() > 1024){
                $image->resize(null, 1024, function ($constraint) {
                    $constraint->aspectRatio();
                });   
            }
            $image->save($path.$name, 70);

            $img = Gallery::create([
                'route' => $name,
                'idEvent' => $event->id
            ]);
        }
        $image->destroy();
        return redirect()->action('EventController@show',$event->id);
    }

    public function edit($event, $id){
        $data["gallery"] = Gallery::findOrFail($id);
        $data["event"] = Event::findOrFail($event);
        return view('gallery.edit',$data);
    }

    public function update($event, $id){
        $event = Event::findOrFail($event);
        $image = Gallery::findOrFail($id);
        $path = 'events/';//Storage::disk('event')->getDriver()->getAdapter()->getPathPrefix();
        $img = Image::make(request()->gallery);
        $name = $event->name.$this->random_string().'.jpg';
        if($image->width() > 1500){
            $image->resize(1500, null, function ($constraint) {
                $constraint->aspectRatio();
            });
        }
        else if($image->height() > 1024){
           $image->resize(null, 1024, function ($constraint) {
               $constraint->aspectRatio();
            });   
        }
        $img->save($path.$name, 70);
        $img->destroy();

        if(is_file(public_path().'/events/'.$image->route)){
            unlink(public_path().'/events/'.$image->route);
        }
        
        $image->route = $name;
        $image->update();
        return redirect()->action('EventController@show',$event->id);
    }

    public static function destroy($event, $id){
        $image = Gallery::findOrFail($id);
        if(is_file(public_path().'/events/'.$image->route)){
            unlink(public_path().'/events/'.$image->route);
        }
        Gallery::destroy($id);
        return back();
    }

    protected function random_string(){
        $key = '';
        $keys = array_merge(range('a','z'),range(0,9));
        for($i=0; $i<10; $i++){
            $key .= $keys[array_rand($keys)];
        }    
        return $key;
    }
}
