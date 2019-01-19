<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\SedeFormRequest;
use App\Sede;

class SedeController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
    	$sedes = Sede::all();
    	return view('sede.index',["sedes"=>$sedes]);
    }

    public function create(){
    	return view('sede.create');
    }

    public function store(){
    	$sede = Sede::create(request()->all());
    	return Redirect::to('sede');
    }

    public function show(){

    }

    public function edit($id){
    	$sede = Sede::findOrFail($id);
    	return view('sede.edit',["sede"=>$sede]);
    }

    public function update($id){
    	$sede = Sede::findOrFail($id);
    	$sede->fill(request()->all());
    	$sede->update();
    	return Redirect::to('sede');
    }

    public function destroy($id){
    	Sede::destroy($id);
    	return Redirect::to('sede');
    }
}
