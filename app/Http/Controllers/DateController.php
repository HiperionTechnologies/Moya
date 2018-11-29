<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Date;
use App\Event;

class DateController extends Controller
{
    public function __construct(){

    }

    public function index($idEvent){
    	/*$event = Event::findOrFail($idEvent);
    	$dates = $event->dates;
    	return view('date.index',["event"=>$event,"dates"=>$dates]);*/
    }

    public function create($idEvent){
    	$event = Event::findOrFail($idEvent);
    	return view('date.create',["event"=>$event]);
    }

    public function store(Request $request, $idEvent){
    	$date = Date::create([
    		'date' => request()->date,
    		'idEvent' => $idEvent
    	]);

        $num = 2;
        while($num != 0){   
            if(request()->has('date'.$num)){
                Date::create([
                    'date' => $request['date'.$num],
                    'idEvent' => $idEvent,
                ]);
                $num = $num+1;
            }
            else{
                $num = 0;
            }
        }

    	//return back();
    	return redirect()->action('EventController@getDates', [$date->idEvent]);
    }

    public function show(){

    }

    public function edit($idEvent, $id){
    	$event = Event::findOrFail($id);
    	$date = Date::findOrFail($id);
    	return view('date.edit',["date"=>$date,"event"=>$event]);
    }

    public function update($idEvent, $id){
    	$date = Date::findOrFail($id);
    	$date->fill(request()->all());
    	$date->update();
    	return redirect()->action('EventController@getDates', [$date->idEvent]);
    }

    public function destroy($idEvent, $id){
    	Date::destroy($id);
    	return back();
    }

    public function getSchedules($idEvent, $id){
        $event = Event::findOrFail($idEvent);
        $date = Date::findOrFail($id);
        $schedules = $date->schedules;
        return view('date.schedules',["event"=>$event,"date"=>$date,"schedules"=>$schedules]);
    }
}
