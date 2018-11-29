<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ubication;
use App\Event;

class UbicationController extends Controller
{
    public function __construct(){

    }

    public function index(){

    }

    public function create(){
    }

    public function store(){

    }

    public function show(){

    }

    public function edit($idEvent, $id){
    	$event = Event::FindOrFail($idEvent);
    	$ubication = Ubication::FindOrFail($id);
    	return view('ubication.edit',["event"=>$event,"ubication"=>$ubication]);
    }

    public function update($idEvent, $id){
    	$ubication = Ubication::FindOrFail($id);
    	$ubication->fill(request()->all());
    	$ubication->latitude = 85;
    	$ubication->longitude = 90;
    	$ubication->update();
    	return redirect()->action('EventController@getUbication', [$ubication->idEvent]);
    }

    public function destroy(){
    	
    }
}
