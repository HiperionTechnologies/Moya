<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
use DB;
use Storage;
use App\Sede;
use App\Event;
use App\Category;
use App\Announcement;
use App\SocialNetwork;
use App\Photo;
use App\Interested;
use App\SocialNetworkInterested;
use App\Ubication;
use App\Image;
use App\Statistic;

class FrontController extends Controller
{
	public function __construct(){
        $this->middleware('sede-url',['except'=>['index','redirect']]);
	}

    public function index(){
    	$sedes = Sede::pluck('city','id');
        if(count($sedes) == 1){
            return redirect()->action('FrontController@moya',[$sedes->first()]);
        }
    	return view('front.index',["sedes"=>$sedes]);
    }

    public function moya(){
        $data["sedes"] = Sede::all();
        $data["banner"] = Image::where('name','banner')->first();
        $data["statistics"] = Statistic::first();
        $data["path"] = '/images/';
    	return view('front.moya',$data);
    }

    public function events($sede){
        $data["path"] = '/events/';
        $data["sede"] = Sede::where('city',request()->segment(1))->first();
        $data["event"] = Event::join('ubications as u','events.idUbication','u.id')
                        ->latest('events.created_at')->first();
        return view('front.events',$data);
    }

    public function announcement($sede){
        $data["sede"] = $sede;
        $data["sedes"] = Sede::pluck('city','id');
        $data["categories"] = Category::pluck('name','id');
        return view('front.announcement',$data);
    }

    public function comunity($sede){
        $sede = Sede::where('city',$sede);
        return view('front.editions',["sede"=>$sede]);
    }

    public function redirect(){
    	$sede = Sede::findOrFail(request()->sede);
        return Redirect::to($sede->city.'/');
    }

    public function announcementStore($sede){
        $idSede = Sede::where('city',$sede)->first();
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
            'idSede' => $idSede->id,
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

        return redirect()->action('FrontController@announcements',[$sede]);
    }
}
