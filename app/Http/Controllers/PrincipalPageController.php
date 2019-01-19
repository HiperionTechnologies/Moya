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
        $this->middleware('auth');
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
            $path = 'images/';//Storage::disk('image')->getDriver()->getAdapter()->getPathPrefix();
            $img = I::make(request()->image);
            $name = $image->name.$this->random_string().'.jpg';
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

            if(is_file(public_path().'/images/'.$image->route)){
                unlink(public_path().'/images/'.$image->route);
            }
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
