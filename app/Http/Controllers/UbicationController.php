<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ubication;
use App\Sede;
use Redirect;

class UbicationController extends Controller
{
    public function __construct(){

    }

    public function index(){
        $ubications = Ubication::all();
        return view('ubication.index',["ubications"=>$ubications]);
    }

    public function create(){
        $sedes = Sede::pluck('city','id');
        return view('ubication.create',["sedes"=>$sedes]);
    }

    public function store(){
        Ubication::create([
            'name' => request()->name,
            'street' => request()->street,
            'number' => request()->number,
            'colony' => request()->colony,
            'idSede' => request()->idSede,
        ]);
        return Redirect::to('ubication');
    }

    public function show(){

    }

    public function edit($id){
        $ubication = Ubication::findOrFail($id);
        $sedes = Sede::pluck('city','id');
        return view('ubication.edit',["ubication"=>$ubication,"sedes"=>$sedes]);
    }

    public function update($id){
        $ubication = Ubication::findOrFail($id);
        $ubication->fill(request()->all());
        $ubication->update();
        return Redirect::to('ubication');
    }

    /*public function edit($idEvent, $id){
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
    }*/

    public function destroy($id){
        Ubication::destroy($id);    	
    }
}
