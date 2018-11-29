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
    	$statistics = Statistic::all();
    	return view('statistic.index',["statistics"=>$statistics]);
    }

    public function create(){
    	return view('statistic.create');
    }

    public function store(){
    	//return request();
    	$statistic = Statistic::create([
    		'name' => request()->name,
    		'description' => request()->description,
    	]);

    	foreach(request()->images as $image){
            $image = ImageStatistic::create([
                'route' => Storage::disk('statistic')->put($statistic->name, $image),
                'idStatistic' => $statistic->id
            ]);
        }
    	return Redirect::to('statistic');
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
    	$statistic = Statistic::findOrFail($id);
        $images = $announcement->images;
        $folder = explode('/',$images[0]->route);
        foreach($images as $image){
            unlink(public_path().'/statistic/'.$image->route);
        }
        rmdir(public_path().'/statistic/'.$folder[0]);
    	Statistic::destroy($id);

        return back();
    }

    public function getImages($id){
    	$statistic = Statistic::findOrFail($id);
        $images = $statistic->images;
        
        $path = '/statistics/';
    	return view('statistic.images',["statistic"=>$statistic,"images"=>$images,"path"=>$path]);
    }
}
