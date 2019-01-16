<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;
use Storage;
use Redirect;
use Image as I;

class PrincipalPageController extends Controller
{
    public function __construct(){

    }

    public function index(){
    	$images = Image::all();
    	$path = '/images/';
    	return view('principal.index',["images"=>$images,"path"=>$path]);
    }

    public function edit($id){
    	$image = Image::findOrFail($id);
    	return view('principal.edit',["image"=>$image]);
    }

    public function update($id){
    	$image = Image::findOrFail($id);

    	$image->title = request()->title;
    	$image->description = request()->description;
    	if(request()->image){
            $path = Storage::disk('image')->getDriver()->getAdapter()->getPathPrefix();
            $img = I::make(request()->image);
            $name = $image->name.$this->random_string().'.jpg';
            if($img->height() > 1500){
                $img->resize(1500, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
            }
            $img->save($path.$name, 70);
            $img->destroy();
            unlink(public_path().'/images/'.$image->route);
            $image->route = $name;
    	}
    	$image->update();
    	return Redirect::to('principal-page');
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
