<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Schedule;
use App\Date;
use App\Event;
use App\Itinerary;

class ScheduleController extends Controller
{
    public function __construct(){

    }

    public function index(){

    }

    public function create($idEvent, $idDate){
    	$event = Event::FindOrFail($idEvent);
    	$date = Date::FindOrFail($idDate);
    	return view('schedule.create',["event"=>$event,"date"=>$date]);
    }

    public function store(Request $request, $idEvent, $idDate){
    	$schedule = Schedule::create([
    		'time' => request()->time,
    		'idDate' => $idDate,
    	]);

        $num = 1;
        while($num != 0){   
            if(request()->has('hour'.$num)){
                Itinerary::create([
                    'time' => $request['hour'.$num],
                    'itinerary' => $request['itinerary'.$num],
                    'idSchedule' => $schedule->id,
                ]);
                $num = $num+1;
            }
            else{
                $num = 0;
            }
        }
    	return redirect()->action('EventController@show',[$idEvent]);
    }

    public function show(){

    }

    public function edit($idEvent, $idDate, $id){
        $event = Event::FindOrFail($idEvent);
        $date = Date::FindOrFail($idDate);
        $schedule = Schedule::FindOrFail($id);
        return view('schedule.edit',["event"=>$event,"date"=>$date,"schedule"=>$schedule]);
    } 

    public function update($idEvent, $idDate, $id){
        $schedule = Schedule::FindOrFail($id);
        $schedule->fill(request()->all());
        $schedule->update();
        return redirect()->action('EventController@show',[$idEvent]);
    }

    public function destroy($idEvent, $idDate, $id){
        Schedule::destroy($id);
        return back();
    }

    public function getItineraries($idEvent, $idDate, $id){
        $event = Event::findOrFail($idEvent);
        $date = Date::findOrFail($idDate);
        $schedule = Schedule::findOrFail($id);
        $itineraries = $schedule->itineraries;
        return view('schedule.itineraries',["event"=>$event,"date"=>$date,"schedule"=>$schedule,"itineraries"=>$itineraries]);
    }
}
