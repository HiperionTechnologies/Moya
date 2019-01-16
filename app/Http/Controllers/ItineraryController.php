<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Itinerary;
use App\Schedule;
use App\Date;
use App\Event;

class ItineraryController extends Controller
{
    public function __construct(){

    }

    public function index(){

    }

    public function create($idEvent,$idDate,$idSchedule){
    	$event = Event::findOrFail($idEvent);
    	$date = Date::findOrFail($idDate);
    	$schedule = Schedule::findOrFail($idSchedule);
    	return view('itinerary.create',["event"=>$event,"date"=>$date,"schedule"=>$schedule]);
    }

    public function store(Request $request, $idEvent,$idDate,$idSchedule){
    	Itinerary::create([
            'time' => request()->time,
    		'itinerary' => request()->itinerary,
    		'idSchedule' => $idSchedule,
    	]);

        //for($i = 2; $i<10; $i++){
        //    $num = (integer)$i;
            //if(!empty($request['itinerary'.$num])){
        $num = 2;
        while($num != 0){   
            if(request()->has('time'.$num)){
                Itinerary::create([
                    'time' => $request['time'.$num],
                    'itinerary' => $request['itinerary'.$num],
                    'idSchedule' => $idSchedule,
                ]);
                $num = $num+1;
            }
            else{
                $num = 0;
            }
        }
        //}

    	return redirect()->action('EventController@show',[$idEvent]);
    }

    public function show(){

    }

    public function edit($idEvent,$idDate,$idSchedule,$id){
    	$event = Event::findOrFail($idEvent);
    	$date = Date::findOrFail($idDate);
    	$schedule = Schedule::findOrFail($idSchedule);
    	$itinerary = Itinerary::findOrFail($id);
    	return view('itinerary.edit',["event"=>$event,"date"=>$date,"schedule"=>$schedule,"itinerary"=>$itinerary]);
    }

    public function update($idEvent,$idDate,$idSchedule,$id){
    	$itinerary = Itinerary::findOrFail($id);
    	$itinerary->fill(request()->all());
    	$itinerary->update();
    	return redirect()->action('EventController@show',[$idEvent]);
    }

    public function destroy($idEvent,$idDate,$idSchedule,$id){
    	Itinerary::destroy($id);
    	return back();
    }
}
