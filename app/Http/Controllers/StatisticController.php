<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Statistic;
use App\ImageStatistic;
use Storage;

class StatisticController extends Controller
{
    public function __construct(){

    }

    public function index(){
    	$statistics = Statistic::first();
    	return view('statistic.index',["statistics"=>$statistics]);
    }

    public function create(){

    }

    public function store(){

    }

    public function show(){

    }

    public function edit($id){
    	$statistic = Statistic::findOrFail($id);
    	return view('statistic.edit',['statistic'=>$statistic]);
    }

    public function update($id){
    	$statistic = Statistic::findOrFail($id);
    	$statistic->fill(request()->all());
    	$statistic->update();

    	return Redirect::to('statistic');
    }

    public function destroy($id){

    }
}
