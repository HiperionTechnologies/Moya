<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\Edition;
use App\EditionGallery;
use Storage;
use Image;

class EditionGalleryController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function create($event, $edition){
    	$data["event"] = Event::findOrFail($event);
    	$data["edition"] = Edition::findOrFail($edition);

    	return view('edition_gallery.create',$data);
    }

    public function store($idEvent, $idEdition){
    	//$event = Event::findOrFail($event);
        $edition = Edition::findOrFail($idEdition);
        $path = 'editions/';

        foreach(request()->gallery as $img){
            $image = Image::make($img);
            $name = $edition->name.$this->random_string().'.jpg';
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

            $img = EditionGallery::create([
                'route' => $name,
                'idEdition' => $edition->id
            ]);
        }
        $image->destroy();
        return redirect()->action('EditionController@show',[$idEvent,$idEdition]);
    }

    public function edit($event, $edition, $id){
        $data["gallery"] = EditionGallery::findOrFail($id);
        $data["event"] = Event::findOrFail($event);
        $data["edition"] = Edition::findOrFail($edition);
        return view('edition_gallery.edit',$data);
    }

    public function update($event, $edition, $id){
        $event = Event::findOrFail($event);
        $edition = Edition::findOrFail($edition);
        $image = EditionGallery::findOrFail($id);
        $path = 'editions/';//Storage::disk('event')->getDriver()->getAdapter()->getPathPrefix();
        $img = Image::make(request()->gallery);
        $name = $edition->name.$this->random_string().'.jpg';
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

        if(is_file(public_path().'/editions/'.$image->route)){
            unlink(public_path().'/editions/'.$image->route);
        }
        
        $image->route = $name;
        $image->update();
        return redirect()->action('EditionController@show',[$event->id,$edition->id]);
    }

    public static function destroy($event, $edition, $id){
        $image = EditionGallery::findOrFail($id);
        if(is_file(public_path().'/editions/'.$image->route)){
            unlink(public_path().'/editions/'.$image->route);
        }
        EditionGallery::destroy($id);
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
