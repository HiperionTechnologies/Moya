<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\AnnouncementFormRequest;
use App\Announcement;
use App\Sede;
use App\Category;
use App\Photo;
use App\SocialNetwork;
use App\Interested;
use App\SocialNetworkInterested;
use Storage;

class AnnouncementController extends Controller
{
    public function __construct(){

    }

    public function index(){
    	$announcements = Announcement::all();
    	return view('announcement.index',["announcements"=>$announcements]);
    }

    public function create(){
        $sedes = Sede::pluck('city','id');
        $categories = Category::pluck('name','id');
    	return view('announcement.create',["sedes"=>$sedes,"categories"=>$categories]);
    }

    public function store(Request $request){
        
    	$announcement = Announcement::create([
            'first_name' => request()->first_name,
            'last_name' => request()->last_name,
            'phone' => request()->phone,
            'brand' => request()->brand,
            'description' => request()->description,
            'answer_moya' => request()->answer_moya,
            'organic' => request()->organic,
            'local' => request()->local,
            'artesanal' => request()->artesanal,
            'furniture' => request()->furniture,
            'idSede' => request()->idSede,
            'idCategory' => request()->idCategory
        ]);

        SocialNetwork::create([
            'link' => request()->social,
            'idAnnouncement' => $announcement->id,
        ]);

        for($i = 2; $i<5; $i++){
            $num = (integer)$i;
            if(!empty($request['social'.$num])){
                SocialNetwork::create([
                    'link' => $request['social'.$num],
                    'idAnnouncement' => $announcement->id,
                ]);
            }
        }

        foreach(request()->photos as $photo){
            $photo = Photo::create([
                'route' => Storage::disk('public')->put($announcement->first_name . " " . $announcement->last_name . " " . $announcement->brand, $photo),
                'idAnnouncement' => $announcement->id
            ]);
        }

        if(request()->name_interested != null){
            $interested = Interested::create([
                'name' => request()->name_interested,
                'email' => request()->email_interested,
                'phone' => request()->phone_interested
            ]);

            SocialNetworkInterested::create([
                'link' => request()->social_interested,
                'idInterested' => $interested->id,
            ]);

            for($i = 2; $i<5; $i++){
                $num = (integer)$i;
                if(!empty($request['social'.$num])){
                    SocialNetworkInterested::create([
                        'link' => $request['social_interested'.$num],
                        'idInterested' => $interested->id,
                    ]);
                }
            }
        }

    	return Redirect::to('announcement');
    }

    public function show(){

    }

    public function edit(){

    }

    public function update(){

    }

    public function destroy($id){
        $announcement = Announcement::findOrFail($id);
        $photos = $announcement->photos;
        $folder = explode('/',$photos[0]->route);
        foreach($photos as $photo){
            unlink(public_path().'/announcements/'.$photo->route);
        }
        rmdir(public_path().'/announcements/'.$folder[0]);
        Announcement::destroy($id);
        return Redirect::to('announcement');
    }

    public function getPhotos($id){      
        $announcement = Announcement::findOrFail($id);
        $photos = $announcement->photos;
        $path = '/announcements/';
        return view('announcement.photos',["announcement"=>$announcement, "photos"=>$photos,"path"=>$path]);
    }

    public function getNetworks($id){
        $announcement = Announcement::findOrFail($id);
        $networks = $announcement->socialNetworks;
        return view('announcement.networks',["announcement"=>$announcement, "networks"=>$networks]);
    }
}
