<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
use DB;
use Storage;
use Image as I;
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
        $data["path"] = 'images/';
    	return view('front.moya',$data);
    }

    public function events($sede){
        $data["path"] = '/images/events/';
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
        $data["sede"] = Sede::where('city',$sede);
        $data["announcements"] = Announcement::all();
        $data["path"] = '/images/announcements/';
        return view('front.comunity',$data);
    }

    public function redirect(){
    	$sede = Sede::findOrFail(request()->sede);
        return Redirect::to($sede->city.'/');
    }

    /*public function success(){

        return view('front.success')
    }*/

    public function success($sede, $id){
        $announcement = Announcement::findOrFail($id);
        $date = $announcement->created_at; //date('Y-m-d H:i:s');
        $limit_date = strtotime('+5 minute', strtotime($date));
        $limit_date = date('Y-m-d H:i:s',$limit_date);

        $data["announcement"] = $announcement;//Announcement::findOrFail($id);
        $data["sede"] = Sede::where('city',$sede);

        if($limit_date > date('Y-m-d H:i:s'))
            return view('front.success',$data);
        else
            return abort('404');
    }

    public function announcementStore($sede, Request $request){
        //return request();
        $idSede = Sede::where('city',$sede)->first();
        $path = 'images/announcements/';//Storage::disk('announcement')->getDriver()->getAdapter()->getPathPrefix();
        $image = I::make(request()->image);
        $name = request()->first_name.$this->random_string().'.jpg';
        if($image->width() > 640){
            $image->resize(640, null, function ($constraint) {
                $constraint->aspectRatio();
            });
        }
        else if($image->height() > 640){
            $image->resize(null, 640, function ($constraint) {
                $constraint->aspectRatio();
            });
        }
        $image->save($path.$name, 70);

        $announcement = Announcement::create([
            'first_name' => request()->first_name,
            'last_name' => request()->last_name,
            'phone' => request()->phone,
            'brand' => request()->brand,
            'description' => request()->description,
            'image' => $name,
            'answer_moya' => request()->answer_moya,
            'organic' => request()->organic,
            'local' => request()->local,
            'artesanal' => request()->artesanal,
            'furniture' => request()->furniture,
            'idSede' => $idSede->id,
            'idCategory' => request()->idCategory
        ]);

        if(request()->facebook){
            SocialNetwork::create([
                'link' => request()->facebook,
                'idAnnouncement' => $announcement->id,
            ]);
        }
        if(request()->instagram){
            SocialNetwork::create([
                'link' => request()->instagram,
                'idAnnouncement' => $announcement->id,
            ]);
        }
        if(request()->twitter){
            SocialNetwork::create([
                'link' => request()->twitter,
                'idAnnouncement' => $announcement->id,
            ]);
        }

        if(request()->photos){
            foreach(request()->photos as $photo){
                $image = I::make($photo);
                $name_photo = request()->first_name.$this->random_string().'.jpg';
                if($image->width() > 1024){
                    $image->resize(1024, null, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                }
                else if($image->height() > 1024){
                    $image->resize(null, 1024, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                }
                $image->save($path.$name_photo, 70);
                $photo = Photo::create([
                    'route' => $name_photo,
                    'idAnnouncement' => $announcement->id
                ]);
            }
        }

        if(request()->name_interested != null){
            $interested = Interested::create([
                'name' => request()->name_interested,
                'email' => request()->email_interested,
                'phone' => request()->phone_interested
            ]);

            if(request()->facebook){
                SocialNetworkInterested::create([
                    'link' => request()->facebook_interested,
                    'idInterested' => $interested->id,
                ]);
            }
            if(request()->instagram){
                SocialNetworkInterested::create([
                    'link' => request()->instagram_interested,
                    'idInterested' => $interested->id,
                ]);
            }
            if(request()->twitter){
                SocialNetworkInterested::create([
                    'link' => request()->twitter_interested,
                    'idInterested' => $interested->id,
                ]);
            }
        }

        $image->destroy();

        return redirect()->action('FrontController@success',[$sede,$announcement->id]);
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
